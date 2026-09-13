/**
 * Shared mobile navigation.
 * Used by both the landing page and Solar Planner.
 */

(function () {
  'use strict';

  function initMobileMenu() {
    const menuButton = document.getElementById('menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const openIcon = document.getElementById('menu-open-icon');
    const closeIcon = document.getElementById('menu-close-icon');

    if (!menuButton || !mobileMenu || !openIcon || !closeIcon) {
      return;
    }

    function setMenuOpen(isOpen) {
      mobileMenu.classList.toggle('hidden', !isOpen);
      openIcon.classList.toggle('hidden', isOpen);
      closeIcon.classList.toggle('hidden', !isOpen);

      menuButton.setAttribute('aria-expanded', String(isOpen));
      menuButton.setAttribute(
        'aria-label',
        isOpen ? 'Close menu' : 'Open menu'
      );
    }

    menuButton.addEventListener('click', function () {
      const isHidden = mobileMenu.classList.contains('hidden');
      setMenuOpen(isHidden);
    });

    document.querySelectorAll('.mobile-link').forEach(function (link) {
      link.addEventListener('click', function () {
        setMenuOpen(false);
      });
    });

    setMenuOpen(false);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initMobileMenu);
  } else {
    initMobileMenu();
  }

  function initActiveNavigation() {
  const navLinks = document.querySelectorAll(
    'a[href*="#services"], a[href*="#about"], a[href*="#process"], a[href*="#projects"], a[href*="#faq"]'
  );

  const sections = [
    'services',
    'about',
    'process',
    'projects',
    'faq'
  ];

  function updateActiveNavigation() {
    const currentHash = window.location.hash.replace('#', '');

      navLinks.forEach((link) => {
        const href = link.getAttribute('href') || '';
        const isActive =
          currentHash &&
          href.endsWith(`#${currentHash}`);

        const isMobileLink = link.classList.contains('mobile-link');

        let indicator = link.querySelector('.nav-active-indicator');

        if (isMobileLink) {
          // Mobile active style
          link.classList.toggle('bg-solar-50', isActive);
          link.classList.toggle('text-solar-800', isActive);
          link.classList.toggle('font-bold', isActive);

          if (indicator) {
            indicator.remove();
          }
        } else {
          // Desktop active style
          link.classList.toggle('text-slate-950', isActive);
          link.classList.toggle('font-bold', isActive);

          if (isActive) {
            if (!indicator) {
              indicator = document.createElement('span');

              indicator.className =
                'nav-active-indicator absolute inset-x-0 -bottom-3 mx-auto h-0.5 w-8 rounded-full bg-solar-400';

              link.appendChild(indicator);
            }
          } else if (indicator) {
            indicator.remove();
          }
        }
      });
    }

    window.addEventListener('hashchange', updateActiveNavigation);

    updateActiveNavigation();
  }

  initActiveNavigation();
})();