<?php
// Contact page — mirrors app/(main)/contact/page.tsx
html_start('Contact Support Helpdesk | Geek Online');
render_header();

$submitted = false;
$fullName = $email = $phone = $message = '';
$topic = 'Computer & Laptop Diagnostics';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = trim($_POST['fullName'] ?? '');
    $email    = trim($_POST['email']    ?? '');
    $phone    = trim($_POST['phone']    ?? '');
    $topic    = trim($_POST['topic']    ?? $topic);
    $message  = trim($_POST['message']  ?? '');
    if ($fullName && $email && $phone && $message) {
        $submitted = true;
    }
}
?>
<div class="min-h-screen bg-white text-slate-900">
  <main>

    <!-- Hero -->
    <section class="bg-[#0754c7] px-5 py-16 text-center text-white lg:px-8">
      <div class="mx-auto max-w-4xl space-y-3">
        <div class="inline-flex items-center gap-1.5 rounded-full bg-yellow-300 px-3.5 py-1 text-xs font-extrabold uppercase text-blue-950">
          🎧 SUPPORT HELPDESK
        </div>
        <h1 class="text-3xl font-extrabold tracking-tight sm:text-5xl">Contact Support Helpdesk</h1>
        <p class="mx-auto max-w-xl text-sm leading-relaxed text-blue-100 sm:text-base">
          Choose the fastest online channel to get immediate technical troubleshooting and support.
        </p>
      </div>
    </section>

    <!-- 3 Channel Cards -->
    <section class="bg-slate-50 px-5 py-16 lg:px-8">
      <div class="mx-auto max-w-7xl">
        <div class="grid gap-6 md:grid-cols-3">

          <!-- Card 1: Live Chat -->
          <div class="relative flex flex-col justify-between rounded-3xl border-2 border-[#0754c7] bg-white p-8 shadow-sm">
            <span class="absolute -top-3.5 right-6 rounded-full bg-yellow-300 px-3 py-0.5 text-[11px] font-extrabold uppercase text-blue-950 shadow-sm">FASTEST</span>
            <div>
              <div class="grid size-12 place-items-center rounded-2xl bg-blue-50 text-[#0754c7]"><?= icon('message-square', 'size-6') ?></div>
              <h3 class="mt-6 text-xl font-extrabold text-slate-950">24/7 Live Agent Chat</h3>
              <p class="mt-3 text-sm leading-relaxed text-slate-600">Chat in real-time with certified technicians for instant diagnostics, software fixes, and questions.</p>
              <div class="mt-5 flex items-center gap-2 text-xs font-bold text-emerald-600">
                <span class="size-2 rounded-full bg-emerald-500 animate-pulse"></span>
                Technicians Online Now
              </div>
            </div>
            <div class="mt-8">
              <button onclick="if(window.jivo_api)window.jivo_api.open();"
                class="flex w-full items-center justify-center gap-2 rounded-xl bg-[#0754c7] px-5 py-3.5 text-sm font-extrabold text-white transition-opacity hover:opacity-90">
                <?= icon('message-square', 'size-4') ?> Start Live Chat
              </button>
            </div>
          </div>

          <!-- Card 2: Remote Screen Share -->
          <div class="flex flex-col justify-between rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
            <div>
              <div class="grid size-12 place-items-center rounded-2xl bg-blue-50 text-[#0754c7]"><?= icon('monitor', 'size-6') ?></div>
              <h3 class="mt-6 text-xl font-extrabold text-slate-950">Remote Screen Share</h3>
              <p class="mt-3 text-sm leading-relaxed text-slate-600">Have an agent session code? Enter your 6-digit PIN to start a secure 256-bit remote screen sharing fix.</p>
              <div class="mt-5 flex items-center gap-1.5 text-xs font-bold text-[#0754c7]">
                <?= icon('shield-check', 'size-4') ?> 100% Encrypted &amp; Safe
              </div>
            </div>
            <div class="mt-8">
              <a href="/remote-support"
                class="flex w-full items-center justify-center gap-2 rounded-xl bg-yellow-300 px-5 py-3.5 text-sm font-extrabold text-blue-950 transition-opacity hover:opacity-90">
                <?= icon('key-round', 'size-4') ?> Enter Session PIN
              </a>
            </div>
          </div>

          <!-- Card 3: Schedule -->
          <div class="flex flex-col justify-between rounded-3xl border border-slate-200 bg-white p-8 shadow-sm">
            <div>
              <div class="grid size-12 place-items-center rounded-2xl bg-blue-50 text-[#0754c7]"><?= icon('calendar', 'size-6') ?></div>
              <h3 class="mt-6 text-xl font-extrabold text-slate-950">Schedule a Time Slot</h3>
              <p class="mt-3 text-sm leading-relaxed text-slate-600">Book a convenient appointment window for guided support, system tune-up, and peripheral setup.</p>
              <div class="mt-5 flex items-center gap-1.5 text-xs font-bold text-slate-500">
                <?= icon('calendar', 'size-4 text-[#0754c7]') ?> Flexible morning &amp; evening slots
              </div>
            </div>
            <div class="mt-8">
              <a href="/schedule-repair"
                class="flex w-full items-center justify-center gap-2 rounded-xl bg-slate-900 px-5 py-3.5 text-sm font-extrabold text-white transition-opacity hover:opacity-90">
                <?= icon('calendar', 'size-4') ?> Reserve Time Slot
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Form -->
    <section class="bg-slate-50 px-5 pb-20 lg:px-8">
      <div class="mx-auto max-w-4xl rounded-3xl border border-slate-200 bg-white p-8 shadow-sm sm:p-12">
        <h2 class="text-2xl font-extrabold text-slate-950 sm:text-3xl">Send Us a Message</h2>
        <p class="mt-1 text-sm text-slate-600">Our technical support team reviews inquiries promptly.</p>

        <?php if ($submitted): ?>
          <div class="mt-8 rounded-2xl border border-emerald-200 bg-emerald-50 p-6 text-center text-emerald-900">
            <?= icon('check-circle', 'mx-auto size-10 text-emerald-600') ?>
            <h3 class="mt-3 text-lg font-bold">Message Submitted Successfully</h3>
            <p class="mt-1 text-sm text-emerald-700">
              Thank you, <?= e($fullName) ?>. Our technical support team has received your inquiry and will reach out to <?= e($email) ?> shortly.
            </p>
            <a href="/contact" class="mt-5 inline-block rounded-xl bg-emerald-600 px-5 py-2.5 text-sm font-bold text-white hover:bg-emerald-500">Send Another Message</a>
          </div>
        <?php else: ?>
        <form method="post" action="/contact" class="mt-8 space-y-6">
          <div class="grid gap-5 sm:grid-cols-3">
            <?php foreach ([
              ['fullName', 'text',  'Full Name *',      'John Smith',       $fullName],
              ['email',    'email', 'Email Address *',   'john@example.com', $email],
              ['phone',    'tel',   'Phone Number *',    '9876543210',       $phone],
            ] as [$name, $type, $label, $placeholder, $val]): ?>
              <div>
                <label class="block text-xs font-bold text-slate-700 mb-1.5"><?= e($label) ?></label>
                <input required type="<?= e($type) ?>" name="<?= e($name) ?>" value="<?= e($val) ?>" placeholder="<?= e($placeholder) ?>"
                  class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-900 outline-none focus:border-[#0754c7]" />
              </div>
            <?php endforeach; ?>
          </div>

          <div>
            <label class="block text-xs font-bold text-slate-700 mb-1.5">Topic / Category *</label>
            <select name="topic" class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 outline-none focus:border-[#0754c7]">
              <?php foreach (['Computer & Laptop Diagnostics', 'Printer & Peripheral Setup', 'Software & Email Support', 'Security & Malware Removal'] as $opt): ?>
                <option value="<?= e($opt) ?>" <?= $topic === $opt ? 'selected' : '' ?>><?= e($opt) ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div>
            <label class="block text-xs font-bold text-slate-700 mb-1.5">Message Details *</label>
            <textarea required rows="5" name="message"
              placeholder="Please describe how we can assist you..."
              class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-900 outline-none focus:border-[#0754c7]"><?= e($message) ?></textarea>
          </div>

          <button type="submit"
            class="inline-flex items-center gap-2 rounded-xl bg-[#0754c7] px-7 py-3.5 text-sm font-extrabold text-white transition-opacity hover:opacity-90">
            <?= icon('send', 'size-4') ?> Submit Message
          </button>
        </form>
        <?php endif; ?>
      </div>
    </section>

  </main>
</div>

<?php
render_footer();
html_end();
