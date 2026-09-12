/**
 * Optional local-asset fallback handling.
 *
 * The portable package currently uses local images and has no dependency
 * on any deployment domain.
 */
(function () {
  'use strict';

  document.querySelectorAll('img[data-fallback-src]').forEach(img => {
    img.addEventListener('error', () => {
      const fallback = img.dataset.fallbackSrc;
      if (!fallback || img.src === fallback) return;

      img.removeAttribute('data-fallback-src');
      img.src = fallback;
    }, { once: true });
  });
})();
