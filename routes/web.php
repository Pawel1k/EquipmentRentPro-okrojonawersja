<?php
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');
Route::view('/o-nas', 'o_nas')->name('o_nas');
Route::view('/regulamin', 'regulamin')->name('regulamin');
Route::view('/polityka-prywatnosci', 'polityka_prywatnosci')->name('polityka');
Route::view('/rezerwacje', 'rezerwacje')->name('rezerwacje');
Route::view('/profil', 'profil')->name('profil');
Route::view('/profil_edytuj', 'profil_edytuj')->name('profil_edytuj');
Route::view('/catalog', 'katalog')->name('catalog');
Route::view('/katalog', 'katalog')->name('katalog');
Route::view('/produkt/{id}', 'product')->name('product')->where('id', '[0-9]+');
Route::view('/platnosc', 'platnosc')->name('platnosc');
Route::view('/products/create', 'product_create')->name('product.create');
Route::view('/produkt/{id}/edytuj', 'product_edit')->name('product.edit')->where('id', '[0-9]+');
Route::view('/inwentarz', 'list_equipment')->name('equipment.list');
Route::view('/lista-uzytkownikow', 'list_users')->name('users.list');
Route::view('/uzytkownik-szczegoly/{id}', 'user_details')->name('users.show');
Route::view('/rejestr-wypozyczen', 'list_rentals')->name('rentals.list');
Route::view('/rejestr-wypozyczen/{id}', 'reservation_details')->name('rentals.show');
Route::view('/panel-glowny', 'dashboard')->name('dashboard');