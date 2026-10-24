<?php
// Membership page — mirrors app/(main)/membership/page.tsx
html_start('Total Tech Support Membership | Geek Online');
render_header();

$benefits = [
    '24/7 Priority Tech Support',
    'Device Diagnostics & Tune-up Included',
    '20% Off Hardware Repairs & In-Home Services',
    'Extended Technical Warranty Coverage',
    'Support for all major brands',
    'One plan for the technology in your home',
];
?>
<div class="min-h-screen bg-white text-slate-900">
  <main>
    <!-- Page Hero -->
    <section class="bg-slate-50 px-5 py-20 lg:px-8">
      <div class="mx-auto max-w-4xl text-center">
        <div class="mb-4 text-xs font-bold uppercase tracking-[0.2em] text-blue-600">Unlimited tech support</div>
        <h1 class="text-4xl font-black tracking-tight text-slate-950 sm:text-6xl">Total Tech Support Membership</h1>
        <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-slate-600">
          Get 24/7/365 tech support on all tech and appliances in your home, no matter where you bought them.
        </p>
      </div>
    </section>

    <section class="px-5 py-20 lg:px-8">
      <div class="mx-auto mb-10 max-w-5xl overflow-hidden rounded-[2rem] border border-slate-200">
        <img src="/images/tech-membership.png" alt="Home technology covered by a support membership" class="h-72 w-full object-cover" />
      </div>
      <div class="mx-auto grid max-w-5xl gap-5 sm:grid-cols-2">
        <?php foreach ($benefits as $item): ?>
          <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <span class="text-2xl text-blue-600">✓</span>
            <h3 class="mt-4 font-bold"><?= e($item) ?></h3>
            <p class="mt-2 text-sm leading-6 text-slate-600">Confidence that expert help is always close by.</p>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- CTA -->
    <section class="px-5 py-20 lg:px-8">
      <div class="mx-auto flex max-w-5xl flex-col items-start justify-between gap-6 rounded-[2rem] bg-blue-600 p-8 text-white sm:p-12 md:flex-row md:items-center">
        <div>
          <h2 class="text-3xl font-bold">Need help right now?</h2>
          <p class="mt-3 text-blue-100">Connect with a certified technician online.</p>
        </div>
        <a href="/remote-support" class="inline-flex items-center gap-2 rounded-xl bg-white px-6 py-3.5 text-sm font-bold text-blue-700">
          Start Live Chat <?= icon('arrow-right', 'size-4') ?>
        </a>
      </div>
    </section>
  </main>
</div>

<?php
render_footer();
html_end();
