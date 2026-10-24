<?php
/**
 * Search Results Page
 * Filters services/devices/support options by keyword.
 */
html_start('Search');
render_header();

global $services, $devices, $supportOptions;

$query = trim($_GET['q'] ?? '');
$results = [];

if ($query !== '') {
    $q = mb_strtolower($query);

    // Search services
    foreach ($services as $svc) {
        if (mb_strpos(mb_strtolower($svc['title']), $q) !== false ||
            mb_strpos(mb_strtolower($svc['description']), $q) !== false) {
            $results[] = [
                'type'  => 'Service',
                'title' => $svc['title'],
                'desc'  => $svc['description'],
                'url'   => '/services',
                'icon'  => $svc['icon'] ?? 'wrench',
            ];
        }
    }

    // Search devices
    foreach ($devices as $dev) {
        if (mb_strpos(mb_strtolower($dev['name']), $q) !== false ||
            mb_strpos(mb_strtolower($dev['description'] ?? ''), $q) !== false) {
            $results[] = [
                'type'  => 'Device',
                'title' => $dev['name'],
                'desc'  => $dev['description'] ?? '',
                'url'   => '/devices/' . $dev['slug'],
                'icon'  => $dev['icon'] ?? 'monitor',
            ];
        }
    }

    // Search support options
    foreach ($supportOptions as $opt) {
        if (mb_strpos(mb_strtolower($opt['title']), $q) !== false ||
            mb_strpos(mb_strtolower($opt['description']), $q) !== false) {
            $results[] = [
                'type'  => 'Support',
                'title' => $opt['title'],
                'desc'  => $opt['description'],
                'url'   => $opt['href'] ?? '/support',
                'icon'  => $opt['icon'] ?? 'headphones',
            ];
        }
    }
}
?>

<main class="bg-gray-50 min-h-[60vh]">
  <!-- Hero -->
  <section class="bg-gradient-to-br from-blue-600 to-blue-800 text-white py-12">
    <div class="container mx-auto px-4 max-w-3xl text-center">
      <h1 class="text-3xl font-bold mb-6">Search Results</h1>
      <form action="/search" method="GET" class="flex gap-2 max-w-xl mx-auto">
        <input type="text" name="q" value="<?= e($query) ?>"
               placeholder="Search for services, devices, support…"
               class="flex-1 px-4 py-3 rounded-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300">
        <button type="submit"
                class="bg-white text-blue-600 font-semibold px-6 py-3 rounded-lg hover:bg-blue-50 transition">
          Search
        </button>
      </form>
    </div>
  </section>

  <!-- Results -->
  <section class="container mx-auto px-4 py-12 max-w-4xl">
    <?php if ($query === ''): ?>
      <p class="text-center text-gray-500 text-lg">Enter a search term above to get started.</p>

    <?php elseif (empty($results)): ?>
      <div class="text-center py-12">
        <div class="text-gray-300 mb-4"><?= icon('search', 'size-16 mx-auto') ?></div>
        <h2 class="text-xl font-semibold text-gray-700 mb-2">No results found</h2>
        <p class="text-gray-500 mb-6">
          We couldn't find anything matching "<strong><?= e($query) ?></strong>".
        </p>
        <a href="/support" class="inline-flex items-center gap-2 bg-blue-600 text-white px-5 py-2.5 rounded-lg hover:bg-blue-700 transition">
          <?= icon('headphones', 'size-4') ?> Browse Support Options
        </a>
      </div>

    <?php else: ?>
      <p class="text-gray-500 mb-6">
        Found <strong><?= count($results) ?></strong> result<?= count($results) !== 1 ? 's' : '' ?> for "<strong><?= e($query) ?></strong>"
      </p>

      <div class="grid gap-4">
        <?php foreach ($results as $r): ?>
          <a href="<?= e($r['url']) ?>"
             class="block bg-white rounded-xl border border-gray-200 p-5 hover:shadow-md hover:border-blue-300 transition group">
            <div class="flex items-start gap-4">
              <div class="bg-blue-100 text-blue-600 p-2.5 rounded-lg shrink-0">
                <?= icon($r['icon'], 'size-5') ?>
              </div>
              <div class="flex-1 min-w-0">
                <span class="text-xs font-medium text-blue-600 uppercase tracking-wide"><?= e($r['type']) ?></span>
                <h3 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 transition"><?= e($r['title']) ?></h3>
                <p class="text-gray-500 text-sm mt-1 line-clamp-2"><?= e($r['desc']) ?></p>
              </div>
              <div class="text-gray-300 group-hover:text-blue-600 transition shrink-0 pt-2">
                <?= icon('arrow-right', 'size-5') ?>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </section>
</main>

<?php
render_footer();
html_end();
