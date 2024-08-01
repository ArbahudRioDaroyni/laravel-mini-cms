<?php

use App\Http\Controllers\{
	TopMenuController,
	ArticleCategoryController,
	ArticleController,
	OfficeProfilesController,
	SettingSliderController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
	return $request->user();
});
