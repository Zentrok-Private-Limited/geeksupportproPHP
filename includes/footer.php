<?php
// Footer template — mirrors components/Footer.tsx
function render_footer(): void {
    global $siteConfig, $brandInitials;
    ?>
<!-- Footer CTA Banner -->
<section class="bg-[#062b7b] px-4 py-8 text-white">
  <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-6 md:flex-row">
    <div class="flex items-center gap-4">
      <div class="grid size-12 shrink-0 place-items-center rounded-xl bg-yellow-300 text-blue-950">
        <?= icon('message-square', 'size-6 fill-current') ?>
      </div>
      <div>
        <h3 class="text-xl font-extrabold sm:text-2xl">We're here to help 24/7/365</h3>
        <p class="text-sm text-blue-100">Get expert online tech support from certified technicians.</p>
      </div>
    </div>
    <div class="flex flex-wrap items-center gap-3">
      <button onclick="if(window.jivo_api)window.jivo_api.open();"
        class="inline-flex items-center gap-2 rounded bg-yellow-300 px-5 py-2.5 text-sm font-bold text-black transition-opacity hover:opacity-90">
        <?= icon('message-square', 'size-4 fill-current') ?> Start Live Chat
      </button>
      <a href="/remote-support"
        class="inline-flex items-center gap-2 rounded border border-white/30 bg-white/10 px-5 py-2.5 text-sm font-semibold text-white transition-colors hover:bg-white/20">
        Connect with PIN
      </a>
    </div>
  </div>
</section>

<!-- Main Footer -->
<footer class="border-t border-gray-200 bg-[#f8fafc] px-5 py-16 text-slate-600 lg:px-8">
  <div class="mx-auto max-w-7xl">
    <div class="grid grid-cols-1 gap-10 md:grid-cols-2 lg:grid-cols-12">

      <!-- Support & Services -->
      <div class="lg:col-span-3">
        <h3 class="text-xs font-extrabold tracking-wider text-slate-900 uppercase">SUPPORT &amp; SERVICES</h3>
        <div class="mt-4 flex flex-col gap-2.5 text-sm">
          <a href="/services" class="hover:text-slate-900">Expert Tech Services</a>
          <a href="/remote-support" class="hover:text-slate-900">24/7 Remote Screen Share</a>
          <a href="/schedule-repair" class="hover:text-slate-900">Schedule Remote Session</a>
          <a href="/services" class="hover:text-slate-900">Wireless Printer Setup</a>
        </div>
      </div>

      <!-- Online Channels -->
      <div class="lg:col-span-3">
        <h3 class="text-xs font-extrabold tracking-wider text-slate-900 uppercase">ONLINE CHANNELS</h3>
        <div class="mt-4 flex flex-col gap-2.5 text-sm">
          <a href="/remote-support" class="flex items-center gap-2 hover:text-slate-900">
            <span class="size-2 rounded-full bg-emerald-500"></span> 24/7 Live Agent Chat
          </a>
          <a href="/remote-support" class="hover:text-slate-900">Enter Agent Session Code</a>
          <a href="/contact" class="hover:text-slate-900">Send Technical Inquiry</a>
          <a href="/terms-and-conditions" class="hover:text-slate-900">Terms &amp; Support Policies</a>
          <a href="/privacy-policy" class="hover:text-slate-900">Privacy Policy</a>
        </div>
      </div>

      <!-- Protection & Total Support -->
      <div class="lg:col-span-3">
        <h3 class="text-xs font-extrabold tracking-wider text-slate-900 uppercase">PROTECTION &amp; TOTAL SUPPORT</h3>
        <div class="mt-4 flex flex-col gap-2.5 text-sm">
          <a href="/membership" class="hover:text-slate-900">Total Tech Protection Plan</a>
          <a href="/membership" class="hover:text-slate-900">Unlimited Tech Coverage</a>
          <a href="/services" class="hover:text-slate-900">Apple &amp; Samsung Diagnostics</a>
          <a href="/remote-support" class="hover:text-slate-900">Chat with a Specialist</a>
        </div>
      </div>

      <!-- Certified Support -->
      <div class="lg:col-span-3">
        <div class="flex items-center gap-2">
          <?= icon('shield', 'size-5 text-[#0754c7]') ?>
          <h3 class="text-xs font-extrabold tracking-wider text-slate-900 uppercase">CERTIFIED SUPPORT</h3>
        </div>
        <p class="mt-3 text-xs leading-relaxed text-slate-500">
          Certified technicians providing fast, secure, 256-bit encrypted online troubleshooting across North America.
        </p>
        <button onclick="if(window.jivo_api)window.jivo_api.open();"
          class="mt-3 inline-flex items-center gap-1.5 text-xs font-bold text-[#0754c7] hover:underline">
          Start Online Chat Now <?= icon('arrow-right', 'size-3.5') ?>
        </button>
      </div>
    </div>

    <!-- Bottom Bar -->
    <div class="mt-12 flex flex-col items-center justify-between border-t border-gray-200 pt-8 text-xs text-slate-500 sm:flex-row">
      <p>&copy; <?= date('Y') ?> Geek Online. All rights reserved.</p>
      <div class="mt-4 flex items-center gap-6 sm:mt-0">
        <a href="/terms-and-conditions" class="hover:text-slate-900">Terms &amp; Conditions</a>
        <a href="/privacy-policy" class="hover:text-slate-900">Privacy Policy</a>
        <a href="/contact" class="hover:text-slate-900">Online Support</a>
      </div>
    </div>
  </div>
</footer>
    <?php
}
