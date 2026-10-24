<?php
// Header template — mirrors components/Header.tsx
function render_header(): void {
    global $siteConfig;
    $currentPage = current_page();

    $links = [
        ['Home',                 '/',               'home'],
        ['Repair & Tech Services','/support',       'wrench'],
        ['Schedule Support',     '/schedule-repair','calendar'],
        ['Remote Support',       '/remote-support', 'monitor'],
        ['Contact & Help',       '/contact',        'mail'],
    ];
    ?>
<!-- Topmost dark announcement bar -->
<div class="bg-[#051c52] px-4 py-2 text-center text-xs font-semibold text-white border-b border-blue-900">
  <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-center gap-x-4 gap-y-1 sm:justify-end text-xs">
    <div class="flex items-center gap-1.5 mr-auto">
      <span class="relative flex size-2 items-center justify-center">
        <span class="absolute inline-flex size-full rounded-full bg-emerald-400 opacity-75 animate-ping"></span>
      </span>
      <span class="text-yellow-300 font-bold">24/7 LIVE SUPPORT:</span>
      <span class="hidden sm:inline text-blue-100">Certified Tech Support Agents Online</span>
    </div>
    <div class="flex items-center gap-3 text-white">
      <a href="/remote-support" class="hover:text-yellow-300 inline-flex items-center gap-1">💬 Start Live Chat</a>
      <span>|</span>
      <a href="/remote-support" class="hover:text-yellow-300 inline-flex items-center gap-1">🔑 Enter Session PIN</a>
      <span>|</span>
      <a href="/support" class="hover:text-yellow-300 inline-flex items-center gap-1">⚡Geek Support </a>
    </div>
  </div>
</div>

<!-- Main header bar -->
<header class="sticky top-0 z-40 bg-[#0645b5] text-white shadow-md">
  <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-5 py-3.5 lg:px-8">
    <!-- Logo -->
    <a href="/" class="flex items-center gap-2.5">
      <img src="/images/Geek_Support_logo.webp" alt="Geek Online" class="object-cover h-12 w-22">
    </a>

    <!-- Desktop Search bar -->
    <div class="relative order-3 hidden w-full max-w-2xl flex-1 lg:order-2 lg:mx-6 lg:block">
      <form action="/search" method="get" class="relative z-30">
        <label class="sr-only" for="shared-support-search">Search support</label>
        <div class="flex w-full overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-white/20">
          <input
            id="shared-support-search"
            name="q"
            type="text"
            placeholder="Search support: Virus clean, PC speed, Printer setup, Email, Mac, Wi-Fi..."
            class="min-w-0 flex-1 px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 outline-none"
          />
          <button type="submit" aria-label="Search support" class="grid w-12 place-items-center bg-white text-slate-600 hover:bg-slate-50">
            <?= icon('search', 'size-5 text-blue-700') ?>
          </button>
        </div>
      </form>
    </div>

    <!-- Right action buttons -->
    <div class="order-2 flex items-center gap-2.5 lg:order-3 ml-auto lg:ml-0">
      <button type="button" onclick="if(window.jivo_api)window.jivo_api.open();"
        class="inline-flex items-center gap-1.5 rounded-xl bg-yellow-300 px-4 py-2.5 text-xs font-extrabold text-blue-950 shadow-sm hover:opacity-90 sm:text-sm">
        💬 Live Chat
      </button>
      <a href="/remote-support"
        class="hidden rounded-xl border border-white/30 bg-white/10 px-4 py-2.5 text-xs font-bold text-white hover:bg-white/20 sm:inline-flex sm:text-sm items-center gap-1.5">
        💻 Remote Support
      </a>
      <!-- Mobile menu toggle -->
      <button type="button" id="mobile-menu-btn"
        class="grid size-11 place-items-center rounded-xl border border-white/20 bg-blue-700/50 text-white lg:hidden"
        aria-label="Toggle navigation" aria-expanded="false" onclick="toggleMobileMenu()">
        <span id="menu-icon-open"><?= icon('menu', 'size-5') ?></span>
        <span id="menu-icon-close" class="hidden"><?= icon('x', 'size-5') ?></span>
      </button>
    </div>
  </div>

  <!-- Mobile search bar -->
  <div class="px-5 pb-3 lg:hidden">
    <form action="/search" method="get" class="relative z-30">
      <div class="flex w-full overflow-hidden rounded-xl bg-white shadow-sm">
        <input name="q" type="text"
          placeholder="Search support: Virus clean, PC speed, Printer setup..."
          class="min-w-0 flex-1 px-3.5 py-2.5 text-xs text-slate-800 placeholder:text-slate-400 outline-none"/>
        <button type="submit" aria-label="Search support" class="grid w-11 place-items-center bg-white text-blue-700">
          <?= icon('search', 'size-4') ?>
        </button>
      </div>
    </form>
  </div>

  <!-- Desktop navigation bar -->
  <nav class="hidden border-t border-blue-700/60 bg-[#05379b]/80 lg:block">
    <div class="mx-auto flex max-w-7xl items-center gap-8 px-5 py-2.5 text-xs font-bold tracking-wide uppercase lg:px-8">
      <?php foreach ($links as [$label, $href, $iconName]): ?>
        <a href="<?= e($href) ?>" class="inline-flex items-center gap-1.5 text-blue-100 hover:text-yellow-300 transition-colors">
          <?= icon($iconName, 'size-3.5 text-yellow-300') ?>
          <?= e($label) ?>
        </a>
      <?php endforeach; ?>
    </div>
  </nav>

  <!-- Mobile menu dropdown -->
  <nav id="mobile-menu" class="hidden border-t border-blue-700 bg-[#05379b] px-5 py-4 lg:hidden">
    <div class="flex flex-col gap-1.5">
      <?php foreach ($links as [$label, $href, $iconName]): ?>
        <a href="<?= e($href) ?>" onclick="closeMobileMenu()"
          class="inline-flex items-center gap-2.5 rounded-xl px-3.5 py-3 text-sm font-bold text-white hover:bg-blue-700">
          <?= icon($iconName, 'size-4 text-yellow-300') ?>
          <?= e($label) ?>
        </a>
      <?php endforeach; ?>
    </div>
  </nav>
</header>

<script>
function toggleMobileMenu() {
  var menu = document.getElementById('mobile-menu');
  var btn = document.getElementById('mobile-menu-btn');
  var iconOpen = document.getElementById('menu-icon-open');
  var iconClose = document.getElementById('menu-icon-close');
  var isHidden = menu.classList.contains('hidden');
  if (isHidden) {
    menu.classList.remove('hidden');
    iconOpen.classList.add('hidden');
    iconClose.classList.remove('hidden');
    btn.setAttribute('aria-expanded', 'true');
  } else {
    closeMobileMenu();
  }
}
function closeMobileMenu() {
  var menu = document.getElementById('mobile-menu');
  var btn = document.getElementById('mobile-menu-btn');
  var iconOpen = document.getElementById('menu-icon-open');
  var iconClose = document.getElementById('menu-icon-close');
  menu.classList.add('hidden');
  iconOpen.classList.remove('hidden');
  iconClose.classList.add('hidden');
  btn.setAttribute('aria-expanded', 'false');
}
</script>
    <?php
}
