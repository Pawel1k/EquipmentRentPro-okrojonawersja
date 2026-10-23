<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Moje rezerwacje – EquipRent Pro</title>

    <link rel="stylesheet" href="{{ asset('style-rezerwacje.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('E.png') }}">
</head>
<body class="rez-page">
@include('partials.header')

<div class="rez-page-header">
    <h1>Moje rezerwacje</h1>
    <p>Zarządzaj aktywnym sprzętem sportowym, śledź statystyki i pobieraj dokumentację.</p>
</div>

<div class="rez-wrapper">

    <aside class="rez-sidebar">

        <div class="rez-sidebar-card-a">
            <div class="rez-sidebar-title">
                Terminy zwrotów
                <i class="fa-solid fa-circle-info" style="color:#1a6fa8; margin-left:6px;"></i>
            </div>

            <div class="rez-alert urgent">
                <i class="fa-solid fa-circle-exclamation rez-alert-icon"></i>
                <div style="flex:1; min-width:0;">
                    <div class="rez-alert-label">Rower górski MTB</div>
                    <div class="rez-alert-sub">Zwrot jutro (16.10.2026)</div>
                </div>
            </div>

            <div class="rez-alert upcoming">
                <i class="fa-regular fa-calendar rez-alert-icon"></i>
                <div style="flex:1; min-width:0;">
                    <div class="rez-alert-label">Deska snowboardowa</div>
                    <div class="rez-alert-sub">Za 5 dni (20.10.2026)</div>
                </div>
            </div>
        </div>

        <div class="rez-sidebar-card">
            <div class="rez-sidebar-title">Przegląd konta</div>
            <div class="rez-stats-grid">
                <div class="rez-stat-item">
                    <div class="rez-stat-label">Łącznie wydano</div>
                    <div class="rez-stat-value">2 450 zł</div>
                </div>
                <div class="rez-stat-item">
                    <div class="rez-stat-label">Wypożyczony sprzęt</div>
                    <div class="rez-stat-value">7</div>
                </div>
            </div>
        </div>

    </aside>

    <main class="rez-content">

        <div class="rez-section-title">Aktywne wypożyczenia</div>
        <div id="rez-active-list">

            <div class="rez-card" data-reservation-id="12">
                <div class="rez-card-img placeholder"></div>
                <div class="rez-card-body">
                    <div class="rez-card-top">
                        <span class="rez-card-name" style="flex:1; min-width:0;">Rower górski MTB</span>
                        <span class="rez-badge wypozyczone">Wypożyczone</span>
                    </div>
                    <div class="rez-card-meta">
                        <div class="rez-card-meta-row">
                            <span>Od: <strong>13.10.2026</strong></span>
                            <span>Do: <strong>16.10.2026</strong></span>
                        </div>
                        <div class="rez-card-meta-row">
                            <span>425 zł</span>
                            <a href="/produkt/1" style="color:#1a6fa8;text-decoration:none;">Zobacz produkt →</a>
                        </div>
                    </div>
                </div>
                <div class="rez-card-actions">
                    <button class="rez-btn-cancel" type="button" data-action="open-cancel" data-id="12" data-title="Rower górski MTB">
                        Anuluj rezerwację
                    </button>
                </div>
            </div>

            <div class="rez-card" data-reservation-id="15">
                <div class="rez-card-img placeholder"></div>
                <div class="rez-card-body">
                    <div class="rez-card-top">
                        <span class="rez-card-name" style="flex:1; min-width:0;">Deska snowboardowa</span>
                        <span class="rez-badge wypozyczone">Wypożyczone</span>
                    </div>
                    <div class="rez-card-meta">
                        <div class="rez-card-meta-row">
                            <span>Od: <strong>17.10.2026</strong></span>
                            <span>Do: <strong>20.10.2026</strong></span>
                        </div>
                        <div class="rez-card-meta-row">
                            <span>325 zł</span>
                            <a href="/produkt/3" style="color:#1a6fa8;text-decoration:none;">Zobacz produkt →</a>
                        </div>
                    </div>
                </div>
                <div class="rez-card-actions">
                    <button class="rez-btn-cancel" type="button" data-action="open-cancel" data-id="15" data-title="Deska snowboardowa">
                        Anuluj rezerwację
                    </button>
                </div>
            </div>

        </div>

        <div class="rez-section-title done" style="margin-top: 32px;">Zakończone wypożyczenia</div>
        <div id="rez-done-list">

            <div class="rez-card-done" data-reservation-id="8">
                <div class="rez-card-img placeholder"></div>
                <div class="rez-card-body">
                    <div class="rez-card-name" style="margin-bottom:4px;">Narty zjazdowe</div>
                    <div class="rez-done-meta">Okres: 05.03.2026 — 10.03.2026</div>
                    <div class="rez-done-cost">Zapłacono: <strong>420 zł</strong></div>
                </div>
                <button class="rez-btn-rebook" type="button" onclick="window.location.href='/produkt/4'">
                    Wypożycz ponownie
                </button>
            </div>

            <div class="rez-card-done" data-reservation-id="5">
                <div class="rez-card-img placeholder"></div>
                <div class="rez-card-body">
                    <div class="rez-card-name" style="margin-bottom:4px;">Kajak turystyczny</div>
                    <div class="rez-done-meta">Okres: 15.07.2026 — 18.07.2026</div>
                    <div class="rez-done-cost">Zapłacono: <strong>340 zł</strong></div>
                </div>
                <button class="rez-btn-rebook" type="button" onclick="window.location.href='/produkt/5'">
                    Wypożycz ponownie
                </button>
            </div>

        </div>

    </main>
</div>

<div class="rez-modal-backdrop" id="cancel-modal">
    <div class="rez-modal">
        <h3>Anuluj rezerwację</h3>
        <p id="modal-text">Czy na pewno chcesz anulować rezerwację?<br>Ta operacja jest nieodwracalna.</p>
        <div class="rez-modal-actions">
            <button class="rez-btn-cancel-review" type="button" data-action="close-modal">Wróć</button>
            <button class="rez-btn-cancel" type="button" data-action="confirm-cancel">Tak, anuluj</button>
        </div>
    </div>
</div>

@include('partials.footer')

<script>
(function () {
    'use strict';

    let cancelTargetId = null;

    function escapeHtml(s) {
        if (s === null || s === undefined) return '';
        return String(s).replaceAll('&', '&amp;').replaceAll('<', '&lt;').replaceAll('>', '&gt;').replaceAll('"', '&quot;').replaceAll("'", '&#039;');
    }

    function openCancelModal(id, title) {
        cancelTargetId = id;
        const modalText = document.getElementById('modal-text');
        if (modalText) {
            modalText.innerHTML = `Czy na pewno chcesz anulować rezerwację<br><strong>${escapeHtml(title || 'tego sprzętu')}</strong>?<br>Ta operacja jest nieodwracalna.`;
        }
        document.getElementById('cancel-modal').classList.add('open');
    }

    function closeCancelModal() {
        cancelTargetId = null;
        document.getElementById('cancel-modal').classList.remove('open');
    }

    function confirmCancel() {
        if (!cancelTargetId) { closeCancelModal(); return; }
        const card = document.querySelector(`.rez-card[data-reservation-id="${CSS.escape(cancelTargetId)}"]`);
        if (card) card.remove();
        closeCancelModal();
    }

    document.body.addEventListener('click', (e) => {
        const target = e.target.closest('[data-action]');
        if (!target) return;

        const action = target.dataset.action;

        switch (action) {
            case 'open-cancel':
                openCancelModal(target.dataset.id, target.dataset.title);
                break;
            case 'close-modal':
                closeCancelModal();
                break;
            case 'confirm-cancel':
                confirmCancel();
                break;
        }
    });

    document.getElementById('cancel-modal').addEventListener('click', function (e) {
        if (e.target === this) closeCancelModal();
    });
})();
</script>

</body>
</html>