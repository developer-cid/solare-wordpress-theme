<?php
/*
Template Name: Projects
*/

get_header();

$projects_query = new WP_Query([
    'post_type'      => 'solare_project',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => 'date',
    'order'          => 'DESC',
]);
?>

<main class="pt-32 lg:pt-40">

    <section class="pb-20 lg:pb-28">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <div class="max-w-3xl">

                <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-600">
                    Our Projects
                </p>

                <h1 class="mt-4 text-4xl font-extrabold tracking-tight text-slate-950 sm:text-5xl">
                    Solar installations built for real energy needs.
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-600">
                    Explore residential, commercial, and hybrid solar projects delivered by SOL.ARE SOLUTIONS.
                </p>

            </div>

            <div class="mt-14 grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                <?php if ($projects_query->have_posts()) : ?>

                    <?php while ($projects_query->have_posts()) : ?>
                        <?php
                        $projects_query->the_post();

                        $project_location = get_field('project_location');
                        $system_size      = get_field('system_size');
                        $system_type      = get_field('system_type');
                        ?>

                        <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-md">

                            <a href="<?php the_permalink(); ?>" class="block">

                                <?php if (has_post_thumbnail()) : ?>

                                    <?php
                                    the_post_thumbnail(
                                        'large',
                                        [
                                            'class' => 'h-56 w-full object-cover',
                                            'alt'   => esc_attr(get_the_title()),
                                        ]
                                    );
                                    ?>

                                <?php else : ?>

                                    <div class="flex h-56 items-center justify-center bg-slate-100 text-sm text-slate-400">
                                        No project image
                                    </div>

                                <?php endif; ?>

                            </a>

                            <div class="p-6">

                                <?php if ($system_type || $system_size) : ?>

                                    <div class="flex flex-wrap items-center gap-2 text-[10px] font-bold uppercase tracking-wider text-solar-600">

                                        <?php if ($system_type) : ?>
                                            <span>
                                                <?php echo esc_html($system_type); ?>
                                            </span>
                                        <?php endif; ?>

                                        <?php if ($system_type && $system_size) : ?>
                                            <span>•</span>
                                        <?php endif; ?>

                                        <?php if ($system_size) : ?>
                                            <span>
                                                <?php echo esc_html($system_size); ?> kW
                                            </span>
                                        <?php endif; ?>

                                    </div>

                                <?php endif; ?>

                                <h2 class="mt-3 text-xl font-extrabold leading-snug text-slate-950">

                                    <a
                                        href="<?php the_permalink(); ?>"
                                        class="transition hover:text-solar-600"
                                    >
                                        <?php the_title(); ?>
                                    </a>

                                </h2>

                                <?php if ($project_location) : ?>

                                    <p class="mt-3 text-sm font-semibold text-slate-400">
                                        📍 <?php echo esc_html($project_location); ?>
                                    </p>

                                <?php endif; ?>

                                <div class="mt-4 text-sm leading-6 text-slate-500">

                                    <?php
                                    echo esc_html(
                                        wp_trim_words(
                                            get_the_excerpt() ?: get_the_content(),
                                            24
                                        )
                                    );
                                    ?>

                                </div>

                                <a
                                    href="<?php the_permalink(); ?>"
                                    class="mt-5 inline-flex text-sm font-bold text-slate-700 transition hover:text-solar-600"
                                >
                                    View Project →
                                </a>

                            </div>

                        </article>

                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>

                <?php else : ?>

                    <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-8 md:col-span-2 lg:col-span-3">

                        <p class="font-bold text-slate-800">
                            No projects available yet.
                        </p>

                        <p class="mt-2 text-sm text-slate-500">
                             We're preparing our latest solar installations for you to explore. Check back soon to see our completed projects.
                        </p>

                    </div>

                <?php endif; ?>

            </div>

        </div>
    </section>
    <div class="px-6 pt-20 pb-16 lg:px-8 lg:pt-28 lg:pb-24">
        <?php get_template_part('template-parts/contact-section'); ?>
    </div>

</main>

<?php
get_footer();