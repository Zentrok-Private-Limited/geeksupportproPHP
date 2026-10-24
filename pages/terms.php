<?php
// Terms & Conditions page — mirrors app/(main)/terms/page.tsx
html_start('Terms & Conditions | Geek Online');
render_header();
?>
<div class="min-h-screen bg-white text-slate-900">
  <main>
    <section class="bg-slate-50 px-5 py-20 lg:px-8">
      <div class="mx-auto max-w-4xl text-center">
        <div class="mb-4 text-xs font-bold uppercase tracking-[0.2em] text-blue-600">Support policies</div>
        <h1 class="text-4xl font-black tracking-tight text-slate-950 sm:text-6xl">Terms &amp; Conditions</h1>
        <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-slate-600">
          The guidelines that help us provide secure, transparent technical support.
        </p>
      </div>
    </section>

    <article class="mx-auto max-w-3xl px-5 py-20 text-slate-600 lg:px-8">
      <h2 class="text-2xl font-bold text-slate-950">Using support services</h2>
      <p class="mt-4 leading-8">
        By using our support services, you agree to provide accurate information, maintain access to your devices when requested, and follow technician instructions during remote sessions.
      </p>

      <h2 class="mt-12 text-2xl font-bold text-slate-950">Remote sessions</h2>
      <p class="mt-4 leading-8">
        Remote support uses a secure session PIN. Never share your PIN publicly or with someone you do not trust. You may end a session at any time.
      </p>

      <h2 class="mt-12 text-2xl font-bold text-slate-950">Service expectations</h2>
      <p class="mt-4 leading-8">
        Technicians explain available options before work begins. Appointment times and service availability may vary by location and device.
      </p>
    </article>
  </main>
</div>

<?php
render_footer();
html_end();
