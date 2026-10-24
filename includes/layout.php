<?php
// HTML document wrapper — mirrors app/layout.tsx
function html_start(string $title = 'Geek Online | Official Support', string $description = ''): void {
    global $siteConfig;
    if (!$description) {
        $description = '24/7 expert technical support from ' . $siteConfig['name'] . '.';
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="<?= e($description) ?>" />
  <title><?= e($title) ?></title>
  <!-- Tailwind CSS via CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          animation: {
            ping: 'ping 1s cubic-bezier(0,0,0.2,1) infinite',
          }
        }
      }
    }
  </script>
  <style>
    /* Minimal custom styles */
    @keyframes ping {
      75%, 100% { transform: scale(2); opacity: 0; }
    }
    .animate-ping { animation: ping 1s cubic-bezier(0,0,0.2,1) infinite; }
    .animate-pulse { animation: pulse 2s cubic-bezier(0.4,0,0.6,1) infinite; }
    @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:.5} }
    html { scroll-behavior: smooth; }
    body { font-family: ui-sans-serif,system-ui,-apple-system,sans-serif; -webkit-font-smoothing: antialiased; }
    details > summary { list-style: none; }
    details > summary::-webkit-details-marker { display: none; }
    .size-2 { width: 0.5rem; height: 0.5rem; }
    .size-3 { width: 0.75rem; height: 0.75rem; }
    .size-3\.5 { width: 0.875rem; height: 0.875rem; }
    .size-4 { width: 1rem; height: 1rem; }
    .size-5 { width: 1.25rem; height: 1.25rem; }
    .size-6 { width: 1.5rem; height: 1.5rem; }
    .size-7 { width: 1.75rem; height: 1.75rem; }
    .size-8 { width: 2rem; height: 2rem; }
    .size-9 { width: 2.25rem; height: 2.25rem; }
    .size-10 { width: 2.5rem; height: 2.5rem; }
    .size-11 { width: 2.75rem; height: 2.75rem; }
    .size-12 { width: 3rem; height: 3rem; }
    /* Ensure SVGs inside size-* containers behave */
    .size-3 svg, .size-3\.5 svg, .size-4 svg, .size-5 svg, .size-6 svg, .size-7 svg, .size-8 svg, .size-9 svg, .size-10 svg, .size-11 svg, .size-12 svg { width: 100%; height: 100%; }
  </style>
  <!-- JivoSite live chat widget -->
  <script src="//code.jivosite.com/widget/vJqYrojBMM" async></script>
</head>
<body class="bg-white text-slate-900 antialiased">
    <?php
}

function html_end(): void {
    ?>
</body>
</html>
    <?php
}
