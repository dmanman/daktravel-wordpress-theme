(function () {
  'use strict';

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

  function setupRealHomepageHero() {
    var hero = document.querySelector('.home .hero-media');
    if (!hero) return;

    /* Bright real airport-terminal photograph from Pexels. */
    var photo = 'https://images.pexels.com/photos/12720528/pexels-photo-12720528.jpeg?auto=compress&cs=tinysrgb&w=2200';

    hero.style.setProperty(
      'background-image',
      'linear-gradient(180deg, rgba(7,17,27,0) 0%, rgba(7,17,27,.03) 45%, rgba(7,17,27,.30) 100%), url("' + photo + '")',
      'important'
    );
    hero.style.setProperty('background-size', 'cover', 'important');
    hero.style.setProperty('background-position', 'center center', 'important');
    hero.style.setProperty('background-repeat', 'no-repeat', 'important');

    var card = hero.querySelector('.advisory-card');
    if (card) {
      card.style.background = 'rgba(7, 17, 27, .58)';
      card.style.backdropFilter = 'blur(3px)';
      card.style.webkitBackdropFilter = 'blur(3px)';
    }
  }

  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.dak-enquiry-form').forEach(function (form) {
      setupConditionalForm(form);
    });
    setupRealHomepageHero();
  });
}());
