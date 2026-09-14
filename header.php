<?php
/**
 * Theme Header
 *
 * @package Solare
 */

$theme_uri = get_template_directory_uri();

$is_projects_page = is_page('projects') || is_singular('solare_project');
$is_solar_planner = is_page('solar-planner');
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-slate-950 antialiased'); ?>>

<?php wp_body_open(); ?>

<header
    id="site-header"
    class="fixed inset-x-0 top-0 z-50 border-b border-slate-200/80 bg-white/95 backdrop-blur-md"
>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">

        <div class="flex h-24 items-center justify-between lg:h-28">

            <!-- =====================================================
                 Logo
                 ===================================================== -->

            <a
                href="<?php echo esc_url(home_url('/')); ?>"
                class="flex shrink-0 items-center"
                aria-label="SOL.ARE Solutions Home"
            >
                <img
                    src="<?php echo esc_url($theme_uri . '/assets/images/solare-logo.webp'); ?>"
                    alt="SOL.ARE Solutions"
                    class="h-14 w-auto sm:h-16 lg:h-[72px]"
                >
            </a>


            <!-- =====================================================
                 Desktop Navigation
                 ===================================================== -->

            <nav
                class="hidden items-center gap-7 lg:flex"
                aria-label="Primary Navigation"
            >

                <!-- Services -->
                <a
                    href="<?php echo esc_url(home_url('/#services')); ?>"
                    data-section-link="services"
                    class="relative text-sm font-semibold text-slate-600 transition hover:text-slate-950"
                >
                    Services
                </a>


                <!-- About -->
                <a
                    href="<?php echo esc_url(home_url('/#about')); ?>"
                    data-section-link="about"
                    class="relative text-sm font-semibold text-slate-600 transition hover:text-slate-950"
                >
                    About
                </a>


                <!-- How It Works -->
                <a
                    href="<?php echo esc_url(home_url('/#process')); ?>"
                    data-section-link="process"
                    class="relative text-sm font-semibold text-slate-600 transition hover:text-slate-950"
                >
                    How It Works
                </a>


                <!-- Projects -->
                <a
                    href="<?php echo esc_url(home_url('/projects/')); ?>"
                    class="<?php echo esc_attr(
                        $is_projects_page
                            ? 'relative text-sm font-bold text-slate-950 after:absolute after:-bottom-2 after:left-0 after:h-0.5 after:w-full after:rounded-full after:bg-solar-400'
                            : 'relative text-sm font-semibold text-slate-600 transition hover:text-slate-950'
                    ); ?>"
                >
                    Projects
                </a>


                <!-- Solar Planner -->
                <a
                    href="<?php echo esc_url(home_url('/solar-planner/')); ?>"
                    class="<?php echo esc_attr(
                        $is_solar_planner
                            ? 'relative text-sm font-bold text-slate-950 after:absolute after:-bottom-2 after:left-0 after:h-0.5 after:w-full after:rounded-full after:bg-solar-400'
                            : 'relative text-sm font-semibold text-slate-600 transition hover:text-slate-950'
                    ); ?>"
                >
                    Solar Planner
                </a>


                <!-- FAQ -->
                <a
                    href="<?php echo esc_url(home_url('/#faq')); ?>"
                    data-section-link="faq"
                    class="relative text-sm font-semibold text-slate-600 transition hover:text-slate-950"
                >
                    FAQ
                </a>

            </nav>


            <!-- =====================================================
                 Desktop Actions
                 ===================================================== -->

            <div class="hidden items-center gap-5 lg:flex">

                <a
                    href="tel:+639171797201"
                    class="text-sm font-bold text-slate-700 transition hover:text-solar-600"
                >
                    0917 179 7201
                </a>

                <a
                    href="<?php echo esc_url(home_url('/#contact')); ?>"
                    class="inline-flex items-center justify-center rounded-xl bg-slate-950 px-5 py-3 text-sm font-bold text-white shadow-lg transition hover:bg-slate-800"
                >
                    Get Free Quote
                </a>

            </div>


            <!-- =====================================================
                 Mobile Menu Button
                 ===================================================== -->

            <button
                id="menu-button"
                type="button"
                class="inline-flex h-11 w-11 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-950 transition hover:bg-slate-50 lg:hidden"
                aria-expanded="false"
                aria-controls="mobile-menu"
                aria-label="Open navigation menu"
            >

                <!-- Open Icon -->
                <svg
                    id="menu-open-icon"
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        d="M4 7h16M4 12h16M4 17h16"
                        stroke-linecap="round"
                    />
                </svg>


                <!-- Close Icon -->
                <svg
                    id="menu-close-icon"
                    class="hidden h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >
                    <path
                        d="M6 6l12 12M18 6L6 18"
                        stroke-linecap="round"
                    />
                </svg>

            </button>

        </div>


        <!-- =========================================================
             Mobile Navigation
             ========================================================= -->

        <div
            id="mobile-menu"
            class="hidden border-t border-slate-100 pb-6 pt-4 lg:hidden"
        >

            <nav
                class="space-y-1"
                aria-label="Mobile Navigation"
            >

                <!-- Services -->
                <a
                    href="<?php echo esc_url(home_url('/#services')); ?>"
                    data-section-link="services"
                    class="mobile-link block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50"
                >
                    Services
                </a>


                <!-- About -->
                <a
                    href="<?php echo esc_url(home_url('/#about')); ?>"
                    data-section-link="about"
                    class="mobile-link block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50"
                >
                    About
                </a>


                <!-- How It Works -->
                <a
                    href="<?php echo esc_url(home_url('/#process')); ?>"
                    data-section-link="process"
                    class="mobile-link block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50"
                >
                    How It Works
                </a>


                <!-- Projects -->
                <a
                    href="<?php echo esc_url(home_url('/projects/')); ?>"
                    class="<?php echo esc_attr(
                        $is_projects_page
                            ? 'mobile-link block rounded-xl bg-solar-50 px-4 py-3 text-sm font-bold text-solar-800'
                            : 'mobile-link block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50'
                    ); ?>"
                >
                    Projects
                </a>


                <!-- Solar Planner -->
                <a
                    href="<?php echo esc_url(home_url('/solar-planner/')); ?>"
                    class="<?php echo esc_attr(
                        $is_solar_planner
                            ? 'mobile-link block rounded-xl bg-solar-50 px-4 py-3 text-sm font-bold text-solar-800'
                            : 'mobile-link block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50'
                    ); ?>"
                >
                    Solar Planner
                </a>


                <!-- FAQ -->
                <a
                    href="<?php echo esc_url(home_url('/#faq')); ?>"
                    data-section-link="faq"
                    class="mobile-link block rounded-xl px-4 py-3 text-sm font-semibold text-slate-700 transition hover:bg-slate-50"
                >
                    FAQ
                </a>

            </nav>


            <!-- Mobile Contact -->
            <div class="mt-5 border-t border-slate-100 pt-5">

                <a
                    href="tel:+639171797201"
                    class="block rounded-xl px-4 py-3 text-sm font-bold text-slate-700"
                >
                    0917 179 7201
                </a>

                <a
                    href="<?php echo esc_url(home_url('/#contact')); ?>"
                    class="mt-2 flex items-center justify-center rounded-xl bg-slate-950 px-5 py-3.5 text-sm font-bold text-white"
                >
                    Get Free Quote
                </a>

            </div>

        </div>

    </div>
</header>