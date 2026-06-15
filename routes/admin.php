<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ImageSliderController;
use App\Http\Controllers\Admin\ImportantNoticeController;
use App\Http\Controllers\Admin\MandatoryDisclosureController;
use App\Http\Controllers\Admin\NoticeBoardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\Admin\VideoGalleryController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    // guest route
    Route::group(['middleware' => 'admin:guest'], function () {

        Route::get('/', fn() => redirect()->route('admin.login'));

        Route::get('login', [AuthController::class, 'create'])->name('login');
        Route::post('login', [AuthController::class, 'store']);
    });

    // auth Route
    Route::group(['middleware' => 'admin:auth'], function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('important-notice', [ImportantNoticeController::class, 'edit'])
            ->name('important-notice.edit');
        Route::put('important-notice', [ImportantNoticeController::class, 'update'])
            ->name('important-notice.update');

        Route::resource('mandatory-disclosure', MandatoryDisclosureController::class);

        Route::resource('image-slider', ImageSliderController::class);

        Route::resource('notice-board', NoticeBoardController::class);

        Route::resource('gallery', GalleryController::class);

        // Inline image management (AJAX)
        Route::post('gallery/{gallery}/images', [GalleryController::class, 'uploadImagesAjax'])
            ->name('gallery.images.upload');
        Route::delete('gallery/{gallery}/image/{image}', [GalleryController::class, 'deleteImage'])
            ->name('gallery.image.destroy');
        Route::patch('gallery/{gallery}/image/{image}/toggle', [GalleryController::class, 'toggleImage'])
            ->name('gallery.image.toggle');
        Route::post('gallery/{gallery}/images/bulk-delete', [GalleryController::class, 'bulkDeleteImages'])
            ->name('gallery.images.bulk-delete');

        Route::resource('video-gallery', VideoGalleryController::class);

        Route::post('themes/toggle', [ThemeController::class, 'toggle'])->name('themes.toggle');

        Route::group(['prefix' => "settings", 'as' => 'settings.'], function () {
            Route::get('/edit', [SettingController::class, 'edit'])->name('edit');
            Route::put('/edit', [SettingController::class, 'update'])->name('update');
        });

        Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
            Route::get('/', [AccountController::class, 'index'])->name('index');
            Route::get('update', [AccountController::class, 'profile'])->name('update');
            Route::put('/update', [AccountController::class, 'profileUpdate']);
            Route::get('/password', [AccountController::class, 'password'])->name('password');
            Route::patch('/password', [AccountController::class, 'passwordUpdate']);
        });

        Route::post('logout', [AuthController::class, 'destroy'])->name('logout');
    });
});
