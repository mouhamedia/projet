<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;
use App\Models\Video;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CotisationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Pages Publiques
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('accueil');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/presentation', function() { 
    return view('pages.presentation'); 
})->name('presentation');

Route::get('/actualites', [MessageController::class, 'index'])->name('actualites');
Route::get('/videos', [VideoController::class, 'index'])->name('videos');
Route::get('/videos/{video}', [VideoController::class, 'show'])->name('videos.show');
Route::get('/photos', [PhotoController::class, 'index'])->name('photos');
Route::get('/cotisations', [CotisationController::class, 'index'])->name('cotisations');

Route::get('/contact', function() { 
    return view('pages.contact'); 
})->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Authentification
|--------------------------------------------------------------------------
*/
Auth::routes(); 

/*
|--------------------------------------------------------------------------
| Administration (Middleware: auth + admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function() {
    
    // DASHBOARD
    Route::get('/dashboard', function() { 
        $countMessages = Message::count();
        $countVideos = Video::count();
        $countAdmins = User::where('is_admin', true)->count();
        return view('admin.dashboard', compact('countMessages', 'countVideos', 'countAdmins')); 
    })->name('dashboard');

    // USERS : On utilise resource pour index, store, update, destroy
    Route::resource('users', UserController::class)->except(['show', 'create', 'edit']);

    // VIDEOS : adminIndex pour la liste, resource pour le reste
    Route::get('/videos', [VideoController::class, 'adminIndex'])->name('videos.index');
    Route::resource('videos', VideoController::class)->except(['index']);

    // PHOTOS
    Route::get('/photos', [PhotoController::class, 'adminIndex'])->name('photos.index');
    Route::resource('photos', PhotoController::class)->except(['index']);

    // MESSAGES / ACTUALITÉS
    Route::get('/messages', [MessageController::class, 'adminIndex'])->name('messages.index');
    Route::resource('messages', MessageController::class)->except(['index']);

    // COTISATIONS
    Route::get('/cotisations', [CotisationController::class, 'adminIndex'])->name('cotisations.index');
    Route::resource('cotisations', CotisationController::class)->except(['index']);
});