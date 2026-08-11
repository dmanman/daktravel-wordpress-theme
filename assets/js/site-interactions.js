(function () {
  'use strict';

  function setupWhatsAppLinks() {
    var selector = 'a[href*="wa.me"], a[href*="api.whatsapp.com"]';

    document.querySelectorAll(selector).forEach(function (link) {
      link.setAttribute('target', '_blank');
      link.setAttribute('rel', 'noopener noreferrer');

      link.addEventListener('click', function (event) {
        event.preventDefault();
        event.stopPropagation();

        var href = link.getAttribute('href');
        if (!href) return;

        var popup = window.open(href, '_blank', 'noopener,noreferrer');
        if (!popup) {
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

  document.addEventListener('DOMContentLoaded', function () {
    setupWhatsAppLinks();
    document.querySelectorAll('.dak-enquiry-form').forEach(function (form) {
      setupConditionalForm(form);
    });
  });
}());
