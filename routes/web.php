<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AcademicsController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\VideoGalleryController;
use App\Http\Controllers\MandatoryDisclosureController;
use App\Http\Controllers\ContactController;

// ── Home ──────────────────────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');

// ── About Us ──────────────────────────────────────────────────────
Route::prefix('about')->name('about.')->group(function () {
    Route::get('/school',             [AboutController::class, 'school'])->name('school');
    Route::get('/vision-mission',     [AboutController::class, 'vision'])->name('vision');
    Route::get('/chairmans-message',  [AboutController::class, 'chairmanMessage'])->name('chairman');
    Route::get('/directors-message',  [AboutController::class, 'directorMessage'])->name('director');
    Route::get('/principals-message', [AboutController::class, 'principalMessage'])->name('principal');
});

// ── Academics ─────────────────────────────────────────────────────
Route::prefix('academics')->name('academics.')->group(function () {
    Route::get('/curriculum',          [AcademicsController::class, 'curriculum'])->name('curriculum');
    Route::get('/examination-policy',  [AcademicsController::class, 'examinationPolicy'])->name('examination');
    Route::get('/school-timing',       [AcademicsController::class, 'schoolTiming'])->name('timing');
    Route::get('/rules-regulations',   [AcademicsController::class, 'rulesRegulations'])->name('rules');
    Route::get('/uniform-regulations', [AcademicsController::class, 'uniformRegulations'])->name('uniform');
    Route::get('/book-list',           [AcademicsController::class, 'bookList'])->name('books');
    Route::get('/fee-structure',       [AcademicsController::class, 'feeStructure'])->name('fee');
});

// ── Admission ─────────────────────────────────────────────────────
Route::prefix('admission')->name('admission.')->group(function () {
    Route::get('/procedure',           [AdmissionController::class, 'procedure'])->name('procedure');
    Route::get('/enquiry',             [AdmissionController::class, 'enquiry'])->name('enquiry');
    Route::post('/enquiry',            [AdmissionController::class, 'submitEnquiry'])->name('enquiry.submit');
    Route::get('/eligibility',         [AdmissionController::class, 'eligibility'])->name('eligibility');
    Route::get('/documents-required',  [AdmissionController::class, 'documents'])->name('documents');
    Route::get('/fee-payment-rules',   [AdmissionController::class, 'feePayment'])->name('fee-payment');
    Route::get('/withdrawal-transfer', [AdmissionController::class, 'withdrawal'])->name('withdrawal');
    Route::get('/tc-sample',           [AdmissionController::class, 'tcSample'])->name('tc');
});

// ── Facilities ────────────────────────────────────────────────────
Route::prefix('facilities')->name('facilities.')->group(function () {
    Route::get('/infrastructure',   [FacilitiesController::class, 'infrastructure'])->name('infrastructure');
    Route::get('/smart-classrooms', [FacilitiesController::class, 'smartClassrooms'])->name('smart-classrooms');
    Route::get('/library',          [FacilitiesController::class, 'library'])->name('library');
    Route::get('/science-lab',      [FacilitiesController::class, 'scienceLab'])->name('science-lab');
    Route::get('/computer-lab',     [FacilitiesController::class, 'computerLab'])->name('computer-lab');
    Route::get('/sports-facility',  [FacilitiesController::class, 'sportsFacility'])->name('sports');
});

// ── Gallery ───────────────────────────────────────────────────────
Route::prefix('gallery')->name('gallery.')->group(function () {
    // Video Gallery (top-level)
    Route::get('/videos', [VideoGalleryController::class, 'index'])->name('videos');

    // Photo Galleries
    Route::get('/photos', [GalleryController::class, 'index'])->name('photos');
    Route::get('/{slug}', [GalleryController::class, 'show'])->name('show');
});

// ── Mandatory Disclosure ──────────────────────────────────────────
Route::prefix('mandatory-disclosure')->name('disclosure.')->group(function () {
    Route::get('/', [MandatoryDisclosureController::class, 'index'])->name('index');
    Route::get('/private/{token}', [MandatoryDisclosureController::class, 'download'])
        ->whereUuid('token')
        ->name('download');
    Route::get('/public/{slug}', [MandatoryDisclosureController::class, 'show'])->name('show');
});

// ── Notifications ─────────────────────────────────────────────────
Route::prefix('notifications')->name('notifications.')->group(function () {
    Route::get('/',         [\App\Http\Controllers\NotificationController::class, 'index'])->name('list');
    Route::get('/{id}',     [\App\Http\Controllers\NotificationController::class, 'show'])->name('show');
});

// ── Contact ───────────────────────────────────────────────────────
Route::get('/contact',  [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
