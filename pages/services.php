<?php
// Services page — mirrors app/(main)/services/page.tsx
html_start('Expert Tech Services | Geek Online');
render_header();
global $services;
?>
<div class="min-h-screen bg-white text-slate-900">
  <main>

    <!-- Page Hero -->
    <section class="bg-slate-50 px-5 py-20 lg:px-8">
      <div class="mx-auto max-w-4xl text-center">
        <div class="mb-4 text-xs font-bold uppercase tracking-[0.2em] text-blue-600">Business IT Services</div>
        <h1 class="text-4xl font-black tracking-tight text-slate-950 sm:text-6xl">Technology support for your business</h1>
        <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-slate-600">
          Browse our complete enterprise service directory and connect with certified IT technicians.
        </p>
      </div>
    </section>

    <section class="px-5 py-20 lg:px-8">
      <div class="mx-auto mb-12 max-w-6xl overflow-hidden rounded-[2rem] border border-slate-200 bg-slate-50 shadow-sm">
        <img src="/images/tech-service.png" alt="Technician providing computer and network support" class="h-72 w-full object-cover" />
      </div>

      <div class="mx-auto max-w-6xl">
        <div class="mb-8">
          <h2 class="text-2xl font-extrabold text-slate-950 sm:text-3xl">All Business IT Solutions</h2>
          <p class="mt-2 text-sm text-slate-600 sm:text-base">Click any service area below to connect directly with our support desk.</p>
        </div>

        <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
          <?php foreach ($services as $service): ?>
            <a href="/support"
              class="group flex flex-col justify-between rounded-2xl border border-slate-200 bg-white p-7 transition-all duration-200 hover:-translate-y-0.5 hover:border-[#0754c7] hover:shadow-xl">
              <div>
                <div class="flex items-center justify-between">
                  <div class="flex size-12 items-center justify-center rounded-xl bg-blue-50 text-[#0754c7] transition-colors group-hover:bg-[#0754c7] group-hover:text-white">
                    <?= icon($service['icon'], 'size-6') ?>
                  </div>
                  <span class="inline-flex items-center gap-1 text-xs font-bold text-slate-400 group-hover:text-[#0754c7]">
                    Connect <?= icon('arrow-right', 'size-3.5') ?>
                  </span>
                </div>
                <h3 class="mt-5 text-lg font-bold text-slate-950 group-hover:text-[#0754c7]"><?= e($service['title']) ?></h3>
                <p class="mt-2 text-sm leading-relaxed text-slate-600"><?= e($service['description']) ?></p>
              </div>
              <div class="mt-6 border-t border-slate-100 pt-4 text-xs font-semibold text-[#0754c7]">
                Get instant support →
              </div>
            </a>
          <?php endforeach; ?>
        </div>
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
