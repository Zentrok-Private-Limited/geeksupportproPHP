<?php
// Devices page — mirrors app/(main)/devices/page.tsx
html_start('Choose Your Device | Geek Online');
render_header();
global $devices;
?>
<div class="min-h-screen bg-white text-slate-900">
  <main>
    <!-- Page Hero -->
    <section class="bg-slate-50 px-5 py-20 lg:px-8">
      <div class="mx-auto max-w-4xl text-center">
        <div class="mb-4 text-xs font-bold uppercase tracking-[0.2em] text-blue-600">All devices welcome</div>
        <h1 class="text-4xl font-black tracking-tight text-slate-950 sm:text-6xl">Choose your device</h1>
        <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-slate-600">
          Get setup, troubleshooting, repair, and protection for the technology you use every day.
        </p>
      </div>
    </section>

    <section class="px-5 py-20 lg:px-8">
      <div class="mx-auto grid max-w-6xl grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-5">
        <?php foreach ($devices as [$slug, $title, $desc, $iconName]): ?>
          <a href="/devices/<?= e($slug) ?>"
            class="rounded-2xl border border-slate-200 p-5 hover:border-blue-300 hover:shadow-lg transition-all">
            <div class="text-blue-600"><?= icon($iconName, 'size-7') ?></div>
            <h2 class="mt-4 text-sm font-bold text-slate-950"><?= e($title) ?></h2>
            <p class="mt-1 text-xs text-slate-500"><?= e($desc) ?></p>
          </a>
        <?php endforeach; ?>
      </div>
    </section>
  </main>
</div>

<?php
render_footer();
html_end();
