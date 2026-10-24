<?php
// Home page — mirrors app/(main)/home/page.tsx
html_start('Geek Online | Official Support', '24/7 expert technical support from certified technicians.');
render_header();
global $devices, $faqs, $services, $supportOptions, $brandInitials, $siteConfig;
?>
<div class="min-h-screen bg-white">
  <main>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-[#073b99] via-[#0754c7] to-[#00338d] px-6 pb-0 pt-6 text-white lg:pt-8">
      <div class="mx-auto grid max-w-7xl items-center lg:items-start gap-6 lg:grid-cols-12 lg:gap-8">
        <div class="py-4 lg:mt-18 text-center lg:col-span-7 lg:py-8 lg:text-left">
          <div class="mb-3 inline-flex items-center gap-2 rounded-full bg-yellow-300 px-3 py-1 text-xs lg:text-sm font-bold tracking-wide uppercase text-black">
            <?= icon('shield-half', 'size-4') ?> Official Geek Support Center
          </div>
          <h1 class="text-3xl font-extrabold leading-tight lg:text-5xl">How can we help you today?</h1>
          <p class="mx-auto mt-3 max-w-xl text-sm leading-relaxed text-blue-100 sm:text-lg lg:mx-0 lg:mt-4">
            Get expert diagnostics, repair appointments, remote assistance, and order support from certified support technicians.
          </p>
        </div>
        <div class="flex items-end justify-center lg:justify-end lg:col-span-5">
          <img src="/images/reference-support-agent.png" alt="Support Agent"
            class="block h-auto max-h-[260px] w-auto object-contain object-bottom sm:max-h-[300px] md:max-h-[340px] lg:max-h-[400px]">
        </div>
      </div>
    </section>

    <!-- Device Grid Section -->
    <section class="max-w-8xl px-6 py-16">
      <div class="mx-auto mb-12 max-w-7xl text-center">
        <h2 class="text-2xl font-bold tracking-tight text-gray-800 sm:text-3xl">Choose Your Device for Expert Support</h2>
        <p class="mt-2 mb-6 text-sm text-gray-500 sm:text-base">
          Certified technicians repair, configure, and protect all major brands regardless of where you bought them.
        </p>
        <div class="grid grid-cols-2 gap-5 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
          <?php foreach ($devices as [$slug, $title, $subtitle, $iconName]): ?>
            <a href="/devices/<?= e($slug) ?>"
              class="group flex min-h-[160px] flex-col justify-between rounded-xl border border-gray-200 bg-white p-5 text-center transition-all hover:border-[#0754c7] hover:bg-[#0754c7]">
              <div>
                <div class="mx-auto mb-3 flex size-12 items-center justify-center rounded-lg bg-blue-50 text-[#0754c7] transition-colors group-hover:bg-white">
                  <?= icon($iconName, 'size-6') ?>
                </div>
                <h4 class="text-sm font-semibold text-gray-900 group-hover:text-white"><?= e($title) ?></h4>
              </div>
              <p class="mt-2 text-xs text-gray-500 group-hover:text-blue-100"><?= e($subtitle) ?></p>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Quick Support Options -->
    <section class="mx-auto max-w-7xl px-4 py-8">
      <div class="rounded-2xl border border-gray-200 bg-gray-50 p-6 md:p-8">
        <div class="mb-6 text-center md:text-left">
          <h2 class="text-xl font-bold text-slate-950 sm:text-2xl">Quick Support Options</h2>
          <p class="mt-1 text-xs text-gray-600 sm:text-sm">Get immediate service booking, remote technician access, or track existing repairs.</p>
        </div>
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
          <?php
          $ctaLabels = ['Book Appointment', 'Start Online Session', 'Chat with Agent', 'Get Help Now'];
          foreach ($supportOptions as $i => [$title, $description, $href, $iconName]):
            $isYellow = ($i === 1 || $i === 2);
          ?>
            <a href="<?= e($href) ?>"
              class="group flex flex-col justify-between rounded-xl border border-gray-200 bg-white p-5 shadow-sm transition-all hover:border-[#0754c7] hover:shadow-xl">
              <div>
                <div class="mb-3 flex size-12 items-center justify-center rounded-lg <?= $isYellow ? 'bg-yellow-50 text-[#b58100] group-hover:bg-yellow-300 group-hover:text-black' : 'bg-blue-50 text-[#0754c7] group-hover:bg-[#0754c7] group-hover:text-white' ?>">
                  <?= icon($iconName, 'size-6') ?>
                </div>
                <h3 class="text-base font-bold text-gray-900 group-hover:text-[#0754c7]"><?= e($title) ?></h3>
                <p class="mt-1 text-xs text-gray-600"><?= e($description) ?></p>
              </div>
              <span class="mt-4 flex items-center gap-1 text-xs font-bold text-[#0754c7]">
                <?= e($ctaLabels[$i]) ?> <?= icon('arrow-right', 'size-3') ?>
              </span>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Membership Banner -->
    <section class="border-y border-gray-200 bg-gray-100 px-4 py-12">
      <div class="mx-auto grid max-w-7xl items-center overflow-hidden rounded-2xl bg-[#062b7b] text-white shadow-xl lg:grid-cols-12">
        <div class="p-8 md:p-12 lg:col-span-8">
          <div class="mb-4 inline-flex items-center gap-2 rounded bg-yellow-300 px-3 py-1 text-xs font-extrabold text-black">
            ★ UNLIMITED TECH SUPPORT
          </div>
          <h2 class="mb-3 text-2xl font-extrabold sm:text-4xl">Total Tech Support Membership</h2>
          <p class="mb-6 text-sm leading-relaxed text-blue-100 sm:text-base">
            Get 24/7/365 tech support on all tech and appliances in your home, no matter where you bought them. Includes product protection on eligible devices.
          </p>
          <div class="mb-6 grid gap-3 text-sm sm:grid-cols-2">
            <?php foreach (['24/7 Priority Tech Support', 'Device Diagnostics & Tune-up Included', '20% Off Hardware Repairs & In-Home Services', 'Extended Technical Warranty Coverage'] as $item): ?>
              <div class="flex items-center gap-2">
                <?= icon('circle-check', 'size-4 shrink-0 text-yellow-300') ?>
                <span><?= e($item) ?></span>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="flex flex-wrap gap-3">
            <a href="/membership" class="rounded bg-yellow-300 px-6 py-3 text-sm font-bold text-black transition-opacity hover:opacity-90">
              Learn More About Membership
            </a>
            <button onclick="if(window.jivo_api)window.jivo_api.open();"
              class="rounded border border-white/30 bg-white/10 px-6 py-3 text-sm font-semibold text-white transition-colors hover:bg-white/20">
              Chat with a Specialist
            </button>
          </div>
        </div>
        <div class="flex flex-col items-center justify-between bg-[#041e54] p-8 text-center lg:col-span-4 lg:h-full lg:justify-center">
          <div class="my-auto py-6">
            <img class="px-8" src="/images/Geek_Support_logo.webp" alt="Geek Support" />
          </div>
          <div class="w-full pt-4">
            <button onclick="if(window.jivo_api)window.jivo_api.open();"
              class="flex w-full items-center justify-center gap-2 rounded bg-yellow-300 px-6 py-3 text-sm font-bold text-black transition-opacity hover:opacity-90">
              <?= icon('message-square', 'size-4') ?> Start Online Chat
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- How It Works -->
    <section class="mx-auto max-w-7xl px-4 py-16">
      <div class="mx-auto mb-12 max-w-3xl text-center">
        <h2 class="text-2xl font-extrabold text-slate-950 sm:text-3xl">How Our Tech Support Works</h2>
        <p class="mt-2 text-sm text-gray-600">Simple 3-step process to get your issues resolved swiftly.</p>
      </div>
      <div class="grid gap-8 md:grid-cols-3">
        <?php foreach ([
          ['1', 'Choose Service Mode',    'Select between 24/7 instant Remote Support, scheduling a service appointment, or in-home technician dispatch.'],
          ['2', 'Diagnostic & Estimate',  'Our certified technicians inspect your hardware and software, providing transparent estimates before starting any repair.'],
          ['3', 'Repair & Quality Check', 'Your device is repaired with genuine parts, tested thoroughly, backed by service warranty, and returned ready to use.'],
        ] as [$num, $title, $text]): ?>
          <div class="rounded-xl border border-gray-200 bg-white p-6 text-center shadow-sm">
            <div class="mx-auto mb-4 flex size-12 items-center justify-center rounded-full bg-[#0754c7] text-lg font-black text-white"><?= e($num) ?></div>
            <h3 class="mb-2 text-base font-bold text-gray-900"><?= e($title) ?></h3>
            <p class="text-xs leading-relaxed text-gray-600"><?= e($text) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <!-- FAQ Section -->
    <section class="border-t border-gray-200 bg-gray-50 px-4 py-16">
      <div class="mx-auto max-w-4xl">
        <div class="mb-10 text-center">
          <h2 class="text-2xl font-extrabold text-slate-950 sm:text-3xl">Frequently Asked Questions</h2>
          <p class="mt-2 text-sm text-gray-600">Quick answers to common questions about our support and repairs.</p>
        </div>
        <div class="space-y-4" id="faq-list">
          <?php foreach ($faqs as $i => [$question, $answer]): ?>
            <div class="rounded-lg border border-gray-200 bg-white p-5 shadow-sm">
              <button type="button" onclick="toggleFaq(<?= $i ?>)"
                aria-expanded="false" id="faq-btn-<?= $i ?>"
                class="flex w-full items-center justify-between gap-4 text-left text-sm font-bold text-slate-950">
                <span><?= e($question) ?></span>
                <span id="faq-chevron-<?= $i ?>" class="transition-transform"><?= icon('chevron-down', 'size-5 text-gray-400') ?></span>
              </button>
              <div id="faq-answer-<?= $i ?>" class="hidden mt-3 text-sm leading-relaxed text-gray-600">
                <?= e($answer) ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

  </main>
</div>

<script>
function toggleFaq(index) {
  var answer = document.getElementById('faq-answer-' + index);
  var chevron = document.getElementById('faq-chevron-' + index);
  var btn = document.getElementById('faq-btn-' + index);
  var isHidden = answer.classList.contains('hidden');
  answer.classList.toggle('hidden');
  chevron.style.transform = isHidden ? 'rotate(180deg)' : '';
  btn.setAttribute('aria-expanded', isHidden ? 'true' : 'false');
}
</script>

<?php
render_footer();
html_end();
