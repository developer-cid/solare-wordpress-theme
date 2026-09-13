<?php
/*
Template Name: Solar Planner
*/

get_header();
?>

<main id="solar-planner">
     <section class="relative overflow-hidden border-b border-slate-100 bg-slate-50 pt-24 pb-10 sm:pt-32 sm:pb-12 lg:pt-36 lg:pb-16">
      <div class="hero-grid absolute inset-0 h-full"></div>
      <div class="sun-glow absolute -right-44 top-24 h-[480px] w-[480px] rounded-full blur-3xl"></div>
      <div class="sun-glow absolute -left-48 top-44 h-[420px] w-[420px] rounded-full blur-3xl"></div>

      <div class="relative mx-auto w-full max-w-7xl px-5 text-center sm:px-6 lg:px-8">
        <div class="planner-hero-enter mx-auto max-w-4xl">
          <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-solar-200 bg-solar-50 px-3 py-2 text-[11px] font-bold uppercase tracking-[0.14em] text-solar-800 sm:mb-5 sm:px-3.5 sm:text-xs sm:tracking-[0.16em]">
            <span class="h-1.5 w-1.5 rounded-full bg-solar-400"></span>
            SOL.ARE Solar Planner
          </div>

          <h1 class="text-[38px] font-extrabold leading-[1.02] tracking-[-0.045em] text-slate-950 sm:text-5xl sm:leading-[1.05] lg:text-6xl">
            Build a solar plan around
            <span class="text-solar-500">your real energy use.</span>
          </h1>

          <p class="mx-auto mt-5 max-w-3xl text-[15px] leading-7 text-slate-600 sm:mt-6 sm:text-lg sm:leading-8">
            Choose the appliances you use, estimate their daily runtime, and get a practical view of peak demand,
            recommended solar capacity, matched package, projected output, savings, and payback.
          </p>
        </div>
      </div>
    </section>

    <!-- Estimator content -->
    <section id="estimator" class="scroll-mt-28 bg-white pt-4 pb-12 sm:pt-6 lg:scroll-mt-32 lg:pt-8 lg:pb-16"
>
      <div class="mx-auto max-w-7xl space-y-7 px-6 lg:px-8">

        <!-- Step 1
             Intentionally NOT using reveal-on-scroll.
             This first estimator section must always be visible immediately
             after the hero on both mobile and desktop. -->
        <section id="step-1" class="scroll-mt-28 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8 lg:scroll-mt-32 lg:p-10">
          <div class="flex flex-col gap-6">
            <div>
              <div class="flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-solar-50 text-xl text-solar-600">ϟ</span>
                <div>
                  <p class="text-xs font-bold uppercase tracking-[0.16em] text-solar-700">Step 1</p>
                  <h2 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-950 sm:text-3xl">
                    Build your household energy profile
                  </h2>
                </div>
              </div>

              <p class="mt-4 max-w-3xl text-sm leading-6 text-slate-600 sm:text-base">
                Select the appliances that matter most, set the quantity, and choose a typical daily runtime.
                You can also add equipment that is not in the standard list.
              </p>
            </div>

            <div class="grid gap-4 md:grid-cols-3">
              <div class="rounded-2xl bg-slate-50 p-5">
                <p class="text-sm font-bold text-slate-900">Peak demand</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Estimates the maximum load that may run at the same time.</p>
              </div>
              <div class="rounded-2xl bg-slate-50 p-5">
                <p class="text-sm font-bold text-slate-900">Daily energy</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Uses appliance wattage, quantity, and hours per day.</p>
              </div>
              <div class="rounded-2xl bg-slate-50 p-5">
                <p class="text-sm font-bold text-slate-900">Usage timing</p>
                <p class="mt-2 text-sm leading-6 text-slate-500">Helps create the current simplified battery estimate.</p>
              </div>
            </div>

            <div class="relative">
              <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="7"/>
                <path d="m20 20-3.5-3.5"/>
              </svg>
              <input
                id="search"
                type="search"
                placeholder="Search appliances (e.g. air conditioner, refrigerator, water pump)"
                class="w-full rounded-xl border border-slate-200 bg-white py-3.5 pl-12 pr-4 text-sm text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-solar-400 focus:ring-4 focus:ring-solar-100"
              />
            </div>

            <div id="applianceSections"></div>
            <div id="customList" class="grid gap-4 md:grid-cols-2 lg:grid-cols-3"></div>

            <button
              id="customToggle"
              type="button"
              class="inline-flex w-full items-center justify-center gap-2 rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-5 py-4 text-sm font-bold text-slate-600 transition hover:border-solar-300 hover:bg-solar-50 hover:text-solar-800"
            >
              <span class="text-lg">⊕</span>
              Add your own appliance
            </button>

            <div id="customForm" class="hidden rounded-2xl border border-solar-200 bg-solar-50/40 p-5 sm:p-6">
              <div class="flex items-center justify-between gap-4">
                <div>
                  <p class="text-xs font-bold uppercase tracking-[0.14em] text-solar-700">Custom load</p>
                  <h3 class="mt-1 text-lg font-bold text-slate-950">Add your own appliance</h3>
                </div>
                <button
                  id="closeCustom"
                  type="button"
                  class="flex h-9 w-9 items-center justify-center rounded-xl text-xl text-slate-400 transition hover:bg-white hover:text-slate-700"
                  aria-label="Close custom appliance form"
                >×</button>
              </div>

              <div class="mt-5 grid gap-4 md:grid-cols-2">
                <label>
                  <span class="mb-2 block text-xs font-bold uppercase tracking-[0.08em] text-slate-500">Appliance name *</span>
                  <input id="customName" maxlength="80" autocomplete="off" class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none transition focus:border-solar-400 focus:ring-4 focus:ring-solar-100" placeholder="e.g. Pool pump, X-ray machine"  aria-describedby="customNameError" />
                  <p id="customNameError" class="mt-1.5 hidden text-xs font-semibold text-red-600" aria-live="polite"></p>
                </label>

                <label>
                  <span class="mb-2 block text-xs font-bold uppercase tracking-[0.08em] text-slate-500">Power rating (W) *</span>
                  <input id="customWatts" type="number" min="1" max="10000" step="1" class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none transition focus:border-solar-400 focus:ring-4 focus:ring-solar-100" placeholder="e.g. 750"  aria-describedby="customWattsError" />
                  <p id="customWattsError" class="mt-1.5 hidden text-xs font-semibold text-red-600" aria-live="polite"></p>
                </label>

                <label>
                  <span class="mb-2 block text-xs font-bold uppercase tracking-[0.08em] text-slate-500">Quantity *</span>
                  <input id="customQty" type="number" min="1" max="50" step="1" value="1" class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none transition focus:border-solar-400 focus:ring-4 focus:ring-solar-100"  aria-describedby="customQtyError" />
                  <p id="customQtyError" class="mt-1.5 hidden text-xs font-semibold text-red-600" aria-live="polite"></p>
                </label>

                <label>
                  <span class="mb-2 block text-xs font-bold uppercase tracking-[0.08em] text-slate-500">Estimated hours per day *</span>
                  <input id="customHours" type="number" min=".5" max="24" step=".5" value="4" class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none transition focus:border-solar-400 focus:ring-4 focus:ring-solar-100"  aria-describedby="customHoursError" />
                  <p id="customHoursError" class="mt-1.5 hidden text-xs font-semibold text-red-600" aria-live="polite"></p>
                </label>
              </div>

              <button
                id="addCustom"
                type="button"
                class="mt-5 inline-flex w-full items-center justify-center gap-2 rounded-xl bg-slate-950 px-5 py-3.5 text-sm font-bold text-white transition hover:bg-slate-800"
              >
                <span class="text-lg">＋</span>
                Add appliance
              </button>
            </div>
          </div>
        </section>

        <!-- Step 2 -->
        <section class="scroll-mt-28 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8 lg:scroll-mt-32 lg:p-10">
          <div class="flex items-center gap-3">
            <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-solar-50 text-lg text-solar-600">◇</span>
            <div>
              <p class="text-xs font-bold uppercase tracking-[0.16em] text-solar-700">Step 2</p>
              <h2 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-950 sm:text-3xl">
                When do you use most of your electricity?
              </h2>
            </div>
          </div>

          <p class="mt-4 text-sm leading-6 text-slate-600 sm:text-base">
            Your usage pattern helps describe when your household needs energy. Final battery sizing is confirmed during technical/site assessment.
          </p>

          <div class="mt-6 grid gap-4 md:grid-cols-3">
            <button
              type="button"
              data-pattern="day"
              class="usage-card rounded-2xl border border-slate-200 bg-white p-5 text-left text-slate-950 transition hover:-translate-y-0.5 hover:border-slate-300 hover:shadow-sm"
            >
              <span data-usage-title class="flex flex-wrap items-center gap-2 text-sm font-bold text-slate-950">
                Mostly daytime
              </span>
              <span data-usage-description class="mt-2 block text-sm leading-6 text-slate-500">
                Most appliances run during daylight hours, with lighter use after sunset.
              </span>
            </button>

            <button
              type="button"
              data-pattern="balanced"
              class="usage-card rounded-2xl border border-slate-950 bg-slate-950 p-5 text-left text-white shadow-lg transition hover:-translate-y-0.5"
            >
              <span data-usage-title class="flex flex-wrap items-center gap-2 text-sm font-bold text-white">
                Balanced use
                <span
                  data-usage-badge
                  class="rounded-full bg-solar-400 px-2 py-1 text-[9px] font-extrabold uppercase tracking-wider text-slate-950"
                >
                  Common
                </span>
              </span>
              <span data-usage-description class="mt-2 block text-sm leading-6 text-slate-300">
                Energy use is spread across the day, with regular evening consumption.
              </span>
            </button>

            <button
              type="button"
              data-pattern="evening"
              class="usage-card rounded-2xl border border-slate-200 bg-white p-5 text-left text-slate-950 transition hover:-translate-y-0.5 hover:border-slate-300 hover:shadow-sm"
            >
              <span data-usage-title class="flex flex-wrap items-center gap-2 text-sm font-bold text-slate-950">
                Mostly evening
              </span>
              <span data-usage-description class="mt-2 block text-sm leading-6 text-slate-500">
                Daytime demand is lower and most major appliances are used in the evening.
              </span>
            </button>
          </div>
        </section>

        <!-- Location pricing
             Location changes pricing only; it does not change load sizing. -->
        <section class="reveal-on-scroll rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
          <div class="grid gap-5 lg:grid-cols-[1fr_360px] lg:items-center">
            <div>
              <p class="text-xs font-bold uppercase tracking-[0.16em] text-solar-700">Project location</p>
              <h2 class="mt-1 text-xl font-extrabold tracking-tight text-slate-950 sm:text-2xl">
                Where will the solar system be installed?
              </h2>
              <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                Select the project location so the planner can provide a more relevant estimate for your installation.
              </p>
            </div>

            <label class="block">
              <span class="mb-2 block text-xs font-bold uppercase tracking-[0.08em] text-slate-500">
                Installation location
              </span>
              <select
                id="locationSelect"
                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-base font-semibold text-slate-900 outline-none transition focus:border-solar-400 focus:ring-4 focus:ring-solar-100"
              >
                <!-- Filled from assets/js/estimator-config.js -->
              </select>
            </label>
          </div>
        </section>

        <!-- Live summary -->
        <section class="reveal-on-scroll overflow-hidden rounded-3xl bg-slate-950 text-white shadow-soft">
          <div class="grid gap-8 p-6 sm:p-8 lg:grid-cols-[1fr_auto] lg:items-center lg:p-10">
            <div>
              <p class="text-xs font-bold uppercase tracking-[0.16em] text-slate-400">Estimated Peak Load</p>
              <div id="peakDisplay" class="mt-2 text-4xl font-extrabold tracking-tight sm:text-5xl">
                0 <small class="text-sm font-bold text-slate-400">watts peak</small>
              </div>
              <div id="energyDisplay" class="mt-2 text-sm text-slate-400">0 Wh/day estimated consumption</div>
              <div id="countDisplay" class="mt-1 text-sm text-slate-500">0 appliances selected</div>
            </div>

            <button
              id="calculateBtn"
              type="button"
              disabled
              class="inline-flex min-w-[190px] items-center justify-center rounded-xl bg-solar-400 px-6 py-3.5 text-sm font-extrabold text-slate-950 shadow-lg shadow-solar-400/20 transition hover:-translate-y-0.5 hover:bg-solar-300 disabled:cursor-not-allowed disabled:opacity-40 disabled:hover:translate-y-0"
            >
              Estimate My System
            </button>
          </div>
        </section>

        <!-- Results -->
        <section id="result" class="hidden reveal-on-scroll rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8 lg:p-10">
          <div class="flex flex-col gap-2">
            <p class="text-xs font-bold uppercase tracking-[0.16em] text-solar-600">Your Solar Estimate</p>
            <h2 class="text-2xl font-extrabold tracking-tight text-slate-950 sm:text-3xl">Your planning result</h2>
            <p class="text-sm leading-6 text-slate-500">A planning estimate based on your selected appliances and usage pattern.</p>
            <p id="patternNote" class="text-sm font-semibold text-slate-700"></p>
          </div>

          <div class="mt-7 space-y-3">
            <div class="flex gap-4 rounded-2xl bg-slate-50 p-4 sm:p-5">
              <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-slate-950 text-xs font-bold text-white">1</span>
              <p id="reasonLoad" class="text-sm leading-6 text-slate-600 sm:text-base"></p>
            </div>

            <div class="flex gap-4 rounded-2xl bg-slate-50 p-4 sm:p-5">
              <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-slate-950 text-xs font-bold text-white">2</span>
              <p id="reasonSize" class="text-sm leading-6 text-slate-600 sm:text-base"></p>
            </div>

            <div class="flex gap-4 rounded-2xl bg-solar-50 p-4 sm:p-5">
              <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-solar-400 text-xs font-extrabold text-slate-950">3</span>
              <p id="reasonOutput" class="text-sm leading-6 text-slate-700 sm:text-base"></p>
            </div>
          </div>

          <!-- Matched SOL.ARE reference package -->
          <div class="mt-7 overflow-hidden rounded-2xl border border-slate-200 bg-white">
            <div class="bg-slate-950 px-5 py-4">
              <div class="flex flex-col gap-1 sm:flex-row sm:items-center sm:justify-between">
                <p class="text-xs font-extrabold uppercase tracking-[0.13em] text-white">
                  Matched SOL.ARE Reference Package
                </p>
                <p class="text-[10px] font-semibold uppercase tracking-[0.1em] text-slate-400">
                  Estimated pricing based on system size and selected location
                </p>
              </div>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4">
              <div class="border-t border-slate-200 px-5 py-4 sm:border-t-0">
                <p class="text-[10px] font-bold uppercase tracking-[0.12em] text-slate-400">System</p>
                <p id="packageSizeValue" class="mt-1 text-lg font-extrabold text-slate-950">—</p>
              </div>
              <div class="border-t border-slate-200 px-5 py-4 sm:border-l sm:border-t-0">
                <p class="text-[10px] font-bold uppercase tracking-[0.12em] text-slate-400">Price / kW</p>
                <p id="packageRateValue" class="mt-1 text-lg font-extrabold text-slate-950">—</p>
              </div>
              <div class="border-t border-slate-200 px-5 py-4 lg:border-l lg:border-t-0">
                <p class="text-[10px] font-bold uppercase tracking-[0.12em] text-slate-400">Estimated contract price</p>
                <p id="packagePriceValue" class="mt-1 text-lg font-extrabold text-slate-950">—</p>
              </div>
              <div class="border-t border-slate-200 px-5 py-4 sm:border-l lg:border-t-0">
                <p class="text-[10px] font-bold uppercase tracking-[0.12em] text-slate-400">Panel configuration</p>
                <p id="packagePanelsValue" class="mt-1 text-lg font-extrabold text-slate-950">—</p>
              </div>
            </div>
          </div>

          <div class="mt-7 grid gap-4 md:grid-cols-3">
            <div class="rounded-2xl bg-solar-50 p-5">
              <p class="text-[10px] font-extrabold uppercase tracking-[0.12em] text-solar-700">Suggested battery</p>
              <p id="batteryCountValue" class="mt-2 text-3xl font-extrabold tracking-tight text-slate-950">—</p>
              <p id="batteryCapacityValue" class="mt-2 text-xs font-semibold leading-5 text-slate-500">—</p>
            </div>

            <div class="rounded-2xl bg-green-50 p-5">
              <p class="text-[10px] font-extrabold uppercase tracking-[0.12em] text-green-700">Estimated solar output / month</p>
              <p id="outputValue" class="mt-2 text-3xl font-extrabold tracking-tight text-slate-950">—</p>
              <p class="mt-2 text-xs leading-5 text-slate-500">kWh / month</p>
            </div>

            <div class="rounded-2xl bg-slate-50 p-5">
              <p class="text-[10px] font-extrabold uppercase tracking-[0.12em] text-slate-600">Estimated monthly savings</p>
              <p id="savingsValue" class="mt-2 text-3xl font-extrabold tracking-tight text-slate-950">—</p>
              <div class="mt-3 flex flex-wrap items-center gap-2 text-xs text-slate-500">
                <span>Based on electricity rate</span>
                <div class="flex items-center rounded-lg border border-slate-200 bg-white px-2 py-1">
                  <span class="font-semibold text-slate-500">₱</span>
                  <input
                    id="rateInput"
                    type="number"
                    min="1"
                    step=".5"
                    value="15"
                    class="w-14 border-0 bg-transparent px-1 text-center text-sm font-bold text-slate-950 outline-none"
                  />
                </div>
                <span>/ kWh</span>
              </div>
            </div>
          </div>

          <div class="mt-7 flex flex-col gap-5 rounded-2xl bg-slate-950 p-6 text-white sm:flex-row sm:items-center">
            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-solar-400 text-lg font-extrabold text-slate-950">₱</div>
            <div>
              <p class="text-[10px] font-bold uppercase tracking-[0.13em] text-slate-400">Estimated payback period</p>
              <p id="roiValue" class="mt-1 text-3xl font-extrabold tracking-tight">—</p>
              <p id="lifetimeValue" class="mt-1 text-sm text-slate-300"></p>
            </div>
          </div>

          <p class="mt-7 border-t border-slate-200 pt-5 text-xs leading-6 text-slate-400">
            This calculator is a planning estimator only. Estimated pricing is based on the matched system size,
            its configured base price per kW, and the configured location addition per kW. Current location additions are
            set to ₱0 while SOL.ARE finalizes the location rates. Final system design, equipment selection, logistics,
            installation requirements, and quotation remain subject to technical/site assessment by SOL.ARE SOLUTIONS.
          </p>
        </section>
      </div>
    </section>

    <!-- Contact CTA using the same landing-page component pattern -->
    <section class="px-6 pb-24 pt-6 lg:px-8 lg:pb-32" id="contact">
      <div class="mx-auto max-w-7xl overflow-hidden rounded-3xl bg-solar-400 shadow-soft">
        <div class="grid lg:grid-cols-[1.1fr_.9fr]">
          <div class="p-8 sm:p-12 lg:p-16">
            <p class="text-sm font-bold uppercase tracking-[0.18em] text-slate-900/60">Get a tailored solar assessment</p>
            <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-950 sm:text-4xl">
              Ready for a recommendation tailored to your property?
            </h2>
            <p class="mt-5 max-w-xl leading-7 text-slate-800/75">
              Use the planner as a starting point, then share your latest electricity bill and property details
              with the SOL.ARE team for a more accurate system recommendation.
            </p>

            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
              <a href="tel:+639171797201" class="rounded-xl bg-slate-950 px-6 py-3.5 text-center text-sm font-bold text-white transition hover:bg-slate-800">
                Call 0917 179 7201
              </a>
              <a href="mailto:hello@solaresolutions.ph" class="rounded-xl border border-slate-950/15 bg-white/60 px-6 py-3.5 text-center text-sm font-bold text-slate-950 transition hover:bg-white">
                Email Us
              </a>
            </div>
          </div>

          <div class="bg-slate-950 p-8 text-white sm:p-12 lg:p-16">
            <p class="text-xs font-bold uppercase tracking-wider text-solar-300">SOL.ARE SOLUTIONS</p>

            <div class="mt-7 space-y-5">
              <div>
                <p class="text-xs text-slate-500">Mobile</p>
                <a href="tel:+639171797201" class="mt-1 inline-block font-bold text-white">0917 179 7201</a>
              </div>

              <div>
                <p class="text-xs text-slate-500">Email</p>
                <a href="mailto:hello@solaresolutions.ph" class="mt-1 inline-block font-bold text-white">hello@solaresolutions.ph</a>
              </div>

              <div>
                <p class="text-xs text-slate-500">Head Office</p>
                <p class="mt-1 font-bold text-white">Las Piñas City, Metro Manila</p>
              </div>
            </div>

            <a href="https://m.me/solarenewable" target="_blank" rel="noopener" class="mt-8 inline-flex rounded-xl bg-white px-5 py-3 text-sm font-bold text-slate-950">Message the Team</a>
          </div>
        </div>
      </div>
    </section>
</main>

<?php get_footer(); ?>