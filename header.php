<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-slate-900 antialiased'); ?>>

<?php wp_body_open(); ?>

<header
    id="site-header"
    class="fixed inset-x-0 top-0 z-50 border-b border-slate-200/70 bg-white/90 backdrop-blur-xl"
>
    <div
        class="mx-auto flex h-20 max-w-7xl items-center justify-between px-5 sm:h-24 sm:px-6 lg:h-28 lg:px-8"
    >
        <a
            href="<?php echo esc_url(home_url('/')); ?>"
            class="flex items-center"
            aria-label="SOL.ARE SOLUTIONS home"
        >
            <img
                src="<?php echo esc_url(
                    get_template_directory_uri() .
                    '/assets/images/solare-logo.webp'
                ); ?>"
                alt="SOL.ARE SOLUTIONS — Take Charge of Your Energy"
                class="h-14 w-auto max-w-[230px] object-contain sm:h-20 sm:max-w-[340px] lg:h-24 lg:max-w-[390px]"
            >
        </a>

        <nav class="hidden items-center gap-8 lg:flex" aria-label="Primary navigation">

            <a
                href="<?php echo esc_url(home_url('/#services')); ?>"
                class="relative text-sm font-semibold text-slate-600 transition hover:text-slate-950"
            >
                Services
            </a>

            <a
                href="<?php echo esc_url(home_url('/#about')); ?>"
                class="relative text-sm font-semibold text-slate-600 transition hover:text-slate-950"
            >
                About
            </a>

            <a
                href="<?php echo esc_url(home_url('/#process')); ?>"
                class="relative text-sm font-semibold text-slate-600 transition hover:text-slate-950"
            >
                How It Works
            </a>

            <a
                href="<?php echo esc_url(home_url('/#projects')); ?>"
                class="relative text-sm font-semibold text-slate-600 transition hover:text-slate-950"
            >
                Projects
            </a>

            <a
                href="<?php echo esc_url(home_url('/solar-planner/')); ?>"
                class="<?php echo is_page('solar-planner')
                    ? 'relative text-sm font-bold text-slate-950'
                    : 'relative text-sm font-semibold text-slate-600 transition hover:text-slate-950'; ?>"
            >
                Solar Planner

                <?php if (is_page('solar-planner')) : ?>
                    <span
                        class="absolute inset-x-0 -bottom-3 mx-auto h-0.5 w-8 rounded-full bg-solar-400"
                        aria-hidden="true"
                    ></span>
                <?php endif; ?>
            </a>

            <a
                href="<?php echo esc_url(home_url('/#faq')); ?>"
                class="relative text-sm font-semibold text-slate-600 transition hover:text-slate-950"
            >
                FAQ
            </a>

        </nav>

        <div class="hidden items-center gap-3 md:flex">
            <a
                href="tel:+639171797201"
                class="rounded-xl px-4 py-2.5 text-sm font-bold text-slate-700 transition hover:bg-slate-100"
            >
                0917 179 7201
            </a>

            <a
                href="<?php echo esc_url(home_url('/#contact')); ?>"
                class="rounded-xl bg-slate-950 px-5 py-2.5 text-sm font-bold text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-slate-800"
            >
                Get Free Quote
            </a>
        </div>

        <button
            id="menu-button"
            type="button"
            class="inline-flex h-11 w-11 items-center justify-center rounded-xl border border-slate-200 text-slate-700 md:hidden"
            aria-expanded="false"
            aria-controls="mobile-menu"
            aria-label="Open menu"
        >
            <svg
                id="menu-open-icon"
                class="h-6 w-6"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    d="M4 6h16M4 12h16M4 18h16"
                    stroke-linecap="round"
                />
            </svg>

            <svg
                id="menu-close-icon"
                class="hidden h-6 w-6"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >
                <path
                    d="m6 6 12 12M18 6 6 18"
                    stroke-linecap="round"
                />
            </svg>
        </button>
    </div>

    <div
        id="mobile-menu"
        class="hidden border-t border-slate-200 bg-white md:hidden"
    >
        <nav
            class="mx-auto max-w-7xl space-y-1 px-6 py-5"
            aria-label="Mobile navigation"
        >
            <a
                href="<?php echo esc_url(home_url('/#services')); ?>"
                class="mobile-link block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50"
            >
                Services
            </a>

            <a
                href="<?php echo esc_url(home_url('/#about')); ?>"
                class="mobile-link block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50"
            >
                About
            </a>

            <a
                href="<?php echo esc_url(home_url('/#process')); ?>"
                class="mobile-link block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50"
            >
                How It Works
            </a>

            <a
                href="<?php echo esc_url(home_url('/#projects')); ?>"
                class="mobile-link block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50"
            >
                Projects
            </a>

            <a
                href="<?php echo esc_url(home_url('/solar-planner/')); ?>"
                class="<?php echo is_page('solar-planner')
                    ? 'mobile-link block rounded-xl bg-solar-50 px-4 py-3 text-sm font-bold text-solar-800'
                    : 'mobile-link block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50'; ?>"
            >
                Solar Planner
            </a>

            <a
                href="<?php echo esc_url(home_url('/#faq')); ?>"
                class="mobile-link block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-50"
            >
                FAQ
            </a>

            <a
                href="<?php echo esc_url(home_url('/#contact')); ?>"
                class="mobile-link mt-2 block rounded-xl bg-slate-950 px-4 py-3 text-center text-sm font-bold text-white"
            >
                Get Free Quote
            </a>
        </nav>
    </div>
</header>