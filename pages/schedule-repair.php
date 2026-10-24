<?php
// Schedule Repair page — mirrors app/(main)/schedule-repair/page.tsx
html_start('Schedule Remote Support Session | Geek Online');
render_header();
global $services;

// Handle form submission
$confirmed = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName  = trim($_POST['fullName'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $phone     = trim($_POST['phone'] ?? '');
    $issue     = trim($_POST['issue'] ?? '');
    $confirmed = ($fullName && $email && $phone && $issue);
}

$selectedService = $_POST['selectedService'] ?? 'Select IT Service Area';
$deviceDetails   = $_POST['deviceDetails']   ?? '';
$sessionType     = $_POST['sessionType']     ?? 'screen-share';
$selectDate      = $_POST['selectDate']      ?? date('d-m-Y');
$timeSlot        = $_POST['timeSlot']        ?? 'Immediate (Next Available Agent - < 5 mins)';
$issue           = $_POST['issue']           ?? '';
$fullName        = $_POST['fullName']        ?? '';
$email           = $_POST['email']           ?? '';
$phone           = $_POST['phone']           ?? '';
?>
<div class="min-h-screen bg-white text-slate-900">
  <main>

    <!-- Hero Banner -->
    <section class="bg-[#0754c7] px-5 py-12 text-white lg:px-8">
      <div class="mx-auto flex max-w-7xl flex-col items-start justify-between gap-6 lg:flex-row lg:items-center">
        <div>
          <div class="mb-3 inline-flex items-center gap-2 rounded bg-yellow-300 px-3 py-1 text-xs font-extrabold uppercase text-blue-950">
            ⚡ 24/7 REMOTE SUPPORT RESERVATION
          </div>
          <h1 class="text-3xl font-extrabold sm:text-5xl">Schedule a Remote Support Session</h1>
          <p class="mt-3 max-w-2xl text-sm leading-relaxed text-blue-100 sm:text-base">
            Book a reserved time slot with a certified technician for fast online diagnostics, virus removal, printer setup, and system tune-up.
          </p>
        </div>
        <div class="flex flex-wrap items-center gap-3 shrink-0">
          <a href="/support" class="inline-flex items-center gap-2 rounded bg-yellow-300 px-5 py-3 text-sm font-bold text-blue-950 transition-opacity hover:opacity-90">
            ⚡ Instant Connect Now
          </a>
          <button onclick="if(window.jivo_api)window.jivo_api.open();"
            class="inline-flex items-center gap-2 rounded border border-white/30 bg-white/10 px-5 py-3 text-sm font-semibold text-white transition-colors hover:bg-white/20">
            💬 24/7 Live Chat
          </button>
        </div>
      </div>
    </section>

    <!-- Main Layout -->
    <section class="bg-white px-5 py-14 lg:px-8">
      <div class="mx-auto grid max-w-7xl grid-cols-1 gap-8 lg:grid-cols-12">

        <!-- Form Column -->
        <div class="rounded-3xl border border-slate-200 bg-white p-7 shadow-sm sm:p-10 lg:col-span-7">
          <h2 class="text-2xl font-extrabold text-slate-950 sm:text-3xl">Reserve Remote Technician</h2>
          <p class="mt-1 text-sm text-slate-600">Enter your device information and convenient time to receive dedicated online support.</p>

          <?php if ($confirmed): ?>
            <div class="mt-8 rounded-2xl border border-emerald-200 bg-emerald-50 p-6 text-center text-emerald-900">
              <?= icon('check-circle', 'mx-auto size-10 text-emerald-600') ?>
              <h3 class="mt-3 text-lg font-bold">Reservation Confirmed!</h3>
              <p class="mt-1 text-sm text-emerald-700">
                Thank you, <?= e($fullName) ?>. A certified technician will reach out to <?= e($email) ?> shortly.
              </p>
              <a href="/schedule-repair" class="mt-5 inline-block rounded-xl bg-emerald-600 px-5 py-2.5 text-sm font-bold text-white hover:bg-emerald-500">
                Schedule Another
              </a>
            </div>
          <?php else: ?>
          <form method="post" action="/schedule-repair" class="mt-8 space-y-8">

            <!-- Step 1: Device & Brand -->
            <div>
              <div class="flex items-center gap-2.5">
                <span class="grid size-6 place-items-center rounded-full bg-[#0754c7] text-xs font-bold text-white">1</span>
                <h3 class="text-base font-extrabold text-slate-950">Device &amp; Brand</h3>
              </div>
              <div class="mt-4 grid gap-5 sm:grid-cols-2">
                <label class="text-sm font-bold text-slate-900">
                  Device Category *
                  <div class="relative mt-2">
                    <select name="selectedService"
                      class="w-full appearance-none rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm font-normal text-slate-800 focus:border-[#0754c7] focus:outline-none">
                      <option value="Select IT Service Area">Select IT Service Area</option>
                      <?php foreach ($services as $s): ?>
                        <option value="<?= e($s['title']) ?>" <?= $selectedService === $s['title'] ? 'selected' : '' ?>>
                          <?= e($s['title']) ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                    <?= icon('chevron-down', 'pointer-events-none absolute right-3.5 top-1/2 size-4 -translate-y-1/2 text-slate-500') ?>
                  </div>
                </label>
                <label class="text-sm font-bold text-slate-900">
                  Brand / Manufacturer *
                  <input type="text" name="deviceDetails" value="<?= e($deviceDetails) ?>"
                    placeholder="e.g. Apple, Dell, HP, Lenovo, ASUS, Acer, Canon"
                    class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3.5 text-sm font-normal text-slate-800 placeholder:text-slate-400 focus:border-[#0754c7] focus:outline-none" />
                </label>
              </div>
            </div>

            <!-- Step 2: Session Type -->
            <div class="border-t border-slate-100 pt-7">
              <div class="flex items-center gap-2.5">
                <span class="grid size-6 place-items-center rounded-full bg-[#0754c7] text-xs font-bold text-white">2</span>
                <h3 class="text-base font-extrabold text-slate-950">SUPPORT SESSION TYPE</h3>
              </div>
              <div class="mt-4 grid gap-4 sm:grid-cols-2">
                <?php foreach ([
                  ['screen-share', 'laptop',  '24/7 Remote Screen Share', 'Agent fixes issue directly via secure PIN'],
                  ['phone',        'phone',   'Phone & Guided Setup',     'Agent calls you for guided walkthrough'],
                ] as [$val, $ico, $label, $sublabel]): ?>
                  <label class="cursor-pointer rounded-2xl border p-4 transition-all <?= $sessionType === $val ? 'border-[#0754c7] bg-blue-50/40 ring-1 ring-[#0754c7]' : 'border-slate-200 bg-white hover:border-slate-300' ?>">
                    <div class="flex items-start justify-between">
                      <div class="grid size-9 place-items-center rounded-xl bg-blue-100 text-[#0754c7]"><?= icon($ico, 'size-5') ?></div>
                      <input type="radio" name="sessionType" value="<?= e($val) ?>" <?= $sessionType === $val ? 'checked' : '' ?> class="size-4 accent-[#0754c7]" />
                    </div>
                    <div class="mt-3">
                      <div class="text-sm font-bold text-slate-900"><?= e($label) ?></div>
                      <div class="mt-1 text-xs text-slate-600"><?= e($sublabel) ?></div>
                    </div>
                  </label>
                <?php endforeach; ?>
              </div>
            </div>

            <!-- Step 3: Preferred Time -->
            <div class="border-t border-slate-100 pt-7">
              <div class="flex items-center gap-2.5">
                <span class="grid size-6 place-items-center rounded-full bg-[#0754c7] text-xs font-bold text-white">3</span>
                <h3 class="text-base font-extrabold text-slate-950">PREFERRED TIME WINDOW</h3>
              </div>
              <div class="mt-4 grid gap-5 sm:grid-cols-2">
                <label class="text-sm font-bold text-slate-900">
                  Select Date *
                  <div class="relative mt-2">
                    <input type="date" name="selectDate" value="<?= e($selectDate) ?>"
                      class="w-full rounded-xl border border-slate-200 px-4 py-3.5 pr-10 text-sm font-normal text-slate-800 focus:border-[#0754c7] focus:outline-none" />
                    <?= icon('calendar', 'pointer-events-none absolute right-3.5 top-1/2 size-4 -translate-y-1/2 text-slate-500') ?>
                  </div>
                </label>
                <label class="text-sm font-bold text-slate-900">
                  Time Slot *
                  <div class="relative mt-2">
                    <select name="timeSlot" class="w-full appearance-none rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm font-normal text-slate-800 focus:border-[#0754c7] focus:outline-none">
                      <?php foreach ([
                        'Immediate (Next Available Agent - < 5 mins)',
                        'Morning (09:00 AM - 11:00 AM)',
                        'Mid-Day (11:00 AM - 01:00 PM)',
                        'Afternoon (01:00 PM - 03:00 PM)',
                        'Late Afternoon (03:00 PM - 05:00 PM)',
                        'Evening (05:00 PM - 08:00 PM)',
                      ] as $slot): ?>
                        <option value="<?= e($slot) ?>" <?= $timeSlot === $slot ? 'selected' : '' ?>><?= e($slot) ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= icon('chevron-down', 'pointer-events-none absolute right-3.5 top-1/2 size-4 -translate-y-1/2 text-slate-500') ?>
                  </div>
                </label>
              </div>
            </div>

            <!-- Step 4: Issue & Contact -->
            <div class="border-t border-slate-100 pt-7">
              <div class="flex items-center gap-2.5">
                <span class="grid size-6 place-items-center rounded-full bg-[#0754c7] text-xs font-bold text-white">4</span>
                <h3 class="text-base font-extrabold text-slate-950">ISSUE DESCRIPTION &amp; CONTACT</h3>
              </div>
              <div class="mt-4 space-y-5">
                <label class="block text-sm font-bold text-slate-900">
                  What issue are you facing? *
                  <textarea required rows="4" name="issue"
                    placeholder="Describe the technical issue (e.g. slow PC, virus detected, printer offline, Wi-Fi dropping)..."
                    class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3 text-sm font-normal text-slate-800 placeholder:text-slate-400 focus:border-[#0754c7] focus:outline-none"><?= e($issue) ?></textarea>
                </label>
                <div class="grid gap-5 sm:grid-cols-3">
                  <?php foreach ([
                    ['fullName', 'text', 'Full Name *',      'John Smith',        $fullName],
                    ['email',    'email','Email Address *',   'john@example.com',  $email],
                    ['phone',    'tel',  'Phone Number *',    '9876543210',        $phone],
                  ] as [$name, $type, $label, $placeholder, $value]): ?>
                    <label class="text-sm font-bold text-slate-900">
                      <?= e($label) ?>
                      <input required type="<?= e($type) ?>" name="<?= e($name) ?>" value="<?= e($value) ?>" placeholder="<?= e($placeholder) ?>"
                        class="mt-2 w-full rounded-xl border border-slate-200 px-4 py-3.5 text-sm font-normal text-slate-800 placeholder:text-slate-400 focus:border-[#0754c7] focus:outline-none" />
                    </label>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>

            <!-- Submit -->
            <div class="flex flex-col items-start justify-between gap-4 border-t border-slate-100 pt-6 sm:flex-row sm:items-center">
              <div class="flex items-center gap-2 text-xs font-medium text-slate-600">
                <?= icon('lock', 'size-4 text-slate-500') ?>
                <span>100% Secure 256-Bit Encrypted Session.</span>
              </div>
              <button type="submit"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-yellow-300 px-8 py-4 text-sm font-extrabold text-blue-950 transition-opacity hover:opacity-90 sm:w-auto">
                Confirm Remote Reservation <?= icon('arrow-right', 'size-4') ?>
              </button>
            </div>
          </form>
          <?php endif; ?>
        </div>

        <!-- Right Sidebar -->
        <div class="space-y-6 lg:col-span-5">
          <!-- Checklist -->
          <div class="rounded-3xl border border-slate-200 bg-white p-7 shadow-sm">
            <div class="flex items-center gap-2.5">
              <?= icon('list-ordered', 'size-5 text-[#0754c7]') ?>
              <h3 class="text-lg font-extrabold text-slate-950">REMOTE SESSION CHECKLIST</h3>
            </div>
            <div class="mt-5 space-y-4 text-sm text-slate-700">
              <?php foreach ([
                ['Working Internet:', 'Make sure your device has active Wi-Fi or Ethernet.'],
                ['Device Powered On:', 'Keep your laptop/workstation connected to charger.'],
                ['Administrator Access:', 'Be ready to grant temporary screen share permission.'],
              ] as [$bold, $text]): ?>
                <div class="flex items-start gap-3">
                  <?= icon('check', 'mt-0.5 size-4 shrink-0 text-[#0754c7]') ?>
                  <div><span class="font-bold text-slate-950"><?= e($bold) ?></span> <?= e($text) ?></div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
          <!-- Security -->
          <div class="rounded-3xl border border-slate-200 bg-white p-7 shadow-sm">
            <div class="flex items-center gap-2.5">
              <?= icon('shield-check', 'size-5 text-[#0754c7]') ?>
              <h3 class="text-lg font-extrabold text-slate-950">SECURITY GUARANTEE</h3>
            </div>
            <p class="mt-3 text-sm leading-relaxed text-slate-600">
              Our certified agents connect via encrypted temporary session PIN. You can pause or terminate the connection at any second with a single click.
            </p>
          </div>
          <!-- Immediate Help CTA -->
          <div class="rounded-3xl bg-[#062b7b] p-7 text-center text-white shadow-sm">
            <div class="mx-auto grid size-12 place-items-center rounded-2xl bg-blue-900/60 text-yellow-300">
              <?= icon('message-square', 'size-6') ?>
            </div>
            <h3 class="mt-4 text-xl font-extrabold">NEED IMMEDIATE HELP?</h3>
            <p class="mt-2 text-sm text-blue-100">Chat directly with a certified Support Agent right now.</p>
            <div class="mt-6">
              <button onclick="if(window.jivo_api)window.jivo_api.open();"
                class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-yellow-300 px-6 py-3.5 text-sm font-extrabold text-blue-950 transition-opacity hover:opacity-90">
                Start Live Chat
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
</div>

<?php
render_footer();
html_end();
