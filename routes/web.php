<?php
//
//use Illuminate\Support\Facades\Route;
//
///*
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider within a group which
//| contains the "web" middleware group. Now create something great!
//|
//*/
//
//Route::get('/', function () {
//    return view('welcome');
//});
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//
//Route::get('/form_test', function () {
//    return view('form_test');
//});
//
//Route::view('add_ao','livewire.aos.show_Form');


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\AoController;
use App\Http\Controllers\ConcurrentController;
use App\Http\Controllers\BuController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\FichierController;


use App\Http\Controllers\MultiselectController;

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
Auth::routes();

Route::get('/', function () {
    return view('auth.register');
});

Route::view('add_ao', 'pages.aos.ao_test_livewire');


Route::get('multiselect', function () {
    return view('layouts.multiselect');
});

Route::post('multiselect', [MultiselectController::class, 'store'])->name('multiselect.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
    as => Route(utilisateurs.consulter);
    prefix => url utilisateurs/1/afficher - utilisateurs

    <form method='post' action={{url('utilisateurs/')}}>
    <form method='post' action={{route('utilisateurs.store')}}>
*/
Route::group(['as' => 'utilisateurs.', 'prefix' => 'utilisateurs'], function () {
    Route::get('/', [UtilisateurController::class, 'index'])->name('consulter');
    Route::get('ajouter', [UtilisateurController::class, 'create'])->name('ajouter');
    Route::get('{utilisateur}/editer', [UtilisateurController::class, 'edit'])->name('editer');
    Route::get('{utilisateur}/editer_password', [UtilisateurController::class, 'edit_password'])->name('editer_password');
    Route::get('{utilisateur}/afficher', [UtilisateurController::class, 'show'])->name('afficher');
    Route::post('/', [UtilisateurController::class, 'store'])->name('store');
    Route::put('{utilisateur}', [UtilisateurController::class, 'update'])->name('update');
    Route::patch('{utilisateur}', [UtilisateurController::class, 'update_password'])->name('update_password');
    Route::delete('{utilisateur}/destroy', [UtilisateurController::class, 'destroy'])->name('destroy');
});

Route::group(['as' => 'aos.', 'prefix' => 'aos'], function () {
    Route::get('/', [AoController::class, 'index'])->name('consulter');
    Route::get('ajouter', [AoController::class, 'create'])->name('ajouter');
    Route::get('{ao}/editer', [AoController::class, 'edit'])->name('editer');
    Route::get('{ao}/afficher', [AoController::class, 'show'])->name('afficher');
    Route::Post('/add_location', [AoController::class, 'add_location'])->name('add_location');
    Route::Post('/', [AoController::class, 'store'])->name('store');
    Route::put('{ao}', [AoController::class, 'update'])->name('update');
    Route::delete('{ao}/destroy', [AoController::class, 'destroy'])->name('destroy');
    Route::get('get_locations', [AoController::class, 'get_locations'])->name('get_locations');
    Route::get('{ao}/administration/joindre_un_fichier', [FichierController::class, 'administration_index'])->name('administration.index');
    Route::post('administration/joindre_un_fichier', [FichierController::class, 'administration_store'])->name('administration.store');
});


Route::group(['as' => 'bus.', 'prefix' => 'bus'], function () {
    Route::get('/', [BuController::class, 'index'])->name('consulter');
    Route::get('ajouter', [BuController::class, 'create'])->name('ajouter');
    Route::get('{bu}/editer', [BuController::class, 'edit'])->name('editer');
    Route::get('{bu}/afficher', [BuController::class, 'show'])->name('afficher');
    Route::Post('/', [BuController::class, 'store'])->name('store');
    Route::put('{bu}', [BuController::class, 'update'])->name('update');
    Route::delete('{bu}/destroy', [BuController::class, 'destroy'])->name('destroy');
});


Route::group(['as' => 'departements.', 'prefix' => 'departements'], function () {
    Route::get('/', [DepartementController::class, 'index'])->name('consulter');
    Route::get('ajouter', [DepartementController::class, 'create'])->name('ajouter');
    Route::get('{departement}/editer', [DepartementController::class, 'edit'])->name('editer');
    Route::get('{departement}/afficher', [DepartementController::class, 'show'])->name('afficher');
    Route::Post('/', [DepartementController::class, 'store'])->name('store');
    Route::put('{departement}', [DepartementController::class, 'update'])->name('update');
    Route::delete('{departement}/destroy', [DepartementController::class, 'destroy'])->name('destroy');
});


Route::group(['as' => 'concurrents.', 'prefix' => 'concurrents'], function () {
    Route::get('/', [ConcurrentController::class, 'index'])->name('consulter');
    Route::get('ajouter', [ConcurrentController::class, 'create'])->name('ajouter');
    Route::get('{concurent}/editer', [ConcurrentController::class, 'edit'])->name('editer');
    Route::get('{concurent}/afficher', [ConcurrentController::class, 'show'])->name('afficher');
    Route::Post('/', [ConcurrentController::class, 'store'])->name('store');
    Route::put('{concurent}', [ConcurrentController::class, 'update'])->name('update');
    Route::delete('{concurent}/destroy', [ConcurrentController::class, 'destroy'])->name('destroy');
});
