<?php
get_header();

while (have_posts()) :
    the_post();

    $project_location  = get_field('project_location');
    $system_size       = get_field('system_size');
    $system_type       = get_field('system_type');
    $battery_capacity  = get_field('battery_capacity');
    $installation_date = get_field('installation_date');
?>

<main class="pt-32 lg:pt-40">

    <section class="pb-16 lg:pb-24">
        <div class="mx-auto max-w-6xl px-6 lg:px-8">

            <a
                href="<?php echo esc_url(home_url('/#projects')); ?>"
                class="inline-flex items-center gap-2 text-sm font-bold text-slate-600 hover:text-solar-600"
            >
                ← Back to Projects
            </a>

            <div class="mt-8">

                <?php if ($system_type || $system_size) : ?>
                    <div class="flex flex-wrap items-center gap-2 text-xs font-bold uppercase tracking-[.16em] text-solar-600">

                        <?php if ($system_type) : ?>
                            <span><?php echo esc_html($system_type); ?></span>
                        <?php endif; ?>

                        <?php if ($system_type && $system_size) : ?>
                            <span>•</span>
                        <?php endif; ?>

                        <?php if ($system_size) : ?>
                            <span><?php echo esc_html($system_size); ?> kW</span>
                        <?php endif; ?>

                    </div>
                <?php endif; ?>

                <h1 class="mt-4 max-w-4xl text-4xl font-extrabold tracking-tight text-slate-950 sm:text-5xl lg:text-6xl">
                    <?php the_title(); ?>
                </h1>

                <?php if ($project_location) : ?>
                    <p class="mt-5 text-base font-semibold text-slate-500">
                        📍 <?php echo esc_html($project_location); ?>
                    </p>
                <?php endif; ?>

            </div>

            <?php if (has_post_thumbnail()) : ?>
                <div class="mt-10 overflow-hidden rounded-3xl border border-slate-200 shadow-soft">
                    <?php
                    the_post_thumbnail(
                        'full',
                        [
                            'class' => 'h-auto w-full object-cover',
                            'alt'   => esc_attr(get_the_title()),
                        ]
                    );
                    ?>
                </div>
            <?php endif; ?>

        </div>
    </section>


    <section class="border-t border-slate-100 py-16 lg:py-24">
        <div class="mx-auto grid max-w-6xl gap-12 px-6 lg:grid-cols-[1.4fr_.6fr] lg:px-8">

            <div>
                <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-600">
                    Project Overview
                </p>

                <div class="prose prose-slate mt-6 max-w-none">
                    <?php the_content(); ?>
                </div>
            </div>


            <aside>
                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-6">

                    <h2 class="text-lg font-extrabold text-slate-950">
                        Project Details
                    </h2>

                    <dl class="mt-6 space-y-5 text-sm">

                        <?php if ($project_location) : ?>
                            <div>
                                <dt class="text-slate-400">Location</dt>
                                <dd class="mt-1 font-bold text-slate-800">
                                    <?php echo esc_html($project_location); ?>
                                </dd>
                            </div>
                        <?php endif; ?>

                        <?php if ($system_size) : ?>
                            <div>
                                <dt class="text-slate-400">System Size</dt>
                                <dd class="mt-1 font-bold text-slate-800">
                                    <?php echo esc_html($system_size); ?> kW
                                </dd>
                            </div>
                        <?php endif; ?>

                        <?php if ($system_type) : ?>
                            <div>
                                <dt class="text-slate-400">System Type</dt>
                                <dd class="mt-1 font-bold text-slate-800">
                                    <?php echo esc_html($system_type); ?>
                                </dd>
                            </div>
                        <?php endif; ?>

                        <?php if ($battery_capacity) : ?>
                            <div>
                                <dt class="text-slate-400">Battery Capacity</dt>
                                <dd class="mt-1 font-bold text-slate-800">
                                    <?php echo esc_html($battery_capacity); ?>
                                </dd>
                            </div>
                        <?php endif; ?>

                        <?php if ($installation_date) : ?>
                            <div>
                                <dt class="text-slate-400">Installation Date</dt>
                                <dd class="mt-1 font-bold text-slate-800">
                                    <?php
                                    echo esc_html(
                                        wp_date(
                                            'F j, Y',
                                            strtotime($installation_date)
                                        )
                                    );
                                    ?>
                                </dd>
                            </div>
                        <?php endif; ?>

                    </dl>

                </div>
            </aside>

        </div>
    </section>

    <div class="px-6 pt-20 pb-16 lg:px-8 lg:pt-28 lg:pb-24">
        <?php get_template_part('template-parts/contact-section'); ?>
    </div>

</main>

<?php
endwhile;

get_footer();