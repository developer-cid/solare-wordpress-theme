/**
 * Shared mobile navigation.
 * Used by both the landing page and Solar Planner.
 */
(function () {
  'use strict';

  const menuButton = document.getElementById('menu-button');
  const mobileMenu = document.getElementById('mobile-menu');
  const openIcon = document.getElementById('menu-open-icon');
  const closeIcon = document.getElementById('menu-close-icon');

  if (!menuButton || !mobileMenu || !openIcon || !closeIcon) return;

  function setMenuOpen(isOpen) {
    mobileMenu.classList.toggle('hidden', !isOpen);
    openIcon.classList.toggle('hidden', isOpen);
    closeIcon.classList.toggle('hidden', !isOpen);
    menuButton.setAttribute('aria-expanded', String(isOpen));
  }

  menuButton.addEventListener('click', () => {
    setMenuOpen(mobileMenu.classList.contains('hidden'));
  });

  document.querySelectorAll('.mobile-link').forEach(link => {
    link.addEventListener('click', () => setMenuOpen(false));
  });
})();
