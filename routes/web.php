<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Visites\VisiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/accueil',[\App\Http\Controllers\Gestions\AccueilController::class,'returnToAccueil'])->name('accueil');


    Route::get('/client',[\App\Http\Controllers\Clients\ClientController::class,'showAllClient'])->name('clients.showAll');
    Route::get('/employe',[\App\Http\Controllers\Employes\EmployeController::class,'showAllEmploye'])->name('employes.showAll');


    Route::get('/client/create',[\App\Http\Controllers\Clients\ClientController::class,'create'])->name('clients.create');
    Route::post('/client',[\App\Http\Controllers\Clients\ClientController::class,'store'])->name('clients.store');
    Route::get('/client/{client}/edit',[\App\Http\Controllers\Clients\ClientController::class,'edit'])->name('clients.edit');
    Route::put('/client/{client}/maj',[\App\Http\Controllers\Clients\ClientController::class,'maj'])->name('clients.maj');
    Route::delete('/client/{client}/supprimer',[\App\Http\Controllers\Clients\ClientController::class,'delete'])->name('clients.supprimer');

    Route::get('/employe/create',[\App\Http\Controllers\Employes\EmployeController::class,'create'])->name('employes.create');
    Route::post('/employe',[\App\Http\Controllers\Employes\EmployeController::class,'store'])->name('employes.store');
    Route::get('/employe/{employe}/edit',[\App\Http\Controllers\Employes\EmployeController::class,'edit'])->name('employes.edit');
    Route::put('/employe/{employe}/maj',[\App\Http\Controllers\Employes\EmployeController::class,'maj'])->name('employes.maj');
    Route::delete('/employe/{employe}/supprimer',[\App\Http\Controllers\Employes\EmployeController::class,'delete'])->name('employes.supprimer');

    Route::get('/visite/index', [VisiteController::class, 'index'])->name('visites.index');
    Route::post('/visite/store', [VisiteController::class, 'store'])->name('visites.store');
    Route::get('/visite/show', [VisiteController::class, 'showVisite'])->name('visites.show');
    
    
});



require __DIR__.'/auth.php';
