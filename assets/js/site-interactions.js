(function () {
  'use strict';

  function setupWhatsAppLinks() {
    var selector = 'a[href*="wa.me"], a[href*="api.whatsapp.com"]';

    document.querySelectorAll(selector).forEach(function (link) {
      link.setAttribute('target', '_blank');
      link.setAttribute('rel', 'noopener noreferrer');

      link.addEventListener('click', function (event) {
        var href = link.getAttribute('href');
        if (!href) return;

        event.preventDefault();
        event.stopPropagation();

        var popup = window.open(href, '_blank');
        if (popup) {
          try { popup.opener = null; } catch (e) {}
        } else {
          window.location.assign(href);
        }
      });
    });
  }

  function fieldMode(value) {
    if (value === 'Group or delegation') return 'group';
    if (value === 'Business travel') return 'business';
    if (value === 'Existing booking') return 'existing';
    if (value === 'General travel enquiry') return 'general';
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

  function showFormStatus(status, result) {
    status.className = 'form-live-status';

    if (result === 'success') {
      status.textContent = 'Thank you. Your enquiry has been sent to D.A.K Travel.';
      status.classList.add('form-live-status--success');
    } else if (result === 'invalid') {
      status.textContent = 'Please complete your name, a valid email address and your message.';
      status.classList.add('form-live-status--error');
    } else {
      status.textContent = 'We could not send your enquiry. Please try again or use WhatsApp Us.';
      status.classList.add('form-live-status--error');
    }

    status.hidden = false;
  }

  function setupEnquiryForm(form) {
    var submit = form.querySelector('button[type="submit"]');
    var status = form.querySelector('.form-live-status');

    if (!submit || !status || !window.fetch || !window.DOMParser) return;

    form.addEventListener('submit', function (event) {
      event.preventDefault();

      if (!form.checkValidity()) {
        form.reportValidity();
        return;
      }

      var originalLabel = submit.getAttribute('data-normal-label') || submit.textContent || 'Send Enquiry';
      submit.disabled = true;
      submit.textContent = 'Sending…';
      status.hidden = true;
      status.className = 'form-live-status';
      status.textContent = '';

      fetch(form.action || window.location.href, {
        method: 'POST',
        body: new FormData(form),
        credentials: 'same-origin',
        redirect: 'follow'
      }).then(function (response) {
        if (!response.ok) {
          throw new Error('HTTP ' + response.status);
        }
        return response.text();
      }).then(function (html) {
        var parsed = new DOMParser().parseFromString(html, 'text/html');
        var resultNode = parsed.querySelector('[data-enquiry-result]');
        var result = resultNode ? resultNode.getAttribute('data-enquiry-result') : '';

        if (!result) {
          throw new Error('No form result returned');
        }

        showFormStatus(status, result);

        if (result === 'success') {
          form.reset();
          var select = form.querySelector('[name="enquiry_type"]');
          if (select) select.dispatchEvent(new Event('change'));
        }

        status.scrollIntoView({ behavior: 'smooth', block: 'center' });
      }).catch(function () {
        status.textContent = 'The enquiry could not be submitted from this page. Please refresh and try again.';
        status.classList.add('form-live-status--error');
        status.hidden = false;
      }).finally(function () {
        submit.disabled = false;
        submit.textContent = originalLabel;
      });
    });
  }

  document.addEventListener('DOMContentLoaded', function () {
    setupWhatsAppLinks();
    document.querySelectorAll('.dak-enquiry-form').forEach(function (form) {
      setupConditionalForm(form);
      setupEnquiryForm(form);
    });
  });
}());
