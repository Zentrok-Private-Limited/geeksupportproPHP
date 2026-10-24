<?php
// Remote Support page — mirrors app/(main)/remote-support/page.tsx
html_start('24/7 Remote Tech Support | Geek Online');
render_header();

$faqData = [
    ['What devices are compatible with Remote Support?', 'We can remotely connect to Windows PCs (Windows 10 & 11), macOS computers (MacBook, iMac, Mac mini), and troubleshoot connected peripherals like wireless printers, routers, and external hard drives.'],
    ['Can the Agent access my computer after the session ends?', 'No. The connection requires your explicit permission and a unique one-time session PIN. Once you close the session, the connection is permanently terminated.'],
    ['How do I get connected to a live agent?', 'Simply click the "Chat Now" button to start an instant live chat with an agent, or call our 24/7 helpline at 1-800-433-5778.'],
];
?>
<div class="min-h-screen bg-white text-slate-900">
  <main>

    <!-- Hero -->
    <section class="bg-white px-5 py-16 lg:px-8">
      <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 lg:grid-cols-2">
        <div class="space-y-6">
          <h1 class="text-4xl font-extrabold tracking-tight text-slate-950 sm:text-5xl">Get help with your tech problems.</h1>
          <p class="max-w-xl text-sm leading-relaxed text-slate-600 sm:text-base">
            Support plans may include protection, troubleshooting and technical assistance. By continuing, you agree to our
            <a href="/terms" class="underline">Terms</a>, <a href="/privacy" class="underline">Privacy</a> and applicable policies.
          </p>
          <h2 class="text-2xl font-extrabold text-slate-950 sm:text-3xl">We Care To Serve Best As We Can</h2>
          <div class="pt-2">
            <button onclick="if(window.jivo_api)window.jivo_api.open();"
              class="inline-flex items-center gap-2 rounded-xl bg-yellow-300 px-8 py-4 text-base font-extrabold text-blue-950 shadow-sm transition-opacity hover:opacity-90">
              Chat Now
            </button>
          </div>
          <!-- 3-step indicator -->
          <div class="pt-6">
            <div class="flex flex-wrap items-center gap-3 text-sm font-bold text-slate-900 sm:gap-6">
              <?php foreach (['Start Chat', 'Schedule Appointment', 'Get Device Repaired'] as $step): ?>
                <div class="flex items-center gap-1.5">
                  <span class="grid size-5 place-items-center rounded-full bg-emerald-500 text-white"><?= icon('check', 'size-3') ?></span>
                  <span><?= e($step) ?></span>
                </div>
                <?php if ($step !== 'Get Device Repaired'): ?><div class="h-[2px] w-6 bg-yellow-400 sm:w-10"></div><?php endif; ?>
              <?php endforeach; ?>
            </div>
            <p class="mt-5 text-xs text-slate-500">
              Our platform is an independent third-party IT service provider for software-related problems. Unless stated otherwise, we are not affiliated with any manufacturer, ISP, email provider or device brand.
            </p>
          </div>
        </div>
        <div class="relative w-full max-w-6xl overflow-hidden rounded-3xl bg-slate-100">
          <img src="/chat-support.png" alt="Support Agent" class="h-full w-full object-cover" />
        </div>
      </div>
    </section>

    <!-- How It Works -->
    <section class="bg-slate-50 px-5 py-20 lg:px-8 border-t border-slate-200">
      <div class="mx-auto max-w-7xl text-center">
        <div class="inline-flex items-center gap-2 rounded-full bg-blue-50 px-3.5 py-1 text-xs font-bold text-[#0754c7]">
          <?= icon('sparkles', 'size-3.5') ?> SEAMLESS 3-STEP PROCESS
        </div>
        <h2 class="mt-4 text-3xl font-extrabold text-slate-950 sm:text-4xl">How Our Remote Support Works</h2>
        <p class="mx-auto mt-3 max-w-2xl text-sm text-slate-600 sm:text-base">
          Start a conversation, choose a convenient time when needed, and continue with the right troubleshooting or service option.
        </p>
        <div class="mt-12 grid gap-6 md:grid-cols-3">
          <?php
          $steps = [
            ['01', 'Start a Conversation', 'Connect with our certified support agents via live chat or phone. Explain what issue your device is experiencing to receive instant guidance.', 'Instant agent triage', '/remote-support', 'message-square', false],
            ['02', 'Secure Connection',    'Use a private 6-digit session code to grant temporary screen-share access. You retain 100% control and can pause or cancel at any second.',        '256-bit encrypted link', '/remote-support', 'key-round', false],
            ['03', 'Resolution & Optimization', 'Our technicians diagnose root causes, remove threats, update software, and verify complete device stability before closing the session.', 'Verified problem resolution ✓', null, 'check', true],
          ];
          foreach ($steps as [$num, $title, $desc, $ctaText, $ctaHref, $iconName, $isGreen]):
          ?>
            <div class="flex flex-col justify-between rounded-3xl border border-slate-200 bg-white p-8 text-left shadow-sm">
              <div>
                <div class="flex items-center justify-between">
                  <span class="grid size-10 place-items-center rounded-xl bg-blue-50 text-base font-extrabold text-[#0754c7]"><?= e($num) ?></span>
                  <?= icon($iconName, 'size-5 ' . ($isGreen ? 'text-emerald-600' : 'text-[#0754c7]')) ?>
                </div>
                <h3 class="mt-6 text-xl font-extrabold text-slate-950"><?= e($title) ?></h3>
                <p class="mt-3 text-sm leading-relaxed text-slate-600"><?= e($desc) ?></p>
              </div>
              <div class="mt-8 border-t border-slate-100 pt-5">
                <?php if ($ctaHref): ?>
                  <a href="<?= e($ctaHref) ?>" class="inline-flex items-center gap-1.5 text-sm font-bold text-[#0754c7] hover:underline">
                    <?= e($ctaText) ?> <?= icon('arrow-right', 'size-4') ?>
                  </a>
                <?php else: ?>
                  <span class="inline-flex items-center gap-1.5 text-sm font-bold text-emerald-600"><?= e($ctaText) ?></span>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Security Section -->
    <section class="bg-white px-5 py-16 lg:px-8">
      <div class="mx-auto max-w-7xl">
        <div class="rounded-3xl bg-[#062b7b] p-8 text-white lg:p-12">
          <div class="grid grid-cols-1 items-center gap-10 lg:grid-cols-12">
            <div class="lg:col-span-8">
              <span class="mb-3 inline-block rounded bg-yellow-300 px-3 py-1 text-xs font-extrabold uppercase text-blue-950">🔒 100% SAFE &amp; SECURE</span>
              <h2 class="text-3xl font-extrabold sm:text-4xl">Your Privacy &amp; Security is Always Protected</h2>
              <p class="mt-4 text-sm leading-relaxed text-blue-100 sm:text-base">
                Our remote connections utilize military-grade 256-bit AES encryption. You always retain visual oversight of everything the agent does on your screen.
              </p>
              <div class="mt-6 grid gap-3 sm:grid-cols-2 text-sm font-medium text-white">
                <?php foreach ([
                  'You can pause or disconnect at any second',
                  'No ongoing access once closed',
                  'Background-checked certified agents',
                  'Full transparency & real-time chat',
                ] as $bullet): ?>
                  <div class="flex items-center gap-2"><?= icon('check', 'size-4 shrink-0 text-yellow-300') ?> <?= e($bullet) ?></div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="lg:col-span-4">
              <div class="rounded-2xl border border-white/20 bg-blue-950/40 p-6 text-center">
                <div class="mx-auto grid size-12 place-items-center rounded-xl bg-yellow-300 text-blue-950"><?= icon('shield-check', 'size-6') ?></div>
                <h3 class="mt-4 text-lg font-extrabold text-white">Service Guarantee</h3>
                <p class="mt-2 text-xs leading-relaxed text-blue-100">If we can't resolve your problem remotely, we will guide you through in-person service options.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section class="bg-slate-50 px-5 py-20 lg:px-8 border-t border-slate-200">
      <div class="mx-auto max-w-4xl text-center">
        <h2 class="text-3xl font-extrabold text-slate-950 sm:text-4xl">Remote Support FAQs</h2>
        <p class="mt-2 text-sm text-slate-600 sm:text-base">Answers to common questions regarding online tech support sessions.</p>
        <div class="mt-10 space-y-4 text-left">
          <?php foreach ($faqData as $i => [$q, $a]): ?>
            <div class="rounded-2xl border border-slate-200 bg-white transition-all">
              <button onclick="toggleRemoteFaq(<?= $i ?>)"
                class="flex w-full items-center justify-between px-6 py-5 text-left text-base font-bold text-slate-900">
                <span><?= e($q) ?></span>
                <span id="rfaq-chevron-<?= $i ?>"><?= icon('chevron-down', 'size-5 text-slate-500 shrink-0') ?></span>
              </button>
              <div id="rfaq-answer-<?= $i ?>" class="<?= $i === 0 ? '' : 'hidden' ?> border-t border-slate-100 px-6 pb-6 pt-4 text-sm leading-relaxed text-slate-600">
                <?= e($a) ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

  </main>
</div>

<script>
function toggleRemoteFaq(index) {
  var answer = document.getElementById('rfaq-answer-' + index);
  var chevron = document.getElementById('rfaq-chevron-' + index);
  var isHidden = answer.classList.contains('hidden');
  answer.classList.toggle('hidden');
  chevron.querySelector('svg').style.transform = isHidden ? 'rotate(180deg)' : '';
}
</script>

<?php
render_footer();
html_end();
