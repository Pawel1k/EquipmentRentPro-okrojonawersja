<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Finalizacja Wynajmu – EquipRent Pro</title>
    <link rel="stylesheet" href="{{ asset('style-head.css') }}">
    <link rel="stylesheet" href="{{ asset('style-foot.css') }}">
    <link rel="stylesheet" href="{{ asset('style-platnosc.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('E.png') }}">
</head>
<body class="pay-page">

@include('partials.header')

<main class="pay-wrapper">

    <a href="{{ route('catalog') }}" class="pay-back">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="19" y1="12" x2="5" y2="12"/>
            <polyline points="12 19 5 12 12 5"/>
        </svg>
        Powrót do inwentarza
    </a>
    <h1 class="pay-title">Finalizacja Wynajmu</h1>

    <div class="pay-grid">

        <div class="pay-card">
            <div class="pay-card-header">
                <span class="pay-card-title">Metoda Płatności</span>
                <span class="pay-ssl">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                    Bezpieczne połączenie SSL
                </span>
            </div>

            <form id="pay-form" onsubmit="event.preventDefault(); alert('Płatność zrealizowana (placeholder)'); window.location.href='/rezerwacje';">

                <div class="pay-methods-list">
                    <label class="pay-method-option selected" data-value="1">
                        <input type="radio" name="pay-method" value="1" checked>
                        <span class="pay-method-label">
                            VISA •••• 4242
                            <div class="pay-method-sub">Paweł Nowak · Ważna do 12/2028 · zapisana</div>
                        </span>
                        <button type="button" class="pay-method-remove" title="Usuń kartę">✕</button>
                    </label>

                    <label class="pay-method-option" data-value="2">
                        <input type="radio" name="pay-method" value="2">
                        <span class="pay-method-label">
                            MC •••• 5555
                            <div class="pay-method-sub">Paweł Nowak · Ważna do 03/2027 · zapisana</div>
                        </span>
                        <button type="button" class="pay-method-remove" title="Usuń kartę">✕</button>
                    </label>

                    <label class="pay-method-option" data-value="new">
                        <input type="radio" name="pay-method" value="new">
                        <span class="pay-method-label">
                            Nowa karta
                            <div class="pay-method-sub">Wpisz dane karty poniżej</div>
                        </span>
                    </label>
                </div>

                <div id="pay-new-card-block" style="display:none;">
                    <div class="pay-form-group">
                        <label class="pay-label" for="pay-name">Imię i nazwisko posiadacza karty *</label>
                        <input type="text" id="pay-name" class="pay-input" placeholder="Jan Kowalski">
                    </div>

                    <div class="pay-form-group">
                        <label class="pay-label">Numer karty</label>
                        <input type="text" class="pay-input" placeholder="1234 5678 9012 3456">
                    </div>

                    <label class="pay-save-row">
                        <input type="checkbox" checked>
                        Zapisz kartę do przyszłych płatności (maks. 3 karty)
                    </label>
                </div>

                <button type="submit" class="pay-submit">
                    <span>Zapłać 795,00 PLN teraz</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </button>
            </form>

            <div class="pay-card-footer">
                <div class="pay-pci-logo"></div>
                <span class="pay-pci-badge">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                    Zgodność PCI
                </span>
            </div>
        </div>

        <div>
            <div class="pay-summary">

                <div class="pay-hero">
                    <div class="pay-hero-overlay"></div>
                    <span class="pay-hero-cat">Sprzęt sportowy</span>
                    <div class="pay-hero-title">Rower górski MTB</div>
                </div>

                <div class="pay-dates">
                    <div class="pay-date-col">
                        <div class="pay-date-label">Odbiór</div>
                        <div class="pay-date-value">15 paź 2026</div>
                    </div>
                    <div class="pay-date-arrow">→</div>
                    <div class="pay-date-col end">
                        <div class="pay-date-label">Zwrot</div>
                        <div class="pay-date-value">18 paź 2026</div>
                    </div>
                </div>

                <div class="pay-items">
                    <div class="pay-item">
                        <span class="pay-item-label">Wynajem <small>(3 dni)</small></span>
                        <span class="pay-item-amount">425,00 PLN</span>
                    </div>
                    <div class="pay-item">
                        <span class="pay-item-label">Opłata serwisowa</span>
                        <span class="pay-item-amount">120,00 PLN</span>
                    </div>
                    <div class="pay-item">
                        <span class="pay-item-label">Logistyka</span>
                        <span class="pay-item-amount">250,00 PLN</span>
                    </div>
                </div>

                <div class="pay-total">
                    <span class="pay-total-label">Do zapłaty</span>
                    <span class="pay-total-amount">795,00 PLN</span>
                </div>

                <div class="pay-timer">
                    <span class="pay-timer-dot"></span>
                    Sprzęt zarezerwowany przez <span id="pay-timer-text">14:59</span> minut
                </div>
            </div>

            <div class="pay-help">
                <div class="pay-help-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                    </svg>
                </div>
                <div>
                    <div class="pay-help-title">Potrzebujesz pomocy z rezerwacją?</div>
                    <div class="pay-help-text">Nasz zespół logistyczny jest dostępny 24/7, aby pomóc w transporcie i specyfikacji technicznej.</div>
                </div>
            </div>
        </div>

    </div>
</main>

@include('partials.footer')

<script>
(function() {
    'use strict';

    const options = document.querySelectorAll('.pay-method-option');
    const newCardBlock = document.getElementById('pay-new-card-block');

    options.forEach(option => {
        option.addEventListener('click', function() {
            options.forEach(o => o.classList.remove('selected'));
            option.classList.add('selected');
            const radio = option.querySelector('input[type="radio"]');
            if (radio) radio.checked = true;

            newCardBlock.style.display = option.dataset.value === 'new' ? '' : 'none';
        });
    });

    document.querySelectorAll('.pay-method-remove').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            if (!confirm('Usunąć tę zapisaną kartę?')) return;
            btn.closest('.pay-method-option').remove();
        });
    });

    const timerEl = document.getElementById('pay-timer-text');
    if (timerEl) {
        let seconds = 15 * 60 - 1;
        const tick = () => {
            const m = Math.floor(seconds / 60);
            const s = seconds % 60;
            timerEl.textContent = m + ':' + (s < 10 ? '0' + s : s);
            if (seconds > 0) seconds--;
        };
        tick();
        setInterval(tick, 1000);
    }
})();
</script>

</body>
</html>