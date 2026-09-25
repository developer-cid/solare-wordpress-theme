<?php
/**
 * Posts page / Insights listing.
 *
 * @package Solare
 */

get_header();

$insights_page_id = (int) get_option('page_for_posts');
$insights_title = $insights_page_id ? get_the_title($insights_page_id) : 'Insights';
$insights_intro = $insights_page_id ? get_post_field('post_content', $insights_page_id) : '';

$paged = max(1, get_query_var('paged'), get_query_var('page'));

$insights_query = new WP_Query([
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'posts_per_page' => 9,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
]);
?>

<main class="pt-32 lg:pt-40">
    <section class="pb-20 lg:pb-28">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">

            <header class="max-w-3xl">
                <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-600">
                    Insights
                </p>
                <h1 class="mt-4 text-4xl font-extrabold tracking-tight text-slate-950 sm:text-5xl">
                    <?php echo esc_html($insights_title); ?>
                </h1>
                <?php if (trim(wp_strip_all_tags($insights_intro))) : ?>
                    <div class="solare-article-content mt-6 max-w-2xl text-lg leading-8 text-slate-600">
                        <?php echo apply_filters('the_content', $insights_intro); ?>
                    </div>
                <?php endif; ?>
            </header>

            <?php if ($insights_query->have_posts()) : ?>
                <div class="mt-14 grid gap-7 md:grid-cols-2 lg:grid-cols-3">
                    <?php while ($insights_query->have_posts()) : $insights_query->the_post(); ?>
                        <?php
                        $categories = get_the_category();
                        $category_name = !empty($categories) ? $categories[0]->name : 'Insights';
                        $word_count = str_word_count(wp_strip_all_tags(get_the_content()));
                        $reading_time = max(1, (int) ceil($word_count / 200));
                        ?>

                        <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                            <a href="<?php the_permalink(); ?>" class="block">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php
                                    the_post_thumbnail('large', [
                                        'class' => 'aspect-[16/9] w-full object-cover',
                                        'alt'   => esc_attr(get_the_title()),
                                    ]);
                                    ?>
                                <?php else : ?>
                                    <div class="flex aspect-[16/9] w-full items-center justify-center bg-slate-100 px-6 text-center text-sm font-semibold text-slate-400">
                                        SOL.ARE Insights
                                    </div>
                                <?php endif; ?>
                            </a>

                            <div class="p-6">
                                <p class="text-[10px] font-bold uppercase tracking-[.18em] text-solar-600">
                                    <?php echo esc_html($category_name); ?>
                                </p>

                                <h2 class="mt-3 text-xl font-extrabold leading-snug text-slate-950">
                                    <a href="<?php the_permalink(); ?>" class="transition hover:text-solar-600">
                                        <?php the_title(); ?>
                                    </a>
                                </h2>

                                <p class="mt-4 text-sm leading-6 text-slate-500">
                                    <?php echo esc_html(wp_trim_words(get_the_excerpt() ?: get_the_content(), 24)); ?>
                                </p>

                                <div class="mt-5 flex items-center justify-between gap-4 border-t border-slate-100 pt-5">
                                    <span class="text-xs font-semibold text-slate-400">
                                        <?php echo esc_html($reading_time . ' min read'); ?>
                                    </span>
                                    <a href="<?php the_permalink(); ?>" class="text-sm font-bold text-slate-700 transition hover:text-solar-600">
                                        Read Article →
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>

                <?php
                $pagination = paginate_links([
                    'total'     => $insights_query->max_num_pages,
                    'current'   => $paged,
                    'type'      => 'array',
                    'prev_text' => '← Previous',
                    'next_text' => 'Next →',
                ]);
                ?>

                <?php if (!empty($pagination)) : ?>
                    <nav class="mt-12 flex flex-wrap justify-center gap-2" aria-label="Insights pagination">
                        <?php foreach ($pagination as $link) : ?>
                            <span class="rounded-lg border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-700">
                                <?php echo wp_kses_post($link); ?>
                            </span>
                        <?php endforeach; ?>
                    </nav>
                <?php endif; ?>

                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <div class="mt-14 rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-8">
                    <p class="font-bold text-slate-800">No insights published yet.</p>
                    <p class="mt-2 text-sm text-slate-500">New solar guides and practical energy articles will appear here.</p>
                </div>
            <?php endif; ?>

        </div>
    </section>

    <div class="mx-auto max-w-7xl px-6 pb-16 lg:px-8 lg:pb-24">
        <?php get_template_part('template-parts/contact-section'); ?>
    </div>
</main>

<?php get_footer(); ?>
