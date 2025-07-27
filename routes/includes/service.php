<?php

use App\Models\TrainingPath;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Services\SectorController;
use App\Http\Controllers\Admin\Services\ServiceController;
use App\Http\Controllers\Admin\SponsorshipTransferController;
use App\Http\Controllers\Admin\Services\TrainingPathController;
use App\Http\Controllers\Admin\Services\SectorRequestController;
use App\Http\Controllers\Admin\Services\ServiceRequestController;
use App\Http\Controllers\Admin\Services\TrainingPathRequestController;
use App\Http\Controllers\Admin\Services\CommunityPartnershipController;

Route::group(['prefix' => 'service', 'as' => 'service.'], function () {
    Route::get('/', [ServiceController::class, 'index'])->name('index');
    Route::get('/create', [ServiceController::class, 'create'])->name('create');
    Route::post('/store/{id?}', [ServiceController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('edit');
    Route::post('/delete/{id}', [ServiceController::class, 'destroy'])->name('delete');
    Route::get('/status/{id}', [ServiceController::class, 'status'])->name('status');
    Route::get('/duplicate/{id}', [ServiceController::class, 'duplicate'])->name('duplicate');
});

Route::group(['prefix' => 'service/request', 'as' => 'service.request.'], function () {
    Route::get('/', [ServiceRequestController::class, 'index'])->name('index');
    Route::get('/show/{id}', [ServiceRequestController::class, 'show'])->name('show');
    Route::get('/pending', [ServiceRequestController::class, 'pending'])->name('pending');
    Route::get('/approved', [ServiceRequestController::class, 'approved'])->name('approved');
    Route::get('/rejected', [ServiceRequestController::class, 'rejected'])->name('rejected');
    Route::post('/delete/{id}', [ServiceRequestController::class, 'destroy'])->name('delete');
    Route::get('/status/{id}', [ServiceRequestController::class, 'status'])->name('status');
});


Route::group(['prefix' => 'community-partnership', 'as' => 'community.partnership.'], function () {
    Route::get('/', [CommunityPartnershipController::class, 'index'])->name('index');
    Route::get('/create', [CommunityPartnershipController::class, 'create'])->name('create');
    Route::post('/store/{id?}', [CommunityPartnershipController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [CommunityPartnershipController::class, 'edit'])->name('edit');
    Route::post('/delete/{id}', [CommunityPartnershipController::class, 'destroy'])->name('delete');
    Route::get('/status/{id}', [CommunityPartnershipController::class, 'status'])->name('status');
    Route::get('/duplicate/{id}', [CommunityPartnershipController::class, 'duplicate'])->name('duplicate');
});

Route::group(['prefix' => 'sectors', 'as' => 'sectors.'], function () {
    Route::get('/', [SectorController::class, 'index'])->name('index');
    Route::get('/create', [SectorController::class, 'create'])->name('create');
    Route::post('/store/{id?}', [SectorController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [SectorController::class, 'edit'])->name('edit');
    Route::post('/delete/{id}', [SectorController::class, 'destroy'])->name('delete');
    Route::get('/status/{id}', [SectorController::class, 'status'])->name('status');
    Route::get('/duplicate/{id}', [SectorController::class, 'duplicate'])->name('duplicate');
});

Route::group(['prefix' => 'training-program', 'as' => 'trainingprogram.'], function () {
    Route::get('/', [TrainingPathController::class, 'index'])->name('index');
    Route::get('/create', [TrainingPathController::class, 'create'])->name('create');
    Route::post('/store/{id?}', [TrainingPathController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [TrainingPathController::class, 'edit'])->name('edit');
    Route::post('/delete/{id}', [TrainingPathController::class, 'destroy'])->name('delete');
    Route::get('/status/{id}', [TrainingPathController::class, 'status'])->name('status');
    Route::get('/duplicate/{id}', [TrainingPathController::class, 'duplicate'])->name('duplicate');
});

Route::group(['prefix' => 'sponsorship-transfer/request', 'as' => 'sponsorship-transfer.request.'], function () {
    Route::get('/', [SponsorshipTransferController::class, 'index'])->name('index');
    Route::get('/show/{id}', [SponsorshipTransferController::class, 'show'])->name('show');
    Route::get('/pending', [SponsorshipTransferController::class, 'pending'])->name('pending');
    Route::get('/approved', [SponsorshipTransferController::class, 'approved'])->name('approved');
    Route::get('/rejected', [SponsorshipTransferController::class, 'rejected'])->name('rejected');
    Route::post('/delete/{id}', [SponsorshipTransferController::class, 'destroy'])->name('delete');
    Route::get('/status/{id}', [SponsorshipTransferController::class, 'status'])->name('status');
});

Route::group(['prefix' => 'sector/request', 'as' => 'sector.request.'], function () {
    Route::get('/', [SectorRequestController::class, 'index'])->name('index');
    Route::get('/show/{id}', [SectorRequestController::class, 'show'])->name('show');
    Route::get('/pending', [SectorRequestController::class, 'pending'])->name('pending');
    Route::get('/approved', [SectorRequestController::class, 'approved'])->name('approved');
    Route::get('/rejected', [SectorRequestController::class, 'rejected'])->name('rejected');
    Route::post('/delete/{id}', [SectorRequestController::class, 'destroy'])->name('delete');
    Route::get('/status/{id}', [SectorRequestController::class, 'status'])->name('status');
});


Route::group(['prefix' => 'trainingpath/request', 'as' => 'trainingpath.request.'], function () {
    Route::get('/', [TrainingPathRequestController::class, 'index'])->name('index');
    Route::get('/show/{id}', [TrainingPathRequestController::class, 'show'])->name('show');
    Route::get('/pending', [TrainingPathRequestController::class, 'pending'])->name('pending');
    Route::get('/approved', [TrainingPathRequestController::class, 'approved'])->name('approved');
    Route::get('/rejected', [TrainingPathRequestController::class, 'rejected'])->name('rejected');
    Route::post('/delete/{id}', [TrainingPathRequestController::class, 'destroy'])->name('delete');
    Route::get('/status/{id}', [TrainingPathRequestController::class, 'status'])->name('status');
});





