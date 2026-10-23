<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rejestr Wypożyczeń – EquipRent Pro</title>
    <link rel="stylesheet" href="{{ asset('style-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('style-list-rentals.css') }}">
    <style>
        .lr-modal-backdrop { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.5); z-index: 9998; align-items: center; justify-content: center; padding: 20px; }
        .lr-modal-backdrop.open { display: flex; }
        .lr-modal { background: #fff; border-radius: 12px; width: 100%; max-width: 440px; padding: 28px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
        .lr-modal-icon { width: 48px; height: 48px; border-radius: 50%; background: #fee2e2; display: flex; align-items: center; justify-content: center; margin: 0 auto 18px; color: #dc2626; }
        .lr-modal-icon svg { width: 24px; height: 24px; }
        .lr-modal-title { font-family: 'Poppins', sans-serif; font-size: 22px; font-weight: 700; color: #2a3439; text-align: center; margin: 0 0 8px; }
        .lr-modal-text { font-size: 13px; color: #777; text-align: center; margin: 0 0 24px; line-height: 1.5; }
        .lr-modal-actions { display: flex; gap: 10px; justify-content: center; }
        .lr-modal-btn { font-family: 'Poppins', sans-serif; font-size: 12px; font-weight: 700; letter-spacing: .06em; text-transform: uppercase; padding: 11px 22px; border-radius: 8px; border: none; cursor: pointer; min-width: 120px; }
        .lr-modal-btn-cancel { background: #fff; border: 1px solid #e8ebee; color: #555; }
        .lr-modal-btn-confirm { background: #dc2626; color: #fff; }
    </style>
</head>
<body>
<div class="adm-shell">
    @include('partials.admin-sidebar')

    <div class="adm-body">
        @include('partials.admin-topbar')

        <div class="adm-content">
            <div class="lr-content">

                <div class="le-breadcrumb">
                    <span>Zarządzanie</span>
                    <span>›</span>
                    <span class="active">Rezerwacje</span>
                </div>
                <h1 class="le-title">Rezerwacje</h1>

                <div class="lr-toolbar">
                    <div class="lr-search">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"/>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        </svg>
                        <input type="text" id="reservation-search" placeholder="Szukaj klienta, ID faktury lub numeru seryjnego...">
                    </div>
                    <button type="button" class="lr-tool-btn">
                        Najnowsze
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
                    </button>
                    <select id="status-filter" class="lr-tool-btn muted">
                        <option value="">Wszystkie statusy</option>
                        <option value="active">Aktywne</option>
                        <option value="awaiting_payment">Oczekujące na płatność</option>
                        <option value="completed">Oddane</option>
                        <option value="cancelled">Anulowane</option>
                    </select>
                </div>

                <div id="reservations-list">

                    @php
                        $rents = [
                            ['id'=>12,'client'=>'Paweł Nowak','product'=>'Rower górski MTB','sn'=>'SN-BIKE-001','start'=>'13.10.2026','end'=>'16.10.2026','days'=>3,'price'=>425,'status'=>'rented','label'=>'Aktywna'],
                            ['id'=>15,'client'=>'Anna Kowalska','product'=>'Deska snowboardowa','sn'=>'SN-SNOW-001','start'=>'17.10.2026','end'=>'20.10.2026','days'=>3,'price'=>325,'status'=>'confirmed','label'=>'Zarezerwowana'],
                            ['id'=>8,'client'=>'Marek Wiśniewski','product'=>'Narty zjazdowe','sn'=>'SN-SKI-001','start'=>'05.03.2026','end'=>'10.03.2026','days'=>5,'price'=>420,'status'=>'confirmed','label'=>'Zakończona'],
                            ['id'=>5,'client'=>'Katarzyna Lewandowska','product'=>'Kajak turystyczny','sn'=>'SN-KAJ-001','start'=>'15.07.2026','end'=>'18.07.2026','days'=>3,'price'=>340,'status'=>'late','label'=>'Anulowana'],
                            ['id'=>20,'client'=>'Tomasz Dąbrowski','product'=>'Hulajnoga elektryczna','sn'=>'SN-HUL-001','start'=>'20.10.2026','end'=>'22.10.2026','days'=>2,'price'=>120,'status'=>'pending-payment','label'=>'Oczekuje na płatność'],
                        ];
                    @endphp

                    @foreach($rents as $r)
                        <div class="lr-card">
                            <div class="lr-thumb"></div>
                            <div class="lr-col lr-col-client">
                                <span class="lr-col-label">Klient</span>
                                <span class="lr-col-val">{{ $r['client'] }}</span>
                            </div>
                            <div class="lr-col lr-col-equip">
                                <span class="lr-col-label">Sprzęt</span>
                                <span class="lr-col-val">{{ $r['product'] }}</span>
                                <span class="lr-col-sub">{{ $r['sn'] }}</span>
                            </div>
                            <div class="lr-col lr-col-period">
                                <span class="lr-col-label">Okres wynajmu</span>
                                <div class="lr-period">
                                    <span>{{ $r['start'] }}</span>
                                    <span class="arrow">→</span>
                                    <span>{{ $r['end'] }}</span>
                                </div>
                            </div>
                            <div class="lr-col lr-col-value">
                                <span class="lr-col-label">Wartość całkowita</span>
                                <span class="lr-value-main">{{ $r['price'] }} zł</span>
                                <span class="lr-value-daily">{{ $r['days'] }} dni</span>
                            </div>
                            <span class="lr-badge {{ $r['status'] }}">{{ $r['label'] }}</span>
                            <div class="lr-actions">
                                <button type="button" class="lr-icon-btn lr-edit-btn" aria-label="Edytuj" data-id="{{ $r['id'] }}">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                    </svg>
                                </button>
                                <button type="button" class="lr-icon-btn lr-cancel-btn" aria-label="Anuluj" data-id="{{ $r['id'] }}">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10"/>
                                        <line x1="15" y1="9" x2="9" y2="15"/>
                                        <line x1="9" y1="9" x2="15" y2="15"/>
                                    </svg>
                                </button>
                                <a href="/rejestr-wypozyczen/{{ $r['id'] }}" class="lr-action-btn soft" style="text-decoration:none;display:inline-flex;align-items:center;">Szczegóły</a>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="lr-footer">
                    <div class="lr-footer-count">Wyświetlono 1–5 z 5 rezerwacji</div>
                    <div class="lr-pagination"></div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="lr-modal-backdrop" id="lr-cancel-modal">
    <div class="lr-modal">
        <div class="lr-modal-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/>
                <line x1="12" y1="9" x2="12" y2="13"/>
                <line x1="12" y1="17" x2="12.01" y2="17"/>
            </svg>
        </div>
        <h3 class="lr-modal-title">Anulować zamówienie?</h3>
        <p class="lr-modal-text">Czy na pewno chcesz anulować to zamówienie użytkownikowi?<br>Tej operacji nie można cofnąć.</p>
        <div class="lr-modal-actions">
            <button type="button" class="lr-modal-btn lr-modal-btn-cancel" id="lr-modal-cancel">Wróć</button>
            <button type="button" class="lr-modal-btn lr-modal-btn-confirm" id="lr-modal-confirm">Tak, anuluj</button>
        </div>
    </div>
</div>

<script>
(function () {
    const modal = document.getElementById('lr-cancel-modal');
    const btnCancel = document.getElementById('lr-modal-cancel');
    const btnConfirm = document.getElementById('lr-modal-confirm');
    const list = document.getElementById('reservations-list');
    const search = document.getElementById('reservation-search');

    list.addEventListener('click', (e) => {
        const cancelBtn = e.target.closest('.lr-cancel-btn');
        if (cancelBtn) modal.classList.add('open');
    });

    btnCancel.addEventListener('click', () => modal.classList.remove('open'));
    btnConfirm.addEventListener('click', () => modal.classList.remove('open'));
    modal.addEventListener('click', (e) => { if (e.target === modal) modal.classList.remove('open'); });

    search.addEventListener('input', () => {
        const q = search.value.trim().toLowerCase();
        list.querySelectorAll('.lr-card').forEach(card => {
            card.style.display = (!q || card.textContent.toLowerCase().includes(q)) ? '' : 'none';
        });
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') modal.classList.remove('open');
    });
})();
</script>
</body>
</html>