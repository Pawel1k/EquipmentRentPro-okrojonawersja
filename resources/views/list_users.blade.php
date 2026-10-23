<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Zarejestrowani Klienci – EquipRent Pro</title>
    <link rel="stylesheet" href="{{ asset('style-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('style-list-users.css') }}">
</head>
<body>
<div class="adm-shell">
    @include('partials.admin-sidebar')

    <div class="adm-body">
        @include('partials.admin-topbar')

        <div class="adm-content">
            <div class="lu-content">

                <div class="le-breadcrumb">
                    <span>Zarządzanie</span>
                    <span>›</span>
                    <span class="active">użytkownicy</span>
                </div>
                <h1 class="le-title">Użytkownicy</h1>

                <div class="lu-header">
                    <div class="adm-search" style="max-width:380px;">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"/>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                        </svg>
                        <input type="text" id="lu-search" placeholder="Szukaj po imieniu, nazwisku, e-mailu lub telefonie...">
                    </div>
                </div>

                <div class="lu-card">
                    <table class="lu-table">
                        <thead>
                            <tr>
                                <th>Profil Klienta</th>
                                <th>Komunikacja</th>
                                <th class="center">Aktywność</th>
                                <th>Rejestracja</th>
                                <th class="right">Administracja</th>
                            </tr>
                        </thead>
                        <tbody id="lu-tbody">
                            @php
                                $users = [
                                    ['id'=>1,'name'=>'Paweł','surname'=>'Nowak','email'=>'pawel.nowak@example.pl','phone'=>'+48 601 234 567','role'=>'Klient','activity'=>7,'created'=>'15.01.2026','lastLogin'=>'14.10.2026','blocked'=>false],
                                    ['id'=>2,'name'=>'Anna','surname'=>'Kowalska','email'=>'anna.k@example.pl','phone'=>'+48 602 345 678','role'=>'Klient','activity'=>12,'created'=>'03.03.2026','lastLogin'=>'12.10.2026','blocked'=>false],
                                    ['id'=>3,'name'=>'Marek','surname'=>'Wiśniewski','email'=>'marek.w@example.pl','phone'=>null,'role'=>'Klient','activity'=>3,'created'=>'22.05.2026','lastLogin'=>'08.10.2026','blocked'=>false],
                                    ['id'=>4,'name'=>'Katarzyna','surname'=>'Lewandowska','email'=>'kasia.l@example.pl','phone'=>'+48 604 567 890','role'=>'Klient','activity'=>5,'created'=>'10.07.2026','lastLogin'=>'13.10.2026','blocked'=>true],
                                    ['id'=>5,'name'=>'Tomasz','surname'=>'Dąbrowski','email'=>'tomek.d@example.pl','phone'=>'+48 605 678 901','role'=>'Klient','activity'=>8,'created'=>'18.08.2026','lastLogin'=>'11.10.2026','blocked'=>false],
                                ];
                            @endphp

                            @foreach($users as $u)
                                <tr data-user-id="{{ $u['id'] }}">
                                    <td>
                                        <div class="lu-profile">
                                            <div class="lu-avatar">
                                                <span style="display:flex;align-items:center;justify-content:center;width:100%;height:100%;font-size:14px;font-weight:700;color:#6b7280;">
                                                    {{ strtoupper(substr($u['name'],0,1).substr($u['surname'],0,1)) }}
                                                </span>
                                                <span class="lu-avatar-dot {{ $u['blocked'] ? 'off' : '' }}"></span>
                                            </div>
                                            <div>
                                                <div class="lu-profile-name">{{ $u['name'] }} {{ $u['surname'] }}</div>
                                                <div class="lu-profile-role">{{ $u['role'] }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="lu-email">{{ $u['email'] }}</div>
                                        @if($u['blocked'])
                                            <div class="lu-tag blocked">Zablokowany</div>
                                        @elseif($u['phone'])
                                            <div class="lu-tag">{{ $u['phone'] }}</div>
                                        @else
                                            <div class="lu-tag muted">Brak numeru telefonu</div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="lu-activity">
                                            <div class="lu-activity-num">{{ $u['activity'] }}</div>
                                            <div class="lu-activity-label">Rezerwacji</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="lu-reg-date">{{ $u['created'] }}</div>
                                        <div class="lu-reg-sub">Ostatnio: {{ $u['lastLogin'] }}</div>
                                    </td>
                                    <td>
                                        <div class="lu-admin">
                                            <a href="/uzytkownik-szczegoly/{{ $u['id'] }}" class="lu-details-btn">Szczegóły</a>
                                            <button type="button" class="lu-toggle-icon {{ $u['blocked'] ? 'on' : '' }}" data-action="toggle-block" data-id="{{ $u['id'] }}" aria-label="{{ $u['blocked'] ? 'Odblokuj' : 'Zablokuj' }}" title="{{ $u['blocked'] ? 'Odblokuj użytkownika' : 'Zablokuj użytkownika' }}">
                                                @if($u['blocked'])
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                                        <polyline points="22 4 12 14.01 9 11.01"/>
                                                    </svg>
                                                @else
                                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <circle cx="12" cy="12" r="10"/>
                                                        <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/>
                                                    </svg>
                                                @endif
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="lu-footer">
                    <div class="lu-footer-count">Wyświetlono 5 z 5 użytkowników</div>
                    <div class="lu-pagination"></div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
(function () {
    'use strict';

    const tbody = document.getElementById('lu-tbody');
    const searchInput = document.getElementById('lu-search');

    searchInput.addEventListener('input', () => {
        const q = searchInput.value.trim().toLowerCase();
        tbody.querySelectorAll('tr').forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = (!q || text.includes(q)) ? '' : 'none';
        });
    });

    tbody.addEventListener('click', (e) => {
        const btn = e.target.closest('[data-action="toggle-block"]');
        if (!btn) return;

        const willBlock = !btn.classList.contains('on');
        if (!confirm(`Czy na pewno chcesz ${willBlock ? 'zablokować' : 'odblokować'} tego użytkownika?`)) return;

        btn.classList.toggle('on');
        const row = btn.closest('tr');
        const avatarDot = row.querySelector('.lu-avatar-dot');
        if (avatarDot) avatarDot.classList.toggle('off');
    });
})();
</script>
</body>
</html>