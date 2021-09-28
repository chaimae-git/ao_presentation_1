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
use App\Http\Controllers\GetMap;



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



Route::get('getmap', [GetMap::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'guest'], function(){

});

Route::group(['middleware'=>'auth'], function(){

    Route::get('/', [AoController::class, 'index']);

    Route::group(['as' => 'utilisateurs.', 'prefix' => 'utilisateurs'], function () {
        Route::get('/', [UtilisateurController::class, 'index'])->name('consulter');
        Route::get('{utilisateur}/afficher', [UtilisateurController::class, 'show'])->name('afficher');
    });

    Route::group(['as' => 'aos.', 'prefix' => 'aos'], function () {
        Route::get('/', [AoController::class, 'index'])->name('consulter');
        Route::get('ajouter', [AoController::class, 'create'])->name('ajouter');
        Route::get('{ao}/editer', [AoController::class, 'edit'])->name('editer');
        Route::get('{ao}/afficher', [AoController::class, 'show'])->name('afficher');
        Route::put('{ao}', [AoController::class, 'update'])->name('update');
        Route::delete('{ao}/destroy', [AoController::class, 'destroy'])->name('destroy');
        Route::get('download_file', [AoController::class, 'downloadFile'])->name('download_file');
    });


    Route::group(['as' => 'bus.', 'prefix' => 'bus'], function () {
        Route::get('/', [BuController::class, 'index'])->name('consulter');
    });


    Route::group(['as' => 'departements.', 'prefix' => 'departements'], function () {
        Route::get('/', [DepartementController::class, 'index'])->name('consulter');
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
});


