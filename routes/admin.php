<?php

use App\Http\Controllers\Admin\AboutSettingController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AdmissionEnquiryController;
use App\Http\Controllers\Admin\AdmissionSettingController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContactEnquiryController;
use App\Http\Controllers\Admin\CoreValueController;
use App\Http\Controllers\Admin\HomeStatController;
use App\Http\Controllers\Admin\SchoolAuthorityController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ImageSliderController;
use App\Http\Controllers\Admin\ImportantNoticeController;
use App\Http\Controllers\Admin\MandatoryDisclosureController;
use App\Http\Controllers\Admin\NoticeBoardController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\Admin\VideoGalleryController;
use App\Http\Controllers\Admin\VisionMissionController;
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

        // Admission Settings (singleton)
        Route::get('admission/settings', [AdmissionSettingController::class, 'edit'])
            ->name('admission.edit');
        Route::put('admission/settings', [AdmissionSettingController::class, 'update'])
            ->name('admission.update');

        // Admission Enquiries
        Route::get('admission/enquiries', [AdmissionEnquiryController::class, 'index'])
            ->name('admission.enquiries.index');
        Route::get('admission/enquiries/{enquiry}', [AdmissionEnquiryController::class, 'show'])
            ->name('admission.enquiries.show');
        Route::delete('admission/enquiries/{enquiry}', [AdmissionEnquiryController::class, 'destroy'])
            ->name('admission.enquiries.destroy');

        // Contact Enquiries
        Route::get('contact-enquiries', [ContactEnquiryController::class, 'index'])
            ->name('contact-enquiries.index');
        Route::get('contact-enquiries/{enquiry}', [ContactEnquiryController::class, 'show'])
            ->name('contact-enquiries.show');
        Route::delete('contact-enquiries/{enquiry}', [ContactEnquiryController::class, 'destroy'])
            ->name('contact-enquiries.destroy');

        // About Settings
        Route::get('about-setting', [AboutSettingController::class, 'edit'])
            ->name('about-setting.edit');
        Route::put('about-setting', [AboutSettingController::class, 'update'])
            ->name('about-setting.update');

        // Vision & Mission
        Route::get('vision-mission', [VisionMissionController::class, 'edit'])
            ->name('vision-mission.edit');
        Route::put('vision-mission', [VisionMissionController::class, 'update'])
            ->name('vision-mission.update');

        // Core Values
        Route::resource('core-value', CoreValueController::class);

        // Home Stats
        Route::resource('home-stat', HomeStatController::class);

        Route::get('important-notice', [ImportantNoticeController::class, 'edit'])
            ->name('important-notice.edit');
        Route::put('important-notice', [ImportantNoticeController::class, 'update'])
            ->name('important-notice.update');

        Route::resource('mandatory-disclosure', MandatoryDisclosureController::class);

        Route::resource('image-slider', ImageSliderController::class);

        Route::resource('notice-board', NoticeBoardController::class);

        // Authority – single record per role (no CRUD)
        Route::get('authority/chairman', [SchoolAuthorityController::class, 'chairman'])
            ->name('authority.chairman');
        Route::put('authority/chairman', [SchoolAuthorityController::class, 'chairmanUpdate'])
            ->name('authority.chairman.update');

        Route::get('authority/director', [SchoolAuthorityController::class, 'director'])
            ->name('authority.director');
        Route::put('authority/director', [SchoolAuthorityController::class, 'directorUpdate'])
            ->name('authority.director.update');

        Route::get('authority/principal', [SchoolAuthorityController::class, 'principal'])
            ->name('authority.principal');
        Route::put('authority/principal', [SchoolAuthorityController::class, 'principalUpdate'])
            ->name('authority.principal.update');

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

        Route::resource('facility', FacilityController::class);

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
