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
    function updateHeader() { header.classList.toggle('scrolled', window.scrollY > 12); }
    window.addEventListener('scroll', updateHeader, { passive: true });
    updateHeader();
  }

  function initMobileNav() {
    var toggle = document.querySelector('.nav-toggle');
    var navigation = document.getElementById('primary-navigation');
    if (!toggle || !navigation) return;
    var focusable = 'a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])';

    function isMobile() { return window.innerWidth <= 820; }
    function setOpen(open) {
      document.body.classList.toggle('nav-open', open);
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      toggle.setAttribute('aria-label', open ? 'Close navigation' : 'Open navigation');
      if (isMobile()) navigation.setAttribute('aria-hidden', open ? 'false' : 'true');
      else navigation.removeAttribute('aria-hidden');
      if (open) {
        var first = navigation.querySelector(focusable);
        if (first) first.focus();
      }
    }

    toggle.addEventListener('click', function () { setOpen(!document.body.classList.contains('nav-open')); });
    navigation.addEventListener('click', function (event) { if (event.target.closest('a')) setOpen(false); });
    document.addEventListener('keydown', function (event) {
      if (!document.body.classList.contains('nav-open')) return;
      if (event.key === 'Escape') {
        setOpen(false);
        toggle.focus();
      } else if (event.key === 'Tab') {
        var items = Array.prototype.slice.call(navigation.querySelectorAll(focusable));
        if (!items.length) return;
        var first = items[0];
        var last = items[items.length - 1];
        if (event.shiftKey && document.activeElement === first) { event.preventDefault(); last.focus(); }
        if (!event.shiftKey && document.activeElement === last) { event.preventDefault(); first.focus(); }
      }
    });
    window.addEventListener('resize', function () { setOpen(false); });
    setOpen(false);
  }

  function initLanguageSwitch() {
    document.querySelectorAll('.lang-option').forEach(function (button) {
      button.addEventListener('click', function () {
        if (typeof window.switchLang === 'function') window.switchLang(button.dataset.lang);
      });
    });
  }

  function initBackToTop() {
    var button = document.getElementById('mcm-top');
    if (!button) return;
    function updateButton() { button.classList.toggle('is-visible', window.scrollY > 520); }
    window.addEventListener('scroll', updateButton, { passive: true });
    button.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: 'smooth' }); });
    updateButton();
  }

  function initStaticContactForm() {
    var form = document.querySelector('[data-static-contact]');
    if (!form) return;
    var startedAt = form.querySelector('[name="startedAt"]');
    var submit = form.querySelector('[type="submit"]');
    var success = document.querySelector('.form-success');
    var error = document.querySelector('.form-error');
    if (startedAt) startedAt.value = String(Date.now());

    form.addEventListener('submit', async function (event) {
      event.preventDefault();
      if (!form.checkValidity()) { form.reportValidity(); return; }
      success.hidden = true;
      error.hidden = true;
      submit.disabled = true;
      submit.setAttribute('aria-busy', 'true');
      try {
        var response = await fetch(form.action, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
          body: JSON.stringify(Object.fromEntries(new FormData(form).entries()))
        });
        var result = await response.json().catch(function () { return {}; });
        if (!response.ok) throw new Error(result.error || 'We could not send your message.');
        form.reset();
        form.hidden = true;
        success.textContent = 'Thank you. Your message has been sent.';
        success.hidden = false;
        success.focus();
      } catch (requestError) {
        error.textContent = requestError.message + ' You can email info@mwealth.online directly.';
        error.hidden = false;
        error.focus();
      } finally {
        submit.disabled = false;
        submit.removeAttribute('aria-busy');
      }
    });
  }

  function init() {
    initReveal();
    initHeader();
    initMobileNav();
    initLanguageSwitch();
    initBackToTop();
    initStaticContactForm();
  }

  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init);
  else init();
})();
