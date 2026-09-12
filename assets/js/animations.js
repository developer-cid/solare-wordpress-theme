/**
 * Landing-page reveal-on-scroll animation.
 */
(function () {
  'use strict';

  const revealTargets = [
    ...document.querySelectorAll('main section:not(:first-child)'),
    ...document.querySelectorAll('.service-card')
  ];

  if (!revealTargets.length) return;

  revealTargets.forEach((element, index) => {
    element.classList.add('reveal-on-scroll');

    if (element.classList.contains('service-card')) {
      element.classList.add(`reveal-delay-${(index % 3) + 1}`);
    }
  });

  // Graceful fallback for older browsers.
  if (!('IntersectionObserver' in window)) {
    revealTargets.forEach(element => element.classList.add('is-visible'));
    return;
  }

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('is-visible');
      observer.unobserve(entry.target);
    });
  }, {
    threshold: 0.12,
    rootMargin: '0px 0px -50px 0px'
  });

  revealTargets.forEach(element => observer.observe(element));
})();
