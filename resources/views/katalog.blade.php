<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog sprzętu</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style-catalog.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('E.png') }}">
</head>
<body>

@include('partials.header')

<main class="catalog-page">

    <aside class="catalog-sidebar">
        <div class="search-box">
            <i class="fa-solid fa-magnifying-glass search-icon"></i>
            <input
                type="text"
                placeholder="Szukaj sprzętu..."
                class="catalog-search"
                name="search">
        </div>

        <h3>Filtry</h3>

        <div class="filter-group">
            <p class="filter-title">RODZAJ SPRZĘTU</p>
            <label class="filter-option">
                <input type="checkbox" name="categories[]" value="1">
                Rowery
            </label>
            <label class="filter-option">
                <input type="checkbox" name="categories[]" value="2">
                Narty
            </label>
            <label class="filter-option">
                <input type="checkbox" name="categories[]" value="3">
                Kajaki
            </label>
            <label class="filter-option">
                <input type="checkbox" name="categories[]" value="4">
                Wspinaczka
            </label>
            <label class="filter-option">
                <input type="checkbox" name="categories[]" value="5">
                Camping
            </label>
        </div>

        <div class="filter-group price-group">
            <p class="filter-title">ZAKRES CENY (DZIEŃ)</p>
            <input
                type="range"
                min="0"
                max="200"
                value="200"
                class="price-range"
                name="price_range"
                id="price_range">
            <div class="price-values">
                <span>0 zł</span>
                <span id="price-display">200 zł</span>
            </div>
        </div>

        <div class="filter-group">
            <p class="filter-title">TERMIN DOSTĘPNOŚCI</p>
            <div class="date-group">
                <div class="date-field">
                    <label class="date-label">Data od</label>
                    <div class="date-box">
                        <i class="fa-regular fa-calendar date-icon"></i>
                        <input type="date" class="date-input" name="date_from" onfocus="this.showPicker()">
                    </div>
                </div>
                <div class="date-field">
                    <label class="date-label">Data do</label>
                    <div class="date-box">
                        <i class="fa-regular fa-calendar date-icon"></i>
                        <input type="date" class="date-input" name="date_to" onfocus="this.showPicker()">
                    </div>
                </div>
            </div>

            <button class="reset-btn" type="button">Resetuj filtry</button>
        </div>
    </aside>

    <section class="catalog-content">

        <div class="catalog-header">
            <div>
                <span class="catalog-breadcrumb">Sprzęt / Katalog</span>
                <h1>Katalog Sprzętu Sportowego</h1>
                <p>
                    Przeglądaj naszą bogatą ofertę profesjonalnego sprzętu sportowego.
                    Najwyższe standardy dla Twojego treningu.
                </p>
            </div>

            <div class="catalog-tools">
                <select name="sort" class="sort-select">
                    <option value="">Sortuj według</option>
                    <option value="price_asc">Cena rosnąco</option>
                    <option value="price_desc">Cena malejąco</option>
                    <option value="name_asc">Nazwa A-Z</option>
                    <option value="name_desc">Nazwa Z-A</option>
                </select>

                <button class="view-button active" id="gridViewBtn" type="button">
                    <i class="fa-solid fa-grip"></i>
                </button>
                <button class="view-button" id="listViewBtn" type="button">
                    <i class="fa-solid fa-list"></i>
                </button>
            </div>
        </div>

        <div id="products-container">
            @php
                $items = [
                    ['id'=>1,'title'=>'Rower górski MTB','body'=>'Profesjonalny rower górski do jazdy terenowej.','price'=>85,'cat'=>'Rowery','status'=>'Dostępny'],
                    ['id'=>2,'title'=>'Rower szosowy','body'=>'Lekki rower szosowy z karbonową ramą.','price'=>120,'cat'=>'Rowery','status'=>'Dostępny'],
                    ['id'=>3,'title'=>'Deska snowboardowa','body'=>'Freestyle deska snowboardowa dla początkujących.','price'=>65,'cat'=>'Narty','status'=>'Dostępny'],
                    ['id'=>4,'title'=>'Narty zjazdowe','body'=>'Narty zjazdowe z wiązaniami w komplecie.','price'=>70,'cat'=>'Narty','status'=>'Wypożyczony'],
                    ['id'=>5,'title'=>'Kajak turystyczny','body'=>'Dwuosobowy kajak z wiosłami.','price'=>90,'cat'=>'Kajaki','status'=>'Dostępny'],
                    ['id'=>6,'title'=>'Sprzęt wspinaczkowy','body'=>'Komplet uprzęży, kasku i karabińczyków.','price'=>55,'cat'=>'Wspinaczka','status'=>'Dostępny'],
                    ['id'=>7,'title'=>'Hulajnoga elektryczna','body'=>'Hulajnoga elektryczna z zasięgiem 30km.','price'=>45,'cat'=>'Rowery','status'=>'Serwis'],
                    ['id'=>8,'title'=>'Namiot 3-osobowy','body'=>'Lekki namiot turystyczny na weekend.','price'=>40,'cat'=>'Camping','status'=>'Dostępny'],
                    ['id'=>9,'title'=>'Kask rowerowy','body'=>'Certyfikowany kask z regulacją obwodu.','price'=>20,'cat'=>'Rowery','status'=>'Dostępny'],
                ];
            @endphp

            <div class="products-grid" id="productsGrid">
                @foreach($items as $product)
                    <div class="product-cards">
                        <div class="product-image">
                            <img
                                src="https://placehold.co/400x240/1a1a1a/666?text={{ urlencode($product['title']) }}"
                                alt="{{ $product['title'] }}">

                            @if($product['status'] === 'Dostępny')
                                <span class="product-badge">Dostępny</span>
                            @elseif($product['status'] === 'Wypożyczony')
                                <span class="product-badge" style="color: #f16012cc; background: #ffd7c2;">Wypożyczony</span>
                            @else
                                <span class="product-badge" style="color: #8e98aa; background: #e5edfb">Serwis</span>
                            @endif
                        </div>

                        <div class="product-body">
                            <div class="product-meta">
                                <p class="product-category">{{ $product['cat'] }}</p>
                            </div>

                            <h3 class="product-title">{{ $product['title'] }}</h3>
                            <p class="product-desc">{{ $product['body'] }}</p>

                            <div class="product-footer">
                                <div class="price">
                                    <strong>{{ $product['price'] }} zł</strong>
                                    <span>/ dzień</span>
                                </div>
                                <a href="/produkt/{{ $product['id'] }}" class="rent-btn" style="text-decoration: none;">
                                    Wypożycz
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="pagination-wrapper"></div>
        </div>

    </section>

</main>

@include('partials.footer')

<script>
(function() {
    'use strict';

    const gridButton = document.getElementById('gridViewBtn');
    const listButton = document.getElementById('listViewBtn');

    function setView(view) {
        const productsGrid = document.getElementById('productsGrid');
        if (!productsGrid) return;

        if (view === 'list') {
            productsGrid.classList.add('list-view');
            listButton.classList.add('active');
            gridButton.classList.remove('active');
        } else {
            productsGrid.classList.remove('list-view');
            gridButton.classList.add('active');
            listButton.classList.remove('active');
        }

        localStorage.setItem('catalogView', view);
    }

    const savedView = localStorage.getItem('catalogView') || 'grid';
    setView(savedView);

    gridButton.addEventListener('click', () => setView('grid'));
    listButton.addEventListener('click', () => setView('list'));

    const priceRange = document.querySelector('.price-range');
    const priceDisplay = document.getElementById('price-display');
    priceRange.addEventListener('input', () => {
        priceDisplay.textContent = priceRange.value + ' zł';
    });

    document.querySelector('.reset-btn').addEventListener('click', () => {
        document.querySelectorAll('.catalog-sidebar input').forEach(input => {
            if (input.type === 'checkbox') input.checked = false;
            if (input.type === 'range')    input.value = 200;
            if (input.type === 'date')     input.value = '';
            if (input.type === 'text')     input.value = '';
        });
        document.querySelector('[name="sort"]').value = '';
        priceDisplay.textContent = '200 zł';
    });
})();
</script>

</body>
</html>