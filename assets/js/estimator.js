/**
 * SOL.ARE Solar Planner - Main Logic
 *
 * estimator-config.js    -> prices, locations, battery assumptions, limits
 * estimator-templates.js -> generated appliance/custom-card HTML
 * estimator.js           -> state, calculations, rendering, validation, events
 *
 * Quick rule:
 * - Change constants/prices -> estimator-config.js
 * - Change generated card design -> estimator-templates.js
 * - Change formulas/behavior -> estimator.js
 * - Change static page text/layout -> ./estimator/
 */

// =========================================================================
    // SOL.ARE SOLAR PLANNER — MAINTENANCE GUIDE
    //
    // UI / DESIGN:
    //   Tailwind classes control layout, colors, spacing, and responsive states.
    //
    // ESTIMATOR LOGIC:
    //   The calculations below intentionally remain vanilla JavaScript.
    //   Keep pricing assumptions, package data, and formula constants separate
    //   from the rendering code so they can be reviewed independently.
    // =========================================================================

    // =========================================================================
    // ESTIMATOR DATA
    // Calculation logic is preserved from the previous Solar Planner.
    // Tailwind is used only for presentation and responsive component styling.
    // =========================================================================

    // [id, displayName, ratedWatts, iconType, selectableHoursPerDay]
    const categories = [
      { name: 'Cooling & Comfort', items: [
        ['aircon1','Aircon 1HP',750,'aircon',[2,4,6,8,12]],
        ['aircon15','Aircon 1.5HP',1100,'aircon',[2,4,6,8,12]],
        ['aircon2','Aircon 2HP',1500,'aircon',[2,4,6,8,12]],
        ['aircon3','Aircon 3HP',2200,'aircon',[2,4,6,8,12]],
        ['aircon4','Aircon 4HP',3000,'aircon',[2,4,6,8,12]],
        ['fan','Electric Fan',60,'fan',[4,8,12,24]]
      ]},
      { name: 'Kitchen Appliances', items: [
        ['ref','Refrigerator',150,'fridge',[8,12,18,24]],
        ['freezer','Chest/Double Freezer',250,'snow',[8,12,18,24]],
        ['stove','Electric/Induction Stove',2000,'stove',[0.5,1,2,4]],
        ['rice','Rice Cooker',700,'rice',[0.5,1,2,4]],
        ['microwave','Microwave / Oven Toaster',1200,'oven',[0.25,0.5,1]],
        ['fryer','Air Fryer',1500,'fryer',[0.5,1,2]]
      ]},
      { name: 'Water Systems', items: [
        ['pump','Water Pump (1HP)',750,'water',[1,2,4,6]],
        ['heater','Water Heater (Shower)',3500,'shower',[0.25,0.5,1,2]],
        ['washer','Washing Machine',500,'washer',[0.5,1,2,4]]
      ]},
      { name: 'Entertainment & Work', items: [
        ['tv','TV (LED)',100,'tv',[2,4,6,8]],
        ['computer','Computer/Laptop+Monitor',200,'computer',[2,4,6,8,12]],
        ['router','Router / Network Gear',30,'wifi',[8,12,18,24]],
        ['iron','Electric Iron',1000,'iron',[0.5,1,2,4]]
      ]},
      { name: 'Lighting', items: [
        ['led','LED Light Bulb',9,'light',[3,5,8,12]],
        ['cfl','CFL / Fluorescent',15,'light',[3,5,8,12]],
        ['incandescent','Incandescent Bulb',45,'light',[3,5,8,12]]
      ]}
    ];

    // =========================================================================
    // EDITABLE ESTIMATOR SETTINGS
    // Business values live in assets/js/estimator-config.js
    // =========================================================================
    const ESTIMATOR_CONFIG = window.SOLARE_ESTIMATOR_CONFIG;

    if (!ESTIMATOR_CONFIG) {
      throw new Error(
        'Estimator settings failed to load. Check assets/js/estimator-config.js'
      );
    }

    const packages = ESTIMATOR_CONFIG.packages;
    const locations = ESTIMATOR_CONFIG.locations;

    const state = {};
    categories.flatMap(category => category.items).forEach(item => {
      state[item[0]] = {
        qty: 0,
        hours: item[4][0],
        inverter: false
      };
    });

    let customItems = [];
    let usagePattern = 'balance';
    let lastCalculation = null;

    const peso = value =>
      new Intl.NumberFormat('en-PH', {
        style: 'currency',
        currency: 'PHP',
        maximumFractionDigits: 0
      }).format(value);

    const num = value =>
      new Intl.NumberFormat('en-US', {
        maximumFractionDigits: 1
      }).format(value);

    // Pricing helpers.
    // Location pricing is an ADDITION in pesos per kW.
    const locationFor = locationId =>
      locations.find(location => location.id === locationId) || locations[0];

    const adjustedPricePerKw = (packageItem, locationId) =>
      packageItem.pricePerKw + locationFor(locationId).pricePerKwAdd;

    const finalContractPrice = (packageItem, locationId) =>
      packageItem.kw * adjustedPricePerKw(packageItem, locationId);

    const pesoPerKw = value =>
      `₱${new Intl.NumberFormat('en-PH', {
        minimumFractionDigits: Number.isInteger(value) ? 0 : 2,
        maximumFractionDigits: 2
      }).format(value)}/kW`;

    const iconFor = kind => ({
      aircon:'≋',
      fan:'✣',
      fridge:'▣',
      snow:'❄',
      stove:'▤',
      rice:'♨',
      oven:'▣',
      fryer:'♨',
      water:'♧',
      shower:'☄',
      washer:'▣',
      tv:'▭',
      computer:'▰',
      wifi:'⌁',
      iron:'♜',
      light:'♧'
    }[kind] || '⚡');

    function hourLabel(hours) {
      if (hours < 1) return `${Math.round(hours * 60)}min`;
      return `${hours}h`;
    }

    // =========================================================================
    // APPLIANCE UI
    // Only the markup/classes changed. The same state values and calculations
    // from the previous version are still used.
    // =========================================================================
    // Responsive grid note:
    // Keep appliance cards in a single column through tablet widths.
    // Switch to 2 columns at lg and 3 columns at 2xl so long names and
    // quantity controls have enough horizontal space.
    function renderAppliances(filter = '') {
      const root = document.getElementById('applianceSections');
      const query = filter.trim().toLowerCase();

      root.innerHTML = '';

      categories.forEach(category => {
        const matched = category.items.filter(item =>
          item[1].toLowerCase().includes(query)
        );

        if (!matched.length) return;

        const section = document.createElement('section');
        section.className = 'mt-2';

        const heading = document.createElement('h3');
        heading.className = 'mb-3 mt-7 text-xs font-bold uppercase tracking-[0.14em] text-slate-400';
        heading.textContent = category.name;

        const grid = document.createElement('div');
        grid.className = 'grid grid-cols-1 gap-4 lg:grid-cols-2 2xl:grid-cols-3';

        matched.forEach(item => {
          const [id, name, watts, kind, hours] = item;
          const s = state[id];

          // Preserved planning assumption:
          // inverter AC average load = 50% of listed rated wattage.
          const effectiveWatts = watts * (s.inverter ? 0.5 : 1);
          const dailyEnergy = effectiveWatts * s.qty * s.hours;
          const active = s.qty > 0;

          const card = document.createElement('article');
          card.className = [
            'rounded-2xl border p-4 transition',
            active
              ? 'border-solar-400 bg-solar-50/60 shadow-sm'
              : 'border-slate-200 bg-white hover:border-slate-300 hover:shadow-sm'
          ].join(' ');

          // Generated HTML is kept in estimator-templates.js.
          card.innerHTML = SolareEstimatorTemplates.applianceCard({
            id,
            name,
            watts,
            icon: iconFor(kind),
            quantity: s.qty,
            active,
            effectivePeakWatts: effectiveWatts * s.qty,
            dailyEnergy,
            selectedHours: s.hours,
            hourOptions: hours,
            isAircon: kind === 'aircon',
            inverter: s.inverter
          });

          grid.appendChild(card);
        });

        section.appendChild(heading);
        section.appendChild(grid);
        root.appendChild(section);
      });
    }

    function getAllSelected() {
      const standard = [];

      categories.flatMap(category => category.items).forEach(([id, name, watts]) => {
        const s = state[id];

        if (s.qty > 0) {
          const effectiveWatts = watts * (s.inverter ? 0.5 : 1);

          standard.push({
            name,
            watts: effectiveWatts,
            qty: s.qty,
            hours: s.hours
          });
        }
      });

      return standard.concat(customItems);
    }

    // Peak load (W) = Σ(effective watts × quantity)
    // Daily energy (Wh/day) = Σ(effective watts × quantity × hours/day)
    function totals() {
      const items = getAllSelected();

      return {
        items,
        peak: items.reduce((total, item) => total + item.watts * item.qty, 0),
        energy: items.reduce((total, item) => total + item.watts * item.qty * item.hours, 0),
        count: items.reduce((total, item) => total + item.qty, 0)
      };
    }

    function updateSummary() {
      const t = totals();

      document.getElementById('peakDisplay').innerHTML =
        `${num(t.peak)} <small class="text-sm font-bold text-slate-400">watts peak</small>`;

      document.getElementById('energyDisplay').textContent =
        `${num(t.energy)} Wh/day estimated consumption`;

      document.getElementById('countDisplay').textContent =
        `${t.count} appliances selected`;

      document.getElementById('calculateBtn').disabled = t.count === 0;
    }

    function packageFor(recommendedKW) {
      return packages.find(packageItem => packageItem.kw >= recommendedKW) || null;
    }

    /**
     * Returns the suggested battery count.
     *
     * Default: energy-usage
     *   Battery count is based on daily energy + usage timing.
     *
     * Optional: system-kw
     *   Battery count can be based directly on matched package kW,
     *   but only after SOL.ARE confirms the kW-per-battery rule.
     */
    function calculateBatteryCount({
      packageItem,
      recommendedKW,
      dailyEnergyWh,
      usagePatternValue
    }) {
      const battery = ESTIMATOR_CONFIG.assumptions.battery;

      // IMPORTANT:
      // Battery sizing must NOT stop just because the recommended solar
      // system is larger than our biggest reference package.
      //
      // `packageItem` becomes null outside the package table (for example,
      // an 89 kW recommendation), but the energy-usage battery formula can
      // still be calculated from daily consumption and usage timing.
      //
      // For the optional system-kW mode, use the matched package kW when
      // available; otherwise use the calculated recommended system size.
      const systemKwForBattery =
        packageItem?.kw ?? Number(recommendedKW) ?? 0;

      // Optional future rule: direct system-kW sizing.
      if (
        battery.sizingMode === 'system-kw' &&
        Number(battery.systemKwPerBattery) > 0
      ) {
        if (systemKwForBattery <= 0) return 0;

        return Math.max(
          1,
          Math.ceil(systemKwForBattery / battery.systemKwPerBattery)
        );
      }

      // CURRENT BATTERY FORMULA: energy/usage-based sizing.
      //
      // Example:
      //   Daily consumption = 40 kWh
      //   Mostly evening coverage = 75%
      //   Energy to store = 40 × 0.75 = 30 kWh
      //
      //   One battery nominal energy = 16 kWh
      //   Usable DoD = 90%
      //   Usable energy/battery = 16 × 0.90 = 14.4 kWh
      //
      //   Battery count = ceil(30 ÷ 14.4)
      //                 = ceil(2.08)
      //                 = 3 batteries
      //
      // Step 1: Determine what percentage of daily energy needs storage.
      const coverage =
        battery.usageCoverage[usagePatternValue] ??
        battery.usageCoverage.balanced;

      // Step 2: Convert Wh/day to kWh/day.
      const dailyEnergyKwh = dailyEnergyWh / 1000;

      // Step 3: Estimate the amount of energy that must be stored.
      const energyToStoreKwh = dailyEnergyKwh * coverage;

      // Step 4: Calculate usable energy from one battery.
      const usableEnergyPerBatteryKwh =
        battery.nominalKwh * battery.usableDepthOfDischarge;

      // Step 5: Divide required storage by usable battery energy and
      // always round UP because we cannot recommend a fraction of a battery.
      return Math.max(
        1,
        Math.ceil(energyToStoreKwh / usableEnergyPerBatteryKwh)
      );
    }

    // =========================================================================
    // SOL.ARE ESTIMATOR FORMULAS — EASY REVIEW
    //
    // 1) PEAK LOAD
    //    Peak Load (W) = sum of (appliance watts × quantity)
    //
    // 2) DAILY ENERGY
    //    Appliance Daily Energy (Wh)
    //      = watts × quantity × hours/day
    //
    //    Total Daily Energy (Wh)
    //      = sum of all appliance daily energy
    //
    // 3) SOLAR SYSTEM SIZE
    //    Peak Requirement (kW)
    //      = Peak Load (W) ÷ 1,000
    //
    //    Energy Requirement (kW)
    //      = Daily Energy (Wh) ÷ (Peak Sun Hours × 1,000)
    //
    //    Recommended System (kW)
    //      = ceil(max(Peak Requirement, Energy Requirement))
    //
    // 4) PACKAGE MATCH
    //    Use the smallest configured package whose kW is >= recommended kW.
    //
    // 5) LOCATION-ADJUSTED PRICE
    //    Adjusted Price/kW
    //      = Package Price/kW + Location Addition/kW
    //
    //    Estimated Contract Price
    //      = Matched Package kW × Adjusted Price/kW
    //
    // 6) MONTHLY SOLAR OUTPUT
    //    Monthly Output (kWh)
    //      = panels × panelW × Peak Sun Hours × Days/Month
    //        × System Efficiency ÷ 1,000
    //
    // 7) MONTHLY SAVINGS
    //    Monthly Savings = Monthly Output × Electricity Rate
    //
    // 8) BATTERY COUNT — CURRENT DEFAULT
    //    Battery count is NOT directly based on system kW.
    //
    //    Energy to Store (kWh)
    //      = Daily Energy (kWh) × Usage Coverage
    //
    //    Usable Energy per Battery (kWh)
    //      = Nominal Battery kWh × Usable Depth of Discharge
    //
    //    Battery Count
    //      = ceil(Energy to Store ÷ Usable Energy per Battery)
    //
    //    Capacity shown: 314–324AH.
    //
    //    A per-system-kW mode is already supported in estimator-config.js,
    //    but it stays disabled until SOL.ARE confirms the actual rule.
    //
    // 9) PAYBACK
    //    Payback Years
    //      = Estimated Contract Price ÷ (Monthly Savings × 12)
    //
    // NOTE: This is a planning estimator. Final sizing/pricing still requires
    // technical/site assessment.
    // =========================================================================
    function calculate() {
      const {
        peakSunHours: PEAK_SUN_HOURS,
        daysPerMonth: DAYS_PER_MONTH,
        systemEfficiency: SYSTEM_EFFICIENCY,
        systemLifetimeYears: SYSTEM_LIFETIME_YEARS,
        defaultElectricityRate: DEFAULT_ELECTRICITY_RATE
      } = ESTIMATOR_CONFIG.assumptions;

      const t = totals();
      if (!t.count) return;

      // System sizing stays independent from pricing/location.
      const recommendedKW = Math.max(
        1,
        Math.ceil(
          Math.max(
            t.peak / 1000,
            t.energy / (PEAK_SUN_HOURS * 1000)
          )
        )
      );

      const pkg = packageFor(recommendedKW);
      const outsideReferenceRange = !pkg;

      // Location affects pricing only.
      const location = document.getElementById('locationSelect').value;
      const selectedLocation = locationFor(location);

      const finalPrice = pkg ? finalContractPrice(pkg, location) : null;
      const finalPricePerKw = pkg ? adjustedPricePerKw(pkg, location) : null;

      // Battery sizing is kept in a dedicated helper so the business rule
      // is easy to review and can later switch to a confirmed per-kW rule.
      const batteryConfig = ESTIMATOR_CONFIG.assumptions.battery;
      const batteryCount = calculateBatteryCount({
        packageItem: pkg,
        recommendedKW,
        dailyEnergyWh: t.energy,
        usagePatternValue: usagePattern
      });

      const rate = Math.max(
        1,
        Number(document.getElementById('rateInput').value) || DEFAULT_ELECTRICITY_RATE
      );

      const rawOutput = pkg
        ? (
            pkg.panels *
            pkg.panelW *
            PEAK_SUN_HOURS *
            DAYS_PER_MONTH *
            SYSTEM_EFFICIENCY /
            1000
          )
        : (
            recommendedKW *
            PEAK_SUN_HOURS *
            DAYS_PER_MONTH *
            SYSTEM_EFFICIENCY
          );

      const savings = rawOutput * rate;
      const roiYears = pkg ? finalPrice / (savings * 12) : null;
      const lifetime = pkg
        ? Math.max(0, savings * 12 * SYSTEM_LIFETIME_YEARS - finalPrice)
        : null;

      lastCalculation = {
        t,
        recommendedKW,
        pkg,
        outsideReferenceRange,
        selectedLocation,
        finalPrice,
        finalPricePerKw,
        batteryCount,
        batteryCapacity: batteryConfig.capacityLabel,
        rawOutput,
        savings,
        roiYears,
        lifetime
      };

      renderResult();
    }

    function renderResult() {
      if (!lastCalculation) return;

      const {
        t,
        recommendedKW,
        pkg,
        outsideReferenceRange,
        selectedLocation,
        finalPrice,
        finalPricePerKw,
        batteryCount,
        batteryCapacity,
        rawOutput,
        savings,
        roiYears,
        lifetime
      } = lastCalculation;

      document.getElementById('patternNote').textContent =
        usagePattern === 'day'
          ? 'Mostly daytime usage'
          : usagePattern === 'night'
            ? 'Mostly evening usage'
            : 'Balanced day-and-evening usage';

      document.getElementById('reasonLoad').textContent =
        `Your selected appliances total ${num(t.peak)} W peak and about ${num(t.energy)} Wh (${(t.energy / 1000).toFixed(1)} kWh) of estimated daily energy use.`;

      document.getElementById('reasonSize').textContent =
        outsideReferenceRange
          ? `Based on peak demand and daily energy, the planner suggests approximately ${recommendedKW} kW of solar capacity. This is above the current 18 kW reference range and requires a tailored assessment.`
          : `Based on peak demand and daily energy, the planner suggests approximately ${recommendedKW} kW of solar capacity and matches it to the next applicable SOL.ARE reference system.`;

      document.getElementById('reasonOutput').textContent =
        outsideReferenceRange
          ? `Estimated solar production for a nominal ${recommendedKW} kW system is about ${num(Math.round(rawOutput))} kWh per month. Final equipment configuration should be confirmed by SOL.ARE.`
          : `The matched ${pkg.kw} kW reference system is estimated to produce about ${num(Math.round(rawOutput))} kWh per month using the planner's current output assumptions.`;

      if (pkg) {
        document.getElementById('packageSizeValue').textContent =
          `${pkg.kw} kW Hybrid`;

        document.getElementById('packageRateValue').textContent =
          pesoPerKw(finalPricePerKw);

        document.getElementById('packagePriceValue').textContent =
          peso(Math.round(finalPrice));

        document.getElementById('packagePanelsValue').textContent =
          `${pkg.panels} panels`;
      } else {
        document.getElementById('packageSizeValue').textContent =
          `${recommendedKW} kW+ custom`;
        document.getElementById('packageRateValue').textContent =
          'Custom quotation';
        document.getElementById('packagePriceValue').textContent =
          'Site assessment required';
        document.getElementById('packagePanelsValue').textContent =
          'To be confirmed';
      }

      document.getElementById('batteryCountValue').textContent =
        batteryCount === 1 ? '1 battery' : `${batteryCount} batteries`;
      document.getElementById('batteryCapacityValue').textContent =
        `${batteryCapacity} each`;

      document.getElementById('outputValue').textContent =
        num(Math.round(rawOutput));

      document.getElementById('savingsValue').textContent =
        `₱${num(Math.round(savings))}`;

      document.getElementById('roiValue').textContent =
        Number.isFinite(roiYears)
          ? `~${Math.max(1, Math.round(roiYears))} years`
          : 'Requires quotation';

      document.getElementById('lifetimeValue').textContent =
        lifetime === null
          ? '25-year net savings can be calculated after the final quotation is confirmed.'
          : `Estimated 25-year net savings: ₱${num(Math.round(lifetime))}`;

      const result = document.getElementById('result');
      result.classList.remove('hidden');

      requestAnimationFrame(() => {
        result.classList.add('is-visible');
      });

      result.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    }

    // Event delegation for appliance controls.
    document.addEventListener('click', event => {
      const button = event.target.closest('[data-act]');
      if (!button) return;

      const id = button.dataset.id;
      const action = button.dataset.act;

      if (action === 'plus') state[id].qty++;

      if (action === 'minus') {
        state[id].qty = Math.max(0, state[id].qty - 1);
      }

      if (action === 'hours') {
        state[id].hours = Number(button.dataset.hours);
      }

      if (action === 'type') {
        state[id].inverter = button.dataset.inverter === '1';
      }

      renderAppliances(document.getElementById('search').value);
      updateSummary();
    });

    document.getElementById('search').addEventListener('input', event => {
      renderAppliances(event.target.value);
    });

    // Usage pattern selection.
    const usageButtons = [...document.querySelectorAll('.usage-card')];

    function renderUsagePattern() {
      usageButtons.forEach(button => {
        const selected = button.dataset.pattern === usagePattern;

        // Card state
        button.className = selected
          ? 'usage-card rounded-2xl border border-slate-950 bg-slate-950 p-5 text-left text-white shadow-lg transition hover:-translate-y-0.5'
          : 'usage-card rounded-2xl border border-slate-200 bg-white p-5 text-left text-slate-950 transition hover:-translate-y-0.5 hover:border-slate-300 hover:shadow-sm';

        // Title state
        const title = button.querySelector('[data-usage-title]');
        if (title) {
          title.className = selected
            ? 'flex flex-wrap items-center gap-2 text-sm font-bold text-white'
            : 'flex flex-wrap items-center gap-2 text-sm font-bold text-slate-950';
        }

        // Description state
        const description = button.querySelector('[data-usage-description]');
        if (description) {
          description.className = selected
            ? 'mt-2 block text-sm leading-6 text-slate-300'
            : 'mt-2 block text-sm leading-6 text-slate-500';
        }

        // "Common" badge state (Balanced card only)
        const badge = button.querySelector('[data-usage-badge]');
        if (badge) {
          badge.className = selected
            ? 'rounded-full bg-solar-400 px-2 py-1 text-[9px] font-extrabold uppercase tracking-wider text-slate-950'
            : 'rounded-full bg-solar-50 px-2 py-1 text-[9px] font-extrabold uppercase tracking-wider text-solar-700';
        }
      });
    }

    usageButtons.forEach(button => {
      button.addEventListener('click', () => {
        usagePattern = button.dataset.pattern;
        renderUsagePattern();

        if (lastCalculation) {
          calculate();
        }
      });
    });

    // Custom appliance form.
    const customForm = document.getElementById('customForm');
    const customToggle = document.getElementById('customToggle');

    function openCustomApplianceForm() {
      customForm.classList.remove('hidden');
      customToggle.classList.add('hidden');
    }

    function closeCustomApplianceForm() {
      customForm.classList.add('hidden');
      customToggle.classList.remove('hidden');

      if (typeof clearCustomValidation === 'function') {
        clearCustomValidation();
      }
    }

    customToggle.addEventListener('click', openCustomApplianceForm);
    document.getElementById('closeCustom').addEventListener('click', closeCustomApplianceForm);

    // -------------------------------------------------------------------------
    // CUSTOM APPLIANCE INLINE VALIDATION
    //
    // Errors are displayed directly below the corresponding field.
    // No browser alert() is used.
    // -------------------------------------------------------------------------
    const customFieldValidation = {
      customName: {
        input: document.getElementById('customName'),
        error: document.getElementById('customNameError')
      },
      customWatts: {
        input: document.getElementById('customWatts'),
        error: document.getElementById('customWattsError')
      },
      customQty: {
        input: document.getElementById('customQty'),
        error: document.getElementById('customQtyError')
      },
      customHours: {
        input: document.getElementById('customHours'),
        error: document.getElementById('customHoursError')
      }
    };

    function setCustomFieldError(fieldName, message = '') {
      const field = customFieldValidation[fieldName];
      if (!field) return;

      field.error.textContent = message;
      field.error.classList.toggle('hidden', !message);

      field.input.classList.toggle('border-red-400', Boolean(message));
      field.input.classList.toggle('focus:border-red-500', Boolean(message));
      field.input.classList.toggle('focus:ring-red-100', Boolean(message));

      if (message) {
        field.input.setAttribute('aria-invalid', 'true');
      } else {
        field.input.removeAttribute('aria-invalid');
      }
    }

    function clearCustomValidation() {
      Object.keys(customFieldValidation).forEach(fieldName => {
        setCustomFieldError(fieldName);
      });
    }

    // Clear an individual error as soon as the user edits that field.
    Object.entries(customFieldValidation).forEach(([fieldName, field]) => {
      field.input.addEventListener('input', () => {
        setCustomFieldError(fieldName);
      });
    });

    document.getElementById('addCustom').addEventListener('click', () => {
      const name = document.getElementById('customName').value.trim();
      const watts = Number(document.getElementById('customWatts').value);
      const qty = Number(document.getElementById('customQty').value);
      const hours = Number(document.getElementById('customHours').value);
      const limits = ESTIMATOR_CONFIG.assumptions.customAppliance;

      clearCustomValidation();

      let firstInvalidInput = null;

      if (!name) {
        setCustomFieldError(
          'customName',
          'Please enter the appliance name.'
        );
        firstInvalidInput ||= customFieldValidation.customName.input;
      } else if (name.length > limits.nameMaxLength) {
        setCustomFieldError(
          'customName',
          `Appliance name must be ${limits.nameMaxLength} characters or less.`
        );
        firstInvalidInput ||= customFieldValidation.customName.input;
      }

      if (
        !Number.isFinite(watts) ||
        watts < limits.wattageMin ||
        watts > limits.wattageMax
      ) {
        setCustomFieldError(
          'customWatts',
          `Enter a wattage between ${limits.wattageMin.toLocaleString()} and ${limits.wattageMax.toLocaleString()} W.`
        );
        firstInvalidInput ||= customFieldValidation.customWatts.input;
      }

      if (
        !Number.isInteger(qty) ||
        qty < limits.quantityMin ||
        qty > limits.quantityMax
      ) {
        setCustomFieldError(
          'customQty',
          `Enter a quantity between ${limits.quantityMin} and ${limits.quantityMax}.`
        );
        firstInvalidInput ||= customFieldValidation.customQty.input;
      }

      if (
        !Number.isFinite(hours) ||
        hours < limits.hoursMin ||
        hours > limits.hoursMax
      ) {
        setCustomFieldError(
          'customHours',
          `Enter hours per day between ${limits.hoursMin} and ${limits.hoursMax}.`
        );
        firstInvalidInput ||= customFieldValidation.customHours.input;
      }

      if (firstInvalidInput) {
        firstInvalidInput.focus();
        return;
      }

      customItems.push({
        id: `c${Date.now()}`,
        name,
        watts,
        qty,
        hours
      });

      document.getElementById('customName').value = '';
      document.getElementById('customWatts').value = '';
      clearCustomValidation();

      renderCustom();
      updateSummary();
      closeCustomApplianceForm();
    });

    function renderCustom() {
      const root = document.getElementById('customList');

      root.innerHTML = customItems
        .map(item => SolareEstimatorTemplates.customApplianceCard(item))
        .join('');
    }

    document.getElementById('customList').addEventListener('click', event => {
      const button = event.target.closest('[data-remove]');
      if (!button) return;

      const id = button.dataset.remove;
      customItems = customItems.filter(item => item.id !== id);

      renderCustom();
      updateSummary();

      if (lastCalculation && totals().count) {
        calculate();
      } else if (!totals().count) {
        lastCalculation = null;
        document.getElementById('result').classList.add('hidden');
      }
    });

    document.getElementById('calculateBtn').addEventListener('click', calculate);

    document.getElementById('rateInput').addEventListener('change', () => {
      if (lastCalculation) calculate();
    });

    // Recalculate displayed price/ROI if the location changes.
    document.getElementById('locationSelect').addEventListener('change', () => {
      if (lastCalculation) calculate();
    });

    // Same mobile menu behavior as landing page.
    const menuButton = document.getElementById('menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const openIcon = document.getElementById('menu-open-icon');
    const closeIcon = document.getElementById('menu-close-icon');

    function toggleMenu() {
      const isOpen = !mobileMenu.classList.contains('hidden');

      mobileMenu.classList.toggle('hidden', isOpen);
      openIcon.classList.toggle('hidden', !isOpen);
      closeIcon.classList.toggle('hidden', isOpen);
      menuButton.setAttribute('aria-expanded', String(!isOpen));
    }

    menuButton.addEventListener('click', toggleMenu);

    document.querySelectorAll('.mobile-link').forEach(link => {
      link.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
        openIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
        menuButton.setAttribute('aria-expanded', 'false');
      });
    });

    // Same subtle reveal pattern used on the landing page.
    const revealTargets = [...document.querySelectorAll('.reveal-on-scroll')];

    const revealObserver = new IntersectionObserver(
      entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            revealObserver.unobserve(entry.target);
          }
        });
      },
      {
        threshold: 0.1,
        rootMargin: '0px 0px -40px 0px'
      }
    );

    revealTargets.forEach(element => revealObserver.observe(element));

    // Populate locations from the editable config file.
    const locationSelect = document.getElementById('locationSelect');

    locations.forEach(location => {
      const option = document.createElement('option');
      option.value = location.id;
      option.textContent = location.label;
      locationSelect.appendChild(option);
    });

    renderAppliances();
    renderUsagePattern();
    updateSummary();