<?php
/**
 * About Us Page Template
 *
 * @package Solare
 */

get_header();

$theme_uri = get_template_directory_uri();
?>

<main class="pt-32 lg:pt-40">

    <!-- =========================================================
         Hero
         ========================================================= -->

    <section class="pb-16 lg:pb-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-16">

                <div>

                    <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-600">
                        About SOL.ARE Solutions
                    </p>

                    <h1 class="mt-4 text-4xl font-extrabold tracking-tight text-slate-950 sm:text-5xl lg:text-6xl">
                        Powering homes and businesses with smarter solar solutions.
                    </h1>

                    <p class="mt-6 text-lg leading-8 text-slate-600">
                        SOL.ARE SOLUTIONS is a professional solar panel installer in the Philippines,
                        helping homeowners and businesses reduce electricity costs, improve energy
                        reliability, and move toward a more sustainable future.
                    </p>

                    <p class="mt-5 text-base leading-7 text-slate-600">
                        Founded in 2024 and based in Las Piñas City, we specialize in grid-tied
                        and hybrid solar power systems designed around each property's actual
                        energy requirements.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4">

                        <a
                            href="<?php echo esc_url(home_url('/#contact')); ?>"
                            class="inline-flex items-center justify-center rounded-xl bg-slate-950 px-6 py-3.5 text-sm font-bold text-white shadow-lg transition hover:bg-slate-800"
                        >
                            Get Free Assessment
                        </a>

                        <a
                            href="<?php echo esc_url(home_url('/solar-planner/')); ?>"
                            class="inline-flex items-center justify-center rounded-xl border border-slate-300 bg-white px-6 py-3.5 text-sm font-bold text-slate-700 transition hover:border-slate-400 hover:bg-slate-50"
                        >
                            Try Solar Planner
                        </a>

                    </div>

                </div>


                <div class="relative">

                    <div class="overflow-hidden rounded-3xl bg-slate-100 shadow-xl">

                        <img
                            src="<?php echo esc_url($theme_uri . '/assets/images/about-us-photo.webp'); ?>"
                            alt="SOL.ARE Solutions solar installation team"
                            class="aspect-[4/3] w-full object-cover"
                        >

                    </div>

                </div>

            </div>

        </div>
    </section>


    <!-- =========================================================
         Who We Are
         ========================================================= -->

    <section class="bg-slate-50 py-20 lg:py-28">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <div class="grid gap-12 lg:grid-cols-[0.8fr_1.2fr] lg:gap-20">

                <div>

                    <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-600">
                        Who We Are
                    </p>

                    <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl">
                        Built around quality, transparency, and long-term results.
                    </h2>

                </div>


                <div class="space-y-6 text-base leading-8 text-slate-600">

                    <p>
                        We design and install premium solar power systems for residential,
                        commercial, and industrial properties.
                    </p>

                    <p>
                        Our solutions include grid-tied and hybrid systems, net metering
                        assistance, battery backup solutions, post-installation maintenance,
                        and other smart energy integrations.
                    </p>

                    <p>
                        Every project is approached with technical precision and responsive
                        support, with the goal of delivering systems that are practical,
                        reliable, and built for long-term energy savings.
                    </p>

                </div>

            </div>

        </div>
    </section>


    <!-- =========================================================
         Mission & Vision
         ========================================================= -->

    <section class="py-20 lg:py-28">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <div class="grid gap-6 md:grid-cols-2">

                <!-- Mission -->
                <article class="rounded-3xl border border-slate-200 bg-white p-8 shadow-sm lg:p-10">

                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-solar-100 text-xl">
                        ☀️
                    </div>

                    <p class="mt-6 text-xs font-bold uppercase tracking-[.18em] text-solar-600">
                        Our Mission
                    </p>

                    <h2 class="mt-3 text-2xl font-extrabold tracking-tight text-slate-950">
                        Clean and reliable energy for more Filipinos.
                    </h2>

                    <p class="mt-5 leading-7 text-slate-600">
                        To empower Filipinos with clean, reliable, and cost-efficient solar
                        energy solutions—helping homes and businesses reduce their dependence
                        on grid power while contributing to a more sustainable future.
                    </p>

                </article>


                <!-- Vision -->
                <article class="rounded-3xl bg-slate-950 p-8 text-white shadow-sm lg:p-10">

                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-white/10 text-xl">
                        ⚡
                    </div>

                    <p class="mt-6 text-xs font-bold uppercase tracking-[.18em] text-solar-400">
                        Our Vision
                    </p>

                    <h2 class="mt-3 text-2xl font-extrabold tracking-tight">
                        A trusted name in solar across the Philippines.
                    </h2>

                    <p class="mt-5 leading-7 text-slate-300">
                        To become one of the Philippines' most trusted solar panel installers,
                        known for exceptional craftsmanship, premium system quality, and
                        long-term customer satisfaction across residential, commercial,
                        and industrial sectors.
                    </p>

                </article>

            </div>

        </div>
    </section>


    <!-- =========================================================
         Achievements
         ========================================================= -->

    <section class="bg-slate-950 py-20 text-white lg:py-24">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <div class="max-w-3xl">

                <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-400">
                    Our Achievements
                </p>

                <h2 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">
                    Growing experience backed by real solar work.
                </h2>

            </div>


            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">

                <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
                    <p class="text-3xl font-extrabold text-solar-400">
                        100kW+
                    </p>
                    <p class="mt-2 text-sm leading-6 text-slate-300">
                        Installed systems in Batangas and Pangasinan
                    </p>
                </div>


                <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
                    <p class="text-3xl font-extrabold text-solar-400">
                        120+
                    </p>
                    <p class="mt-2 text-sm leading-6 text-slate-300">
                        Hours of solar-related training
                    </p>
                </div>


                <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
                    <p class="text-3xl font-extrabold text-solar-400">
                        Premium
                    </p>
                    <p class="mt-2 text-sm leading-6 text-slate-300">
                        Partnerships with trusted solar brands
                    </p>
                </div>


                <div class="rounded-2xl border border-white/10 bg-white/5 p-6">
                    <p class="text-3xl font-extrabold text-solar-400">
                        Luzon
                    </p>
                    <p class="mt-2 text-sm leading-6 text-slate-300">
                        Helping clients reduce electricity costs across the region
                    </p>
                </div>

            </div>

        </div>
    </section>


    <!-- =========================================================
         Core Values
         ========================================================= -->

    <section class="py-20 lg:py-28">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <div class="mx-auto max-w-3xl text-center">

                <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-600">
                    Our Core Values
                </p>

                <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl">
                    What guides the way we work.
                </h2>

                <p class="mt-5 text-base leading-7 text-slate-600">
                    We focus on delivering solar solutions that are dependable,
                    transparent, efficient, and built to last.
                </p>

            </div>


            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-5">

                <?php
                $values = [
                    [
                        'title' => 'Quality',
                        'text'  => 'Reliable components and careful installation.',
                    ],
                    [
                        'title' => 'Integrity',
                        'text'  => 'Clear recommendations and honest communication.',
                    ],
                    [
                        'title' => 'Customer Care',
                        'text'  => 'Responsive support before and after installation.',
                    ],
                    [
                        'title' => 'Innovation',
                        'text'  => 'Modern solar and energy solutions for changing needs.',
                    ],
                    [
                        'title' => 'Sustainability',
                        'text'  => 'Cleaner energy choices with long-term value.',
                    ],
                ];
                ?>

                <?php foreach ($values as $value) : ?>

                    <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                        <h3 class="text-lg font-extrabold text-slate-950">
                            <?php echo esc_html($value['title']); ?>
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-slate-600">
                            <?php echo esc_html($value['text']); ?>
                        </p>

                    </article>

                <?php endforeach; ?>

            </div>

        </div>
    </section>


 <!-- =========================================================
     Leadership
     ========================================================= -->

<section class="bg-slate-50 py-20 lg:py-28">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">

        <!-- Section Header -->
        <div class="mx-auto max-w-3xl text-center">

            <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-600">
                Leadership
            </p>

            <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl">
                Meet the people behind SOL.ARE Solutions.
            </h2>

            <p class="mt-5 text-base leading-7 text-slate-600">
                Driven by a shared commitment to reliable solar solutions,
                technical excellence, and better energy choices for Filipinos.
            </p>

        </div>


        <!-- Leadership Cards -->
        <div class="mx-auto mt-14 grid max-w-4xl gap-8 md:grid-cols-2">

            <!-- =================================================
                 Arman Joseph Cataga
                 ================================================= -->

            <article
                class="group overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg"
            >

                <div class="overflow-hidden bg-slate-100">

                    <img
                        src="<?php echo esc_url(
                            $theme_uri . '/assets/images/team/arman-cataga.webp'
                        ); ?>"
                        alt="Arman Joseph Cataga"
                        class="aspect-[4/4.5] w-full object-cover object-top transition duration-500 group-hover:scale-[1.02]"
                    >

                </div>


                <div class="p-7 text-center sm:p-8">

                    <h3 class="text-xl font-extrabold text-slate-950">
                        Arman Joseph Cataga
                    </h3>

                    <p class="mt-2 text-sm font-bold text-solar-600">
                        Founder / Managing Partner
                    </p>

                </div>

            </article>


            <!-- =================================================
                 Rommel Lopena
                 ================================================= -->

            <article
                class="group overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-lg"
            >

                <div class="overflow-hidden bg-slate-100">

                    <img
                        src="<?php echo esc_url(
                            $theme_uri . '/assets/images/team/rommel-lopena.webp'
                        ); ?>"
                        alt="Rommel Lopena"
                        class="aspect-[4/4.5] w-full object-cover object-top transition duration-500 group-hover:scale-[1.02]"
                    >

                </div>


                <div class="p-7 text-center sm:p-8">

                    <h3 class="text-xl font-extrabold text-slate-950">
                        Rommel Lopena
                    </h3>

                    <p class="mt-2 text-sm font-bold text-solar-600">
                        Chief Marketing Officer / Partner
                    </p>

                </div>

            </article>

        </div>

    </div>
</section>

</main>

<?php
get_footer();