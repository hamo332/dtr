<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAdminLogin;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\AwdUploadController;
use App\Http\Controllers\Admin\AdminAuthController;

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



Route::get('/', function () {
    return redirect()->route('admin.home');
});

Route::get('/login', function () {
    // return redirect()->route('admin.home');
    return view('admin.auth.login');
})
// ->middleware(CheckAdminLogin::class)
->name('login-page');



Route::post('doAdminLogin', [AdminAuthController::class, 'login'])->name('doAdminLogin');

// closed site page 
Route::get('site/closed', function(){
    return view('web.closed');
})->name('site_closed');

// change language 
Route::get('lang/{lang}', [LanguageController::class,'changeLanguage'])->name('change_language');

// AWD Uploader Routes 
Route::group(['prefix' => 'awd-uploader', 'middleware' => 'auth'], function(){
    Route::post('/', [AwdUploadController::class, 'showUploader']);
    Route::post('upload', [AwdUploadController::class, 'upload']);
    Route::get('get_uploaded_files', [AwdUploadController::class, 'getUploadedFiles']);
    Route::post('get_file_by_ids', [AwdUploadController::class, 'getPreviewFiles']);
    Route::get('download/{id}', [AwdUploadController::class, 'attachmentDownload'])->name('download_attachment');
});