<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Szczegóły klienta – EquipRent Pro</title>
    <link rel="stylesheet" href="{{ asset('style-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('style-user-details.css') }}">
    <style>
        .ud-modal-backdrop { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 9998; align-items: center; justify-content: center; padding: 20px; }
        .ud-modal-backdrop.open { display: flex; }
        .ud-modal { background: #fff; border-radius: 12px; width: 100%; max-width: 440px; padding: 28px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
        .ud-modal-icon { width: 48px; height: 48px; border-radius: 50%; background: #fee2e2; display: flex; align-items: center; justify-content: center; margin: 0 auto 18px; color: #dc2626; }
        .ud-modal-icon svg { width: 24px; height: 24px; }
        .ud-modal-title { font-family: 'Barlow Condensed', sans-serif; font-size: 22px; font-weight: 700; color: #2a3439; text-align: center; margin: 0 0 8px; }
        .ud-modal-text { font-size: 13px; color: #777; text-align: center; margin: 0 0 24px; line-height: 1.5; }
        .ud-modal-actions { display: flex; gap: 10px; justify-content: center; }
        .ud-modal-btn { font-family: 'Barlow Condensed', sans-serif; font-size: 12px; font-weight: 700; letter-spacing: .06em; text-transform: uppercase; padding: 11px 22px; border-radius: 8px; border: none; cursor: pointer; min-width: 120px; }
        .ud-modal-btn-cancel { background: #fff; border: 1px solid #e8ebee; color: #555; }
        .ud-modal-btn-confirm { background: #dc2626; color: #fff; }
        .ud-edit-row { display: flex; gap: 12px; margin-bottom: 12px; }
        .ud-edit-field { flex: 1; min-width: 0; margin-bottom: 12px; }
        .ud-edit-row .ud-edit-field { margin-bottom: 0; }
        .ud-edit-label { display: block; font-size: 12px; color: #6b7280; margin-bottom: 4px; }
        .ud-edit-input { box-sizing: border-box; width: 100%; padding: 9px 12px; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 13px; font-family: 'Poppins', sans-serif; }
        .ud-edit-input:focus { outline: none; border-color: #075071; }
        .ud-modal-btn-save { background: #075071; color: #fff; }
    </style>
</head>
<body>
<div class="adm-shell">
    @include('partials.admin-sidebar')

    <div class="adm-body">
        @include('partials.admin-topbar')

        <div class="adm-content">
            <div class="ud-content">

                <div class="ud-profile-card">
                    <div class="ud-profile-top">
                        <div class="ud-profile-main">
                            <div class="ud-avatar">PN</div>
                            <div class="ud-profile-info">
                                <h2 class="ud-profile-name">Paweł Nowak</h2>
                                <div class="ud-profile-row">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                                        <polyline points="22,6 12,13 2,6"/>
                                    </svg>
                                    <span>pawel.nowak@example.pl</span>
                                </div>
                                <div class="ud-profile-row">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>
                                    </svg>
                                    <span>+48 601 234 567</span>
                                </div>
                            </div>
                            <div class="ud-profile-actions">
                                <button type="button" class="ud-btn ud-btn-edit" id="ud-edit-btn">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                    </svg>
                                    Edytuj dane
                                </button>
                                <button type="button" class="ud-btn ud-btn-block" id="ud-block-btn">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"/>
                                        <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/>
                                    </svg>
                                    <span>Zablokuj konto</span>
                                </button>
                            </div>
                        </div>

                        <div class="ud-finance">
                            <div class="ud-finance-title">Podsumowanie Finansowe</div>
                            <div class="ud-finance-label">Łączna wartość wynajmów</div>
                            <div class="ud-finance-value">2 450 zł</div>
                            <div class="ud-finance-label">Liczba wypożyczeń</div>
                            <div class="ud-finance-value">7</div>
                            <svg class="ud-finance-icon" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5">
                                <rect x="1" y="4" width="22" height="16" rx="2"/>
                                <line x1="1" y1="10" x2="23" y2="10"/>
                            </svg>
                        </div>
                    </div>

                    <div class="ud-metrics">
                        <div>
                            <div class="ud-metric-label">Status konta</div>
                            <span class="ud-metric-badge" style="background:#dcfce7;color:#16a34a;">Aktywny</span>
                        </div>
                        <div>
                            <div class="ud-metric-label">Data dołączenia</div>
                            <div class="ud-metric-value">15 stycznia 2026</div>
                        </div>
                        <div>
                            <div class="ud-metric-label">Weryfikacja</div>
                            <div class="ud-metric-verified">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                    <polyline points="22 4 12 14.01 9 11.01"/>
                                </svg>
                                <span>Zweryfikowany</span>
                            </div>
                        </div>
                        <div>
                            <div class="ud-metric-label">Ostatnie logowanie</div>
                            <div class="ud-metric-value">14 października 2026</div>
                        </div>
                    </div>
                </div>

                <div class="ud-section">
                    <div class="ud-section-header">
                        <div class="ud-section-title">Pełna historia wypożyczeń</div>
                    </div>

                    <table class="ud-table">
                        <thead>
                            <tr>
                                <th>Produkt</th>
                                <th>Data</th>
                                <th class="center">Status</th>
                                <th class="right">Kwota</th>
                                <th class="right"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><div class="ud-product"><div class="ud-product-img"></div><span class="ud-product-name">Rower górski MTB</span></div></td>
                                <td>13.10.2026 — 16.10.2026</td>
                                <td class="center"><span class="ud-badge active">Aktywna</span></td>
                                <td class="right">425 zł</td>
                                <td class="right"><a href="/rejestr-wypozyczen/12" style="color:#075071;font-size:12px;font-weight:600;text-decoration:none;">Szczegóły</a></td>
                            </tr>
                            <tr>
                                <td><div class="ud-product"><div class="ud-product-img"></div><span class="ud-product-name">Narty zjazdowe</span></div></td>
                                <td>05.03.2026 — 10.03.2026</td>
                                <td class="center"><span class="ud-badge returned">Zwrócona</span></td>
                                <td class="right">420 zł</td>
                                <td class="right"><a href="/rejestr-wypozyczen/8" style="color:#075071;font-size:12px;font-weight:600;text-decoration:none;">Szczegóły</a></td>
                            </tr>
                            <tr>
                                <td><div class="ud-product"><div class="ud-product-img"></div><span class="ud-product-name">Kajak turystyczny</span></div></td>
                                <td>15.07.2026 — 18.07.2026</td>
                                <td class="center"><span class="ud-badge returned">Zwrócona</span></td>
                                <td class="right">340 zł</td>
                                <td class="right"><a href="/rejestr-wypozyczen/5" style="color:#075071;font-size:12px;font-weight:600;text-decoration:none;">Szczegóły</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="ud-section">
                    <div class="ud-section-header">
                        <div class="ud-section-title ud-section-title-warn">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
                                <line x1="12" y1="9" x2="12" y2="13"/>
                                <line x1="12" y1="17" x2="12.01" y2="17"/>
                            </svg>
                            Uszkodzone zwroty / Incydenty
                        </div>
                    </div>

                    <div>
                        <div class="ud-empty">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <polyline points="14 2 14 8 20 8"/>
                            </svg>
                            <div class="ud-empty-text">Brak zgłoszonych incydentów</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="ud-modal-backdrop" id="ud-block-modal">
    <div class="ud-modal">
        <div class="ud-modal-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
        </div>
        <h3 class="ud-modal-title">Zablokować konto?</h3>
        <p class="ud-modal-text">Czy na pewno chcesz zablokować to konto?<br>Użytkownik straci dostęp do platformy do momentu odblokowania.</p>
        <div class="ud-modal-actions">
            <button type="button" class="ud-modal-btn ud-modal-btn-cancel" id="ud-modal-cancel">Wróć</button>
            <button type="button" class="ud-modal-btn ud-modal-btn-confirm" id="ud-modal-confirm">Tak, zablokuj</button>
        </div>
    </div>
</div>

<div class="ud-modal-backdrop" id="ud-edit-modal">
    <div class="ud-modal" style="max-width:480px;">
        <h3 class="ud-modal-title" style="margin-bottom:18px;">Edytuj dane użytkownika</h3>

        <form id="ud-edit-form" onsubmit="event.preventDefault(); document.getElementById('ud-edit-modal').classList.remove('open');">
            <div class="ud-edit-row">
                <div class="ud-edit-field">
                    <label class="ud-edit-label" for="ud-edit-name">Imię</label>
                    <input type="text" id="ud-edit-name" value="Paweł" class="ud-edit-input" required>
                </div>
                <div class="ud-edit-field">
                    <label class="ud-edit-label" for="ud-edit-surname">Nazwisko</label>
                    <input type="text" id="ud-edit-surname" value="Nowak" class="ud-edit-input" required>
                </div>
            </div>
            <div class="ud-edit-field">
                <label class="ud-edit-label" for="ud-edit-email">Adres e-mail</label>
                <input type="email" id="ud-edit-email" value="pawel.nowak@example.pl" class="ud-edit-input" required>
            </div>
            <div class="ud-edit-field">
                <label class="ud-edit-label" for="ud-edit-phone">Telefon</label>
                <input type="text" id="ud-edit-phone" value="+48 601 234 567" class="ud-edit-input">
            </div>
            <div class="ud-edit-field" style="margin-bottom:18px;">
                <label class="ud-edit-label" for="ud-edit-klub">Klub sportowy</label>
                <input type="text" id="ud-edit-klub" value="AZS Warszawa" class="ud-edit-input">
            </div>

            <div class="ud-modal-actions">
                <button type="button" class="ud-modal-btn ud-modal-btn-cancel" id="ud-edit-cancel">Anuluj</button>
                <button type="submit" class="ud-modal-btn ud-modal-btn-save">Zapisz zmiany</button>
            </div>
        </form>
    </div>
</div>

<script>
(function() {
    'use strict';

    const blockModal = document.getElementById('ud-block-modal');
    const blockBtn = document.getElementById('ud-block-btn');
    const blockCancel = document.getElementById('ud-modal-cancel');
    const blockConfirm = document.getElementById('ud-modal-confirm');

    blockBtn.addEventListener('click', () => blockModal.classList.add('open'));
    blockCancel.addEventListener('click', () => blockModal.classList.remove('open'));
    blockConfirm.addEventListener('click', () => blockModal.classList.remove('open'));
    blockModal.addEventListener('click', (e) => { if (e.target === blockModal) blockModal.classList.remove('open'); });

    const editModal = document.getElementById('ud-edit-modal');
    const editBtn = document.getElementById('ud-edit-btn');
    const editCancel = document.getElementById('ud-edit-cancel');

    editBtn.addEventListener('click', () => editModal.classList.add('open'));
    editCancel.addEventListener('click', () => editModal.classList.remove('open'));
    editModal.addEventListener('click', (e) => { if (e.target === editModal) editModal.classList.remove('open'); });

    document.addEventListener('keydown', (e) => {
        if (e.key !== 'Escape') return;
        blockModal.classList.remove('open');
        editModal.classList.remove('open');
    });
})();
</script>
</body>
</html>