<?php
// Site configuration — mirrors lib/site-config.ts
$siteConfig = [
    'name' => getenv('SITE_NAME') ?: 'Geek Online',
    'description' => '24/7 expert technical support from certified technicians.',
];
$brandInitials = strtoupper(substr($siteConfig['name'], 0, 1));

$navItems = [
    ['Home',               '/'],
    ['Repair & Tech Services', '/support'],
    ['Schedule Support',   '/schedule-repair'],
    ['Remote Support',     '/remote-support'],
    ['Contact & Help',     '/contact'],
];

// Devices list — mirrors data/site-content.ts
// [slug, title, subtitle, svgIcon(inline)]
$devices = [
    ['computers',     'Computers & Laptops',  'Windows • Mac • PC',         'laptop'],
    ['phones',        'Cell Phones',           'iPhone • Samsung • Pixel',   'smartphone'],
    ['tablets',       'Tablets & iPads',       'Screen • Battery • iPad',    'tablet'],
    ['tv-mounting',   'TV & Home Theater',     'Mounting • Soundbars',       'tv'],
    ['appliances',    'Major Appliances',      'Fridge • Washer • Dryer',    'appliance'],
    ['smart-home',    'Smart Home',            'Cameras • Ring • Alexa',     'home'],
    ['wifi',          'Wi-Fi & Networks',      'Mesh • Routers • Speed',     'wifi'],
    ['printers',      'Printers & Setup',      'Wireless • Drivers • Setup', 'printer'],
    ['gaming',        'Gaming Consoles',       'PS5 • Xbox • Switch',        'gaming'],
    ['virus',         'Virus & Security',      'Spyware • Deep Clean',       'shield'],
    ['data-recovery', 'Data Recovery',         'HDD • SSD • Backup',         'database'],
    ['car-audio',     'Car Electronics',       'Dash Cams • Sound • GPS',    'car'],
    ['wearables',     'Smart Watches',         'Apple Watch • Galaxy • Sync','watch'],
    ['audio',         'Audio & Headphones',    'AirPods • Bose • Sound',     'headphones'],
    ['cameras',       'Cameras & Drones',      'DSLR • GoPro • DJI Care',   'camera'],
];

// Services — mirrors data/site-content.ts
$services = [
    [
        'slug'        => 'computer-diagnostics',
        'title'       => 'PC Diagnostics & Tune-up',
        'description' => 'Boost boot speed, fix freezes, blue screens, and everyday computer issues with a clear diagnostic and practical tune-up.',
        'icon'        => 'wrench',
    ],
    [
        'slug'        => 'virus-removal',
        'title'       => 'Virus, Spyware & Pop-up Removal',
        'description' => 'Deep-clean your device, remove unwanted software, and help keep threats away with secure remote support.',
        'icon'        => 'shield-check',
    ],
    [
        'slug'        => 'printer-setup',
        'title'       => 'Wireless Printer & Driver Setup',
        'description' => 'Connect printers, install updated drivers, and get every computer in your home printing reliably.',
        'icon'        => 'printer',
    ],
    [
        'slug'        => 'wifi-optimization',
        'title'       => 'Wi-Fi & Mesh Network Optimization',
        'description' => 'Improve coverage, router pairing, security, and speed across your home network.',
        'icon'        => 'wifi',
    ],
    [
        'slug'        => 'device-repair',
        'title'       => 'Apple & Samsung Device Repairs',
        'description' => 'Get expert guidance for screen, battery, setup, and genuine-parts diagnostics across leading devices.',
        'icon'        => 'smartphone',
    ],
];

// FAQs — mirrors data/site-content.ts
$faqs = [
    [
        'Do I need to have purchased my device from a specific store to get support?',
        'No. Certified technicians can help with all major brands, regardless of where you bought your device.',
    ],
    [
        'How do I check the status of my active repair?',
        'Use the support link in your confirmation email or connect with a live agent and share your service details.',
    ],
    [
        'How does Remote Tech Support work?',
        'Start a secure screen-share session with a certified technician. They will guide you through the fix and explain every step.',
    ],
    [
        'Are your technicians certified for Apple and other major brands?',
        'Yes. Our support team is trained across Apple, Samsung, Windows, smart home, networking, and other leading platforms.',
    ],
];

// Support options — mirrors data/site-content.ts
$supportOptions = [
    ['Schedule a Repair',    'Book an in-store reservation at our service center or request home service.',                              '/schedule-repair', 'wrench'],
    ['24/7 Remote Support',  'Connect with an agent online to troubleshoot computer and software issues immediately.',                    '/remote-support',  'monitor'],
    ['24/7 Live Chat',       'Connect immediately with a live technician online to get answers.',                                         '/remote-support',  'message'],
    ['Help & Contact',       'Direct support directory, email inquiry form, and service hours.',                                          '/contact',         'circle-help'],
];

// Helper: resolve current page for routing
function current_page(): string {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = rtrim($uri, '/');
    return $uri === '' ? '/' : $uri;
}
