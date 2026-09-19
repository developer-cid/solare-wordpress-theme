<?php
/**
 * Reusable SOL.ARE contact / lead assessment section.
 *
 * Used on:
 * - Homepage
 * - About Us
 * - Solar Planner
 * - Blog posts
 * - Projects
 */

defined('ABSPATH') || exit;
?>

<section
  id="contact"
  class="mx-auto mb-16 max-w-7xl overflow-hidden rounded-[2rem] bg-amber-400 md:mb-24"
>
  <div class="px-6 py-14 text-center sm:px-10 lg:px-12">

    <p
      class="text-xs font-bold uppercase tracking-[0.28em] text-slate-700"
    >
      <?php
      echo esc_html(
          function_exists('solare_home_field')
              ? solare_home_field('home_contact_label', 'Get Started Today')
              : 'Get Started Today'
      );
      ?>
    </p>

    <h2
      class="mt-4 text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl"
    >
      <?php
      echo esc_html(
          function_exists('solare_home_field')
              ? solare_home_field(
                  'home_contact_heading',
                  'Ready to take charge of your energy?'
              )
              : 'Ready to take charge of your energy?'
      );
      ?>
    </h2>

    <p
      class="mx-auto mt-4 max-w-2xl text-sm leading-7 text-slate-700 sm:text-base"
    >
      <?php
      echo esc_html(
          function_exists('solare_home_field')
              ? solare_home_field(
                  'home_contact_description',
                  'Tell us about your property and electricity needs. Our solar specialists can help you explore a system that fits your goals.'
              )
              : 'Tell us about your property and electricity needs. Our solar specialists can help you explore a system that fits your goals.'
      );
      ?>
    </p>

    <div class="mt-8 flex flex-col justify-center gap-3 sm:flex-row">

      <a
        href="tel:+639171797201"
        class="rounded-xl bg-slate-950 px-6 py-3.5 text-center text-sm font-bold text-white transition hover:bg-slate-800"
      >
        <?php
        echo esc_html(
            function_exists('solare_home_field')
                ? solare_home_field(
                    'home_contact_call_button',
                    'Call 0917 179 7201'
                )
                : 'Call 0917 179 7201'
        );
        ?>
      </a>

      <a
        href="https://m.me/solarenewable"
        target="_blank"
        rel="noopener noreferrer"
        class="rounded-xl border border-slate-950/15 bg-white/70 px-6 py-3.5 text-center text-sm font-bold text-slate-950 transition hover:bg-white"
      >
        Message Us
      </a>

      <a
        href="mailto:hello@solaresolutions.ph"
        class="rounded-xl border border-slate-950/15 bg-white/50 px-6 py-3.5 text-center text-sm font-bold text-slate-950 transition hover:bg-white"
      >
        <?php
        echo esc_html(
            function_exists('solare_home_field')
                ? solare_home_field(
                    'home_contact_email_button',
                    'Email Us'
                )
                : 'Email Us'
        );
        ?>
      </a>

    </div>

  </div>

  <div class="bg-slate-950 px-6 py-14 sm:px-10 lg:px-12">

    <div class="mx-auto max-w-3xl">

      <div class="mb-10 text-center">

        <p
          class="text-xs font-bold uppercase tracking-wider text-amber-400"
        >
          Free Solar Assessment
        </p>

        <h3
          class="mt-3 text-2xl font-extrabold tracking-tight text-white sm:text-3xl"
        >
          Tell us about your property
        </h3>

        <p class="mt-3 text-sm text-slate-400">
          Send us a few details and our team will get in touch with you.
        </p>

      </div>

      <div class="solare-lead-form">
        <?php
        if (shortcode_exists('wpforms')) {
            echo do_shortcode('[wpforms id="1036" title="false"]');
        }
        ?>
      </div>

    </div>

  </div>
</section>