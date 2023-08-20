<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Responses\Common\CommonResponse;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AwdUploadController;
use App\Http\Controllers\Admin\MailSettingController;
use App\Http\Controllers\Admin\HeaderSettingController;
use App\Http\Controllers\Admin\FooterSettingController;
use App\Http\Controllers\Admin\AppearanceSettingController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\PageSettingController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\SubSectionController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\InfoPageController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\RequestController;
use App\Http\Controllers\Admin\OtherController;
use App\Http\Controllers\Admin\ReportController;
use Illuminate\Support\Facades\Cache;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'admin'], function () {
    Route::get('/', [HomeController::class,'index'])->name('admin.home');
    Route::post('qr-scanned', [HomeController::class,'qrScanned'])->name('admin.qr_scanned');

    // setting routes group
    Route::group(['prefix' => 'settings'], function(){
        Route::get('general', [GeneralSettingController::class,'index'])->name('admin.general_settings');
        Route::put('general', [GeneralSettingController::class,'store'])->name('admin.general_settings.update');
        Route::get('mail', [MailSettingController::class,'index'])->name('admin.mail_settings');
        Route::put('mail', [MailSettingController::class,'store'])->name('admin.mail_settings.save');
        Route::post('mail/test', [MailSettingController::class,'checkMail'])->name('admin.mail_test');
    });
    
    // Design setting routes group
    Route::group(['prefix' => 'design'], function(){

        // header routes group
        Route::group(['prefix' => 'header'], function(){
            Route::get('/', [HeaderSettingController::class,'index'])->name('admin.header_settings');
            Route::put('/', [HeaderSettingController::class,'store'])->name('admin.header_store');
            Route::put('slider/add', [HeaderSettingController::class,'storeSlider'])->name('admin.slider_store');
        });
        
        // footer routes group
        Route::group(['prefix' => 'footer'], function(){
            Route::get('/', [FooterSettingController::class,'index'])->name('admin.footer_settings');
            Route::put('/', [FooterSettingController::class,'aboutSettings'])->name('admin.about_settings');
            Route::put('contact_data', [FooterSettingController::class,'contactData'])->name('admin.contact_data');
            Route::put('additional_links', [FooterSettingController::class,'additionalLinksSettings'])->name('admin.additional_links_settings');
            Route::put('socialmedia', [FooterSettingController::class,'socialmediaSettings'])->name('admin.socialmedia_settings');
        });
        
        // appearance routes group
        Route::group(['prefix' => 'appearance'], function(){
            Route::get('/', [AppearanceSettingController::class,'index'])->name('admin.appearance_settings');
            Route::put('/', [AppearanceSettingController::class,'meatData'])->name('admin.site_meta');
            Route::put('cookies_data', [AppearanceSettingController::class,'cookiesData'])->name('admin.cookies_data');
            Route::put('additional_scripts', [AppearanceSettingController::class,'additionalScript'])->name('admin.additional_script');
        });
        

        // pages routes group
        Route::group(['prefix' => 'pages'], function(){
            Route::get('/', [PageSettingController::class,'index'])->name('admin.pages_settings');
            Route::post('/', [PageSettingController::class,'indexWithFilters'])->name('admin.pages.render');
            Route::get('create', [PageSettingController::class,'create'])->name('admin.create_page');
            Route::post('create', [PageSettingController::class,'addPage'])->name('admin.add_page');
            Route::get('/{page}/edit', [PageSettingController::class,'editPage'])->name('admin.pages.edit');
            Route::put('/{page}', [PageSettingController::class,'update'])->name('admin.pages.update');
            Route::delete('/{page}', [PageSettingController::class,'delete'])->name('admin.pages.delete');
            
        });
    });

    // Design setting routes group
    Route::group(['prefix' => 'social'], function(){

        // social logins routes group
        Route::group(['prefix' => 'logins'], function(){
            Route::get('/', [SocialMediaController::class,'index'])->name('admin.social.logins');
            Route::put('/', [SocialMediaController::class,'store'])->name('admin.social.logins.store');
        });

        // general social settings 
        Route::get('/facebook/{type}', [SocialMediaController::class,'facebookIndex'])->name('admin.social.facebook');
        Route::put('/facebook', [SocialMediaController::class,'facebookStore'])->name('admin.social.facebook.store');
        Route::get('/google/{type}', [SocialMediaController::class,'googleIndex'])->name('admin.social.google');
        Route::put('/google', [SocialMediaController::class,'googleStore'])->name('admin.social.google.store');


    });
    // file manager routes group 
    Route::group(['prefix' => 'file_manager'], function(){
        Route::get('/', [AwdUploadController::class, 'index'])->name('uploaded-files.index');
        Route::post('/', [AwdUploadController::class,'indexWithFilters'])->name('uploaded-files.render');
        Route::any('file_info', [AwdUploadController::class,'fileInfo'])->name('uploaded-files.info');
        Route::get('create', [AwdUploadController::class, 'create'])->name('uploaded-files.create');
        Route::get('destroy/{id}', [AwdUploadController::class, 'destroy'])->name('uploaded-files.destroy');
    });

    // user roles routes group 
    Route::group(['prefix' => 'roles'], function(){
        Route::get('/', [UserRoleController::class, 'index'])->name('admin.roles');
        Route::post('/', [UserRoleController::class,'indexWithFilters'])->name('admin.roles.render');
        Route::get('create', [UserRoleController::class, 'create'])->name('admin.roles.create');
        Route::post('create', [UserRoleController::class, 'store'])->name('admin.roles.store');
        Route::get('/{role}/edit', [UserRoleController::class, 'editRole'])->name('admin.roles.edit');
        Route::put('/{role}', [UserRoleController::class,'update'])->name('admin.roles.update');
        Route::delete('/{role}', [UserRoleController::class,'delete'])->name('admin.roles.delete');

    });

    // users routes group 
    Route::group(['prefix' => 'users'], function(){
        Route::get('/', [UserController::class, 'index'])->name('admin.users');
        Route::post('/', [UserController::class, 'index'])->name('admin.users.render');
        Route::get('/pending', [UserController::class, 'pendingUsers'])->name('admin.pending_users');
        Route::get('/{user}/edit', [UserController::class, 'editUser'])->name('admin.edit_user');

        Route::get('/{user}/statement', [UserController::class, 'userStatement'])->name('admin.user_statement');
        Route::get('/{user}/getReport',[UserController::class , 'getReport'])->name('admin.getReport');
        Route::get('/{user}/export-user-logs', [UserController::class, 'exportUserLogsToExcel'])->name('admin.exportUserLogsToExcel');
        Route::get('/{user}/pdf-user-logs', [UserController::class, 'exportUserLogsToPdf'])->name('admin.exportUserLogsToPdf');

        Route::put('/{user}/edit', [UserController::class, 'update'])->name('admin.users.update');
        Route::put('/{user}/security', [UserController::class, 'securityUpdate'])->name('admin.security_update');
        Route::get('/create', [UserController::class, 'createUser'])->name('admin.users.create');
        Route::get('/{rank}/create', [UserController::class, 'createUserByRank'])->name('admin.users.add.byrank');
        Route::post('/create', [UserController::class, 'store'])->name('admin.users.store');
        Route::post('/{rank}/create', [UserController::class, 'storeByRank'])->name('admin.users.store.byrank');
        Route::get('/failed_logins', [UserController::class, 'failedLogins'])->name('admin.failed_logins');
        Route::get('/{rank}', [UserController::class, 'userByRank'])->name('admin.users.byrank');
        Route::delete('/{user}', [UserController::class,'delete'])->name('admin.users.delete');
    });

    // profile routes group 
    Route::group(['prefix' => 'profile'], function(){
        Route::get('/', [ProfileController::class, 'index'])->name('admin.profile');
        Route::put('edit', [ProfileController::class, 'update'])->name('admin.profile.update');
        Route::put('security', [ProfileController::class, 'securityUpdate'])->name('admin.profile.security.update');
    });



    // activity logs routes group 
    Route::group(['prefix' => 'logs'], function(){
        Route::get('/', [LogController::class, 'index'])->name('admin.logs');
        Route::post('/', [LogController::class, 'renderPage'])->name('admin.logs.render');
    });

    // requests routes group 
    Route::group(['prefix' => 'requests'], function(){
        Route::get('/{status}', [RequestController::class, 'index'])->name('admin.requests');
    });


    // server status 
    Route::get('server',function(){
        return view('admin.server');
    })->name('admin.check_server');

    // logout 
    Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');

    // chache clear route
    Route::get('clear_cache',function(){
        Cache::flush();
        
        session()->flash('success', __('admin.cache_cleared'));
        //reponse payload
        $payload = [
            'status' => 'success',
            'message' => __('admin.cache_cleared'),
            'redirect_url' => url()->previous(),
        ];

        //generate a response
        return new CommonResponse($payload);
    })->name('admin.clear_cache');
    
});


Route::group(['middleware' => 'guest'],function(){
    Route::get('login', [LoginController::class,'adminIndex'])->name('admin.login');
    Route::post('login', [LoginController::class,'authenticate'])->name('admin.login');
    Route::get('forgot_password', [ResetPasswordController::class,'forgotPassword'])->name('admin.forgot_password');
    Route::post('forgot_password', [ResetPasswordController::class,'sendLink'])->name('admin.email_password');
    Route::get('reset_password', [ResetPasswordController::class,'resetPassword'])->name('password.reset');
    Route::post('reset_password', [ResetPasswordController::class,'changePassword'])->name('password.change');
});



