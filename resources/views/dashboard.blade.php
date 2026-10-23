<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Panel Główny – EquipRent Pro</title>
    <link rel="stylesheet" href="{{ asset('style-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('style-dashboard.css') }}">
</head>
<body>
<div class="adm-shell">
    @include('partials.admin-sidebar')

    <div class="adm-body">
        @include('partials.admin-topbar')

        <div class="adm-content">
            <div class="db-content">

                <div class="le-breadcrumb">
                    <span>Zarządzanie</span>
                    <span>›</span>
                    <span class="active">Panel Główny</span>
                </div>
                <h1 class="le-title">Panel Główny</h1>

                <div class="db-stats">

                    <div class="db-stat">
                        <div class="db-stat-decor"></div>
                        <div class="db-stat-label">Aktywne wynajmy</div>
                        <div class="db-stat-value">
                            <span>24</span>
                            <span class="db-stat-trend">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="17 6 23 6 23 12"/>
                                    <line x1="23" y1="6" x2="13" y2="16"/>
                                    <line x1="13" y1="16" x2="8" y2="11"/>
                                    <line x1="8" y1="11" x2="1" y2="18"/>
                                </svg>
                                <span>+15%</span>
                            </span>
                        </div>
                        <div class="db-stat-meta">
                            <span class="dot"></span>
                            <span>Poprzedni miesiąc: 21</span>
                        </div>
                    </div>

                    <div class="db-stat">
                        <div class="db-stat-label">Przychód miesięczny</div>

                        <div class="db-stat-value">
                            <span>42 850 zł</span>
                            <span class="db-stat-trend">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="17 6 23 6 23 12"/>
                                    <line x1="23" y1="6" x2="13" y2="16"/>
                                    <line x1="13" y1="16" x2="8" y2="11"/>
                                    <line x1="8" y1="11" x2="1" y2="18"/>
                                </svg>
                                <span>+22%</span>
                            </span>
                        </div>

                        <div class="db-progress">
                            <div class="db-progress-bar" style="width:85%"></div>
                        </div>

                        <div class="db-progress-label">
                            <span>Poprzedni miesiąc: 35 100 zł</span>
                        </div>
                    </div>

                    <div class="db-stat dark">
                        <div class="db-stat-label">
                            Zarobki w twoim tygodniu
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
                                <polyline points="17 6 23 6 23 12"/>
                            </svg>
                        </div>

                        <div class="db-dark-title">8 420 zł</div>
                        <div class="db-dark-text">Dochód z ostatnich 7 dni</div>

                        <div class="db-mini-chart">
                            <div class="bar" style="height:40%"></div>
                            <div class="bar" style="height:65%"></div>
                            <div class="bar" style="height:55%"></div>
                            <div class="bar" style="height:80%"></div>
                            <div class="bar" style="height:70%"></div>
                            <div class="bar" style="height:95%"></div>
                            <div class="bar" style="height:60%"></div>
                        </div>
                    </div>
                </div>

                <div class="db-grid-2">

                    <div>
                        <div class="db-section-header">
                            <div class="db-section-title">Ostatnie Rezerwacje</div>
                            <a href="{{ route('rentals.list') }}" class="db-section-link">Pokaż wszystkie</a>
                        </div>

                        <div class="db-card">
                            <table class="db-table">
                                <thead>
                                    <tr>
                                        <th>Klient</th>
                                        <th>Sprzęt</th>
                                        <th>Okres</th>
                                        <th>Status</th>
                                        <th>Akcja</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="db-client">
                                                <div class="db-mono">PN</div>
                                                <div>
                                                    <div class="db-client-name">Paweł Nowak</div>
                                                    <div class="db-client-tag">Rowery</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="db-equip-name">Rower górski MTB</div>
                                            <div class="db-equip-cat">Rowery</div>
                                        </td>
                                        <td>
                                            <div class="db-period">13.10.2026<br>16.10.2026</div>
                                        </td>
                                        <td><span class="db-badge rented">Aktywna</span></td>
                                        <td>—</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="db-client">
                                                <div class="db-mono">AK</div>
                                                <div>
                                                    <div class="db-client-name">Anna Kowalska</div>
                                                    <div class="db-client-tag">Narty</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="db-equip-name">Narty zjazdowe</div>
                                            <div class="db-equip-cat">Narty</div>
                                        </td>
                                        <td>
                                            <div class="db-period">10.10.2026<br>15.10.2026</div>
                                        </td>
                                        <td><span class="db-badge waiting">Oczekująca</span></td>
                                        <td>—</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="db-client">
                                                <div class="db-mono">MW</div>
                                                <div>
                                                    <div class="db-client-name">Marek Wiśniewski</div>
                                                    <div class="db-client-tag">Kajaki</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="db-equip-name">Kajak turystyczny</div>
                                            <div class="db-equip-cat">Kajaki</div>
                                        </td>
                                        <td>
                                            <div class="db-period">05.10.2026<br>08.10.2026</div>
                                        </td>
                                        <td><span class="db-badge returned">Zakończona</span></td>
                                        <td>—</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div>
                        <div class="db-section-header">
                            <div class="db-section-title">Popularny Sprzęt</div>
                        </div>

                        <div class="db-pop-list">
                            <div class="db-pop-card">
                                <div class="db-pop-img"></div>
                                <div class="db-pop-body">
                                    <div class="db-pop-name">Rower górski MTB</div>
                                    <div class="db-pop-meta">12 rezerwacji</div>
                                    <div class="db-pop-footer">
                                        <span class="db-pop-price">85 zł / dzień</span>
                                        <span class="db-pop-status available">Dostępny</span>
                                    </div>
                                </div>
                            </div>
                            <div class="db-pop-card">
                                <div class="db-pop-img"></div>
                                <div class="db-pop-body">
                                    <div class="db-pop-name">Deska snowboardowa</div>
                                    <div class="db-pop-meta">9 rezerwacji</div>
                                    <div class="db-pop-footer">
                                        <span class="db-pop-price">65 zł / dzień</span>
                                        <span class="db-pop-status reserved">Wypożyczony</span>
                                    </div>
                                </div>
                            </div>
                            <div class="db-pop-card">
                                <div class="db-pop-img"></div>
                                <div class="db-pop-body">
                                    <div class="db-pop-name">Narty zjazdowe</div>
                                    <div class="db-pop-meta">7 rezerwacji</div>
                                    <div class="db-pop-footer">
                                        <span class="db-pop-price">70 zł / dzień</span>
                                        <span class="db-pop-status available">Dostępny</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>