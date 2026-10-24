<?php
// FAQ page — mirrors app/(main)/faq/page.tsx
html_start('Frequently Asked Questions | Geek Online');
render_header();
global $faqs;
?>
<div class="min-h-screen bg-white text-slate-900">
  <main>
    <!-- Page Hero -->
    <section class="bg-slate-50 px-5 py-20 lg:px-8">
      <div class="mx-auto max-w-4xl text-center">
        <div class="mb-4 text-xs font-bold uppercase tracking-[0.2em] text-blue-600">Questions, answered</div>
        <h1 class="text-4xl font-black tracking-tight text-slate-950 sm:text-6xl">Frequently Asked Questions</h1>
        <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-slate-600">
          Quick answers about support, repairs, appointments, and remote service.
        </p>
      </div>
    </section>

    <section class="px-5 py-20 lg:px-8">
      <div class="mx-auto max-w-3xl divide-y divide-slate-200 rounded-2xl border border-slate-200 bg-white px-6">
        <?php foreach ($faqs as [$q, $a]): ?>
          <details class="py-5">
            <summary class="cursor-pointer font-bold text-slate-950 flex items-center justify-between list-none">
              <?= e($q) ?>
              <span class="ml-4 shrink-0 text-slate-400"><?= icon('chevron-down', 'size-5') ?></span>
            </summary>
            <p class="mt-3 leading-7 text-slate-600"><?= e($a) ?></p>
          </details>
        <?php endforeach; ?>
      </div>
    </section>
  </main>
</div>

<?php
render_footer();
html_end();
