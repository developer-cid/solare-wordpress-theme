/**
 * SOL.ARE reveal-on-scroll animations.
 *
 * Homepage:
 * - Automatically animate page sections and service cards.
 *
 * About Us:
 * - Only animate elements explicitly marked with .reveal-on-scroll.
 *
 * Solar Planner:
 * - Only animate elements explicitly marked with .reveal-on-scroll.
 * - Step 1 and Step 2 remain immediately visible.
 *
 * Other pages:
 * - No reveal animations are automatically applied.
 */
(function () {
  'use strict';

  const solarPlanner = document.getElementById('solar-planner');
  const aboutPage = document.getElementById('about-page');
  const homepage = document.body.classList.contains('home');

  let revealTargets = [];

  if (solarPlanner) {
    /**
     * Solar Planner
     *
     * Only explicitly marked elements are animated.
     */
    revealTargets = [
      ...solarPlanner.querySelectorAll('.reveal-on-scroll')
    ];
  } else if (aboutPage) {
    /**
     * About Us
     *
     * Only explicitly marked elements are animated.
     * This prevents the entire About page or its sections
     * from being hidden automatically.
     */
    revealTargets = [
      ...aboutPage.querySelectorAll('.reveal-on-scroll')
    ];
  } else if (homepage) {
    /**
     * Homepage
     *
     * Preserve the existing homepage behavior.
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