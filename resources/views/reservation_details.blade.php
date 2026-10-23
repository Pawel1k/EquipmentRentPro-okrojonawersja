<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rezerwacja #12 – EquipRent Pro</title>
    <link rel="stylesheet" href="{{ asset('style-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('style-list-rentals.css') }}">
    <link rel="stylesheet" href="{{ asset('style-product-edit.css') }}">
    <style>
        .pe-empty{padding:24px;text-align:center;color:#9aa5ad;font-size:13px}
        .rd-content{padding:28px 40px 60px;max-width:1000px;display:flex;flex-direction:column;gap:20px;}
        .rd-overview{display:grid;grid-template-columns:1fr 1fr;gap:20px;}
        .rd-status-row{display:flex;align-items:end;gap:14px;}
        .rd-status-row .pe-form-group{flex:1;}
        .rd-alert{padding:12px 16px;border-radius:8px;font-size:13px}
        .rd-alert.success{background:#dcfce7;color:#166534}
    </style>
</head>
<body class="pe-page">
<div class="adm-shell">
    @include('partials.admin-sidebar')

    <div class="adm-body">
        @include('partials.admin-topbar')

        <div class="adm-content">
            <div class="rd-content">

                <div class="le-breadcrumb">
                    <span>Zarządzanie</span>
                    <span>›</span>
                    <a href="{{ route('rentals.list') }}">Rezerwacje</a>
                    <span>›</span>
                    <span class="active">Rezerwacja #12</span>
                </div>
                <h1 class="le-title">Rezerwacja #12</h1>

                <div class="pe-section">
                    <div class="pe-section-header">
                        <div class="pe-section-title">
                            <div class="pe-section-title-icon-box">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                            </div>
                            Podsumowanie
                        </div>
                        <span class="lr-badge rented">Aktywna</span>
                    </div>

                    <div class="rd-overview">
                        <div style="display:flex;gap:14px;align-items:center;">
                            <div class="lr-thumb" style="width:56px;height:56px;flex-shrink:0;"></div>
                            <div style="min-width:0;">
                                <div class="pe-form-label">Sprzęt</div>
                                <div class="lr-col-val">Rower górski MTB</div>
                                <div class="lr-col-sub">SN-BIKE-001</div>
                            </div>
                        </div>

                        <div style="display:flex;gap:14px;align-items:center;">
                            <div class="lr-thumb" style="width:56px;height:56px;flex-shrink:0;border-radius:50%;"></div>
                            <div style="min-width:0;">
                                <div class="pe-form-label">Klient</div>
                                <div class="lr-col-val">Paweł Nowak</div>
                                <div class="lr-col-sub">pawel.nowak@example.pl</div>
                                <div class="lr-col-sub">+48 601 234 567</div>
                            </div>
                        </div>

                        <div>
                            <div class="pe-form-label">Okres wynajmu</div>
                            <div class="lr-col-val">13.10.2026 → 16.10.2026</div>
                            <div class="lr-col-sub">3 dni</div>
                        </div>

                        <div>
                            <div class="pe-form-label">Wartość całkowita</div>
                            <div class="lr-value-main">425 zł</div>
                            <div class="lr-col-sub">Utworzono: 10.10.2026</div>
                        </div>
                    </div>
                </div>

                <div class="pe-section">
                    <div class="pe-section-header">
                        <div class="pe-section-title">
                            <div class="pe-section-title-icon-box">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            </div>
                            Status rezerwacji
                        </div>
                    </div>

                    <div class="rd-status-row">
                        <div class="pe-form-group">
                            <label class="pe-form-label" for="rd-status-select">Status</label>
                            <select id="rd-status-select" class="pe-form-select">
                                <option value="pending">Oczekująca</option>
                                <option value="confirmed">Zarezerwowana</option>
                                <option value="active" selected>Aktywna</option>
                                <option value="completed">Oddane</option>
                                <option value="repair">Naprawa</option>
                                <option value="cancelled">Anulowana</option>
                            </select>
                        </div>
                        <button type="button" class="pe-maint-add-btn" id="rd-status-save">Zapisz status</button>
                    </div>
                    <div id="rd-status-message" style="margin-top:12px;"></div>
                </div>

                <div class="pe-section">
                    <div class="pe-section-header">
                        <div class="pe-section-title">
                            <div class="pe-section-title-icon-box">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                            </div>
                            Incydenty / uszkodzenia sprzętu
                        </div>
                    </div>

                    <table class="pe-table" style="margin-top:20px;">
                        <thead><tr><th>Data</th><th>Opis</th><th>Zgłaszający</th><th class="right">Koszt</th><th class="right"></th></tr></thead>
                        <tbody>
                            <tr><td colspan="5" class="pe-empty">Brak zgłoszonych incydentów dla tej rezerwacji.</td></tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
(function() {
    document.getElementById('rd-status-save').addEventListener('click', () => {
        const msg = document.getElementById('rd-status-message');
        msg.innerHTML = '<div class="rd-alert success">Status został zaktualizowany (placeholder).</div>';
    });
})();
</script>
</body>
</html>