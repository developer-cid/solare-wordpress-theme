<?php get_header(); ?>

<?php
$theme_uri = get_template_directory_uri();

/**
 * Get an ACF field value with a fallback.
 *
 * The fallback keeps the website content visible even if
 * an ACF field has not been saved yet.
 */
function solare_home_field($field_name, $fallback = '')
{
    if (!function_exists('get_field')) {
        return $fallback;
    }

    $value = get_field($field_name);

    if ($value === null || $value === false || $value === '') {
        return $fallback;
    }

    return $value;
}

/**
 * Return an ACF image URL, with a theme image fallback.
 */
function solare_home_image($field_name, $fallback_path)
{
    $fallback = get_template_directory_uri() . $fallback_path;

    if (!function_exists('get_field')) {
        return $fallback;
    }

    $image = get_field($field_name);

    if (is_array($image) && !empty($image['url'])) {
        return $image['url'];
    }

    if (is_numeric($image)) {
        $url = wp_get_attachment_image_url((int) $image, 'full');
        return $url ?: $fallback;
    }

    if (is_string($image) && $image !== '') {
        return $image;
    }

    return $fallback;
}
?>



<main>

<section class="relative overflow-hidden bg-slate-50 pt-36 lg:pt-48">
  <div class="hero-grid absolute inset-x-0 top-0 h-[780px]"></div>
  <img src="<?php echo esc_url($theme_uri . '/assets/images/solare-mark.webp'); ?>" alt="" aria-hidden="true"
       class="pointer-events-none absolute -right-24 top-28 h-72 w-72 object-contain opacity-[0.055] lg:h-96 lg:w-96" />
  <div class="sun-glow absolute -right-40 top-16 h-[550px] w-[550px] rounded-full blur-3xl"></div>

  <div class="relative mx-auto max-w-7xl px-6 pb-20 lg:px-8 lg:pb-28">
    <div class="grid items-center gap-14 lg:grid-cols-[.92fr_1.08fr] lg:gap-20">
      <div class="hero-copy-enter">
        <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-solar-200 bg-solar-50 px-3.5 py-2 text-xs font-bold text-solar-700">
          <span class="h-1.5 w-1.5 rounded-full bg-solar-500"></span>
          <?php echo esc_html(solare_home_field(
              'home_hero_badge',
              'Premium Solar Panel Installer in the Philippines'
          )); ?>
        </div>

        <h1 class="max-w-2xl text-5xl font-extrabold leading-[1.02] tracking-[-.05em] text-slate-950 sm:text-6xl lg:text-7xl">
          <?php echo esc_html(solare_home_field(
              'home_hero_heading',
              'Take charge of'
          )); ?>
          <span class="text-solar-500">
            <?php echo esc_html(solare_home_field(
                'home_hero_highlight',
                'your energy.'
            )); ?>
          </span>
        </h1>

        <p class="mt-7 max-w-xl text-lg leading-8 text-slate-600">
          <?php echo esc_html(solare_home_field(
              'home_hero_description',
              'Cut your electricity bill, gain energy independence, and power your home or business with a solar system designed around the way you use energy.'
          )); ?>
        </p>

        <div class="mt-9 flex flex-col gap-3 sm:flex-row">
          <a
            href="#contact"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-950 px-6 py-3.5 text-sm font-bold text-white shadow-xl transition hover:-translate-y-0.5 hover:bg-slate-800"
          >
            <?php echo esc_html(solare_home_field(
                'home_hero_primary_button',
                'Get Your Free Quote'
            )); ?>

            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path
                d="M5 12h14M13 6l6 6-6 6"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </a>

          <a
            href="#services"
            class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-6 py-3.5 text-sm font-bold text-slate-700 shadow-sm hover:bg-slate-50"
          >
            <?php echo esc_html(solare_home_field(
                'home_hero_secondary_button',
                'Explore Solutions'
            )); ?>
          </a>
        </div>

        <div class="mt-9 grid max-w-xl grid-cols-3 gap-5 border-t border-slate-200 pt-7">
          <div>
            <p class="text-2xl font-extrabold text-slate-950">
              <?php echo esc_html(solare_home_field(
                  'home_hero_stat_1_value',
                  '100kW+'
              )); ?>
            </p>
            <p class="mt-1 text-xs leading-5 text-slate-500">
              <?php echo esc_html(solare_home_field(
                  'home_hero_stat_1_label',
                  'Systems installed'
              )); ?>
            </p>
          </div>

          <div>
            <p class="text-2xl font-extrabold text-slate-950">
              <?php echo esc_html(solare_home_field(
                  'home_hero_stat_2_value',
                  '4.9/5'
              )); ?>
            </p>
            <p class="mt-1 text-xs leading-5 text-slate-500">
              <?php echo esc_html(solare_home_field(
                  'home_hero_stat_2_label',
                  'Average rating'
              )); ?>
            </p>
          </div>

          <div>
            <p class="text-2xl font-extrabold text-slate-950">
              <?php echo esc_html(solare_home_field(
                  'home_hero_stat_3_value',
                  '40–50%'
              )); ?>
            </p>
            <p class="mt-1 text-xs leading-5 text-slate-500">
              <?php echo esc_html(solare_home_field(
                  'home_hero_stat_3_label',
                  'Typical bill savings'
              )); ?>
            </p>
          </div>
        </div>
      </div>

      <div class="relative hero-visual-enter hero-solar-float">
        <div class="absolute -inset-5 rounded-[2rem] bg-solar-400/20 blur-3xl"></div>
        <div class="relative overflow-hidden rounded-[2rem] border border-white bg-white shadow-soft">
          <img
            src="<?php echo esc_url(solare_home_image('home_hero_image', '/assets/images/installation-roof.webp')); ?>"
            alt="Solar panels installed on a rooftop"
            class="h-[420px] w-full object-cover sm:h-[500px]"
          />
          <div class="image-overlay absolute inset-0"></div>

          <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-8">
            <div class="max-w-md rounded-2xl border border-white/20 bg-slate-950/75 p-5 text-white backdrop-blur-md">
              <div class="flex items-center justify-between gap-5">
                <div>
                  <p class="text-xs font-semibold text-solar-300"><?php echo esc_html(solare_home_field('home_hero_image_label', 'SOL.ARE SOLUTIONS')); ?></p>
                  <p class="mt-1 text-lg font-bold"><?php echo esc_html(solare_home_field('home_hero_image_heading', 'Energy independence starts here.')); ?></p>
                </div>
                <div class="flex h-12 w-12 shrink-0 items-center justify-center overflow-hidden rounded-xl bg-black p-1.5">
                  <img src="<?php echo esc_url($theme_uri . '/assets/images/solare-mark.webp'); ?>" alt="" class="h-full w-full object-contain" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="absolute -bottom-5 -left-5 hidden rounded-2xl border border-slate-200 bg-white p-4 shadow-card sm:block">
          <div class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-green-50 text-brandgreen-600">
              <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="m5 12 4 4L19 6" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div>
              <p class="text-[10px] text-slate-400"><?php echo esc_html(solare_home_field('home_hero_built_for_label', 'Built for')); ?></p>
              <p class="text-sm font-bold"><?php echo esc_html(solare_home_field('home_hero_built_for_value', 'Homes & Businesses')); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="border-y border-slate-100 bg-white">
  <div class="mx-auto grid max-w-7xl gap-8 px-6 py-8 sm:grid-cols-3 lg:px-8">
    <div class="flex items-center gap-4">
      <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-solar-50 text-solar-600">
        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 12h18M12 3v18M5.5 5.5l13 13M18.5 5.5l-13 13"/></svg>
      </div>
      <div><p class="font-bold"><?php echo esc_html(solare_home_field('home_feature_1_title', 'Grid-Tied Systems')); ?></p><p class="text-xs text-slate-500"><?php echo esc_html(solare_home_field('home_feature_1_description', 'Reduce your daytime electricity costs')); ?></p></div>
    </div>
    <div class="flex items-center gap-4">
      <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-green-50 text-brandgreen-600">
        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="4" y="7" width="16" height="10" rx="2"/><path d="M8 17v2M16 17v2M8 11h.01M12 11h.01M16 11h.01"/></svg>
      </div>
      <div><p class="font-bold"><?php echo esc_html(solare_home_field('home_feature_2_title', 'Hybrid Solar Systems')); ?></p><p class="text-xs text-slate-500"><?php echo esc_html(solare_home_field('home_feature_2_description', 'Solar plus battery backup for outages')); ?></p></div>
    </div>
    <div class="flex items-center gap-4">
      <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3v18M5 8h14M5 16h14"/></svg>
      </div>
      <div><p class="font-bold"><?php echo esc_html(solare_home_field('home_feature_3_title', 'Custom Engineering')); ?></p><p class="text-xs text-slate-500"><?php echo esc_html(solare_home_field('home_feature_3_description', 'Designed around your property and usage')); ?></p></div>
    </div>
  </div>
</section>

<section id="services" class="scroll-mt-24 py-24 lg:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="max-w-2xl">
      <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-600"><?php echo esc_html(solare_home_field('home_services_label', 'Our Services')); ?></p>
      <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl">
        <?php echo esc_html(solare_home_field('home_services_heading', 'Solar solutions built around your energy needs.')); ?>
      </h2>
      <p class="mt-5 leading-7 text-slate-600">
        <?php echo esc_html(solare_home_field('home_services_description', 'From residential rooftops to commercial facilities, SOL.ARE SOLUTIONS provides tailored solar PV systems with professional installation and long-term support.')); ?>
      </p>
    </div>

    <div class="mt-14 grid gap-6 lg:grid-cols-2">
      <article class="service-card group relative min-h-[390px] overflow-hidden rounded-3xl">
        <img class="service-image absolute inset-0 h-full w-full object-cover"
          src="<?php echo esc_url(solare_home_image('home_service_1_image', '/assets/images/about-us-photo.webp')); ?>"
          alt="Solar panels on a residential property" />
        <div class="image-overlay absolute inset-0"></div>
        <div class="absolute inset-x-0 bottom-0 p-7 sm:p-9">
          <span class="inline-flex rounded-full bg-solar-400 px-3 py-1 text-[10px] font-extrabold uppercase tracking-wider text-slate-950">01</span>
          <h3 class="mt-4 text-2xl font-extrabold text-white"><?php echo esc_html(solare_home_field('home_service_1_title', 'Grid-Tied Solar Systems')); ?></h3>
          <p class="mt-3 max-w-xl text-sm leading-6 text-slate-200">
            <?php echo esc_html(solare_home_field('home_service_1_description', 'Connect your solar panels to the grid and use clean daytime generation to reduce your electricity bill. Net metering can help you receive credits for excess energy.')); ?>
          </p>
          <a href="#contact" class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-solar-300"><?php echo esc_html(solare_home_field('home_service_1_cta', 'Request a free assessment')); ?> <span>→</span></a>
        </div>
      </article>

      <article class="service-card group relative min-h-[390px] overflow-hidden rounded-3xl">
        <img class="service-image absolute inset-0 h-full w-full object-cover"
          src="<?php echo esc_url(solare_home_image('home_service_2_image', '/assets/images/installation-roof.webp')); ?>"
          alt="Solar battery energy storage system" />
        <div class="image-overlay absolute inset-0"></div>
        <div class="absolute inset-x-0 bottom-0 p-7 sm:p-9">
          <span class="inline-flex rounded-full bg-brandgreen-400 px-3 py-1 text-[10px] font-extrabold uppercase tracking-wider text-slate-950">02</span>
          <h3 class="mt-4 text-2xl font-extrabold text-white"><?php echo esc_html(solare_home_field('home_service_2_title', 'Hybrid Solar Systems')); ?></h3>
          <p class="mt-3 max-w-xl text-sm leading-6 text-slate-200">
            <?php echo esc_html(solare_home_field('home_service_2_description', 'Combine solar generation with battery storage for dependable backup power. Ideal for homes and businesses where brownouts and downtime are costly.')); ?>
          </p>
          <a href="#contact" class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-brandgreen-300"><?php echo esc_html(solare_home_field('home_service_2_cta', 'Build your backup system')); ?> <span>→</span></a>
        </div>
      </article>
    </div>

    <div class="mt-6 grid gap-6 md:grid-cols-3">
      <div class="rounded-2xl border border-slate-200 bg-slate-50 p-7">
        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-950 text-solar-400">
          <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 19h16M6 17V7l6-4 6 4v10M9 17v-4h6v4"/></svg>
        </div>
        <h3 class="mt-5 text-lg font-bold"><?php echo esc_html(solare_home_field('home_additional_service_1_title', 'Residential Solar')); ?></h3>
        <p class="mt-2 text-sm leading-6 text-slate-600"><?php echo esc_html(solare_home_field('home_additional_service_1_description', 'Right-sized systems for houses, rooftops, and families looking for long-term energy savings.')); ?></p>
      </div>
      <div class="rounded-2xl border border-slate-200 bg-slate-50 p-7">
        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-950 text-solar-400">
          <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 20V8l8-4 8 4v12M8 20v-6h8v6"/></svg>
        </div>
        <h3 class="mt-5 text-lg font-bold"><?php echo esc_html(solare_home_field('home_additional_service_2_title', 'Commercial & Industrial')); ?></h3>
        <p class="mt-2 text-sm leading-6 text-slate-600"><?php echo esc_html(solare_home_field('home_additional_service_2_description', 'Custom solar solutions for businesses and larger facilities with significant energy demand.')); ?></p>
      </div>
      <div class="rounded-2xl border border-slate-200 bg-slate-50 p-7">
        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-950 text-solar-400">
          <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3v18M3 12h18"/><circle cx="12" cy="12" r="8"/></svg>
        </div>
        <h3 class="mt-5 text-lg font-bold"><?php echo esc_html(solare_home_field('home_additional_service_3_title', 'After-Sales Support')); ?></h3>
        <p class="mt-2 text-sm leading-6 text-slate-600"><?php echo esc_html(solare_home_field('home_additional_service_3_description', 'Maintenance, battery backup support, monitoring, and practical guidance after installation.')); ?></p>
      </div>
    </div>
  </div>
</section>

<section id="about" class="scroll-mt-24 overflow-hidden bg-slate-950 py-24 text-white lg:py-32">
  <div class="mx-auto grid max-w-7xl items-center gap-14 px-6 lg:grid-cols-[.9fr_1.1fr] lg:gap-24 lg:px-8">
    <div class="relative">
      <div class="absolute -inset-6 rounded-3xl bg-solar-400/10 blur-3xl"></div>
      <div class="relative overflow-hidden rounded-3xl border border-white/10">
        <img src="<?php echo esc_url(solare_home_image('home_about_image', '/assets/images/about-us-photo.webp')); ?>"
          alt="Solar installation on a modern home" class="h-[500px] w-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
        <div class="absolute bottom-6 left-6 right-6 rounded-2xl border border-white/10 bg-white/10 p-5 backdrop-blur-md">
          <p class="text-xs font-bold uppercase tracking-wider text-solar-300"><?php echo esc_html(solare_home_field('home_about_mission_label', 'Our mission')); ?></p>
          <p class="mt-2 text-lg font-bold"><?php echo esc_html(solare_home_field('home_about_mission', 'Empowering Filipinos with clean, reliable, cost-efficient energy.')); ?></p>
        </div>
      </div>
    </div>

    <div>
      <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-400"><?php echo esc_html(solare_home_field('home_about_label', 'About SOL.ARE')); ?></p>
      <h2 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">
        <?php echo esc_html(solare_home_field('home_about_heading', 'A trusted partner for a more energy-independent future.')); ?>
      </h2>
      <p class="mt-6 leading-7 text-slate-300">
        <?php echo esc_html(solare_home_field('home_about_paragraph_1', 'SOL.ARE SOLUTIONS is a professional solar panel installer founded in 2024 and based in Las Piñas City. The team designs and installs premium grid-tied and hybrid systems for residential, commercial, and industrial clients.')); ?>
      </p>
      <p class="mt-5 leading-7 text-slate-300">
        <?php echo esc_html(solare_home_field('home_about_paragraph_2', 'The company focuses on technical precision, transparency, high-quality components, long-term support, and practical solutions that help customers reduce electricity costs while improving energy reliability.')); ?>
      </p>

      <div class="mt-9 grid gap-4 sm:grid-cols-2">
        <div class="rounded-2xl border border-white/10 bg-white/[.04] p-5">
          <p class="text-2xl font-extrabold text-solar-400"><?php echo esc_html(solare_home_field('home_about_achievement_1_value', '100kW+')); ?></p>
          <p class="mt-1 text-sm text-slate-400"><?php echo esc_html(solare_home_field('home_about_achievement_1_description', 'Systems installed in Batangas & Pangasinan')); ?></p>
        </div>
        <div class="rounded-2xl border border-white/10 bg-white/[.04] p-5">
          <p class="text-2xl font-extrabold text-solar-400"><?php echo esc_html(solare_home_field('home_about_achievement_2_value', '120+ hrs')); ?></p>
          <p class="mt-1 text-sm text-slate-400"><?php echo esc_html(solare_home_field('home_about_achievement_2_description', 'Solar training completed')); ?></p>
        </div>
      </div>

      <div class="mt-8 flex flex-wrap gap-2">
        <span class="rounded-full border border-white/10 px-3 py-1.5 text-xs font-semibold text-slate-300">Quality</span>
        <span class="rounded-full border border-white/10 px-3 py-1.5 text-xs font-semibold text-slate-300">Integrity</span>
        <span class="rounded-full border border-white/10 px-3 py-1.5 text-xs font-semibold text-slate-300">Customer Care</span>
        <span class="rounded-full border border-white/10 px-3 py-1.5 text-xs font-semibold text-slate-300">Innovation</span>
        <span class="rounded-full border border-white/10 px-3 py-1.5 text-xs font-semibold text-slate-300">Sustainability</span>
      </div>

      <a
        href="<?php echo esc_url(home_url('/about-us/')); ?>"
        class="mt-8 inline-flex items-center gap-2 text-sm font-bold text-solar-300 transition hover:text-solar-200"
      >
        <?php echo esc_html(solare_home_field('home_about_button', 'Learn More About Us')); ?> <span aria-hidden="true">→</span>
      </a>
    </div>
  </div>
</section>

<section id="process" class="scroll-mt-24 py-24 lg:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl text-center">
      <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-600"><?php echo esc_html(solare_home_field('home_process_label', 'How It Works')); ?></p>
      <h2 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl"><?php echo esc_html(solare_home_field('home_process_heading', 'From your first inquiry to clean energy.')); ?></h2>
      <p class="mt-5 leading-7 text-slate-600"><?php echo esc_html(solare_home_field('home_process_description', 'A straightforward process designed to make your transition to solar clear and stress-free.')); ?></p>
    </div>

    <div class="relative mt-16 grid gap-8 md:grid-cols-4">
      <div class="hidden absolute left-[12%] right-[12%] top-7 h-px bg-slate-200 md:block"></div>
      <div class="relative">
        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-950 text-lg font-extrabold text-solar-400">01</div>
        <h3 class="mt-5 text-center font-bold"><?php echo esc_html(solare_home_field('home_process_step_1_title', 'Tell us your needs')); ?></h3>
        <p class="mt-2 text-center text-sm leading-6 text-slate-500"><?php echo esc_html(solare_home_field('home_process_step_1_description', 'Share your location, electricity usage, goals, and recent bills.')); ?></p>
      </div>
      <div class="relative">
        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-solar-400 text-lg font-extrabold text-slate-950">02</div>
        <h3 class="mt-5 text-center font-bold"><?php echo esc_html(solare_home_field('home_process_step_2_title', 'System assessment')); ?></h3>
        <p class="mt-2 text-center text-sm leading-6 text-slate-500"><?php echo esc_html(solare_home_field('home_process_step_2_description', 'Our team evaluates your property and designs a system around your consumption.')); ?></p>
      </div>
      <div class="relative">
        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-950 text-lg font-extrabold text-solar-400">03</div>
        <h3 class="mt-5 text-center font-bold"><?php echo esc_html(solare_home_field('home_process_step_3_title', 'Proposal & installation')); ?></h3>
        <p class="mt-2 text-center text-sm leading-6 text-slate-500"><?php echo esc_html(solare_home_field('home_process_step_3_description', 'Review your proposal, finalize the system, and let our team handle installation.')); ?></p>
      </div>
      <div class="relative">
        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-brandgreen-500 text-lg font-extrabold text-white">04</div>
        <h3 class="mt-5 text-center font-bold"><?php echo esc_html(solare_home_field('home_process_step_4_title', 'Power your future')); ?></h3>
        <p class="mt-2 text-center text-sm leading-6 text-slate-500"><?php echo esc_html(solare_home_field('home_process_step_4_description', 'Start generating clean energy and receive continued support after installation.')); ?></p>
      </div>
    </div>
  </div>
</section>

<section class="bg-solar-50 py-20">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="grid gap-8 lg:grid-cols-[1.2fr_.8fr] lg:items-center">
      <div>
        <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-700"><?php echo esc_html(solare_home_field('home_why_solar_label', 'Why Go Solar?')); ?></p>
        <h2 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl"><?php echo esc_html(solare_home_field('home_why_solar_heading', 'Save money today. Build resilience for tomorrow.')); ?></h2>
        <p class="mt-5 max-w-2xl leading-7 text-slate-600">
          <?php echo esc_html(solare_home_field('home_why_solar_description', 'Solar can help make your electricity costs more predictable while reducing dependence on the grid. SOL.ARE provides a personalized ROI forecast so you can understand the potential return before installation.')); ?>
        </p>
      </div>
      <div class="rounded-3xl bg-slate-950 p-7 text-white shadow-soft">
        <p class="text-xs font-bold uppercase tracking-wider text-solar-300"><?php echo esc_html(solare_home_field('home_why_solar_outcome_label', 'Typical customer outcome')); ?></p>
        <p class="mt-3 text-4xl font-extrabold"><?php echo esc_html(solare_home_field('home_why_solar_outcome_value', '40–50%')); ?></p>
        <p class="mt-2 text-sm leading-6 text-slate-300"><?php echo esc_html(solare_home_field('home_why_solar_outcome_description', 'Potential monthly electricity-bill savings, depending on system size, energy usage, and net-metering arrangements.')); ?></p>
      </div>
    </div>
  </div>
</section>

<section id="projects" class="scroll-mt-24 py-24 lg:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
      <div>
        <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-600"><?php echo esc_html(solare_home_field('home_insights_label', 'Projects & Insights')); ?></p>
        <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl"><?php echo esc_html(solare_home_field('home_insights_heading', 'Ideas, installations, and a cleaner future.')); ?></h2>
      </div>
      <a href="#contact" class="text-sm font-bold text-slate-700 hover:text-solar-600"><?php echo esc_html(solare_home_field('home_insights_top_cta', 'Talk to a solar specialist →')); ?></a>
    </div>

    <?php
    $insights_query = new WP_Query([
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 2,
        'post_name__in'  => [
            'how-the-philippines-plans-to-transition-to-50-renewable-energy-by-2040',
            'climate-change-and-energy-why-renewable-energy-is-a-necessity-not-a-luxury',
        ],
        'orderby'        => 'post_name__in',
    ]);
    ?>

    <div class="mt-14 grid gap-6 lg:grid-cols-3">
      <?php if ($insights_query->have_posts()) : ?>
        <?php while ($insights_query->have_posts()) : ?>
          <?php $insights_query->the_post(); ?>

          <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
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
              <?php endif; ?>
            </a>

            <div class="p-6">
              <?php
              $categories    = get_the_category();
              $category_name = !empty($categories)
                  ? $categories[0]->name
                  : 'Insights';
              ?>

              <p class="text-[10px] font-bold uppercase tracking-wider text-solar-600">
                <?php echo esc_html($category_name); ?>
              </p>

              <h3 class="mt-4 text-lg font-bold leading-7 text-slate-950">
                <a href="<?php the_permalink(); ?>" class="transition hover:text-solar-600">
                  <?php the_title(); ?>
                </a>
              </h3>

              <div class="mt-3 text-sm leading-6 text-slate-500">
                <?php
                echo esc_html(
                    wp_trim_words(
                        get_the_excerpt() ?: get_the_content(),
                        22
                    )
                );
                ?>
              </div>

              <p class="mt-5 text-xs font-semibold text-slate-400">
                <?php echo esc_html(get_the_date('F j, Y')); ?>
              </p>
            </div>
          </article>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>
      <?php else : ?>
        <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-6 lg:col-span-2">
          <p class="text-sm font-semibold text-slate-700">No blog posts available yet.</p>
          <p class="mt-2 text-sm text-slate-500">Add posts from WordPress Admin → Posts.</p>
        </div>
      <?php endif; ?>

      <article class="flex min-h-[480px] flex-col justify-between rounded-2xl bg-slate-950 p-7 text-white shadow-sm">
        <div>
          <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-solar-400 text-slate-950">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
              <circle cx="12" cy="12" r="3"></circle>
              <path d="M12 2v2M12 20v2M4.93 4.93l1.42 1.42M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.42-1.42M17.66 6.34l1.41-1.41"></path>
            </svg>
          </div>

          <p class="mt-8 text-xs font-bold uppercase tracking-wider text-solar-400"><?php echo esc_html(solare_home_field('home_insights_property_label', 'Your Property')); ?></p>

          <h3 class="mt-4 max-w-sm text-2xl font-extrabold leading-tight">
            <?php echo esc_html(solare_home_field('home_insights_property_heading', 'See what solar could look like for you.')); ?>
          </h3>

          <p class="mt-4 max-w-sm text-sm leading-6 text-slate-300">
            <?php echo esc_html(solare_home_field('home_insights_property_description', 'Request a free assessment and get a proposal tailored to your energy consumption.')); ?>
          </p>
        </div>

        <div class="mt-8">
          <a href="#contact" class="inline-flex rounded-xl bg-white px-5 py-3 text-sm font-bold text-slate-950 transition hover:bg-slate-100">
            <?php echo esc_html(solare_home_field('home_insights_property_cta', 'Request Assessment')); ?>
          </a>
        </div>
      </article>
    </div>
  </div>
</section>

<section id="testimonials" class="scroll-mt-24 bg-slate-950 py-24 text-white lg:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl text-center">
      <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-400"><?php echo esc_html(solare_home_field('home_testimonials_label', 'Client Feedback')); ?></p>
      <h2 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl"><?php echo esc_html(solare_home_field('home_testimonials_heading', 'Trusted by customers making the switch.')); ?></h2>
    </div>

    <?php
    $testimonials_query = new WP_Query([
        'post_type'      => 'solare_testimonial',
        'post_status'    => 'publish',
        'posts_per_page' => 3,
        'orderby'        => [
            'menu_order' => 'ASC',
            'date'       => 'DESC',
        ],
    ]);
    ?>

    <?php if ($testimonials_query->have_posts()) : ?>
      <div class="mt-14 grid gap-6 lg:grid-cols-3">
        <?php while ($testimonials_query->have_posts()) : ?>
          <?php
          $testimonials_query->the_post();
          $rating = function_exists('get_field') ? (int) get_field('testimonial_rating') : 5;
          if ($rating < 1 || $rating > 5) { $rating = 5; }
          $customer_role = function_exists('get_field') ? trim((string) get_field('testimonial_customer_role')) : '';
          if ($customer_role === '') { $customer_role = 'Customer'; }
          $review = trim(wp_strip_all_tags(get_the_content()));
          ?>
          <blockquote class="rounded-2xl border border-white/10 bg-white/[.04] p-7">
            <div class="text-solar-400" aria-label="<?php echo esc_attr($rating . ' out of 5 stars'); ?>">
              <?php echo esc_html(str_repeat('★', $rating) . str_repeat('☆', 5 - $rating)); ?>
            </div>
            <p class="mt-6 text-sm leading-7 text-slate-300">“<?php echo esc_html($review); ?>”</p>
            <footer class="mt-7">
              <p class="text-sm font-bold"><?php echo esc_html(get_the_title()); ?></p>
              <p class="text-xs text-slate-500"><?php echo esc_html($customer_role); ?></p>
            </footer>
          </blockquote>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </div>
    <?php else : ?>
      <div class="mx-auto mt-14 max-w-2xl rounded-2xl border border-white/10 bg-white/[.04] p-7 text-center">
        <p class="text-sm text-slate-400">Customer testimonials will appear here once they are added and published in WordPress.</p>
      </div>
    <?php endif; ?>
  </div>
</section>

<section id="faq" class="scroll-mt-24 py-24 lg:py-32">
  <div class="mx-auto grid max-w-7xl gap-14 px-6 lg:grid-cols-[.75fr_1.25fr] lg:px-8">
    <div>
      <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-600"><?php echo esc_html(solare_home_field('home_faq_label', 'FAQ')); ?></p>
      <h2 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl"><?php echo esc_html(solare_home_field('home_faq_heading', 'Questions before going solar?')); ?></h2>
      <p class="mt-5 leading-7 text-slate-600"><?php echo esc_html(solare_home_field('home_faq_description', 'Here are answers to some of the most common questions about SOL.ARE SOLUTIONS and solar installation.')); ?></p>
      <a href="#contact" class="mt-7 inline-flex rounded-xl bg-slate-950 px-5 py-3 text-sm font-bold text-white"><?php echo esc_html(solare_home_field('home_faq_cta', 'Ask Our Team')); ?></a>
    </div>

    <?php
$faq_query = new WP_Query([
    'post_type'      => 'solare_faq',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => [
        'menu_order' => 'ASC',
        'date'       => 'ASC',
    ],
]);
?>

<div class="space-y-3">

    <?php if ($faq_query->have_posts()) : ?>

        <?php while ($faq_query->have_posts()) : ?>
            <?php $faq_query->the_post(); ?>

            <div class="faq-item rounded-2xl border border-slate-200 bg-white">

                <button
                    class="faq-button flex w-full items-center justify-between gap-6 p-5 text-left"
                    type="button"
                    aria-expanded="false"
                >
                    <span class="font-bold">
                        <?php echo esc_html(get_the_title()); ?>
                    </span>

                    <span
                        class="faq-icon flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-lg"
                        aria-hidden="true"
                    >
                        +
                    </span>
                </button>

                <div class="faq-content px-5">
                    <div class="faq-answer pb-5 text-sm leading-6 text-slate-600">
                        <?php
                        $faq_answer = get_the_content();
                        echo wp_kses_post(wpautop($faq_answer));
                        ?>
                    </div>
                </div>

            </div>

        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

    <?php else : ?>

        <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 p-6">
            <p class="text-sm text-slate-600">
                No FAQs available yet.
            </p>
        </div>

    <?php endif; ?>

</div>
  </div>
</section>

<?php get_template_part('template-parts/contact-section'); ?>

</main>

<?php get_footer(); ?>