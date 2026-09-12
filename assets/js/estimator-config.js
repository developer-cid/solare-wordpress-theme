/**
 * SOL.ARE Solar Planner - Editable Settings
 * =========================================
 * Edit this file when pricing/location values change.
 *
 * FORMULA
 * Adjusted Price per kW =
 *   Base Package Price per kW + Location Addition per kW
 *
 * Estimated Contract Price =
 *   System Size (kW) x Adjusted Price per kW
 *
 * All location additions are currently 0 while waiting for final values.
 */

window.SOLARE_ESTIMATOR_CONFIG = {
  assumptions: {
    peakSunHours: 4,
    daysPerMonth: 30,
    systemEfficiency: 0.8,
    systemLifetimeYears: 25,
    defaultElectricityRate: 15,

    customAppliance: {
      nameMaxLength: 80,
      wattageMin: 1,
      wattageMax: 10000,
      quantityMin: 1,
      quantityMax: 50,
      hoursMin: 0.5,
      hoursMax: 24
    },

    /**
     * BATTERY SIZING — EASY EXPLANATION
     * ---------------------------------
     * Current mode: 'energy-usage'
     *
     * PURPOSE:
     * Estimate how many batteries may be needed based on:
     *   1. how much electricity the household uses per day, and
     *   2. when that electricity is normally used.
     *
     * IMPORTANT:
     * Battery count is NOT currently based directly on solar-system kW.
     * SOL.ARE confirmed the reference battery capacity as 314–324AH,
     * but we do not yet have a confirmed rule such as
     * "1 battery for every 5 kW of solar".
     *
     * STEP 1 — Convert daily consumption to kWh
     *
     *   Daily Energy (kWh) = Daily Energy (Wh) ÷ 1,000
     *
     * Example:
     *   40,000 Wh/day ÷ 1,000 = 40 kWh/day
     *
     * STEP 2 — Estimate how much daily energy needs battery storage
     *
     * Not all electricity needs to come from the battery.
     * During daytime, solar panels can power appliances directly.
     * Evening/night consumption relies more heavily on stored energy.
     *
     *   Energy to Store (kWh)
     *   = Daily Energy (kWh) × Usage Coverage
     *
     * Current planning coverage:
     *   Mostly daytime = 25%
     *   Balanced       = 50%
     *   Mostly evening = 75%
     *
     * Example for 40 kWh/day + Mostly evening:
     *   40 kWh × 75% = 30 kWh to store
     *
     * STEP 3 — Calculate usable energy from ONE battery
     *
     * We currently use 16 kWh as the nominal-energy assumption for one
     * 314–324AH battery. The exact battery model/voltage should still be
     * confirmed by SOL.ARE.
     *
     * We also use 90% usable depth of discharge (DoD), meaning we plan
     * around 90% of the battery's nominal energy instead of assuming
     * the full 100% is available.
     *
     *   Usable Energy per Battery
     *   = Nominal Battery Energy × Usable Depth of Discharge
     *
     *   = 16 kWh × 90%
     *   = 14.4 kWh usable per battery
     *
     * STEP 4 — Calculate battery count
     *
     *   Battery Count
     *   = ceil(Energy to Store ÷ Usable Energy per Battery)
     *
     * We use ceil() because a fraction of a battery must be rounded UP.
     *
     * Continuing the example:
     *   Energy to store = 30 kWh
     *   Usable per battery = 14.4 kWh
     *
     *   30 ÷ 14.4 = 2.08
     *   ceil(2.08) = 3 batteries
     *
     * RESULT:
     *   Suggested battery count = 3
     *   Reference capacity = 314–324AH each
     *
     * NOTE:
     * This is a PLANNING ESTIMATE only. Final battery sizing depends on
     * the actual battery model/voltage, usable capacity, desired backup
     * duration, inverter compatibility, load profile, and site assessment.
     *
     * OPTIONAL FUTURE MODE:
     * If SOL.ARE later confirms a direct system-size rule, for example
     * "1 battery per 5 kW", change:
     *
     *   sizingMode: 'system-kw'
     *   systemKwPerBattery: 5
     *
     * The estimator already supports that alternative rule.
     */
    battery: {
      sizingMode: 'energy-usage',

      // Capacity label shown in the result.
      capacityLabel: '314–324AH',

      // Planning assumption for one battery.
      // Confirm the exact battery model/kWh with SOL.ARE when available.
      nominalKwh: 16,

      // 0.90 means 90% of nominal battery energy is treated as usable.
      usableDepthOfDischarge: 0.9,

      // Portion of daily energy expected to require battery storage.
      usageCoverage: {
        day: 0.25,
        balanced: 0.5,
        evening: 0.75
      },

      // Used ONLY when sizingMode = 'system-kw'.
      // Keep 0 until SOL.ARE confirms the actual rule.
      systemKwPerBattery: 0
    }
  },

  /**
   * LOCATION PRICING
   * ----------------
   * Adjusted Price/kW = Package Price/kW + Location Addition/kW
   * Estimated Contract Price = System kW × Adjusted Price/kW
   *
   * All location additions are currently 0.
   */
  locations: [
    { id: 'metro-manila', label: 'Metro Manila (NCR)', pricePerKwAdd: 0 },
    { id: 'calabarzon', label: 'CALABARZON', pricePerKwAdd: 0 },
    { id: 'central-luzon', label: 'Central Luzon', pricePerKwAdd: 0 },
    { id: 'others', label: 'Others', pricePerKwAdd: 0 }
  ],

  /**
   * PACKAGE PRICING
   * ---------------
   * Edit only pricePerKw when pricing changes.
   * The contract price is calculated automatically.
   */
  packages: [
    { kw: 5,  panels: 9,  panelW: 620, pricePerKw: 64000 },
    { kw: 6,  panels: 10, panelW: 620, pricePerKw: 66666.67 },
    { kw: 8,  panels: 14, panelW: 620, pricePerKw: 57500 },
    { kw: 10, panels: 18, panelW: 620, pricePerKw: 52000 },
    { kw: 12, panels: 20, panelW: 620, pricePerKw: 49166.67 },
    { kw: 16, panels: 26, panelW: 620, pricePerKw: 45000 },
    { kw: 18, panels: 30, panelW: 620, pricePerKw: 47222.22 }
  ]
};
