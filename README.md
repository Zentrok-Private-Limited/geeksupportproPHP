# GeekSupportPro — PHP Version

A full PHP conversion of the GeekSupportPro Next.js website. This is a static/informational site with contact forms, powered by plain PHP (no framework required).

## Requirements

- **PHP 7.4+** (8.x recommended)
- **Apache** with `mod_rewrite` enabled, **or** Nginx with equivalent rewrite rules

## Quick Start (Apache)

1. Point your Apache virtual-host `DocumentRoot` to the `php-site/` directory.
2. Make sure `AllowOverride All` is set so `.htaccess` is respected.
3. Visit `http://localhost/` — you should see the home page.

### Example Apache VirtualHost

```apache
<VirtualHost *:80>
    ServerName geeksupportpro.local
    DocumentRoot /path/to/php-site

    <Directory /path/to/php-site>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

## Quick Start (Nginx)

```nginx
server {
    listen 80;
    server_name geeksupportpro.local;
    root /path/to/php-site;
    index index.php;

    # Serve static assets from public/
    location ~* \.(png|jpg|jpeg|gif|webp|svg|ico|css|js|woff2?)$ {
        try_files /public$uri $uri =404;
        expires 30d;
    }

    # Route everything else through the front controller
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass 127.0.0.1:9000;  # or unix:/run/php/php-fpm.sock
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

## Quick Start (PHP Built-in Server — Development)

```bash
cd php-site
php -S localhost:8000
```

> **Note:** The built-in server doesn't support `.htaccess` rewrites. Use `php -S localhost:8000 index.php` to route all requests through the front controller, but static assets under `public/` need to be handled manually (or accessed via `http://localhost:8000/public/images/...`).

## Project Structure

```
php-site/
├── .htaccess              # Apache URL rewriting rules
├── index.php              # Front controller (router)
├── README.md
├── includes/
│   ├── config.php         # Site configuration, data arrays
│   ├── helpers.php        # icon() SVG helper, e() escape
│   ├── layout.php         # html_start() / html_end()
│   ├── header.php         # render_header()
│   └── footer.php         # render_footer()
├── pages/
│   ├── home.php           # /
│   ├── support.php        # /support
│   ├── services.php       # /services
│   ├── remote-support.php # /remote-support
│   ├── schedule-repair.php# /schedule-repair
│   ├── contact.php        # /contact
│   ├── membership.php     # /membership
│   ├── faq.php            # /faq
│   ├── devices.php        # /devices
│   ├── device-detail.php  # /devices/{slug}
│   ├── privacy.php        # /privacy, /privacy-policy
│   ├── terms.php          # /terms, /terms-and-conditions
│   ├── search.php         # /search?q=...
│   └── 404.php            # Not Found
└── public/
    ├── images/            # Site images (logos, photos)
    ├── chat-support.png
    ├── placeholder.svg
    └── ...
```

## Routes

| URL                    | Page File                |
|------------------------|--------------------------|
| `/`                    | `pages/home.php`         |
| `/home`                | `pages/home.php`         |
| `/support`             | `pages/support.php`      |
| `/services`            | `pages/services.php`     |
| `/remote-support`      | `pages/remote-support.php` |
| `/schedule-repair`     | `pages/schedule-repair.php` |
| `/contact`             | `pages/contact.php`      |
| `/membership`          | `pages/membership.php`   |
| `/faq`                 | `pages/faq.php`          |
| `/devices`             | `pages/devices.php`      |
| `/devices/{slug}`      | `pages/device-detail.php`|
| `/privacy`             | `pages/privacy.php`      |
| `/terms`               | `pages/terms.php`        |
| `/search?q=...`        | `pages/search.php`       |

## Features

- **Tailwind CSS** via CDN (no build step required)
- **JivoSite** live chat integration
- **Responsive design** with mobile hamburger menu
- **Server-side form handling** for Contact and Schedule Repair pages
- **Search** across services, devices, and support options
- **SEO-friendly URLs** via front controller routing

## Customization

- **Site configuration**: Edit `includes/config.php` to change company name, phone, email, address, services, devices, FAQs, etc.
- **Icons**: The `icon()` function in `includes/helpers.php` contains inline SVG paths. Add new icons by adding entries to the `$icons` array.
- **Styling**: All styling uses Tailwind CSS utility classes. Modify classes directly in the PHP templates.

## Notes

- Form submissions (Contact, Schedule Repair) display a confirmation message but do **not** send emails. Wire up `mail()`, PHPMailer, or an API to add email delivery.
- The JivoSite widget ID is configured in `includes/layout.php`. Update the script src to use your own widget.
