<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Inwentarz – EquipRent Pro</title>
    <link rel="stylesheet" href="{{ asset('style-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('style-list-equipment.css') }}">
    <style>
        .le-date-range{display:grid;grid-template-columns:1fr 1fr;gap:8px}
        .le-input-date{min-width:0}
        .le-page.disabled{opacity:.45;pointer-events:none}
        .le-page.active{background:#075071;border-color:#075071;color:#fff}
    </style>
</head>
<body>
<div class="adm-shell">
    @include('partials.admin-sidebar')
    <div class="adm-body">
        @include('partials.admin-topbar')
        <div class="adm-content">
            <div class="le-content">
                <div class="le-breadcrumb"><span>Zarządzanie</span><span>›</span><span class="active">Inwentarz</span></div>
                <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px;gap:16px;flex-wrap:wrap;">
                    <h1 class="le-title" style="margin:0;">Inwentarz</h1>
                    <a href="{{ url('/products/create') }}"
                       style="display:inline-flex;align-items:center;gap:8px;background:#075071;color:#fff;padding:10px 18px;border-radius:8px;font-family:'Poppins',sans-serif;font-size:13px;font-weight:600;text-decoration:none;transition:background .15s;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        Dodaj sprzęt
                    </a>
                </div>

                <div class="le-filters">
                    <div class="le-filters-row">
                        <div class="le-filter-group">
                            <label class="le-filter-label">Kategoria</label>
                            <select class="le-select" id="le-category-select">
                                <option value="">Cały sprzęt</option>
                                <option value="1">Rowery</option>
                                <option value="2">Narty</option>
                                <option value="3">Kajaki</option>
                                <option value="4">Wspinaczka</option>
                                <option value="5">Camping</option>
                            </select>
                        </div>
                        <div class="le-filter-group le-price-group">
                            <label class="le-filter-label">Cena za dzień</label>
                            <button type="button" class="le-price-toggle" id="le-price-toggle" aria-haspopup="true" aria-expanded="false">
                                <span id="le-price-label">Dowolna</span>
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
                            </button>
                            <div class="le-price-popover" id="le-price-popover">
                                <div class="le-price-values"><span><span id="le-price-min-val">0</span> zł</span><span><span id="le-price-max-val">2000</span> zł</span></div>
                                <div class="le-price-slider">
                                    <div class="le-price-track"></div><div class="le-price-range" id="le-price-range"></div>
                                    <input type="range" min="0" max="2000" value="0" step="10" id="le-price-min">
                                    <input type="range" min="0" max="2000" value="2000" step="10" id="le-price-max">
                                </div>
                                <div class="le-price-bounds"><span>0 zł</span><span>2000 zł</span></div>
                            </div>
                        </div>
                        <div class="le-filter-group">
                            <label class="le-filter-label">Dostępność w terminie</label>
                            <div class="le-date-range">
                                <input type="date" class="le-input-date" id="le-date-from" aria-label="Data od">
                                <input type="date" class="le-input-date" id="le-date-to" aria-label="Data do">
                            </div>
                        </div>
                        <div class="le-filter-group">
                            <label class="le-filter-label">Konserwacja</label>
                            <div class="le-toggle-group" id="le-status-toggle">
                                <button type="button" class="le-toggle-btn active" data-value="sprawny">Sprawny</button>
                                <button type="button" class="le-toggle-btn" data-value="serwis">Serwis</button>
                            </div>
                        </div>
                        <div class="le-filter-group">
                            <label class="le-filter-label">Sortuj według</label>
                            <select class="le-select" id="le-sort-select">
                                <option value="name_asc">Nazwa (A-Z)</option>
                                <option value="name_desc">Nazwa (Z-A)</option>
                                <option value="price_asc">Cena rosnąco</option>
                                <option value="price_desc">Cena malejąco</option>
                            </select>
                        </div>
                    </div>
                    <div class="le-search">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                        <input type="text" id="le-search-input" placeholder="Szukaj roweru, sprzętu, numeru seryjnego...">
                    </div>
                </div>

                <div class="le-card">
                    <table class="le-table">
                        <thead><tr><th>Sprzęt i identyfikacja</th><th>Kategoria</th><th>Stawka dobowa</th><th>Status</th><th class="right">Akcje</th></tr></thead>
                        <tbody id="le-tbody">
                            @php
                                $items = [
                                    ['id'=>1,'title'=>'Rower górski MTB','sn'=>'SN-BIKE-001','cat'=>'Rowery','price'=>85,'status'=>'available'],
                                    ['id'=>2,'title'=>'Rower szosowy','sn'=>'SN-BIKE-002','cat'=>'Rowery','price'=>120,'status'=>'rented'],
                                    ['id'=>3,'title'=>'Deska snowboardowa','sn'=>'SN-SNOW-001','cat'=>'Narty','price'=>65,'status'=>'available'],
                                    ['id'=>4,'title'=>'Narty zjazdowe','sn'=>'SN-SKI-001','cat'=>'Narty','price'=>70,'status'=>'available'],
                                    ['id'=>5,'title'=>'Kajak turystyczny','sn'=>'SN-KAJ-001','cat'=>'Kajaki','price'=>90,'status'=>'service'],
                                    ['id'=>6,'title'=>'Sprzęt wspinaczkowy','sn'=>'SN-WSP-001','cat'=>'Wspinaczka','price'=>55,'status'=>'available'],
                                    ['id'=>7,'title'=>'Hulajnoga elektryczna','sn'=>'SN-HUL-001','cat'=>'Rowery','price'=>45,'status'=>'rented'],
                                    ['id'=>8,'title'=>'Namiot 3-osobowy','sn'=>'SN-CAMP-001','cat'=>'Camping','price'=>40,'status'=>'available'],
                                ];
                            @endphp

                            @foreach($items as $p)
                                <tr data-id="{{ $p['id'] }}">
                                    <td>
                                        <div class="le-product">
                                            <div class="le-product-img"></div>
                                            <div>
                                                <div class="le-product-name">{{ $p['title'] }}</div>
                                                <div class="le-product-sn"># {{ $p['sn'] }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $p['cat'] }}</td>
                                    <td class="le-price">{{ $p['price'] }} zł <span>/ dzień</span></td>
                                    <td>
                                        @if($p['status'] === 'available')
                                            <span class="le-badge available">Dostępny</span>
                                        @elseif($p['status'] === 'rented')
                                            <span class="le-badge rented">Wypożyczony</span>
                                        @else
                                            <span class="le-badge service">Serwis</span>
                                        @endif
                                    </td>
                                    <td class="right">
                                        <div class="le-actions">
                                            <a href="/produkt/{{ $p['id'] }}/edytuj" class="le-action-btn" aria-label="Edytuj" title="Edytuj">✎</a>
                                            <a href="/produkt/{{ $p['id'] }}" class="le-action-btn" aria-label="Podgląd" title="Podgląd">⌕</a>
                                            
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="le-footer">
                    <div class="le-footer-count">Wyświetlono <strong>1–8</strong> z <strong>8</strong> sztuk sprzętu</div>
                    <div class="le-pagination">
                        <a href="#" class="le-page disabled">«</a>
                        <a href="#" class="le-page active">1</a>
                        <a href="#" class="le-page disabled">»</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
(function(){
    'use strict';
    const tbody = document.getElementById('le-tbody');

    

    document.querySelectorAll('#le-status-toggle .le-toggle-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('#le-status-toggle .le-toggle-btn').forEach(x => x.classList.remove('active'));
            btn.classList.add('active');
        });
    });

    const toggle = document.getElementById('le-price-toggle');
    const pop = document.getElementById('le-price-popover');
    const priceMin = document.getElementById('le-price-min');
    const priceMax = document.getElementById('le-price-max');

    toggle.addEventListener('click', e => {
        e.stopPropagation();
        pop.classList.toggle('open');
        toggle.setAttribute('aria-expanded', pop.classList.contains('open') ? 'true' : 'false');
    });
    document.addEventListener('click', e => {
        if (pop.classList.contains('open') && !pop.contains(e.target) && !toggle.contains(e.target)) {
            pop.classList.remove('open');
            toggle.setAttribute('aria-expanded', 'false');
        }
    });

    function priceUI(){
        let lo = +priceMin.value, hi = +priceMax.value;
        if (lo >= hi) {
            if (document.activeElement === priceMin) lo = hi - 10;
            else hi = lo + 10;
            priceMin.value = lo;
            priceMax.value = hi;
        }
        document.getElementById('le-price-min-val').textContent = lo;
        document.getElementById('le-price-max-val').textContent = hi;
        document.getElementById('le-price-label').textContent = (lo === 0 && hi === 2000) ? 'Dowolna' : `${lo} - ${hi} zł`;
        document.getElementById('le-price-range').style.left = (lo / 2000 * 100) + '%';
        document.getElementById('le-price-range').style.right = (100 - hi / 2000 * 100) + '%';
    }
    priceMin.addEventListener('input', priceUI);
    priceMax.addEventListener('input', priceUI);
    priceUI();
})();
</script>
</body>
</html>