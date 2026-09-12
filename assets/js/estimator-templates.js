/**
 * SOL.ARE Estimator - Generated HTML Templates
 * Change generated-card DESIGN here.
 */
(function () {
  'use strict';

  function escapeHTML(value = '') {
    return String(value)
      .replaceAll('&', '&amp;')
      .replaceAll('<', '&lt;')
      .replaceAll('>', '&gt;')
      .replaceAll('"', '&quot;')
      .replaceAll("'", '&#039;');
  }

  function applianceCard({
    id, name, watts, icon, quantity, active,
    effectivePeakWatts, dailyEnergy, selectedHours,
    hourOptions, isAircon, inverter
  }) {
    const safeId = escapeHTML(id);
    const safeName = escapeHTML(name);

    const hourButtons = hourOptions.map(hours => `
      <button
        type="button"
        data-act="hours"
        data-id="${safeId}"
        data-hours="${hours}"
        class="rounded-lg border px-2.5 py-1.5 text-[11px] font-bold transition ${
          selectedHours === hours
            ? 'border-slate-950 bg-slate-950 text-white'
            : 'border-slate-200 bg-white text-slate-500 hover:border-slate-300'
        }"
      >${hours < 1 ? `${Math.round(hours * 60)}min` : `${hours}h`}</button>
    `).join('');

    const airconControls = isAircon ? `
      <div class="mt-3 flex flex-wrap gap-2">
        <button type="button" data-act="type" data-id="${safeId}" data-inverter="0"
          class="rounded-lg border px-2.5 py-1.5 text-[11px] font-bold ${
            !inverter ? 'border-slate-950 bg-slate-950 text-white' : 'border-slate-200 bg-white text-slate-500'
          }">Conventional</button>

        <button type="button" data-act="type" data-id="${safeId}" data-inverter="1"
          class="rounded-lg border px-2.5 py-1.5 text-[11px] font-bold ${
            inverter ? 'border-slate-950 bg-slate-950 text-white' : 'border-slate-200 bg-white text-slate-500'
          }">Inverter (estimated -50%)</button>
      </div>
    ` : '';

    return `
      <div class="flex items-start gap-3">
        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl ${
          active ? 'bg-slate-950 text-solar-300' : 'bg-slate-100 text-slate-500'
        } text-lg">${escapeHTML(icon)}</div>

        <div class="min-w-0 flex-1">
          <p class="truncate text-sm font-bold text-slate-950" title="${safeName}">${safeName}</p>
          <p class="mt-0.5 text-xs text-slate-500">
            ${Number(watts).toLocaleString()}W each
            ${active ? `· <span class="font-bold text-solar-700">${Number(effectivePeakWatts).toLocaleString()}W peak</span>` : ''}
          </p>
        </div>

        <div class="flex shrink-0 items-center gap-1.5 sm:gap-2">
          <button type="button" data-act="minus" data-id="${safeId}" ${quantity === 0 ? 'disabled' : ''}
            class="flex h-8 w-8 items-center justify-center rounded-xl border border-slate-200 bg-white disabled:opacity-35 sm:h-9 sm:w-9">−</button>
          <span class="w-5 text-center text-sm font-bold">${quantity}</span>
          <button type="button" data-act="plus" data-id="${safeId}"
            class="flex h-8 w-8 items-center justify-center rounded-xl border border-slate-200 bg-white sm:h-9 sm:w-9">+</button>
        </div>
      </div>

      ${quantity > 0 ? `
        <div class="mt-4 border-t border-slate-200/70 pt-3">
          <div class="flex flex-wrap items-center gap-2">
            <span class="mr-1 text-[10px] font-bold uppercase tracking-[0.12em] text-slate-400">Daily use</span>
            ${hourButtons}
          </div>
          ${airconControls}
          <div class="mt-3 flex items-center justify-between text-xs">
            <span class="text-slate-400">Estimated daily energy</span>
            <strong class="text-slate-700">${(dailyEnergy / 1000).toFixed(2)} kWh/day</strong>
          </div>
        </div>
      ` : ''}
    `;
  }

  function customApplianceCard(item) {
    return `
      <div class="flex items-center justify-between gap-4 rounded-xl border border-slate-200 bg-white px-4 py-3">
        <div class="min-w-0">
          <p class="truncate text-sm font-bold text-slate-900">${escapeHTML(item.name)}</p>
          <p class="mt-1 text-xs text-slate-500">
            ${Number(item.watts).toLocaleString()}W × ${item.qty} · ${item.hours}h/day
          </p>
        </div>
        <button type="button" data-custom-remove="${escapeHTML(item.id)}"
          class="shrink-0 rounded-lg border border-slate-200 px-3 py-2 text-xs font-bold text-slate-500 hover:bg-red-50 hover:text-red-600">
          Remove
        </button>
      </div>
    `;
  }

  window.SolareEstimatorTemplates = {
    applianceCard,
    customApplianceCard
  };
})();
