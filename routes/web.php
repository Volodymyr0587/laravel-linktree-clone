<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\ProfileController;

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
    return view('dashboard')->with(['links' => auth()->user()->links()->get()]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['middleware' => 'auth', 'prefix' => 'links-dashboard'], function () {

    Route::get('/links', [LinkController::class, 'index'])->name('links.index');
    Route::get('/links/new', [LinkController::class, 'create'])->name('links.create');
    Route::post('/links/new', [LinkController::class, 'store'])->name('links.store');;
    Route::get('/links/{link}', [LinkController::class, 'edit'])->name('links.edit');
    Route::post('/links/{link}', [LinkController::class, 'update'])->name('links.update');;
    Route::delete('/links/{link}', [LinkController::class, 'destroy'])->name('links.destroy');;

});

Route::post('/visit/{link}', [VisitController::class, 'store']);


require __DIR__.'/auth.php';
