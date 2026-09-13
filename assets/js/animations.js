/**
 * SOL.ARE reveal-on-scroll animations.
 *
 * Homepage:
 * - Automatically animate page sections and service cards.
 *
 * Solar Planner:
 * - Only animate elements explicitly marked with .reveal-on-scroll.
 * - Step 1 and Step 2 remain immediately visible.
 */
(function () {
  'use strict';

  const solarPlanner = document.getElementById('solar-planner');

  let revealTargets = [];

  if (solarPlanner) {
    /**
     * Solar Planner
     *
     * Do NOT automatically add reveal animations to every <section>.
     * The estimator contains large nested sections, and hiding the
     * whole estimator wrapper would also hide all of its children.
     *
     * Only elements explicitly carrying .reveal-on-scroll are animated.
     */
    revealTargets = [
      ...solarPlanner.querySelectorAll('.reveal-on-scroll')
    ];
  } else {
    /**
     * Landing page
     *
     * Preserve the original behavior:
     * animate sections after the hero and service cards.
     */
    revealTargets = [
      ...document.querySelectorAll('main section:not(:first-child)'),
      ...document.querySelectorAll('.service-card')
    ];

    revealTargets.forEach((element, index) => {
      element.classList.add('reveal-on-scroll');

      if (element.classList.contains('service-card')) {
        element.classList.add(
          `reveal-delay-${(index % 3) + 1}`
        );
      }
    });
  }

  if (!revealTargets.length) {
    return;
  }

  /**
   * Accessibility / older-browser fallback.
   */
  if (!('IntersectionObserver' in window)) {
    revealTargets.forEach((element) => {
      element.classList.add('is-visible');
    });

    return;
  }

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) {
          return;
        }

        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      });
    },
    {
      threshold: 0.12,
      rootMargin: '0px 0px -50px 0px'
    }
  );

  revealTargets.forEach((element) => {
    observer.observe(element);
  });
})();