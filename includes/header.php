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

    $supportSuggestions = [
        [
            'title'       => 'Virus, Spyware & Pop-up Removal',
            'description' => 'Instant remote cleaning & rootkit scan',
            'type'        => 'Remote Fix',
            'href'        => '/remote-support',
            'icon'        => 'shield-check',
            'isChat'      => false,
        ],
        [
            'title'       => 'Slow Computer Diagnostic & Tune-up',
            'description' => 'Boost boot speed, fix freezes & blue screens',
            'type'        => 'Service',
            'href'        => '/support',
            'icon'        => 'laptop',
            'isChat'      => false,
        ],
        [
            'title'       => 'Wireless Printer & Driver Setup',
            'description' => 'Fix offline printer, install updated drivers',
            'type'        => 'Remote Fix',
            'href'        => '/remote-support',
            'icon'        => 'printer',
            'isChat'      => false,
        ],
        [
            'title'       => 'Wi-Fi & Mesh Network Optimization',
            'description' => 'Router pairing, security & coverage tuning',
            'type'        => 'Support',
            'href'        => '/support',
            'icon'        => 'wifi',
            'isChat'      => false,
        ],
        [
            'title'       => 'Apple & Samsung Device Repairs',
            'description' => 'Screen, battery & genuine parts diagnostics',
            'type'        => 'Certified',
            'href'        => '/support',
            'icon'        => 'smartphone',
            'isChat'      => false,
        ],
        [
            'title'       => '24/7 Live Agent Chat Session',
            'description' => 'Speak with a certified technician right now',
            'type'        => 'Instant Live',
            'href'        => '#',
            'icon'        => 'headset',
            'isChat'      => true,
        ],
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
      <a href="/support" class="hover:text-yellow-300 inline-flex items-center gap-1">⚡ Geek Support</a>
    </div>
  </div>
</div>

<!-- Main header bar -->
<header class="sticky top-0 z-40 bg-[#0645b5] text-white shadow-md">
  <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-5 py-3.5 lg:px-8">
    <!-- Logo -->
    <a href="/" class="flex items-center gap-2.5">
      <img src="/images/Geek_Support_logo.webp" alt="Geek Online" class="object-contain h-12 sm:h-14 md:h-16 w-auto max-w-[220px]">
    </a>

    <!-- Desktop Search bar -->
    <div id="desktop-search-container" class="relative order-3 hidden w-full max-w-2xl flex-1 lg:order-2 lg:mx-6 lg:block">
      <form id="desktop-search-form" action="/search" method="get" class="relative z-30">
        <label class="sr-only" for="shared-support-search">Search support</label>
        <div class="flex w-full overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-white/20">
          <input
            id="shared-support-search"
            name="q"
            type="text"
            autocomplete="off"
            placeholder="Search support: Virus clean, PC speed, Printer setup, Email, Mac, Wi-Fi..."
            class="min-w-0 flex-1 px-4 py-3 text-sm text-slate-800 placeholder:text-slate-400 outline-none"
          />
          <button type="submit" aria-label="Search support" class="grid w-12 place-items-center bg-white text-slate-600 hover:bg-slate-50">
            <?= icon('search', 'size-5 text-blue-700') ?>
          </button>
        </div>
      </form>

      <!-- Desktop Suggestions Dropdown -->
      <div id="desktop-search-dropdown" class="hidden absolute left-0 right-0 top-[calc(100%+6px)] z-50 overflow-hidden rounded-xl bg-white shadow-2xl ring-1 ring-slate-200">
        <div class="flex items-center justify-between border-b border-slate-200 bg-slate-50 px-3 py-2">
          <span id="desktop-dropdown-title" class="text-[11px] font-extrabold uppercase tracking-wide text-slate-500">
            Suggested Services & Fixes
          </span>
          <button type="button" onclick="closeDesktopSearchDropdown()" class="rounded-md p-1 text-slate-400 hover:bg-slate-200 hover:text-slate-700" aria-label="Close search suggestions">
            <?= icon('x', 'size-4') ?>
          </button>
        </div>
        <div id="desktop-suggestions-list" class="max-h-[380px] overflow-y-auto"></div>
      </div>
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
    <div id="mobile-search-container" class="relative">
      <form id="mobile-search-form" action="/search" method="get" class="relative z-30">
        <div class="flex w-full overflow-hidden rounded-xl bg-white shadow-sm">
          <input
            id="mobile-support-search"
            name="q"
            type="text"
            autocomplete="off"
            placeholder="Search support: Virus clean, PC speed, Printer setup..."
            class="min-w-0 flex-1 px-3.5 py-2.5 text-xs text-slate-800 placeholder:text-slate-400 outline-none"
          />
          <button type="submit" aria-label="Search support" class="grid w-11 place-items-center bg-white text-blue-700">
            <?= icon('search', 'size-4') ?>
          </button>
        </div>
      </form>

      <!-- Mobile Suggestions Dropdown -->
      <div id="mobile-search-dropdown" class="hidden absolute left-0 right-0 top-[calc(100%+6px)] z-50 overflow-hidden rounded-xl bg-white shadow-2xl ring-1 ring-slate-200">
        <div class="flex items-center justify-between border-b border-slate-200 bg-slate-50 px-3 py-2">
          <span id="mobile-dropdown-title" class="text-[10px] font-extrabold uppercase tracking-wide text-slate-500">
            Suggested Services & Fixes
          </span>
          <button type="button" onclick="closeMobileSearchDropdown()" class="p-1 text-slate-400" aria-label="Close search suggestions">
            <?= icon('x', 'size-4') ?>
          </button>
        </div>
        <div id="mobile-suggestions-list" class="max-h-[320px] overflow-y-auto"></div>
      </div>
    </div>
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
var supportSuggestionsData = <?= json_encode(array_map(function($item) {
    return [
        'title'       => $item['title'],
        'description' => $item['description'],
        'type'        => $item['type'],
        'href'        => $item['href'],
        'iconSvg'     => icon($item['icon'], 'size-4'),
        'isChat'      => $item['isChat']
    ];
}, $supportSuggestions), JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;

var iconSearchEmpty = <?= json_encode(icon('search', 'mx-auto mb-2 size-6 text-slate-300')) ?>;

function getBadgeClass(type) {
  if (type === 'Certified') return 'bg-yellow-100 text-yellow-700';
  if (type === 'Instant Live') return 'bg-emerald-100 text-emerald-700';
  return 'bg-blue-100 text-blue-700';
}

function filterSuggestions(query) {
  if (!query || !query.trim()) return supportSuggestionsData;
  var q = query.toLowerCase().trim();
  return supportSuggestionsData.filter(function(item) {
    return item.title.toLowerCase().indexOf(q) !== -1 ||
           item.description.toLowerCase().indexOf(q) !== -1 ||
           item.type.toLowerCase().indexOf(q) !== -1;
  });
}

function renderSuggestionsHtml(items, isMobile) {
  if (!items || items.length === 0) {
    return '<div class="px-4 py-8 text-center">' +
      iconSearchEmpty +
      '<p class="text-sm font-semibold text-slate-600">No support service found</p>' +
      '<p class="mt-1 text-xs text-slate-400">Try searching for printer, Wi-Fi, virus, computer, etc.</p>' +
      '</div>';
  }

  return items.map(function(item) {
    var clickHandler = item.isChat
      ? "if(window.jivo_api){window.jivo_api.open();} if(typeof closeDesktopSearchDropdown==='function')closeDesktopSearchDropdown(); if(typeof closeMobileSearchDropdown==='function')closeMobileSearchDropdown(); return false;"
      : "";

    var onclickAttr = clickHandler ? ' onclick="' + clickHandler + '"' : '';
    var badgeClass = getBadgeClass(item.type);

    if (isMobile) {
      return '<a href="' + item.href + '"' + onclickAttr + ' class="flex items-center gap-2.5 border-b border-slate-100 px-3 py-3 hover:bg-blue-50 transition-colors last:border-0">' +
        '<div class="flex size-8 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-700">' +
          item.iconSvg +
        '</div>' +
        '<div class="min-w-0 flex-1">' +
          '<div class="text-xs font-bold text-slate-800">' + item.title + '</div>' +
          '<div class="truncate text-[10px] text-slate-500">' + item.description + '</div>' +
        '</div>' +
        '<span class="hidden rounded-md px-1.5 py-1 text-[9px] font-bold xs:block ' + badgeClass + '">' +
          item.type +
        '</span>' +
      '</a>';
    }

    return '<a href="' + item.href + '"' + onclickAttr + ' class="group flex items-center gap-3 border-b border-slate-100 px-3 py-3 transition-colors last:border-0 hover:bg-blue-50">' +
      '<div class="flex size-9 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-blue-700 group-hover:bg-blue-100">' +
        item.iconSvg +
      '</div>' +
      '<div class="min-w-0 flex-1">' +
        '<div class="text-sm font-bold text-slate-800">' + item.title + '</div>' +
        '<div class="mt-0.5 truncate text-xs text-slate-500">' + item.description + '</div>' +
      '</div>' +
      '<span class="hidden shrink-0 rounded-md px-2 py-1 text-[10px] font-bold sm:block ' + badgeClass + '">' +
        item.type +
      '</span>' +
    '</a>';
  }).join('');
}

// Desktop Search
var desktopInput = document.getElementById('shared-support-search');
var desktopDropdown = document.getElementById('desktop-search-dropdown');
var desktopList = document.getElementById('desktop-suggestions-list');
var desktopTitle = document.getElementById('desktop-dropdown-title');
var desktopForm = document.getElementById('desktop-search-form');

function openDesktopSearchDropdown() {
  if (!desktopDropdown) return;
  var val = desktopInput ? desktopInput.value : '';
  desktopTitle.textContent = val.trim() ? 'Search Results' : 'Suggested Services & Fixes';
  desktopList.innerHTML = renderSuggestionsHtml(filterSuggestions(val), false);
  desktopDropdown.classList.remove('hidden');
}

function closeDesktopSearchDropdown() {
  if (desktopDropdown) desktopDropdown.classList.add('hidden');
}

if (desktopInput) {
  desktopInput.addEventListener('focus', openDesktopSearchDropdown);
  desktopInput.addEventListener('input', function() {
    openDesktopSearchDropdown();
  });
}

if (desktopForm) {
  desktopForm.addEventListener('submit', function(e) {
    var val = desktopInput ? desktopInput.value.trim() : '';
    var matches = filterSuggestions(val);
    if (matches.length > 0 && !val.includes(' ')) {
      // If direct match and enter hit
    }
  });
}

// Mobile Search
var mobileInput = document.getElementById('mobile-support-search');
var mobileDropdown = document.getElementById('mobile-search-dropdown');
var mobileList = document.getElementById('mobile-suggestions-list');
var mobileTitle = document.getElementById('mobile-dropdown-title');

function openMobileSearchDropdown() {
  if (!mobileDropdown) return;
  var val = mobileInput ? mobileInput.value : '';
  mobileTitle.textContent = val.trim() ? 'Search Results' : 'Suggested Services & Fixes';
  mobileList.innerHTML = renderSuggestionsHtml(filterSuggestions(val), true);
  mobileDropdown.classList.remove('hidden');
}

function closeMobileSearchDropdown() {
  if (mobileDropdown) mobileDropdown.classList.add('hidden');
}

if (mobileInput) {
  mobileInput.addEventListener('focus', openMobileSearchDropdown);
  mobileInput.addEventListener('input', function() {
    openMobileSearchDropdown();
  });
}

// Close when clicking outside
document.addEventListener('click', function(e) {
  var desktopContainer = document.getElementById('desktop-search-container');
  if (desktopContainer && !desktopContainer.contains(e.target)) {
    closeDesktopSearchDropdown();
  }
  var mobileContainer = document.getElementById('mobile-search-container');
  if (mobileContainer && !mobileContainer.contains(e.target)) {
    closeMobileSearchDropdown();
  }
});

// Mobile menu toggle
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
  if (menu) menu.classList.add('hidden');
  if (iconOpen) iconOpen.classList.remove('hidden');
  if (iconClose) iconClose.classList.add('hidden');
  if (btn) btn.setAttribute('aria-expanded', 'false');
}
</script>
    <?php
}
