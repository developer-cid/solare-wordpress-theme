/**
 * Landing-page FAQ accordion.
 */
(function () {
  'use strict';

  document.querySelectorAll('.faq-button').forEach(button => {
    button.addEventListener('click', () => {
      const item = button.closest('.faq-item');
      if (!item) return;

      document.querySelectorAll('.faq-item').forEach(other => {
        if (other !== item) other.classList.remove('open');
      });

      item.classList.toggle('open');
    });
  });
})();
