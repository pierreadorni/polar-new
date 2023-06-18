<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="/images/polar-32x32.png">
    <link rel="icon" type="image/png" sizes="64x64" href="/images/polar-64x64.png">
    <link rel="icon" type="image/png" sizes="250x250" href="/images/polar-250x250.png">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    <!-- Styles -->
    @vite('resources/css/app.css')

    <!-- Scripts -->
    @vite('resources/js/app.js')
</head>
<body class="antialiased h-screen selection:bg-red-500 selection:text-white pt-28 bg-gray-200">
<header class="p-6 fixed top-0 left-0 w-screen bg-white h-20 transition-all z-10 hidden md:block">
    <ul class="flex items-center justify-center gap-6 h-full">
        <li>
            <a class="" href="/">
                <img src="/images/polar-with-name.svg" alt="polar logo" class="w-24"/>
            </a>
        </li>
        <li>
            <a href="/" class="font-semibold {{ request()->is('/') ? 'text-primary' : 'text-secondary' }}">
                Accueil
            </a>
        </li>
        <li>
            <a href="/hours" class="font-semibold {{ request()->is('hours') ? 'text-primary' : 'text-secondary'}}">
                Horaires
            </a>
        </li>
        <li>
            <a href="/products" class="font-semibold {{ request()->is('products') ? 'text-primary' : 'text-secondary'}}">
                Produits
            </a>
        </li>
        <li>
            <a href="/services" class="font-semibold {{ request()->is('services') ? 'text-primary' : 'text-secondary'}}">
                Services
            </a>
        </li>
        <li>
            <a href="/team" class="font-semibold {{ request()->is('team') ? 'text-primary' : 'text-secondary'}}">
                L'équipe
            </a>
        </li>

        <li>
            <a href="/#about" class="text-secondary font-semibold">
                A propos
            </a>
        </li>
        <li>
            <a href="#contact" class="text-secondary font-semibold">
                Contact
            </a>
        </li>
        <li>
            <a href="/admin">
                <button class="bg-primary text-white font-medium rounded-lg px-3 py-2 hover:bg-red-900 transition">Connexion Admin</button>
            </a>
        </li>
    </ul>
    <div class="fixed top-20 left-0 w-full bg-primary text-white text-center py-1">
        {{ $headerMessage }}
    </div>
</header>
<header class="fixed top-0 left-0 w-screen bg-white h-20 transition-all z-10 flex justify-between items-center md:hidden">
    <a class="" href="/">
        <img src="/images/polar-with-name.svg" alt="polar logo" class="w-24"/>
    </a>
    <x-heroicon-o-menu class="h-8 w-8 text-secondary mr-6 cursor-pointer" id="mobile-menu-button"/>
    <dialog id="mobile-menu" class="fixed top-20 z-10 right-0 mr-0 bg-white border border-tertiary">
        <ul class="flex flex-col items-center justify-center gap-6 h-full">
            <li>
                <a href="/" class="font-semibold {{ request()->is('/') ? 'text-primary' : 'text-secondary' }}">
                    Accueil
                </a>
            </li>
            <li>
                <a href="/hours" class="font-semibold {{ request()->is('hours') ? 'text-primary' : 'text-secondary'}}">
                    Horaires
                </a>
            </li>
            <li>
                <a href="/products" class="font-semibold {{ request()->is('products') ? 'text-primary' : 'text-secondary'}}">
                    Produits
                </a>
            </li>
            <li>
                <a href="/services" class="font-semibold {{ request()->is('services') ? 'text-primary' : 'text-secondary'}}">
                    Services
                </a>
            </li>
            <li>
                <a href="/team" class="font-semibold {{ request()->is('team') ? 'text-primary' : 'text-secondary'}}">
                    L'équipe
                </a>
            </li>

            <li>
                <a href="/#about" class="text-secondary font-semibold">
                    A propos
                </a>
            </li>
            <li>
                <a href="#contact" class="text-secondary font-semibold">
                    Contact
                </a>
            </li>
            <li>
                <a href="/admin" class="bg-primary text-white font-medium rounded-lg px-3 py-2 hover:bg-red-900 transition">
                    Connexion Admin
                </a>
            </li>
        </ul>
    </dialog>
    <div class="fixed top-20 left-0 w-screen bg-primary text-white text-center py-1">
        {{ $headerMessage }}
    </div>
</header>
{{ $slot }}
<footer class="h-48 bg-primary py-6 text-white" id="contact">
    <h3 class="text-2xl font-semibold text-center">Contact</h3>
    <div class="flex justify-around">
        <a class="flex items-center hover:text-gray-300 transition" href="mailto:polar@utc.fr">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24"
                 aria-hidden="true" height="1em"
                 width="1em" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <p class="ml-2 font-mono">polar@utc.fr</p>
        </a>
        <a class="flex items-center hover:text-gray-300 transition" href="https://facebook.com/polar.utc.33"
           rel="noopener noreferrer" target="_blank">
            <svg class="h-6 w-6" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16"
                 height="1em" width="1em"
                 xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
            </svg>
            <p class="ml-2">Paul Ar</p>
        </a>
    </div>

    <h3 class="text-2xl font-semibold text-center">Où nous trouver</h3>
    <div class="flex justify-center mt-2">
        <a class="flex items-center hover:text-gray-300 transition" href="https://goo.gl/maps/q6soHUihaptyGQEr5">
            <svg class="h-6 w-6" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true"
                 height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                      clip-rule="evenodd"></path>
            </svg>
            <p class="ml-2 text-center">Rue Roger Couttolenc, 60200 Compiègne<br/>2ème étage MDE</p>
        </a>
    </div>
</footer>
<script type="text/javascript">
    const header = document.querySelector('header');
    // hide footer on scroll down and show it on scroll up
    let lastScrollTop = 0;
    window.addEventListener('scroll', () => {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > lastScrollTop) {
            header.classList.add('-translate-y-full');
        } else {
            header.classList.remove('-translate-y-full');
        }
        lastScrollTop = scrollTop;
    });

    const mobileMenu = document.querySelector('#mobile-menu');
    const mobileMenuButton = document.querySelector('#mobile-menu-button');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.toggleAttribute('open');
    });

    mobileMenu.addEventListener('click', () => {
        mobileMenu.close();
    });
</script>
</body>
</html>
