<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PropertiesFeatureController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Landing\HomeController;
use App\Http\Controllers\Landing\LandingAboutController;
use App\Http\Controllers\Landing\LandingPropertiesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('landing.index');

Route::get('/contacts', function () {
    return view('landing.contact.index');
})->name('landing.contact.index');


Route::get('/dashboard', function () {
    return redirect()->route('dashboard');
})->middleware(['auth', 'verified']);

Route::get('/villa-rental/{slug}', [LandingPropertiesController::class, 'details'])->name('landing.properties.detail');
Route::get('/villa-rental', [LandingPropertiesController::class, 'index'])->name('landing.properties.index');
Route::get('/about', [LandingAboutController::class, 'index'])->name('landing.about.index');

Route::post('/booking/change-status', [BookingController::class, 'changeStatus']);
Route::resource('/booking', BookingController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/panel/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/panel', function () {
        return redirect()->route('dashboard');
    });

    Route::resource('/panel/properties', PropertyController::class);
    Route::resource('/panel/features', PropertiesFeatureController::class);

    Route::get('/get-subregions/{regionId}', [PropertyController::class, 'getSubregions']);
});

require __DIR__ . '/auth.php';
