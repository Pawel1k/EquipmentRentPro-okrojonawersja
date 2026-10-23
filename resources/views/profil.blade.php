<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Profil użytkownika – EquipRent Pro</title>
    <link rel="stylesheet" href="{{ asset('style-profil.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('E.png') }}">
</head>
<body class="prof-page">
@include('partials.header')

<div class="prof-page-header">
    <div class="prof-page-header-text">
        <h1>Profil Użytkownika</h1>
        <p>Zarządzaj swoim sprzętem sportowym, płatnościami i powiadomieniami.</p>
    </div>
    <div class="prof-header-actions">
        <a href="{{ route('profil_edytuj') }}" class="prof-btn-primary">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
            </svg>
            Edytuj profil
        </a>
    </div>
</div>

<div class="prof-wrapper">

    <aside class="prof-sidebar">

        <div class="prof-card-user">
            <div class="prof-avatar-wrapper prof-avatar-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
            </div>
            <h2 class="prof-user-name">Paweł Nowak</h2>
            <p class="prof-user-role">Klient EquipRent Pro</p>

            <div class="prof-user-divider"></div>

            <div class="prof-user-info">
                <div class="prof-user-info-row">
                    <svg class="prof-user-info-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                    </svg>
                    <div class="prof-user-info-content">
                        <div class="prof-user-info-label">Klub sportowy</div>
                        <div class="prof-user-info-value">AZS Warszawa</div>
                    </div>
                </div>

                <div class="prof-user-info-row">
                    <svg class="prof-user-info-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                    <div class="prof-user-info-content">
                        <div class="prof-user-info-label">E-mail</div>
                        <div class="prof-user-info-value">pawel.nowak@example.pl</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="prof-card-summary">
            <div class="prof-summary-title">Podsumowanie wypożyczeń</div>
            <div class="prof-summary-grid">
                <div>
                    <div class="prof-summary-label">Suma wydatków</div>
                    <div class="prof-summary-value">2 450,00 zł</div>
                </div>
                <div>
                    <div class="prof-summary-label">Wynajęte przedmioty</div>
                    <div class="prof-summary-value">7</div>
                </div>
            </div>
            <div class="prof-summary-footer">
                <span class="prof-summary-footer-label">Status lojalnościowy</span>
                <span class="prof-loyalty-badge">Srebrny</span>
            </div>
        </div>

        <div class="prof-card-notif">
            <div class="prof-notif-header">
                <span class="prof-notif-title">Centrum Powiadomień</span>
                <span class="prof-notif-badge">2 nowe</span>
            </div>

            <div id="prof-notif-list">
                <div class="prof-notif-item urgent">
                    <div class="prof-notif-item-top">
                        <span class="prof-notif-item-label">Zwrot wynajmu</span>
                        <span class="prof-notif-item-time">14.10.2026</span>
                    </div>
                    <div class="prof-notif-item-text">
                        Twój rower MTB wymaga zwrotu jutro. Pamiętaj o godzinie 18:00.
                    </div>
                </div>

                <div class="prof-notif-item">
                    <div class="prof-notif-item-top">
                        <span class="prof-notif-item-label">Rozpoczęcie wynajmu</span>
                        <span class="prof-notif-item-time">17.10.2026</span>
                    </div>
                    <div class="prof-notif-item-text">
                        Odbierz swoją deskę snowboardową jutro od 10:00.
                    </div>
                </div>
            </div>
        </div>

    </aside>

    <main class="prof-content">

        <section class="prof-section">
            <div class="prof-section-header">
                <div class="prof-section-title">
                    <svg class="prof-section-title-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                    Aktywne Rezerwacje
                </div>
                <a href="{{ route('rezerwacje') }}" class="prof-section-link">Zobacz historię</a>
            </div>

            <div id="prof-active-reservations">

                <div class="prof-rez-card" data-reservation-id="12">
                    <div class="prof-rez-top">
                        <div class="prof-rez-info">
                            <div class="prof-rez-icon-box">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                    <line x1="16" y1="2" x2="16" y2="6"/>
                                    <line x1="8" y1="2" x2="8" y2="6"/>
                                    <line x1="3" y1="10" x2="21" y2="10"/>
                                </svg>
                            </div>
                            <div class="prof-rez-titles">
                                <div class="prof-rez-name">Rower górski MTB</div>
                                <div class="prof-rez-id">Rezerwacja #12</div>
                            </div>
                        </div>
                        <div class="prof-rez-status">
                            <span class="prof-rez-badge late">Kończy się</span>
                            <div class="prof-rez-deadline">Zwrot: 16.10.2026</div>
                        </div>
                    </div>
                    <div class="prof-rez-details">
                        <div>
                            <div class="prof-rez-detail-label">Okres wynajmu</div>
                            <div class="prof-rez-detail-value">13.10.2026 – 16.10.2026</div>
                        </div>
                        <div class="prof-rez-detail">
                            <div class="prof-rez-detail-label">Naliczone kary</div>
                            <div class="prof-rez-detail-value">Brak</div>
                        </div>
                    </div>
                </div>

                <div class="prof-rez-card" data-reservation-id="15">
                    <div class="prof-rez-top">
                        <div class="prof-rez-info">
                            <div class="prof-rez-icon-box">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                                    <line x1="16" y1="2" x2="16" y2="6"/>
                                    <line x1="8" y1="2" x2="8" y2="6"/>
                                    <line x1="3" y1="10" x2="21" y2="10"/>
                                </svg>
                            </div>
                            <div class="prof-rez-titles">
                                <div class="prof-rez-name">Deska snowboardowa</div>
                                <div class="prof-rez-id">Rezerwacja #15</div>
                            </div>
                        </div>
                        <div class="prof-rez-status">
                            <span class="prof-rez-badge active">Aktywna</span>
                            <div class="prof-rez-deadline">Zwrot: 20.10.2026</div>
                        </div>
                    </div>
                    <div class="prof-rez-details">
                        <div>
                            <div class="prof-rez-detail-label">Okres wynajmu</div>
                            <div class="prof-rez-detail-value">17.10.2026 – 20.10.2026</div>
                        </div>
                        <div class="prof-rez-detail">
                            <div class="prof-rez-detail-label">Naliczone kary</div>
                            <div class="prof-rez-detail-value">Brak</div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="prof-section">
            <div class="prof-section-header">
                <div class="prof-section-title">
                    <svg class="prof-section-title-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
                        <line x1="1" y1="10" x2="23" y2="10"/>
                    </svg>
                    Zapisane Metody Płatności
                </div>
            </div>

            <div class="prof-payment-grid" id="prof-payment-methods">
                <div class="prof-payment-card">
                    <div class="prof-payment-logo visa">VISA</div>
                    <div class="prof-payment-info">
                        <div class="prof-payment-number">•••• 4242</div>
                        <div class="prof-payment-expiry">Paweł Nowak · Ważna do 12/2028</div>
                    </div>
                    <button type="button" class="prof-payment-remove" title="Usuń kartę" aria-label="Usuń kartę">✕</button>
                </div>

                <div class="prof-payment-card">
                    <div class="prof-payment-logo mc">MC</div>
                    <div class="prof-payment-info">
                        <div class="prof-payment-number">•••• 5555</div>
                        <div class="prof-payment-expiry">Paweł Nowak · Ważna do 03/2027</div>
                    </div>
                    <button type="button" class="prof-payment-remove" title="Usuń kartę" aria-label="Usuń kartę">✕</button>
                </div>
            </div>

            <div class="prof-payment-info-box">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
                <span>Twoje dane są chronione zgodnie ze standardami PCI DSS oraz RODO. Nie przechowujemy pełnych numerów kart płatniczych na naszych serwerach. Wszystkie operacje finansowe są realizowane przez procesor Stripe.</span>
            </div>
        </section>

    </main>
</div>

@include('partials.footer')

<script>
(function () {
    document.querySelectorAll('.prof-payment-remove').forEach(btn => {
        btn.addEventListener('click', (e) => {
            if (!confirm('Usunąć tę zapisaną kartę?')) return;
            btn.closest('.prof-payment-card').remove();
        });
    });
})();
</script>
</body>
</html>