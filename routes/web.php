<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ServiceController;
use App\Http\Controllers\Frontend\BusinessUnitController;
use App\Http\Controllers\Frontend\PortfolioController;
use App\Http\Controllers\Frontend\NewsController;
use App\Http\Controllers\Frontend\CareerController;
use App\Http\Controllers\Frontend\PartnerController;
use App\Http\Controllers\Frontend\ContactController;

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

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

// Business Units
Route::get('/business-units', [BusinessUnitController::class, 'index'])->name('units.index');
Route::get('/business-units/{businessUnit}', [BusinessUnitController::class, 'show'])->name('units.show');

// Portfolio
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{portfolio}', [PortfolioController::class, 'show'])->name('portfolio.show');

// News & Insight
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

// Career
Route::get('/career', [CareerController::class, 'index'])->name('career.index');
Route::get('/career/{career}', [CareerController::class, 'show'])->name('career.show');

// Partners & Community
Route::get('/partners', [PartnerController::class, 'index'])->name('partners');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// ==============================================
// ADMIN ROUTES
// ==============================================
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\BusinessUnitController as AdminBusinessUnitController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CareerController as AdminCareerController;
use App\Http\Controllers\Admin\PartnerController as AdminPartnerController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Client\ClientDashboardController;
use App\Http\Controllers\Client\ClientEventController;

// Admin Authentication Routes (Public)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Protected Routes (Requires Authentication)
Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Services
    Route::resource('services', AdminServiceController::class);

    // Business Units
    Route::resource('units', AdminBusinessUnitController::class);

    // Portfolios
    Route::resource('portfolios', AdminPortfolioController::class);

    // News
    Route::resource('news', AdminNewsController::class);

    // Careers
    Route::resource('careers', AdminCareerController::class);

    // Partners
    Route::resource('partners', AdminPartnerController::class);

    // Contacts
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');

    // Event Management
    Route::resource('events', AdminEventController::class)->except(['show']);

    // User Management (Client accounts)
    Route::resource('users', AdminUserController::class)->except(['show']);
});

// ==============================================
// CLIENT ROUTES
// ==============================================
Route::prefix('client')->name('client.')->middleware('client')->group(function () {
    Route::get('/', [ClientDashboardController::class, 'index'])->name('dashboard');
    Route::get('/events', [ClientEventController::class, 'index'])->name('events.index');
    Route::get('/events/{event}', [ClientEventController::class, 'show'])->name('events.show');
});


