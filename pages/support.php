<?php
// Support page — mirrors app/(main)/support/page.tsx
html_start('Tech Support & Repair Services | Geek Online');
render_header();

$coreServices = [
    ['Remote / In-Store',  'Computer Diagnostics & Tune-up',       'Full hardware diagnostics, operating system reinstallation (Windows & Mac), slow PC optimization, and crashing resolution.',         ['Blue screen & freeze troubleshooting', 'Fast startup speed optimization', 'SSD & RAM upgrade diagnostics'],        'Get Remote Support',     '/remote-support', 'monitor'],
    ['Instant Fix',        'Virus & Malware Removal',               'Complete eradication of Trojans, spyware, annoying pop-up ads, browser hijackers, and malicious background programs.',               ['Deep spyware & ransomware scan', 'Malicious extension & adware cleanup', 'Antivirus & firewall security setup'],    'Start Virus Removal',    '/remote-support', 'shield-alert'],
    ['Apple Authorized',   'Apple & Samsung Repair',                'Certified Apple & Samsung device repair center. Genuine parts, hardware diagnostics, screen and battery fixes.',                     ['iPhone & iPad screen & battery replacement', 'Samsung Galaxy screen repairs', 'iCloud & device data backup transfer'],'Get Device Support',     '/remote-support', 'smartphone'],
    ['Remote / In-Home',   'Wi-Fi, Mesh & Smart Home Setup',        'Whole-home Wi-Fi optimization, mesh router setup (eero, Orbi, Nest), smart cameras, Ring doorbells, and network encryption.',       ['Mesh network router configuration', 'Smart security camera connection', 'Slow Wi-Fi speed & latency troubleshooting'],'Setup Wi-Fi Remotely',  '/remote-support', 'wifi'],
    ['Remote Connect',     'Wireless Printers & Driver Setup',      'Fix offline printer errors, install updated manufacturer drivers (HP, Canon, Epson, Brother), and configure wireless scanning utilities.', ['Printer Wi-Fi network pairing', 'Print queue offline error fix', 'Scan-to-computer setup'],                     'Fix Printer Remotely',   '/remote-support', 'printer'],
    ['Lab & Remote',       'Data Recovery & Cloud Backup',          'Assistance with recovering lost files, configuring automated cloud backup (OneDrive, Google Drive, iCloud), and external hard drive setup.', ['Lost file & document recovery triage', 'Automated daily backup schedule', 'New PC data migration transfer'],    'Start Data Support',     '/remote-support', 'hard-drive'],
    ['In-Home & Remote',   'TV Mounting & Audio Setup',             'Expert consultation for TV mounting (up to 98"+), soundbar audio calibration, streaming app installation, and HDMI routing.',         ['Smart TV streaming apps setup', 'Soundbar & home theater tuning', 'In-home technician dispatch scheduling'],         'Get TV/Audio Support',   '/remote-support', 'tv'],
    ['Appliance Help',     'Major Appliance Repair',                'Diagnostic support and technician scheduling for refrigerators, washing machines, dryers, dishwashers, and ovens across all major brands.', ['Appliance error code diagnosis', 'Factory-authorized parts verification', 'In-home technician appointment booking'], 'Get Appliance Support', '/schedule-repair','wrench'],
    ['24/7 Live',          'Email & Microsoft 365 Support',         'Resolve email password synchronization errors, set up Microsoft 365 Office apps, configure cloud storage, and fix account logins.',   ['Outlook, Apple Mail & Gmail setup', 'Office license & app activation', 'Account login & password recovery'],          'Start Software Support', '/remote-support', 'mail'],
];
?>
<div class="min-h-screen bg-white text-slate-900">
  <main>

    <!-- Hero -->
    <section class="bg-[#0754c7] px-5 py-14 text-white lg:px-8">
      <div class="mx-auto flex max-w-7xl flex-col items-start justify-between gap-6 lg:flex-row lg:items-center">
        <div>
          <div class="mb-4 inline-flex items-center gap-2 rounded bg-yellow-300 px-3 py-1 text-xs font-extrabold text-blue-950">★ CERTIFIED SERVICES</div>
          <h1 class="text-3xl font-extrabold sm:text-5xl">Tech Support &amp; Repair Services</h1>
          <p class="mt-3 max-w-2xl text-sm leading-relaxed text-blue-100 sm:text-base">
            Diagnosis, repairs, and technical setup for computers, phones, TVs, home networks, and appliances with genuine parts and certified technicians.
          </p>
        </div>
        <div class="flex flex-wrap items-center gap-3 shrink-0">
          <a href="/schedule-repair" class="inline-flex items-center gap-2 rounded bg-yellow-300 px-5 py-3 text-sm font-bold text-blue-950 transition-opacity hover:opacity-90">
            <?= icon('calendar', 'size-4') ?> Schedule a Repair
          </a>
          <a href="/remote-support" class="inline-flex items-center gap-2 rounded border border-white/30 bg-white/10 px-5 py-3 text-sm font-semibold text-white transition-colors hover:bg-white/20">
            <?= icon('monitor-up', 'size-4') ?> 24/7 Remote Help
          </a>
        </div>
      </div>
    </section>

    <!-- Core Services Grid -->
    <section class="bg-white px-5 py-16 lg:px-8">
      <div class="mx-auto max-w-7xl">
        <div class="text-center">
          <h2 class="text-3xl font-extrabold text-slate-950 sm:text-4xl">Our Core Support Capabilities</h2>
          <p class="mt-3 text-sm text-slate-600 sm:text-base">Select any technical category below to receive instant assistance or service center diagnostics.</p>
        </div>
        <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
          <?php foreach ($coreServices as [$tag, $title, $desc, $bullets, $ctaText, $ctaHref, $iconName]): ?>
            <div class="flex flex-col justify-between rounded-2xl border border-slate-200 bg-white p-7 shadow-sm transition-all hover:shadow-md">
              <div>
                <div class="flex items-center justify-between">
                  <div class="grid size-11 place-items-center rounded-xl bg-blue-50 text-[#0754c7]"><?= icon($iconName, 'size-5') ?></div>
                  <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700"><?= e($tag) ?></span>
                </div>
                <h3 class="mt-5 text-xl font-bold text-slate-900"><?= e($title) ?></h3>
                <p class="mt-2.5 text-sm leading-relaxed text-slate-600"><?= e($desc) ?></p>
                <div class="mt-5 space-y-2 border-t border-slate-100 pt-5 text-xs text-slate-700 sm:text-sm">
                  <?php foreach ($bullets as $bullet): ?>
                    <div class="flex items-start gap-2.5">
                      <?= icon('check', 'mt-0.5 size-4 shrink-0 text-[#0754c7]') ?>
                      <span><?= e($bullet) ?></span>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
              <div class="mt-8">
                <a href="<?= e($ctaHref) ?>"
                  class="flex w-full items-center justify-center gap-2 rounded-xl bg-[#062b7b] px-5 py-3 text-sm font-bold text-white transition-colors hover:bg-blue-900">
                  <?= e($ctaText) ?> <?= icon('arrow-right', 'size-4') ?>
                </a>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- Action Strip -->
    <section class="bg-slate-50 px-5 py-16 lg:px-8 border-t border-gray-200">
      <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-12">
        <!-- Live Agent -->
        <div class="flex flex-col justify-between rounded-2xl bg-[#062b7b] p-8 text-white lg:col-span-7">
          <div>
            <span class="mb-3 inline-block rounded bg-yellow-300 px-3 py-1 text-xs font-extrabold uppercase text-blue-950">INSTANT ONLINE FIX</span>
            <h3 class="text-2xl font-extrabold sm:text-3xl">Connect with a Live Agent Online</h3>
            <p class="mt-3 text-sm leading-relaxed text-blue-100 sm:text-base">
              Resolve computer freezes, remove malware, install printer drivers, and configure software directly from your home.
            </p>
          </div>
          <div class="mt-8 flex flex-wrap gap-3">
            <a href="/remote-support" class="inline-flex items-center gap-2 rounded bg-yellow-300 px-6 py-3 text-sm font-bold text-blue-950 transition-opacity hover:opacity-90">Start Remote Session</a>
            <button onclick="if(window.jivo_api)window.jivo_api.open();"
              class="inline-flex items-center gap-2 rounded border border-white/30 bg-white/10 px-6 py-3 text-sm font-semibold text-white transition-colors hover:bg-white/20">
              <?= icon('message-square', 'size-4') ?> Start 24/7 Chat
            </button>
          </div>
        </div>
        <!-- Schedule -->
        <div class="flex flex-col justify-between rounded-2xl border border-slate-200 bg-white p-8 text-slate-900 lg:col-span-5">
          <div>
            <span class="mb-3 inline-block rounded bg-blue-50 px-3 py-1 text-xs font-extrabold uppercase text-[#0754c7]">Service Reservation</span>
            <h3 class="text-2xl font-extrabold text-slate-950 sm:text-3xl">Schedule a Repair Appointment</h3>
            <p class="mt-3 text-sm leading-relaxed text-slate-600 sm:text-base">
              Book an in-person diagnostic at our service center or request certified in-home technicians for TVs and major appliances.
            </p>
          </div>
          <div class="mt-8">
            <a href="/schedule-repair"
              class="inline-flex items-center gap-2 rounded-xl bg-[#062b7b] px-6 py-3.5 text-sm font-bold text-white transition-colors hover:bg-blue-900">
              Book Repair Appointment <?= icon('arrow-right', 'size-4') ?>
            </a>
          </div>
        </div>
      </div>
    </section>

  </main>
</div>

<?php
render_footer();
html_end();
