<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;

use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\SiteInfoController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\VisitorController;



Route::get('/test', function () {
    return response()->json(['message' => 'Test route works!']);
});
Route::get('/reviews', [ReviewController::class, 'Index']);
Route::get('/banner', [BannerController::class, 'Index']);
Route::post('/banner', [BannerController::class, 'update']);
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/projects/{id}', [ProjectController::class, 'show']);
Route::get('/team', [TeamMemberController::class, 'index']);
Route::get('/team/{id}', [TeamMemberController::class, 'show']);
Route::post('/contact', [ContactMessageController::class, 'store']);

Route::get('/site-info', [SiteInfoController::class, 'index']);
Route::post('/site-info', [SiteInfoController::class, 'update']);

Route::post('/log-visitor', [VisitorController::class, 'logVisitor']);


