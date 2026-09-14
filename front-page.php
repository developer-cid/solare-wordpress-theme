<?php get_header(); ?>

<?php
$theme_uri = get_template_directory_uri();
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
          Premium Solar Panel Installer in the Philippines
        </div>

        <h1 class="max-w-2xl text-5xl font-extrabold leading-[1.02] tracking-[-.05em] text-slate-950 sm:text-6xl lg:text-7xl">
          Take charge of
          <span class="text-solar-500">your energy.</span>
        </h1>

        <p class="mt-7 max-w-xl text-lg leading-8 text-slate-600">
          Cut your electricity bill, gain energy independence, and power your home or business with a solar system designed around the way you use energy.
        </p>

        <div class="mt-9 flex flex-col gap-3 sm:flex-row">
          <a href="#contact" class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-950 px-6 py-3.5 text-sm font-bold text-white shadow-xl transition hover:-translate-y-0.5 hover:bg-slate-800">
            Get Your Free Quote
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M5 12h14M13 6l6 6-6 6" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
          <a href="#services" class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-6 py-3.5 text-sm font-bold text-slate-700 shadow-sm hover:bg-slate-50">
            Explore Solutions
          </a>
        </div>

        <div class="mt-9 grid max-w-xl grid-cols-3 gap-5 border-t border-slate-200 pt-7">
          <div>
            <p class="text-2xl font-extrabold text-slate-950">100kW+</p>
            <p class="mt-1 text-xs leading-5 text-slate-500">Systems installed</p>
          </div>
          <div>
            <p class="text-2xl font-extrabold text-slate-950">4.9/5</p>
            <p class="mt-1 text-xs leading-5 text-slate-500">Average rating</p>
          </div>
          <div>
            <p class="text-2xl font-extrabold text-slate-950">40–50%</p>
            <p class="mt-1 text-xs leading-5 text-slate-500">Typical bill savings</p>
          </div>
        </div>
      </div>

      <div class="relative hero-visual-enter hero-solar-float">
        <div class="absolute -inset-5 rounded-[2rem] bg-solar-400/20 blur-3xl"></div>
        <div class="relative overflow-hidden rounded-[2rem] border border-white bg-white shadow-soft">
          <img
            src="<?php echo esc_url($theme_uri . '/assets/images/installation-roof.webp'); ?>"
            alt="Solar panels installed on a rooftop"
            class="h-[420px] w-full object-cover sm:h-[500px]"
          />
          <div class="image-overlay absolute inset-0"></div>

          <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-8">
            <div class="max-w-md rounded-2xl border border-white/20 bg-slate-950/75 p-5 text-white backdrop-blur-md">
              <div class="flex items-center justify-between gap-5">
                <div>
                  <p class="text-xs font-semibold text-solar-300">SOL.ARE SOLUTIONS</p>
                  <p class="mt-1 text-lg font-bold">Energy independence starts here.</p>
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
              <p class="text-[10px] text-slate-400">Built for</p>
              <p class="text-sm font-bold">Homes & Businesses</p>
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
      <div><p class="font-bold">Grid-Tied Systems</p><p class="text-xs text-slate-500">Reduce your daytime electricity costs</p></div>
    </div>
    <div class="flex items-center gap-4">
      <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-green-50 text-brandgreen-600">
        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="4" y="7" width="16" height="10" rx="2"/><path d="M8 17v2M16 17v2M8 11h.01M12 11h.01M16 11h.01"/></svg>
      </div>
      <div><p class="font-bold">Hybrid Solar Systems</p><p class="text-xs text-slate-500">Solar plus battery backup for outages</p></div>
    </div>
    <div class="flex items-center gap-4">
      <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-blue-600">
        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3v18M5 8h14M5 16h14"/></svg>
      </div>
      <div><p class="font-bold">Custom Engineering</p><p class="text-xs text-slate-500">Designed around your property and usage</p></div>
    </div>
  </div>
</section>

<section id="services" class="scroll-mt-24 py-24 lg:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="max-w-2xl">
      <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-600">Our Services</p>
      <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl">
        Solar solutions built around your energy needs.
      </h2>
      <p class="mt-5 leading-7 text-slate-600">
        From residential rooftops to commercial facilities, SOL.ARE SOLUTIONS provides tailored solar PV systems with professional installation and long-term support.
      </p>
    </div>

    <div class="mt-14 grid gap-6 lg:grid-cols-2">
      <article class="service-card group relative min-h-[390px] overflow-hidden rounded-3xl">
        <img class="service-image absolute inset-0 h-full w-full object-cover"
          src="<?php echo esc_url($theme_uri . '/assets/images/about-us-photo.webp'); ?>"
          alt="Solar panels on a residential property" />
        <div class="image-overlay absolute inset-0"></div>
        <div class="absolute inset-x-0 bottom-0 p-7 sm:p-9">
          <span class="inline-flex rounded-full bg-solar-400 px-3 py-1 text-[10px] font-extrabold uppercase tracking-wider text-slate-950">01</span>
          <h3 class="mt-4 text-2xl font-extrabold text-white">Grid-Tied Solar Systems</h3>
          <p class="mt-3 max-w-xl text-sm leading-6 text-slate-200">
            Connect your solar panels to the grid and use clean daytime generation to reduce your electricity bill. Net metering can help you receive credits for excess energy.
          </p>
          <a href="#contact" class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-solar-300">Request a free assessment <span>→</span></a>
        </div>
      </article>

      <article class="service-card group relative min-h-[390px] overflow-hidden rounded-3xl">
        <img class="service-image absolute inset-0 h-full w-full object-cover"
          src="<?php echo esc_url($theme_uri . '/assets/images/installation-roof.webp'); ?>"
          alt="Solar battery energy storage system" />
        <div class="image-overlay absolute inset-0"></div>
        <div class="absolute inset-x-0 bottom-0 p-7 sm:p-9">
          <span class="inline-flex rounded-full bg-brandgreen-400 px-3 py-1 text-[10px] font-extrabold uppercase tracking-wider text-slate-950">02</span>
          <h3 class="mt-4 text-2xl font-extrabold text-white">Hybrid Solar Systems</h3>
          <p class="mt-3 max-w-xl text-sm leading-6 text-slate-200">
            Combine solar generation with battery storage for dependable backup power. Ideal for homes and businesses where brownouts and downtime are costly.
          </p>
          <a href="#contact" class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-brandgreen-300">Build your backup system <span>→</span></a>
        </div>
      </article>
    </div>

    <div class="mt-6 grid gap-6 md:grid-cols-3">
      <div class="rounded-2xl border border-slate-200 bg-slate-50 p-7">
        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-950 text-solar-400">
          <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 19h16M6 17V7l6-4 6 4v10M9 17v-4h6v4"/></svg>
        </div>
        <h3 class="mt-5 text-lg font-bold">Residential Solar</h3>
        <p class="mt-2 text-sm leading-6 text-slate-600">Right-sized systems for houses, rooftops, and families looking for long-term energy savings.</p>
      </div>
      <div class="rounded-2xl border border-slate-200 bg-slate-50 p-7">
        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-950 text-solar-400">
          <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 20V8l8-4 8 4v12M8 20v-6h8v6"/></svg>
        </div>
        <h3 class="mt-5 text-lg font-bold">Commercial & Industrial</h3>
        <p class="mt-2 text-sm leading-6 text-slate-600">Custom solar solutions for businesses and larger facilities with significant energy demand.</p>
      </div>
      <div class="rounded-2xl border border-slate-200 bg-slate-50 p-7">
        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-slate-950 text-solar-400">
          <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3v18M3 12h18"/><circle cx="12" cy="12" r="8"/></svg>
        </div>
        <h3 class="mt-5 text-lg font-bold">After-Sales Support</h3>
        <p class="mt-2 text-sm leading-6 text-slate-600">Maintenance, battery backup support, monitoring, and practical guidance after installation.</p>
      </div>
    </div>
  </div>
</section>

<section id="about" class="scroll-mt-24 overflow-hidden bg-slate-950 py-24 text-white lg:py-32">
  <div class="mx-auto grid max-w-7xl items-center gap-14 px-6 lg:grid-cols-[.9fr_1.1fr] lg:gap-24 lg:px-8">
    <div class="relative">
      <div class="absolute -inset-6 rounded-3xl bg-solar-400/10 blur-3xl"></div>
      <div class="relative overflow-hidden rounded-3xl border border-white/10">
        <img src="<?php echo esc_url($theme_uri . '/assets/images/about-us-photo.webp'); ?>"
          alt="Solar installation on a modern home" class="h-[500px] w-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
        <div class="absolute bottom-6 left-6 right-6 rounded-2xl border border-white/10 bg-white/10 p-5 backdrop-blur-md">
          <p class="text-xs font-bold uppercase tracking-wider text-solar-300">Our mission</p>
          <p class="mt-2 text-lg font-bold">Empowering Filipinos with clean, reliable, cost-efficient energy.</p>
        </div>
      </div>
    </div>

    <div>
      <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-400">About SOL.ARE</p>
      <h2 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">
        A trusted partner for a more energy-independent future.
      </h2>
      <p class="mt-6 leading-7 text-slate-300">
        SOL.ARE SOLUTIONS is a professional solar panel installer founded in 2024 and based in Las Piñas City. The team designs and installs premium grid-tied and hybrid systems for residential, commercial, and industrial clients.
      </p>
      <p class="mt-5 leading-7 text-slate-300">
        The company focuses on technical precision, transparency, high-quality components, long-term support, and practical solutions that help customers reduce electricity costs while improving energy reliability.
      </p>

      <div class="mt-9 grid gap-4 sm:grid-cols-2">
        <div class="rounded-2xl border border-white/10 bg-white/[.04] p-5">
          <p class="text-2xl font-extrabold text-solar-400">100kW+</p>
          <p class="mt-1 text-sm text-slate-400">Systems installed in Batangas & Pangasinan</p>
        </div>
        <div class="rounded-2xl border border-white/10 bg-white/[.04] p-5">
          <p class="text-2xl font-extrabold text-solar-400">120+ hrs</p>
          <p class="mt-1 text-sm text-slate-400">Solar training completed</p>
        </div>
      </div>

      <div class="mt-8 flex flex-wrap gap-2">
        <span class="rounded-full border border-white/10 px-3 py-1.5 text-xs font-semibold text-slate-300">Quality</span>
        <span class="rounded-full border border-white/10 px-3 py-1.5 text-xs font-semibold text-slate-300">Integrity</span>
        <span class="rounded-full border border-white/10 px-3 py-1.5 text-xs font-semibold text-slate-300">Customer Care</span>
        <span class="rounded-full border border-white/10 px-3 py-1.5 text-xs font-semibold text-slate-300">Innovation</span>
        <span class="rounded-full border border-white/10 px-3 py-1.5 text-xs font-semibold text-slate-300">Sustainability</span>
      </div>
    </div>
  </div>
</section>

<section id="process" class="scroll-mt-24 py-24 lg:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl text-center">
      <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-600">How It Works</p>
      <h2 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">From your first inquiry to clean energy.</h2>
      <p class="mt-5 leading-7 text-slate-600">A straightforward process designed to make your transition to solar clear and stress-free.</p>
    </div>

    <div class="relative mt-16 grid gap-8 md:grid-cols-4">
      <div class="hidden absolute left-[12%] right-[12%] top-7 h-px bg-slate-200 md:block"></div>
      <div class="relative">
        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-950 text-lg font-extrabold text-solar-400">01</div>
        <h3 class="mt-5 text-center font-bold">Tell us your needs</h3>
        <p class="mt-2 text-center text-sm leading-6 text-slate-500">Share your location, electricity usage, goals, and recent bills.</p>
      </div>
      <div class="relative">
        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-solar-400 text-lg font-extrabold text-slate-950">02</div>
        <h3 class="mt-5 text-center font-bold">System assessment</h3>
        <p class="mt-2 text-center text-sm leading-6 text-slate-500">Our team evaluates your property and designs a system around your consumption.</p>
      </div>
      <div class="relative">
        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-950 text-lg font-extrabold text-solar-400">03</div>
        <h3 class="mt-5 text-center font-bold">Proposal & installation</h3>
        <p class="mt-2 text-center text-sm leading-6 text-slate-500">Review your proposal, finalize the system, and let our team handle installation.</p>
      </div>
      <div class="relative">
        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-brandgreen-500 text-lg font-extrabold text-white">04</div>
        <h3 class="mt-5 text-center font-bold">Power your future</h3>
        <p class="mt-2 text-center text-sm leading-6 text-slate-500">Start generating clean energy and receive continued support after installation.</p>
      </div>
    </div>
  </div>
</section>

<section class="bg-solar-50 py-20">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="grid gap-8 lg:grid-cols-[1.2fr_.8fr] lg:items-center">
      <div>
        <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-700">Why Go Solar?</p>
        <h2 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">Save money today. Build resilience for tomorrow.</h2>
        <p class="mt-5 max-w-2xl leading-7 text-slate-600">
          Solar can help make your electricity costs more predictable while reducing dependence on the grid. SOL.ARE provides a personalized ROI forecast so you can understand the potential return before installation.
        </p>
      </div>
      <div class="rounded-3xl bg-slate-950 p-7 text-white shadow-soft">
        <p class="text-xs font-bold uppercase tracking-wider text-solar-300">Typical customer outcome</p>
        <p class="mt-3 text-4xl font-extrabold">40–50%</p>
        <p class="mt-2 text-sm leading-6 text-slate-300">Potential monthly electricity-bill savings, depending on system size, energy usage, and net-metering arrangements.</p>
      </div>
    </div>
  </div>
</section>

<section id="projects" class="scroll-mt-24 py-24 lg:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
      <div>
        <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-600">Projects & Insights</p>
        <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl">Ideas, installations, and a cleaner future.</h2>
      </div>
      <a href="#contact" class="text-sm font-bold text-slate-700 hover:text-solar-600">Talk to a solar specialist →</a>
    </div>

    <?php
    $insights_query = new WP_Query([
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => 2,
        'orderby'        => 'date',
        'order'          => 'DESC',
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

          <p class="mt-8 text-xs font-bold uppercase tracking-wider text-solar-400">Your Property</p>

          <h3 class="mt-4 max-w-sm text-2xl font-extrabold leading-tight">
            See what solar could look like for you.
          </h3>

          <p class="mt-4 max-w-sm text-sm leading-6 text-slate-300">
            Request a free assessment and get a proposal tailored to your energy consumption.
          </p>
        </div>

        <div class="mt-8">
          <a href="#contact" class="inline-flex rounded-xl bg-white px-5 py-3 text-sm font-bold text-slate-950 transition hover:bg-slate-100">
            Request Assessment
          </a>
        </div>
      </article>
    </div>
  </div>
</section>

<section id="testimonials" class="scroll-mt-24 bg-slate-950 py-24 text-white lg:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl text-center">
      <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-400">Client Feedback</p>
      <h2 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">Trusted by customers making the switch.</h2>
      <p class="mt-5 text-slate-400">Average rating: <span class="font-bold text-white">4.9 out of 5</span> based on 150 reviews.</p>
    </div>

    <div class="mt-14 grid gap-6 lg:grid-cols-3">
      <blockquote class="rounded-2xl border border-white/10 bg-white/[.04] p-7">
        <div class="text-solar-400">★★★★★</div>
        <p class="mt-6 text-sm leading-7 text-slate-300">“The installation process was smooth, and the team was very professional. I highly recommend SOL.ARE SOLUTIONS for anyone looking to invest in solar energy!”</p>
        <footer class="mt-7"><p class="text-sm font-bold">Carlos Reyes</p><p class="text-xs text-slate-500">Customer</p></footer>
      </blockquote>
      <blockquote class="rounded-2xl border border-white/10 bg-white/[.04] p-7">
        <div class="text-solar-400">★★★★★</div>
        <p class="mt-6 text-sm leading-7 text-slate-300">“SOL.ARE SOLUTIONS transformed our energy consumption. The installation was quick, and the team was very supportive throughout the process.”</p>
        <footer class="mt-7"><p class="text-sm font-bold">Maria Santos</p><p class="text-xs text-slate-500">Customer</p></footer>
      </blockquote>
      <blockquote class="rounded-2xl border border-white/10 bg-white/[.04] p-7">
        <div class="text-solar-400">★★★★★</div>
        <p class="mt-6 text-sm leading-7 text-slate-300">“Their team was professional, knowledgeable, and attentive to our needs. We are thrilled with the results and the savings on our energy bills!”</p>
        <footer class="mt-7"><p class="text-sm font-bold">John Doe</p><p class="text-xs text-slate-500">Customer</p></footer>
      </blockquote>
    </div>
  </div>
</section>

<section id="faq" class="scroll-mt-24 py-24 lg:py-32">
  <div class="mx-auto grid max-w-7xl gap-14 px-6 lg:grid-cols-[.75fr_1.25fr] lg:px-8">
    <div>
      <p class="text-sm font-bold uppercase tracking-[.18em] text-solar-600">FAQ</p>
      <h2 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">Questions before going solar?</h2>
      <p class="mt-5 leading-7 text-slate-600">Here are answers to some of the most common questions about SOL.ARE SOLUTIONS and solar installation.</p>
      <a href="#contact" class="mt-7 inline-flex rounded-xl bg-slate-950 px-5 py-3 text-sm font-bold text-white">Ask Our Team</a>
    </div>

    <div class="space-y-3">
      <div class="faq-item rounded-2xl border border-slate-200 bg-white">
        <button class="faq-button flex w-full items-center justify-between gap-6 p-5 text-left" type="button">
          <span class="font-bold">What types of solar power systems do you offer?</span>
          <span class="faq-icon flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-lg">+</span>
        </button>
        <div class="faq-content px-5"><p class="pb-5 text-sm leading-6 text-slate-600">SOL.ARE SOLUTIONS provides grid-tied and hybrid solar PV systems. Each setup is designed around your location, energy usage, and long-term goals.</p></div>
      </div>

      <div class="faq-item rounded-2xl border border-slate-200 bg-white">
        <button class="faq-button flex w-full items-center justify-between gap-6 p-5 text-left" type="button">
          <span class="font-bold">How much can I save with solar?</span>
          <span class="faq-icon flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-lg">+</span>
        </button>
        <div class="faq-content px-5"><p class="pb-5 text-sm leading-6 text-slate-600">Clients typically save at least 40–50% on monthly electricity bills, depending on system size and energy usage. Net metering may increase savings when excess energy is exported to the grid.</p></div>
      </div>

      <div class="faq-item rounded-2xl border border-slate-200 bg-white">
        <button class="faq-button flex w-full items-center justify-between gap-6 p-5 text-left" type="button">
          <span class="font-bold">Do you help with net metering?</span>
          <span class="faq-icon flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-lg">+</span>
        </button>
        <div class="faq-content px-5"><p class="pb-5 text-sm leading-6 text-slate-600">Yes. SOL.ARE assists with the net-metering application process and guides customers through the steps required to connect their system to the utility grid. Applicable fees and additional installations are subject to utility requirements.</p></div>
      </div>

      <div class="faq-item rounded-2xl border border-slate-200 bg-white">
        <button class="faq-button flex w-full items-center justify-between gap-6 p-5 text-left" type="button">
          <span class="font-bold">Is financing or installment payment available?</span>
          <span class="faq-icon flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-lg">+</span>
        </button>
        <div class="faq-content px-5"><p class="pb-5 text-sm leading-6 text-slate-600">The site currently advertises BDO installment plans with 0% interest for up to 12 months. Other financial partners may also become available, so ask the team about current programs and promotions.</p></div>
      </div>

      <div class="faq-item rounded-2xl border border-slate-200 bg-white">
        <button class="faq-button flex w-full items-center justify-between gap-6 p-5 text-left" type="button">
          <span class="font-bold">How do I get started?</span>
          <span class="faq-icon flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-lg">+</span>
        </button>
        <div class="faq-content px-5"><p class="pb-5 text-sm leading-6 text-slate-600">Message the team or call 0917 179 7201. You can provide your basic property and electricity information so the team can prepare a tailored solar proposal. The site says there is no upfront cost or commitment for the initial inquiry.</p></div>
      </div>
    </div>
  </div>
</section>

<section id="contact" class="scroll-mt-24 px-6 pb-24 lg:px-8 lg:pb-32">
  <div class="mx-auto max-w-7xl overflow-hidden rounded-[2rem] bg-solar-400 shadow-soft">
    <div class="grid lg:grid-cols-[1.1fr_.9fr]">
      <div class="p-8 sm:p-12 lg:p-16">
        <p class="text-sm font-bold uppercase tracking-[.18em] text-slate-900/60">Get Started Today</p>
        <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">Ready to take charge of your energy?</h2>
        <p class="mt-5 max-w-xl leading-7 text-slate-800/75">
          Tell us about your property and electricity needs. Our solar specialists can help you explore a system that fits your goals.
        </p>
        <div class="mt-8 flex flex-col gap-3 sm:flex-row">
          <a href="tel:+639171797201" class="rounded-xl bg-slate-950 px-6 py-3.5 text-center text-sm font-bold text-white hover:bg-slate-800">Call 0917 179 7201</a>
          <a href="mailto:hello@solaresolutions.ph" class="rounded-xl border border-slate-950/15 bg-white/50 px-6 py-3.5 text-center text-sm font-bold text-slate-950 hover:bg-white">Email Us</a>
        </div>
      </div>

      <div class="bg-slate-950 p-8 text-white sm:p-12 lg:p-16">
        <p class="text-xs font-bold uppercase tracking-wider text-solar-300">Head Office</p>
        <p class="mt-4 leading-7 text-slate-300">
          Alabang-Zapote Road,<br>
          Las Piñas City, Metro Manila, Philippines 1740
        </p>
        <div class="mt-8 space-y-3 border-t border-white/10 pt-7 text-sm">
          <!-- <p><span class="text-slate-500">Telephone:</span> (02) 1234 5678</p> -->
          <p><span class="text-slate-500">Mobile:</span> 0917 179 7201</p>
          <p><span class="text-slate-500">Email:</span> hello@solaresolutions.ph</p>
        </div>
        <a href="https://m.me/solarenewable" target="_blank" rel="noopener" class="mt-8 inline-flex rounded-xl bg-white px-5 py-3 text-sm font-bold text-slate-950">Message the Team</a>
      </div>
    </div>
  </div>
</section>

</main>

<?php get_footer(); ?>