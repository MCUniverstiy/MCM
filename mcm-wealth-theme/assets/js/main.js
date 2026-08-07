/* MCM Wealth Management — shared interactions */
(function () {
  'use strict';

  document.documentElement.classList.add('js');

  function initReveal() {
    var elements = document.querySelectorAll('.reveal');
    if (!elements.length) return;

    if (!('IntersectionObserver' in window) || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      elements.forEach(function (element) { element.classList.add('in'); });
      return;
    }

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('in');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -36px' });

    elements.forEach(function (element) { observer.observe(element); });
  }

  function initHeader() {
    var header = document.querySelector('.site-header');
    if (!header) return;

    function updateHeader() {
      header.classList.toggle('scrolled', window.scrollY > 12);
    }

    window.addEventListener('scroll', updateHeader, { passive: true });
    updateHeader();
  }

  function initMobileNav() {
    var toggle = document.querySelector('.nav-toggle');
    var navigation = document.getElementById('primary-navigation');
    if (!toggle || !navigation) return;

    function setOpen(open) {
      document.body.classList.toggle('nav-open', open);
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      toggle.setAttribute('aria-label', open ? 'Close navigation' : 'Open navigation');
    }

    toggle.addEventListener('click', function () {
      setOpen(!document.body.classList.contains('nav-open'));
    });

    navigation.addEventListener('click', function (event) {
      if (event.target.closest('a')) setOpen(false);
    });

    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && document.body.classList.contains('nav-open')) {
        setOpen(false);
        toggle.focus();
      }
    });

    window.addEventListener('resize', function () {
      if (window.innerWidth > 820) setOpen(false);
    });
  }

  function initBackToTop() {
    var button = document.getElementById('mcm-top');
    if (!button) return;

    function updateButton() {
      button.classList.toggle('is-visible', window.scrollY > 520);
    }

    window.addEventListener('scroll', updateButton, { passive: true });
    button.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
    updateButton();
  }

  function initStaticContactForm() {
    var form = document.querySelector('[data-static-contact]');
    if (!form) return;

    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault();
        form.reportValidity();
      }
    });
  }

  function init() {
    initReveal();
    initHeader();
    initMobileNav();
    initBackToTop();
    initStaticContactForm();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
