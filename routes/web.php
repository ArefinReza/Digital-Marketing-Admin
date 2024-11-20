<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\SiteInfoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Gate;

Route::get('/', function () {
    return redirect()->route('login'); // Adjust 'login' to the name of your login route if necessary
});




// Route::prefix('admin')->middleware(['auth'])->group(function () {
//     Route::middleware(['can:access-admin'])->group(function () {
//         Route::get('/site-info', [SiteInfoController::class, 'index1'])->name('admin.site_info.index1');
//         // Add other admin routes here
//     });
// });


// Route::middleware(['auth:sanctum', 'verified'])->get('/profile', function () {
//     return view('profile.show');
// })->name('profile');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/profile', [DashboardController::class, 'adminprofile'])->name('profile.show');


    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
        Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
        Route::post('/profile/permissions', [ProfileController::class, 'updatePermissions'])->name('profile.permissions.update');
        Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.show');
        Route::post('/profile/update-role/{id}', [ProfileController::class, 'updateUserRole'])->name('profile.updateRole');

    });
    



    // Admin routes
    Route::prefix('admin')->group(function () {
        Route::get('/services', [ServiceController::class, 'index1'])->name('admin.services.index1');
        Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
        Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store');
        Route::get('/services/{id}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
        Route::put('/services/{id}', [ServiceController::class, 'update'])->name('admin.services.update');
        Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');

        // Add other admin routes here
    });
    Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
        Route::get('/visitors', [VisitorController::class, 'index'])->name('visitors.index');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/banners', [BannerController::class, 'index1'])->name('admin.banners.index');
        Route::get('/banners/create', [BannerController::class, 'create'])->name('admin.banners.create');
        Route::post('/banners', [BannerController::class, 'store'])->name('admin.banners.store');
        Route::get('/banners/{id}/edit', [BannerController::class, 'edit'])->name('admin.banners.edit');
        Route::put('/banners/{id}', [BannerController::class, 'update'])->name('admin.banners.update');
        Route::delete('/banners/{id}', [BannerController::class, 'destroy'])->name('admin.banners.destroy');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/projects', [ProjectController::class, 'index1'])->name('admin.projects.index1');
        Route::get('/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
        Route::post('/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
        Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
        Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('admin.projects.update');
        Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/reviews', [ReviewController::class, 'index1'])->name('admin.reviews.index1');
        Route::get('/reviews/create', [ReviewController::class, 'create'])->name('admin.reviews.create');
        Route::post('/reviews', [ReviewController::class, 'store'])->name('admin.reviews.store');
        Route::get('/reviews/{id}', [ReviewController::class, 'show'])->name('admin.reviews.show');
        Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('admin.reviews.edit');
        Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('admin.reviews.update');
        Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('admin.reviews.destroy');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/team_members', [TeamMemberController::class, 'index1'])->name('admin.team_members.index1');
        Route::get('/team_members/create', [TeamMemberController::class, 'create'])->name('admin.team_members.create');
        Route::post('/team_members/store', [TeamMemberController::class, 'store'])->name('admin.team_members.store');

        Route::get('/team_members/{id}', [TeamMemberController::class, 'show1'])->name('admin.team_members.show');
        Route::get('/team_members/{id}/edit', [TeamMemberController::class, 'edit'])->name('admin.team_members.edit');
        Route::put('/team_members/{id}', [TeamMemberController::class, 'update'])->name('admin.team_members.update');
        Route::delete('/team_members/{id}', [TeamMemberController::class, 'destroy'])->name('admin.team_members.destroy');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/contact-messages', [ContactMessageController::class, 'index'])->name('contact_messages.index');
        Route::get('/contact-messages/{id}', [ContactMessageController::class, 'show'])->name('contact_messages.show');
    });

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/site-info', [SiteInfoController::class, 'index1'])->name('site_info.index1');
        Route::get('/site-info/edit', [SiteInfoController::class, 'edit'])->name('site_info.edit');
        Route::put('/site-info/update', [SiteInfoController::class, 'update'])->name('site_info.update');
    });
});

