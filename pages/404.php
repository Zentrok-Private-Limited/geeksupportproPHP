<?php
/**
 * 404 — Page Not Found
 */
html_start('Page Not Found');
render_header();
?>

<main class="min-h-[60vh] flex items-center justify-center bg-gray-50">
  <div class="text-center px-4 py-20">
    <h1 class="text-8xl font-extrabold text-blue-600 mb-4">404</h1>
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Page Not Found</h2>
    <p class="text-gray-500 max-w-md mx-auto mb-8">
      Sorry, the page you're looking for doesn't exist or has been moved.
    </p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="/"
         class="inline-flex items-center gap-2 bg-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-700 transition">
        <?= icon('home', 'size-5') ?>
        Back to Home
      </a>
      <a href="/support"
         class="inline-flex items-center gap-2 border border-blue-600 text-blue-600 px-6 py-3 rounded-lg font-medium hover:bg-blue-50 transition">
        <?= icon('headphones', 'size-5') ?>
        Get Support
      </a>
    </div>
  </div>
</main>

<?php
render_footer();
html_end();
