<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\pointageController;
use App\Http\Controllers\posteController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', function () {
    return view('page/connexion');
})->name("login")->middleware('dejaconnecte');

Route::get('/personnel',[adminController::class,"connexion"])->name("personnel");

Route::get('/personnel/ajoutPersonnel',[PersonnelController::class,"ajouter"])->name("ajouterPersonnel");

Route::get('/edit-personnel/{personnel}',[PersonnelController::class,"edit"])->name("editPersonnel");

Route::post('/personnel/ajoutPersonnel',[PersonnelController::class,"store"])->name("insererPersonnel");

Route::get('/supprimer-personnel/{personnel}/delete',[PersonnelController::class,"delete"])->name("supprimerPersonnel");

Route::post('/modifier-personnel',[PersonnelController::class,"update"])->name("modifierPersonnel");

Route::get('/detail-personnel/{personnel}',[PersonnelController::class,"detail"])->name("detailPersonnel");

Route::get('/personnel/search', [PersonnelController::class,'search'])->name('searchPersonnel');



Route::get('/inscription',[adminController::class,"inscription"])->name("inscription");

Route::post('/create',[adminController::class,"create"])->name("createAdmin");

Route::post('/check',[adminController::class,"check"])->name('check');

Route::get('/logout',[adminController::class,"logout"])->name('logout');



Route::get('/poste',[posteController::class,"index"])->name('poste');

Route::get('/poste/ajoutPoste',[posteController::class,"ajouter"])->name("ajouterPoste");

Route::post('/poste/ajoutPoste',[posteController::class,"store"])->name("insererPoste");

Route::get('/edit-poste/{poste}',[posteController::class,"edit"])->name("editPoste");

Route::post('/modifier-poste',[posteController::class,"update"])->name("modifierPoste");

Route::get('/supprimer-poste/{poste}/delete',[posteController::class,"delete"])->name("supprimerPoste");




Route::get('/pointage/ajoutPointage',[pointageController::class,"ajouter"])->name("ajouterPointage");

Route::post('/pointage/ajoutPointage',[pointageController::class,"store"])->name("insererPointage");


Route::get('/conge',[CongeController::class,"index"])->name('conge');

Route::get('conge/ajoutConge', [CongeController::class,"ajout"])->name('ajouterConge');

Route::post('/conge/ajoutConge',[CongeController::class,"store"])->name("insererConge");

Route::get('/validerConge',[CongeController::class,"valider"])->name("validerConge");

Route::get('/rejeterConge',[CongeController::class,"rejeter"])->name("rejeterConge");











