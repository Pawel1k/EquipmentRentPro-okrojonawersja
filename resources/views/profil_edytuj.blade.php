<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edycja profilu – EquipRent Pro</title>
    <link rel="stylesheet" href="{{ asset('style-profil.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('E.png') }}">
</head>
<body class="prof-page">
@include('partials.header')

<div class="prof-page-header">
    <div class="prof-page-header-text">
        <h1>Edycja Profilu</h1>
        <p>Zaktualizuj swoje dane osobowe i preferencje płatności.</p>
    </div>
    <div class="prof-header-actions">
        <a href="{{ route('profil') }}" class="prof-btn-secondary">Anuluj</a>
        <button type="submit" form="form-edycja-profilu" class="prof-btn-primary">Zapisz</button>
    </div>
</div>

<form id="form-edycja-profilu" onsubmit="event.preventDefault(); alert('Zmiany zapisane (placeholder)'); window.location.href='/profil';">

    <div class="prof-edit-wrapper">

        <aside>
            <div class="prof-edit-avatar-card">
                <div class="prof-edit-avatar-title">Edytuj zdjęcie</div>
                <div class="prof-edit-avatar prof-avatar-icon" id="user-avatar">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                </div>
                <div class="prof-edit-avatar-actions">
                    <label class="prof-icon-btn" title="Zmień zdjęcie">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                        </svg>
                        <input type="file" id="avatar-input" accept="image/*" hidden>
                    </label>
                    <button type="button" id="avatar-remove-btn" class="prof-icon-btn danger" title="Usuń zdjęcie">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 6 5 6 21 6"/>
                            <path d="M19 6l-2 14a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2L5 6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="prof-edit-mini-stats">
                <div class="prof-edit-mini-stat">
                    <span class="prof-edit-mini-label">Ostatnie logowanie</span>
                    <span class="prof-edit-mini-value">14 października 2026</span>
                </div>
                <div class="prof-edit-mini-stat">
                    <span class="prof-edit-mini-label">Aktywne wynajmy</span>
                    <span class="prof-edit-mini-value">2</span>
                </div>
            </div>
        </aside>

        <div class="prof-edit-content">

            <section class="prof-form-section">
                <div class="prof-form-title">
                    <div class="prof-form-title-icon-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </div>
                    Dane osobowe
                </div>

                <div class="prof-form-row">
                    <div class="prof-form-group">
                        <label class="prof-form-label" for="imie">Imię</label>
                        <input type="text" id="imie" class="prof-form-input" value="Paweł" required>
                    </div>
                    <div class="prof-form-group">
                        <label class="prof-form-label" for="nazwisko">Nazwisko</label>
                        <input type="text" id="nazwisko" class="prof-form-input" value="Nowak" required>
                    </div>
                </div>

                <div class="prof-form-row single">
                    <div class="prof-form-group">
                        <label class="prof-form-label" for="email">Adres e-mail</label>
                        <input type="email" id="email" class="prof-form-input" value="pawel.nowak@example.pl" required>
                    </div>
                </div>
            </section>

            <section class="prof-form-section">
                <div class="prof-form-title">
                    <div class="prof-form-title-icon-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M2 12h20"/>
                            <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                        </svg>
                    </div>
                    Informacje sportowe
                </div>

                <div class="prof-form-row single">
                    <div class="prof-form-group">
                        <label class="prof-form-label" for="klub">Członkostwo w klubie sportowym</label>
                        <input type="text" id="klub" class="prof-form-input" value="AZS Warszawa">
                        <div class="prof-form-help">Podanie nazwy klubu może uprawniać do zniżek lojalnościowych.</div>
                    </div>
                </div>

                <div class="prof-form-row single">
                    <div class="prof-form-group">
                        <label class="prof-form-label" for="opis">Opis profilu</label>
                        <textarea id="opis" class="prof-form-textarea" placeholder="Krótko opisz siebie i swoje zainteresowania sportowe...">Zapalony kolarz górski. Weekendy spędzam na trasach Mazowsza.</textarea>
                    </div>
                </div>
            </section>

            <section class="prof-form-section">
                <div class="prof-form-title">
                    <div class="prof-form-title-icon-box">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                    </div>
                    Zmień hasło
                </div>

                <div class="prof-form-row single">
                    <div class="prof-form-group">
                        <label class="prof-form-label" for="aktualne_haslo">Podaj aktualne hasło</label>
                        <input type="password" id="aktualne_haslo" class="prof-form-input" placeholder="Wpisz aktualne hasło...">
                    </div>
                </div>

                <div class="prof-form-row">
                    <div class="prof-form-group">
                        <label class="prof-form-label" for="nowe_haslo">Nowe hasło</label>
                        <input type="password" id="nowe_haslo" class="prof-form-input" placeholder="Nowe hasło...">
                    </div>
                    <div class="prof-form-group">
                        <label class="prof-form-label" for="nowe_haslo_confirm">Powtórz nowe hasło</label>
                        <input type="password" id="nowe_haslo_confirm" class="prof-form-input" placeholder="Nowe hasło (drugi raz)...">
                    </div>
                </div>
            </section>

        </div>
    </div>
</form>

@include('partials.footer')

<script>
(function () {
    const avatarIconSvg = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>';

    const avatarContainer = document.getElementById('user-avatar');
    const avatarInput = document.getElementById('avatar-input');
    const avatarRemoveBtn = document.getElementById('avatar-remove-btn');

    avatarInput?.addEventListener('change', function () {
        const file = avatarInput.files[0];
        if (!file) return;
        avatarContainer.innerHTML = '';
        avatarContainer.classList.remove('prof-avatar-icon');
        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.alt = 'Zdjęcie profilowe';
        avatarContainer.appendChild(img);
    });

    avatarRemoveBtn?.addEventListener('click', function () {
        if (avatarInput) avatarInput.value = '';
        avatarContainer.innerHTML = avatarIconSvg;
        avatarContainer.classList.add('prof-avatar-icon');
    });
})();
</script>
</body>
</html>