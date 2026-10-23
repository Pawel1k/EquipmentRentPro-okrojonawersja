<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Przykładowy produkt — EquipRent Pro</title>
    <link rel="stylesheet" href="{{ asset('style-head.css') }}">
    <link rel="stylesheet" href="{{ asset('style-foot.css') }}">
    <link rel="stylesheet" href="{{ asset('style-prod.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('E.png') }}">
</head>
<body>

@include('partials.header')

<main>
<div class="product-page">

    <div class="product-breadcrumb">
        <a href="/catalog">Katalog</a>
        <span>›</span>
        <span class="product-breadcrumb-active">Rower górski MTB</span>
    </div>

    <div class="product-gallery-fullwidth">
        <div class="product-gallery">
            <div class="product-gallery-main">
                <img src="https://placehold.co/800x420/1a1a1a/666?text=Zdjecie+1" style="border-radius:0;width:100%;height:100%;object-fit:cover;">
            </div>
            <div class="product-gallery-side">
                <img src="https://placehold.co/400x207/1a1a1a/666?text=Zdjecie+2" style="height:207px;border-radius:0;width:100%;object-fit:cover;">
                <div class="product-gallery-side-last">
                    <img src="https://placehold.co/400x207/1a1a1a/666?text=Zdjecie+3" style="height:207px;border-radius:0;width:100%;object-fit:cover;">
                    <button type="button" class="product-see-all-btn" id="gallery-open-btn">⊞ ZOBACZ WSZYSTKIE ZDJĘCIA</button>
                </div>
            </div>
        </div>
    </div>

    <div class="product-layout">

        <div class="product-left">
            <div class="product-badges">
                <span class="product-status-badge product-status-available">
                    <span class="product-status-dot"></span>
                    Dostępny
                </span>
            </div>

            <h1 class="product-title">Rower górski MTB</h1>
            <p class="product-description">
                <span style="width:90%;height:14px;border-radius:3px;display:block;margin-bottom:6px;">SN-BIKE-001</span>
                <span style="width:60%;height:14px;border-radius:3px;display:block;">Profesjonalny rower górski do jazdy terenowej. Idealny do tras górskich i leśnych. W zestawie: kask, bidon, mini pompka.</span>
            </p>

            <div class="product-section-title">Twoje Rezerwacje</div>
            <div class="product-sub-label">Aktywne rezerwacje</div>
            <div id="my-active-reservations">
                <div class="product-reservation-card">
                    <div class="product-res-col">
                        <div class="product-spec-label">Okres</div>
                        <div class="product-res-id">15.10.2026 → 18.10.2026</div>
                    </div>
                    <div class="product-res-col">
                        <div class="product-spec-label">Status</div>
                        <span>Aktywna</span>
                    </div>
                    <div class="product-res-col">
                        <div class="product-spec-label">Suma opłacona</div>
                        <div class="product-res-price">425 zł</div>
                    </div>
                    <button class="product-btn-cancel" type="button">Anuluj rezerwację</button>
                </div>
            </div>

            <div style="margin-top:28px;">
                <div class="product-sub-label">Historia wynajmu — ostatnie 5</div>
                <table class="product-history-table">
                    <thead>
                        <tr>
                            <th>ID Rezerwacji</th><th>Daty</th><th>Suma</th><th>Akcja</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#12</td>
                            <td>01.09.2026 — 05.09.2026</td>
                            <td>425 zł</td>
                            <td>—</td>
                        </tr>
                        <tr>
                            <td>#8</td>
                            <td>15.07.2026 — 18.07.2026</td>
                            <td>340 zł</td>
                            <td>—</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            

        </div>

        <div class="product-booking-panel">

            <div class="product-booking-price">
                85 ZŁ <span>/ 24h doba</span>
            </div>
            <div class="product-booking-rating">
                <span class="product-stars">★</span>
                <small>4.9 wskaźnik niezawodności</small>
            </div>

            <div class="product-range-display" id="product-selected-range">
                Wybierz daty przyjazdu i odjazdu
            </div>

            <div class="product-calendar-label">Wybierz okres wynajmu</div>

            <div class="product-calendar">
                <div class="product-calendar-header">
                    <button class="product-cal-nav" id="product-cal-prev">‹</button>
                    <span class="product-calendar-month" id="product-calendar-month"></span>
                    <button class="product-cal-nav" id="product-cal-next">›</button>
                </div>
                <div class="product-cal-grid" id="product-cal-grid"></div>
            </div>

            <div class="product-price-breakdown">
                <div class="product-price-row">
                    <span id="pb-days-label">Wybierz daty</span>
                    <span id="pb-days-price">—</span>
                </div>
                <div class="product-price-row">
                    <span>Opłata serwisowa</span>
                    <span id="pb-service">—</span>
                </div>
                <div class="product-price-row">
                    <span>Logistyka (estymacja)</span>
                    <span id="pb-logistics">—</span>
                </div>
                <div class="product-price-row product-total">
                    <span>Suma</span>
                    <span id="pb-total">—</span>
                </div>
            </div>

            <button class="product-btn-reserve product-btn-disabled" id="product-btn-reserve">
                Potwierdź i kontynuuj →
            </button>
            <p class="product-booking-note">
                Bezpieczne zamówienia sportowe. Darmowe anulowanie do 48h przed odbiorem.
            </p>

        </div>
    </div>

</div>
</main>

<div class="gallery-backdrop" id="gallery-backdrop">
    <div class="gallery-modal">
        <div class="gallery-header">
            <span class="gallery-title">Galeria zdjęć</span>
            <button type="button" class="gallery-close" id="gallery-close-btn" aria-label="Zamknij">✕</button>
        </div>
        <div class="gallery-body">
            <div class="gallery-grid">
                <img class="gallery-thumb" src="https://placehold.co/400x300/1a1a1a/666?text=Zdjecie+1" data-idx="0">
                <img class="gallery-thumb" src="https://placehold.co/400x300/1a1a1a/666?text=Zdjecie+2" data-idx="1">
                <img class="gallery-thumb" src="https://placehold.co/400x300/1a1a1a/666?text=Zdjecie+3" data-idx="2">
                <img class="gallery-thumb" src="https://placehold.co/400x300/1a1a1a/666?text=Zdjecie+4" data-idx="3">
            </div>
        </div>
        <div class="gallery-zoom" id="gallery-zoom">
            <button type="button" class="gallery-zoom-back" id="gallery-zoom-back">← Powrót do galerii</button>
            <img class="gallery-zoom-img" id="gallery-zoom-img"/>
        </div>
    </div>
</div>

@include('partials.footer')

<script>
(function () {
    'use strict';

    const PRICE_PER_DAY = 85;
    const SERVICE_FEE = 120;
    const LOGISTICS_FEE = 250;

    let startDate = null;
    let endDate = null;
    let currentYear = new Date().getFullYear();
    let currentMonth = new Date().getMonth();

    function isPast(y, m, d) {
        const today = new Date(); today.setHours(0,0,0,0);
        return new Date(y, m, d) < today;
    }
    function inRange(y, m, d) {
        if (!startDate || !endDate) return false;
        const date = new Date(y, m, d);
        return date > startDate && date < endDate;
    }
    function isStart(y, m, d) {
        if (!startDate) return false;
        return startDate.getFullYear()===y && startDate.getMonth()===m && startDate.getDate()===d;
    }
    function isEnd(y, m, d) {
        if (!endDate) return false;
        return endDate.getFullYear()===y && endDate.getMonth()===m && endDate.getDate()===d;
    }
    function daysBetween(a, b) { return Math.round((b - a) / 86400000); }
    function formatDatePl(date) {
        if (!date) return '—';
        return date.toLocaleDateString('pl-PL', { day:'2-digit', month:'short', year:'numeric' });
    }

    function renderCalendar() {
        const grid = document.getElementById('product-cal-grid');
        const monthEl = document.getElementById('product-calendar-month');
        if (!grid || !monthEl) return;

        const monthNames = ['Styczeń','Luty','Marzec','Kwiecień','Maj','Czerwiec','Lipiec','Sierpień','Wrzesień','Październik','Listopad','Grudzień'];
        monthEl.textContent = `${monthNames[currentMonth]} ${currentYear}`;
        grid.innerHTML = '';

        ['Pn','Wt','Śr','Cz','Pt','Sb','Nd'].forEach(d => {
            const el = document.createElement('div');
            el.className = 'product-cal-day-label';
            el.textContent = d;
            grid.appendChild(el);
        });

        const firstDay = new Date(currentYear, currentMonth, 1).getDay();
        const offset = (firstDay === 0) ? 6 : firstDay - 1;
        for (let i = 0; i < offset; i++) {
            const el = document.createElement('div');
            el.className = 'product-cal-day';
            grid.appendChild(el);
        }

        const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
        for (let d = 1; d <= daysInMonth; d++) {
            const el = document.createElement('div');
            el.className = 'product-cal-day';
            el.textContent = d;

            if (isPast(currentYear, currentMonth, d)) {
                el.classList.add('product-disabled');
            } else {
                if (isStart(currentYear, currentMonth, d)) el.classList.add('product-selected', 'product-range-start');
                if (isEnd(currentYear, currentMonth, d)) el.classList.add('product-selected', 'product-range-end');
                if (inRange(currentYear, currentMonth, d)) el.classList.add('product-in-range');

                const y = currentYear, m = currentMonth, day = d;
                el.addEventListener('click', () => handleDayClick(y, m, day));
            }
            grid.appendChild(el);
        }
    }

    function handleDayClick(y, m, d) {
        const clicked = new Date(y, m, d);
        if (!startDate || (startDate && endDate)) {
            startDate = clicked;
            endDate = null;
        } else {
            if (clicked <= startDate) {
                startDate = clicked;
                endDate = null;
            } else {
                endDate = clicked;
            }
        }
        renderCalendar();
        updatePriceBreakdown();
    }

    function updatePriceBreakdown() {
        const daysEl = document.getElementById('pb-days-label');
        const daysPrice = document.getElementById('pb-days-price');
        const serviceEl = document.getElementById('pb-service');
        const logistEl = document.getElementById('pb-logistics');
        const totalEl = document.getElementById('pb-total');
        const rangeEl = document.getElementById('product-selected-range');
        const btnEl = document.getElementById('product-btn-reserve');

        if (!startDate || !endDate) {
            if (daysEl) daysEl.textContent = 'Wybierz daty';
            if (daysPrice) daysPrice.textContent = '—';
            if (serviceEl) serviceEl.textContent = '—';
            if (logistEl) logistEl.textContent = '—';
            if (totalEl) totalEl.textContent = '—';
            if (rangeEl) rangeEl.textContent = 'Wybierz daty przyjazdu i odjazdu';
            if (btnEl) btnEl.classList.add('product-btn-disabled');
            return;
        }

        const days = daysBetween(startDate, endDate);
        const rental = days * PRICE_PER_DAY;
        const total = rental + SERVICE_FEE + LOGISTICS_FEE;

        if (daysEl) daysEl.textContent = `${days} ${days === 1 ? 'dzień' : 'dni'} wynajmu`;
        if (daysPrice) daysPrice.textContent = `${rental.toFixed(2).replace('.',',')} zł`;
        if (serviceEl) serviceEl.textContent = `${SERVICE_FEE.toFixed(2).replace('.',',')} zł`;
        if (logistEl) logistEl.textContent = `${LOGISTICS_FEE.toFixed(2).replace('.',',')} zł`;
        if (totalEl) totalEl.textContent = `${total.toFixed(2).replace('.',',')} zł`;
        if (rangeEl) rangeEl.textContent = `${formatDatePl(startDate)} → ${formatDatePl(endDate)}`;
        if (btnEl) btnEl.classList.remove('product-btn-disabled');
    }

    document.getElementById('product-cal-prev')?.addEventListener('click', () => {
        currentMonth--;
        if (currentMonth < 0) { currentMonth = 11; currentYear--; }
        renderCalendar();
    });

    document.getElementById('product-cal-next')?.addEventListener('click', () => {
        currentMonth++;
        if (currentMonth > 11) { currentMonth = 0; currentYear++; }
        renderCalendar();
    });

    renderCalendar();
    updatePriceBreakdown();
})();
</script>

<script>
(function() {
    const backdrop = document.getElementById('gallery-backdrop');
    const openBtn = document.getElementById('gallery-open-btn');
    const closeBtn = document.getElementById('gallery-close-btn');
    const zoom = document.getElementById('gallery-zoom');
    const zoomImg = document.getElementById('gallery-zoom-img');
    const zoomBack = document.getElementById('gallery-zoom-back');
    const thumbs = document.querySelectorAll('.gallery-thumb');

    if (!backdrop || !openBtn) return;

    function openGallery() {
        backdrop.classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closeGallery() {
        backdrop.classList.remove('open');
        zoom.classList.remove('open');
        document.body.style.overflow = '';
    }
    function openZoom(idx, src) {
        zoomImg.setAttribute('data-current', idx);
        zoomImg.src = src;
        zoom.classList.add('open');
    }
    function closeZoom() {
        zoom.classList.remove('open');
    }

    openBtn.addEventListener('click', openGallery);
    closeBtn.addEventListener('click', closeGallery);
    zoomBack.addEventListener('click', closeZoom);

    backdrop.addEventListener('click', (e) => {
        if (e.target === backdrop) closeGallery();
    });

    thumbs.forEach(t => {
        t.addEventListener('click', () => openZoom(t.dataset.idx, t.src));
    });

    document.addEventListener('keydown', (e) => {
        if (e.key !== 'Escape') return;
        if (zoom.classList.contains('open')) closeZoom();
        else if (backdrop.classList.contains('open')) closeGallery();
    });
})();
</script>

</body>
</html>