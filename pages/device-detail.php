<?php
// Device detail page — handles /devices/[slug]
$slug = $_GET['device'] ?? 'computers';
global $devices;

// Find device info
$deviceInfo = null;
foreach ($devices as $d) {
    if ($d[0] === $slug) {
        $deviceInfo = $d;
        break;
    }
}

if (!$deviceInfo) {
    require __DIR__ . '/404.php';
    return;
}

[$deviceSlug, $title, $subtitle, $iconName] = $deviceInfo;

html_start(e($title) . ' Support | Geek Online');
render_header();
?>
<div class="min-h-screen bg-white text-slate-900">
  <main>
    <!-- Hero -->
    <section class="bg-[#0754c7] px-5 py-16 text-white lg:px-8">
      <div class="mx-auto max-w-7xl">
        <a href="/devices" class="mb-4 inline-flex items-center gap-1.5 text-xs font-bold text-blue-200 hover:text-white">
          ← Back to All Devices
        </a>
        <div class="mt-4 flex items-center gap-4">
          <div class="grid size-16 place-items-center rounded-2xl bg-white/10 text-white">
            <?= icon($iconName, 'size-8') ?>
          </div>
          <div>
            <div class="mb-1 text-xs font-bold uppercase tracking-wider text-blue-200"><?= e($subtitle) ?></div>
            <h1 class="text-3xl font-extrabold sm:text-5xl"><?= e($title) ?> Support</h1>
          </div>
        </div>
        <p class="mt-6 max-w-2xl text-sm leading-relaxed text-blue-100 sm:text-base">
          Certified technicians provide comprehensive diagnostics, setup, and repair for all <?= e($title) ?> brands, regardless of where you purchased them.
        </p>
        <div class="mt-8 flex flex-wrap gap-3">
          <button onclick="if(window.jivo_api)window.jivo_api.open();"
            class="inline-flex items-center gap-2 rounded-xl bg-yellow-300 px-6 py-3 text-sm font-bold text-blue-950 transition-opacity hover:opacity-90">
            💬 Chat with a Technician
          </button>
          <a href="/schedule-repair"
            class="inline-flex items-center gap-2 rounded-xl border border-white/30 bg-white/10 px-6 py-3 text-sm font-semibold text-white transition-colors hover:bg-white/20">
            <?= icon('calendar', 'size-4') ?> Schedule a Repair
          </a>
        </div>
      </div>
    </section>

    <!-- Services Available -->
    <section class="bg-white px-5 py-16 lg:px-8">
      <div class="mx-auto max-w-7xl">
        <h2 class="text-2xl font-extrabold text-slate-950 sm:text-3xl">Available Support Services</h2>
        <p class="mt-2 text-sm text-slate-600">Select any service below to get started with a certified technician.</p>

        <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
          <?php foreach ([
            ['Diagnostics & Setup',    'Complete hardware and software diagnostics, setup, and configuration.',     'wrench'],
            ['Virus & Security',       'Remove malware, secure your device, and install the latest protections.',   'shield-check'],
            ['Data Backup & Recovery', 'Back up important files and recover lost data from damaged devices.',       'hard-drive'],
            ['Software Support',       'Install, update, and configure software, email, and cloud applications.',   'monitor'],
            ['Network & Connectivity', 'Fix connectivity problems and optimize your device for best performance.',  'wifi'],
            ['Remote Support',         'Connect with a certified agent instantly via secure 256-bit session.',      'lock'],
          ] as [$sTitle, $sDesc, $sIcon]): ?>
            <a href="/support"
              class="group flex flex-col justify-between rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:border-[#0754c7] hover:shadow-md">
              <div>
                <div class="grid size-11 place-items-center rounded-xl bg-blue-50 text-[#0754c7] group-hover:bg-[#0754c7] group-hover:text-white">
                  <?= icon($sIcon, 'size-5') ?>
                </div>
                <h3 class="mt-4 text-base font-bold text-slate-900 group-hover:text-[#0754c7]"><?= e($sTitle) ?></h3>
                <p class="mt-2 text-sm text-slate-600"><?= e($sDesc) ?></p>
              </div>
              <span class="mt-4 inline-flex items-center gap-1 text-xs font-bold text-[#0754c7]">
                Get Support <?= icon('arrow-right', 'size-3') ?>
              </span>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- CTA strip -->
    <section class="bg-slate-50 px-5 py-12 lg:px-8 border-t border-slate-200">
      <div class="mx-auto max-w-7xl flex flex-col items-center justify-between gap-6 rounded-2xl bg-[#062b7b] p-8 text-white md:flex-row">
        <div>
          <h2 class="text-2xl font-extrabold">Ready to get <?= e($title) ?> support?</h2>
          <p class="mt-2 text-sm text-blue-100">Certified agents are available 24/7 — connect instantly or schedule a time.</p>
        </div>
        <div class="flex flex-wrap gap-3 shrink-0">
          <button onclick="if(window.jivo_api)window.jivo_api.open();"
            class="inline-flex items-center gap-2 rounded-xl bg-yellow-300 px-6 py-3 text-sm font-bold text-blue-950">
            Start Live Chat
          </button>
          <a href="/schedule-repair"
            class="inline-flex items-center gap-2 rounded-xl border border-white/30 bg-white/10 px-6 py-3 text-sm font-semibold text-white hover:bg-white/20">
            Schedule Repair
          </a>
        </div>
      </div>
    </section>
  </main>
</div>

<?php
render_footer();
html_end();
