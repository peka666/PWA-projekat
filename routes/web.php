<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\KorpaController;
use App\Http\Controllers\opcijeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/pocetna');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/profil', [ProfileController::class, 'profil'])->name('profil');



Route::post("/logout", [ProfileController::class, "logout"]);


Route::get("/proizvod/{id}", [opcijeController::class, "proizvod"]);
Route::get('/pocetna', [opcijeController::class, "pocetna"]);
Route::get("/jelovnik", [opcijeController::class, "jelovnik"]);
Route::get("/kontakt", [opcijeController::class, "kontakt"]);
Route::get('/jelovnik/pretraga', [opcijeController::class, 'pretraga']);

Route::get("/korpa", [KorpaController::class, "vidiKorpu"]);
Route::post("/dodajUKorpu", [KorpaController::class, "dodajUKorpu"]);
Route::post("/obrisiIzKorpe", [KorpaController::class, "obrisiIzKorpe"]);
Route::post("/oduzmiIzKorpe", [KorpaController::class, "oduzmiIzKorpe"]);
Route::post("/naruci", [KorpaController::class, "naruci"]);

Route::get("/adminPanel", [AdminController::class, "adminPanel"]);
Route::get("/korisnici", [AdminController::class, "korisnici"]);
Route::post("/obrisiKorisnika", [AdminController::class, "obrisiKorisnika"]);
Route::get("napraviKorisnika", [AdminController::class, "napraviKorisnika"]);
Route::post("/storujKorisnika", [AdminController::class, "storujKorisnika"]);
Route::get("/izmenaKorisnika/{id}", [AdminController::class, "izmenaKorisnika"]); 

Route::get("/editorPanel", [EditorController::class, "editorPanel"]);
Route::get("/izmeniProizvod/{id}", [EditorController::class, "izmeniProizvod"]);
Route::post("/storujProizvod", [EditorController::class, "storujProizvod"]);
Route::get("/dodavanjeProizvoda", [EditorController::class, "dodavanjeProizvoda"]);
Route::post("/dodavanjeProizvodaStorovanje", [EditorController::class, "dodavanjeProizvodaStorovanje"]);
Route::post("/obrisiProizvod", [EditorController::class, "obrisiProizvod"]);
Route::get("/grafikoni", [EditorController::class, "grafikoni"]);

require __DIR__.'/auth.php';
