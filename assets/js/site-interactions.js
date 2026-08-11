(function () {
  'use strict';

  function setWhatsAppTargets() {
    document.querySelectorAll('a.btn--whatsapp, a.mobile-menu-whatsapp, .mobile-actions a[href*="whatsapp.com"], .mobile-actions a[href*="wa.me"]').forEach(function (link) {
      link.setAttribute('target', '_blank');
      link.setAttribute('rel', 'noopener noreferrer');
    });
  }

  function fieldMode(value) {
    if (value === 'Group or delegation') return 'group';
    if (value === 'Business travel') return 'business';
    if (value === 'Existing booking') return 'existing';
    return 'travel';
  }

  function setupConditionalForm(form) {
    var select = form.querySelector('[name="enquiry_type"]');
    if (!select) return;

    var groups = form.querySelectorAll('[data-enquiry-fields]');

    function updateFields() {
      var mode = fieldMode(select.value);
      groups.forEach(function (group) {
        var show = group.getAttribute('data-enquiry-fields') === mode;
        group.hidden = !show;
        group.querySelectorAll('input, select, textarea').forEach(function (field) {
          field.disabled = !show;
        });
      });
    }

    select.addEventListener('change', updateFields);
    updateFields();
  }

  function setupAjaxForm(form) {
    var submit = form.querySelector('button[type="submit"]');
    var status = form.querySelector('.form-live-status');
    if (!submit || !status || !window.fetch) return;

    form.addEventListener('submit', function (event) {
      event.preventDefault();
      if (!form.checkValidity()) {
        form.reportValidity();
        return;
      }

      var original = submit.textContent;
      submit.disabled = true;
      submit.textContent = 'Sending…';
      status.hidden = true;
      status.className = 'form-live-status';

      fetch(form.action, {
        method: 'POST',
        body: new FormData(form),
        credentials: 'same-origin'
      }).then(function (response) {
        var finalUrl = new URL(response.url, window.location.href);
        var sent = finalUrl.searchParams.get('sent');
        if (sent === '1') {
          status.textContent = 'Thank you. Your enquiry has been sent to D.A.K Travel.';
          status.classList.add('form-live-status--success');
          status.hidden = false;
          form.reset();
          var select = form.querySelector('[name="enquiry_type"]');
          if (select) select.dispatchEvent(new Event('change'));
        } else {
          throw new Error('send-failed');
        }
      }).catch(function () {
        status.textContent = 'We could not send the enquiry. Please try again or use WhatsApp D.A.K.';
        status.classList.add('form-live-status--error');
        status.hidden = false;
      }).finally(function () {
        submit.disabled = false;
        submit.textContent = original;
      });
    });
  }

  document.addEventListener('DOMContentLoaded', function () {
    setWhatsAppTargets();
    document.querySelectorAll('.dak-enquiry-form').forEach(function (form) {
      setupConditionalForm(form);
      setupAjaxForm(form);
    });
  });
}());
