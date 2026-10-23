<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rower górski MTB – EquipRent Pro</title>
    <link rel="stylesheet" href="{{ asset('style-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('style-product-edit.css') }}">
    <style>
        .pe-alert{padding:12px 16px;border-radius:8px;margin-bottom:18px;font-size:13px}
        .pe-gallery-thumb{position:relative}
        .pe-empty{padding:24px;text-align:center;color:#9aa5ad;font-size:13px}
        .pe-row-error{font-size:11px;color:#dc2626;margin-top:4px}
    </style>
</head>
<body class="pe-page">
<div class="adm-shell">
    @include('partials.admin-sidebar')
    <div class="adm-body">
        @include('partials.admin-topbar')
        <div class="adm-content">

            <div class="pe-page-header">
                <div class="pe-page-header-text">
                    <div class="pe-breadcrumb">
                        <span>Zarządzanie</span><span class="sep">›</span>
                        <a href="{{ route('equipment.list') }}">Inwentarz</a><span class="sep">›</span>
                        <span class="active">Edycja produktu</span>
                    </div>
                    <h1>
                        Rower górski MTB
                        <span class="pe-title-badge" id="pe-title-status">Sprawny</span>
                    </h1>
                    <p class="pe-serial"># Nr seryjny: SN-BIKE-001</p>
                </div>
                <div class="pe-header-actions">
                    <a href="{{ route('equipment.list') }}" class="pe-btn-secondary">Anuluj</a>
                    <button type="submit" form="form-edycja-produktu" class="pe-btn-primary">Aktualizuj Produkt</button>
                </div>
            </div>

            <div class="pe-wrapper">
                <div class="pe-main">

                    <form id="form-edycja-produktu" class="pe-section" onsubmit="event.preventDefault(); alert('Produkt zaktualizowany (placeholder)'); window.location.href='/inwentarz';">
                        <div class="pe-section-header">
                            <div class="pe-section-title">
                                <div class="pe-section-title-icon-box">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                                </div>
                                Informacje ogólne
                            </div>
                            <div class="pe-status-toggle">
                                <span class="pe-status-toggle-label">Przełącz status</span>
                                <span class="pe-status-state" id="pe-status-text">Sprawny</span>
                                <label class="pe-switch">
                                    <input type="checkbox" id="pe-status-switch" checked>
                                    <span class="pe-switch-slider"></span>
                                </label>
                            </div>
                        </div>

                        <div class="pe-form-row">
                            <div class="pe-form-group">
                                <label class="pe-form-label" for="title">Nazwa produktu</label>
                                <input class="pe-form-input" id="title" value="Rower górski MTB" required>
                            </div>
                            <div class="pe-form-group">
                                <label class="pe-form-label" for="equipment_category_id">Kategoria</label>
                                <select class="pe-form-select" id="equipment_category_id" required>
                                    <option value="1" selected>Rowery</option>
                                    <option value="2">Narty</option>
                                    <option value="3">Kajaki</option>
                                    <option value="4">Wspinaczka</option>
                                    <option value="5">Camping</option>
                                </select>
                            </div>
                        </div>

                        <div class="pe-form-row">
                            <div class="pe-form-group">
                                <label class="pe-form-label" for="one_day_price">Stawka dobowa (PLN)</label>
                                <input class="pe-form-input" id="one_day_price" type="number" min="0" value="85" required>
                            </div>
                            <div class="pe-form-group">
                                <label class="pe-form-label">Numer seryjny</label>
                                <div class="pe-form-readonly">SN-BIKE-001</div>
                            </div>
                        </div>

                        <div class="pe-form-row single">
                            <div class="pe-form-group">
                                <label class="pe-form-label" for="body">Opis produktu</label>
                                <textarea class="pe-form-textarea" id="body" rows="5">Profesjonalny rower górski do jazdy terenowej. Idealny do tras górskich i leśnych. W zestawie: kask, bidon, mini pompka.</textarea>
                            </div>
                        </div>

                        <div class="pe-gallery-block">
                            <div class="pe-gallery-head">
                                <span class="pe-gallery-label">Galeria zdjęć</span>
                                <span class="pe-gallery-count">3 / maks. 10 zdjęć</span>
                            </div>
                            <div class="pe-gallery-grid" id="pe-gallery-grid">
                                <div class="pe-gallery-thumb">
                                    <img src="https://placehold.co/200x200/1a1a1a/666?text=Zdj+1" alt="Zdjęcie 1">
                                </div>
                                <div class="pe-gallery-thumb">
                                    <img src="https://placehold.co/200x200/1a1a1a/666?text=Zdj+2" alt="Zdjęcie 2">
                                </div>
                                <div class="pe-gallery-thumb">
                                    <img src="https://placehold.co/200x200/1a1a1a/666?text=Zdj+3" alt="Zdjęcie 3">
                                </div>
                                <label class="pe-gallery-upload">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                    <span>Prześlij</span>
                                    <input type="file" accept="image/*" hidden multiple>
                                </label>
                            </div>
                        </div>
                    </form>

                    <section class="pe-section">
                        <div class="pe-section-header">
                            <div class="pe-section-title">
                                <div class="pe-section-title-icon-box">🔧</div>
                                Konserwacja i Naprawy
                            </div>
                        </div>

                        <table class="pe-table" style="margin-top:20px;">
                            <thead><tr><th>Data</th><th>Opis</th><th>Technik</th><th class="right">Koszt</th></tr></thead>
                            <tbody>
                                <tr>
                                    <td>12.09.2026</td>
                                    <td>Wymiana łańcucha</td>
                                    <td>Jan Serwisant</td>
                                    <td class="right">120 zł</td>
                                </tr>
                                <tr>
                                    <td>05.07.2026</td>
                                    <td>Regulacja hamulców</td>
                                    <td>Jan Serwisant</td>
                                    <td class="right">60 zł</td>
                                </tr>
                            </tbody>
                        </table>
                    </section>

                    <section class="pe-section">
                        <div class="pe-section-header">
                            <div class="pe-section-title">
                                <div class="pe-section-title-icon-box">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/></svg>
                                </div>
                                Historia Rezerwacji
                            </div>
                        </div>
                        <table class="pe-table">
                            <thead><tr><th>Użytkownik</th><th>Okres wynajmu</th><th>Status</th><th class="right">Przychód</th></tr></thead>
                            <tbody>
                                <tr>
                                    <td><div class="pe-cell-strong">Paweł Nowak</div><div class="pe-rez-user-id">ID rezerwacji: 12</div></td>
                                    <td>13.10.2026 – 16.10.2026</td>
                                    <td><span class="pe-rez-badge reserved">Aktywna</span></td>
                                    <td class="right pe-cell-price">425 zł</td>
                                </tr>
                                <tr>
                                    <td><div class="pe-cell-strong">Anna Kowalska</div><div class="pe-rez-user-id">ID rezerwacji: 7</div></td>
                                    <td>01.09.2026 – 05.09.2026</td>
                                    <td><span class="pe-rez-badge done">Zwrócona</span></td>
                                    <td class="right pe-cell-price">425 zł</td>
                                </tr>
                            </tbody>
                        </table>
                    </section>
                </div>

                <aside class="pe-side">
                    <div class="pe-price-card">
                        <div class="pe-price-title">Model Cennikowy</div>
                        <div class="pe-price-label">Stawka dobowa</div>
                        <div class="pe-price-daily">85 zł</div>
                        <div class="pe-price-label">Całkowity przychód</div>
                        <div class="pe-price-income">4 250 zł</div>
                    </div>
                    <div class="pe-danger-card">
                        <div class="pe-danger-title">Strefa zagrożenia</div>
                        <div class="pe-danger-text"><strong>Uwaga: operacja jest nieodwracalna.</strong><br>Produkt zostanie trwale wyłączony z inwentarza (archiwizacja).</div>
                        <button type="button" class="pe-danger-btn" id="pe-delete-btn">Usuń z inwentarza</button>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    const switchEl = document.getElementById('pe-status-switch');
    const statusText = document.getElementById('pe-status-text');
    const titleBadge = document.getElementById('pe-title-status');

    switchEl.addEventListener('change', function() {
        const available = switchEl.checked;
        statusText.textContent = available ? 'Sprawny' : 'Serwis';
        statusText.classList.toggle('off', !available);
        titleBadge.textContent = available ? 'Sprawny' : 'Serwis';
        titleBadge.classList.toggle('unavailable', !available);
    });

    document.getElementById('pe-delete-btn').addEventListener('click', () => {
        if (!confirm('Usunąć produkt z inwentarza? (placeholder)')) return;
        window.location.href = '/inwentarz';
    });
})();
</script>
</body>
</html>