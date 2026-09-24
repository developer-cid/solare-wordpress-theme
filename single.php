<?php
get_header();

while (have_posts()) :
    the_post();

    $categories = get_the_category();
    $category_name = !empty($categories)
        ? $categories[0]->name
        : 'Insights';

    $word_count = str_word_count(
        wp_strip_all_tags(get_the_content())
    );

    $reading_time = max(
        1,
        (int) ceil($word_count / 200)
    );
?>

<main class="pt-32 lg:pt-40">

    <article>

        <section class="pb-20 lg:pb-28">
            <div class="mx-auto max-w-4xl px-6 lg:px-8">

                <a
                    href="<?php echo esc_url(home_url('/#projects')); ?>"
                    class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-solar-600"
                >
                    ← Back to Insights
                </a>

                <header class="mt-10">

                    <p class="text-xs font-bold uppercase tracking-[.2em] text-solar-600">
                        <?php echo esc_html($category_name); ?>
                    </p>

                    <h1 class="mt-4 max-w-3xl text-4xl font-extrabold leading-[1.08] tracking-tight text-slate-950 sm:text-5xl lg:text-[3.25rem]">
                        <?php the_title(); ?>
                    </h1>

                    <div class="mt-5 flex flex-wrap items-center gap-x-3 gap-y-2 text-sm text-slate-400">

                        <span>
                            <?php echo esc_html(get_the_date('F j, Y')); ?>
                        </span>

                        <span aria-hidden="true">•</span>

                        <span>
                            <?php echo esc_html($reading_time . ' min read'); ?>
                        </span>

                    </div>

                    <?php if (has_excerpt()) : ?>

                        <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-600">
                            <?php echo esc_html(get_the_excerpt()); ?>
                        </p>

                    <?php endif; ?>

                </header>

                <?php if (has_post_thumbnail()) : ?>

                    <div class="mt-10 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

                        <?php
                        the_post_thumbnail(
                            'full',
                            [
                                'class' => 'aspect-[16/9] w-full object-cover',
                                'alt'   => esc_attr(get_the_title()),
                            ]
                        );
                        ?>

                    </div>

                <?php endif; ?>

                <div class="solare-article-content mt-12">
                    <?php the_content(); ?>
                </div>

                <div class="pt-20 pb-16 lg:pt-28 lg:pb-24">
                    <?php get_template_part('template-parts/contact-section'); ?>
                </div>

            </div>
        </section>

    </article>

</main>

<?php
endwhile;

get_footer();