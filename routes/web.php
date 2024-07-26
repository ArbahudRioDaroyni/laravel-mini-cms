<?php

use App\Http\Controllers\{
	AuthController,
	ImageUploadController,
	FrontendController,
	BackendController,
	TopMenuController,
	ArticleCategoryController,
	ArticleController,
	OfficeProfilesController,
	SettingSliderController
};
use Illuminate\Support\Facades\Route;

// Routes untuk Frontend
Route::prefix('')->group(function () {
	Route::get('/', [FrontendController::class, 'index'])->name('frontend.home');
	Route::get('/office/{slug}', [FrontendController::class, 'showOfficeProfile'])->name('frontend.showOffice');

});

// Routes untuk Backend
Route::prefix('admin')->middleware('auth')->group(function () {
	Route::get('/', [BackendController::class, 'index'])->name('backend.dashboard');

	Route::get('/topmenu/api', [TopMenuController::class, 'JSON'])->name('topmenu.api');
	Route::resource('topmenu', TopMenuController::class);

	Route::get('/office-profiles/api', [OfficeProfilesController::class, 'JSON'])->name('office-profiles.api');
	Route::resource('office-profiles', OfficeProfilesController::class);
	
	Route::get('/article-categories/api', [ArticleCategoryController::class, 'JSON'])->name('article-categories.api');
	Route::resource('article-categories', ArticleCategoryController::class);

	Route::get('/articles/api', [ArticleController::class, 'JSON'])->name('articles.api');
	Route::post('/articles/custom-update', [ArticleController::class, 'customUpdate'])->name('articles.xxx');
	Route::resource('articles', ArticleController::class);

	Route::get('/setting-slider/api', [SettingSliderController::class, 'JSON'])->name('setting-slider.api');
	Route::post('/setting-slider/custom-update', [SettingSliderController::class, 'customUpdate'])->name('setting-slider.xxx');
	Route::resource('setting-slider', SettingSliderController::class);

	Route::post('/upload-image', [ImageUploadController::class, 'uploadImage'])->name('upload.image');
});

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
