<?php
// Privacy Policy page — mirrors app/(main)/privacy/page.tsx
html_start('Privacy Policy | Geek Online');
render_header();
?>
<div class="min-h-screen bg-white text-slate-900">
  <main>
    <section class="bg-slate-50 px-5 py-20 lg:px-8">
      <div class="mx-auto max-w-4xl text-center">
        <div class="mb-4 text-xs font-bold uppercase tracking-[0.2em] text-blue-600">Your privacy</div>
        <h1 class="text-4xl font-black tracking-tight text-slate-950 sm:text-6xl">Privacy Policy</h1>
        <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-slate-600">
          How support inquiries and service information are handled.
        </p>
      </div>
    </section>

    <article class="mx-auto max-w-3xl px-5 py-20 text-slate-600 lg:px-8">
      <h2 class="text-2xl font-bold text-slate-950">Information you provide</h2>
      <p class="mt-4 leading-8">
        When you request support, we may collect contact details, device information, and the description of your issue so technicians can respond effectively.
      </p>

      <h2 class="mt-12 text-2xl font-bold text-slate-950">How information is used</h2>
      <p class="mt-4 leading-8">
        Information is used to schedule service, provide troubleshooting, communicate updates, and improve support quality. We do not ask for passwords or sensitive financial information during a remote session.
      </p>

      <h2 class="mt-12 text-2xl font-bold text-slate-950">Questions</h2>
      <p class="mt-4 leading-8">
        Contact the support team if you have questions about a request or want to review the information associated with it.
      </p>
    </article>
  </main>
</div>

<?php
render_footer();
html_end();
