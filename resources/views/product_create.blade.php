<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dodaj sprzęt – EquipRent Pro</title>
    <link rel="stylesheet" href="{{ asset('style-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('style-product-edit.css') }}">
    <style>
        .pe-alert{padding:12px 16px;border-radius:8px;margin-bottom:18px;font-size:13px}
        .pe-alert.info{background:#dbeafe;color:#1e40af;border:1px solid #93c5fd}
        .pe-gallery-thumb{position:relative}
        .pe-gallery-thumb button{position:absolute;right:4px;top:4px;width:24px;height:24px;border:0;border-radius:50%;background:#dc2626;color:#fff;cursor:pointer;font-weight:700;line-height:1}
        .pe-gallery-help{font-size:11px;color:#6b7280;margin-top:8px}
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
                        <span class="active">Dodaj sprzęt</span>
                    </div>
                    <h1>Nowy sprzęt</h1>
                    <p class="pe-serial">Wypełnij dane produktu i dodaj zdjęcia (max 10).</p>
                </div>
                <div class="pe-header-actions">
                    <a href="{{ route('equipment.list') }}" class="pe-btn-secondary">Anuluj</a>
                    <button type="submit" form="form-dodaj-produkt" class="pe-btn-primary">Dodaj Produkt</button>
                </div>
            </div>

            <div class="pe-wrapper">
                <div class="pe-main">

                    <form id="form-dodaj-produkt" class="pe-section" onsubmit="event.preventDefault(); alert('Produkt dodany (placeholder)'); window.location.href='/inwentarz';">

                        <div class="pe-section-header">
                            <div class="pe-section-title">
                                <div class="pe-section-title-icon-box">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                                </div>
                                Informacje ogólne
                            </div>
                            <div class="pe-status-toggle">
                                <span class="pe-status-toggle-label">Dostępny po dodaniu</span>
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
                                <input class="pe-form-input" id="title" required maxlength="255" placeholder="np. Rower górski MTB">
                            </div>
                            <div class="pe-form-group">
                                <label class="pe-form-label" for="equipment_category_id">Kategoria</label>
                                <select class="pe-form-select" id="equipment_category_id" required>
                                    <option value="">— Wybierz kategorię —</option>
                                    <option value="1">Rowery</option>
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
                                <input class="pe-form-input" id="one_day_price" type="number" min="0" required placeholder="np. 45">
                            </div>
                            <div class="pe-form-group">
                                <label class="pe-form-label" for="serial_number">Numer seryjny</label>
                                <input class="pe-form-input" id="serial_number" required maxlength="255" placeholder="np. SN-BIKE-0051">
                            </div>
                        </div>

                        <div class="pe-form-row single">
                            <div class="pe-form-group">
                                <label class="pe-form-label" for="body">Opis produktu</label>
                                <textarea class="pe-form-textarea" id="body" rows="5" placeholder="Krótki opis produktu — model, stan, cechy szczególne..."></textarea>
                            </div>
                        </div>

                        <div class="pe-gallery-block">
                            <div class="pe-gallery-head">
                                <span class="pe-gallery-label">Galeria zdjęć</span>
                                <span class="pe-gallery-count"><span id="pe-gallery-count">0</span> / max 10 zdjęć</span>
                            </div>
                            <div class="pe-gallery-grid" id="pe-gallery-grid">
                                <label class="pe-gallery-upload">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                    <span>Prześlij</span>
                                    <input type="file" id="pe-photos" accept="image/*" hidden multiple>
                                </label>
                            </div>
                            <div class="pe-gallery-help">Maksymalnie 10 zdjęć. Każde do 10 MB. Formaty: JPG, PNG, WEBP, AVIF.</div>
                        </div>
                    </form>
                </div>

                <aside class="pe-side">
                    <div class="pe-price-card">
                        <div class="pe-price-title">Podsumowanie</div>
                        <div class="pe-price-label">Stawka dobowa</div>
                        <div class="pe-price-daily">— zł</div>
                        <div class="pe-price-label">Kategoria</div>
                        <div class="pe-price-income" style="font-size:14px;">—</div>
                    </div>
                    <div class="pe-alert info" style="margin-top:16px;">
                        <strong>Nowy produkt.</strong><br>
                        Po dodaniu przejdziesz do inwentarza.
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

    switchEl.addEventListener('change', function() {
        const available = switchEl.checked;
        statusText.textContent = available ? 'Sprawny' : 'Serwis';
        statusText.classList.toggle('off', !available);
    });

    const photoInput = document.getElementById('pe-photos');
    const gallery = document.getElementById('pe-gallery-grid');
    const countEl = document.getElementById('pe-gallery-count');
    const selectedPhotos = [];

    photoInput.addEventListener('change', function() {
        const files = [...this.files];
        files.forEach(file => {
            if (!file.type.startsWith('image/')) return;
            selectedPhotos.push(file);
            const box = document.createElement('div');
            box.className = 'pe-gallery-thumb';
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.alt = file.name;
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.textContent = '×';
            btn.addEventListener('click', () => {
                const idx = selectedPhotos.indexOf(file);
                if (idx > -1) selectedPhotos.splice(idx, 1);
                box.remove();
                countEl.textContent = selectedPhotos.length;
            });
            box.appendChild(img);
            box.appendChild(btn);
            gallery.insertBefore(box, gallery.querySelector('.pe-gallery-upload'));
        });
        countEl.textContent = selectedPhotos.length;
    });
})();
</script>
</body>
</html>