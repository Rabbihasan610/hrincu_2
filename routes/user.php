<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\JobController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ResumeController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ServiceController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\PersonalInfoController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\AuthorizationController;
use App\Http\Controllers\User\Auth\ResetPasswordController;
use App\Http\Controllers\User\Auth\ForgotPasswordController;
use App\Http\Controllers\WebController;

Route::middleware('guest')->group(function () {

    Route::controller(RegisterController::class)->group(function () {
        Route::get('register', 'showRegistrationForm')->name('register');
        Route::post('register', 'store');
        Route::post('check-mail', 'checkUser')->name('checkUser');
    });

    Route::controller(ForgotPasswordController::class)->prefix('password')->name('password.')->group(function () {
        Route::get('reset', 'showLinkRequestForm')->name('request');
        Route::post('email', 'sendResetCodeEmail')->name('email');
        Route::get('code-verify', 'codeVerify')->name('code.verify');
        Route::post('verify-code', 'verifyCode')->name('verify.code');
    });

    Route::controller(ResetPasswordController::class)->group(function () {
        Route::post('password/reset', 'reset')->name('password.update');
        Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
    });

});

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'create')->name('login');
    Route::post('login', 'store');
    Route::get('logout', 'destroy')->name('logout')->middleware('auth');
});

Route::middleware('auth')->group(function () {
    Route::controller(AuthorizationController::class)->group(function () {
        Route::get('authorization', 'authorizeForm')->name('authorization');
        Route::get('resend-verify/{type}', 'sendVerifyCode')->name('send.verify.code');
        Route::post('verify-email', 'emailVerification')->name('verify.email');
        Route::post('verify-mobile', 'mobileVerification')->name('verify.mobile');
    });

});

Route::middleware(['check.status'])->group(function () {

    Route::controller(UserController::class)->group(function () {
        Route::get('user-data', 'userData')->name('data');
        Route::post('user-data-submit', 'userDataSubmit')->name('data.submit');
    });

    Route::middleware('registration.complete')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('dashboard', 'home')->name('home');
        });

        // Profile setting
        Route::controller(ProfileController::class)->group(function () {
            Route::get('profile-setting', 'profile')->name('profile.setting');
            Route::post('profile-setting', 'submitProfile');
            Route::get('change-password', 'changePassword')->name('change.password');
            Route::post('change-password', 'submitPassword');

            Route::get('/dashboard/change/password', 'accoundChangePassword')->name('profile.change.password');
            Route::post('/dashboard/change/password', 'accoundChangePasswordStore')->name('profile.change.password');
            Route::get('/dashboard/change/user-id', 'accoundChangeUserId')->name('profile.change.user.id');
            Route::post('/dashboard/change/user-id', 'accoundChangeUserIdStore')->name('profile.change.user.id');
        });



        // resume management

        Route::controller(ResumeController::class)->group(function () {
            Route::get('resume/{id?}', 'resume')->name('resume');
            Route::get('resume-short/{id?}', 'resumeShort')->name('resume.short');
            Route::get('resume-edit', 'resumeEdit')->name('resume.edit');
            Route::post('resume', 'resumeSubmit')->name('resume.submit');

            Route::get('resume/traning-information/{id?}', 'accoundResumeTraning')->name('resume.traning');
            Route::get('resume/employment-history/{id?}', 'accoundResumeEmployment')->name('resume.employment');
            Route::get('resume/others-information/{id?}', 'accoundResumeOther')->name('resume.other');
            Route::get('resume/photograph/{id?}', 'accoundResumePhotograph')->name('resume.photograph');
        });

        Route::resource('personal-information', PersonalInfoController::class);

        Route::get('/personal-information/address/{id}', [PersonalInfoController::class, 'addressDetails'])->name('personal-information.address.edit');
        Route::put('/personal-information/address/{id}', [PersonalInfoController::class, 'addressDetailsPost'])->name('personal-information.address.edit');
        Route::get('/carrer-information/{id}', [PersonalInfoController::class, 'carrerInfo'])->name('carrer.info.edit');
        Route::put('/carrer-information/{id}', [PersonalInfoController::class, 'carrerInfoPost'])->name('carrer.info.edit');
        Route::get('/other-information/{id}', [PersonalInfoController::class, 'otherInfo'])->name('other.info.edit');

        Route::get('/preferred-job/information/{id}', [PersonalInfoController::class, 'preferredJobInfo'])->name('preferredjob.info.edit');
        Route::put('/preferred-job/information/{id}', [PersonalInfoController::class, 'preferredJobInfoPost'])->name('preferredjob.info.edit');

        Route::put('/other-information/{id}', [PersonalInfoController::class, 'otherInfoPost'])->name('other.info.edit');
        Route::get('/disability-information/{id}', [PersonalInfoController::class, 'disabilityInfo'])->name('disability.info.edit');
        Route::put('/disability-information/{id}', [PersonalInfoController::class, 'disabilityInfoPost'])->name('disability.info.edit');
        Route::post('/academic-information/create', [PersonalInfoController::class, 'academicInfoPost'])->name('academic.info.create');
        Route::get('/academic-information/edit/{id}', [PersonalInfoController::class, 'academicInfoEdit'])->name('academic.info.edit');
        Route::put('/academic-information/edit/{id}', [PersonalInfoController::class, 'academicInfoUpdate'])->name('academic.info.edit');
        Route::get('/academic-information/delete/{id}', [PersonalInfoController::class, 'academicInfoDelete'])->name('academic.info.delete');
        Route::post('/traning-information/create', [PersonalInfoController::class, 'traningInfoPost'])->name('traning.info.create');
        Route::get('/traning-information/edit/{id}', [PersonalInfoController::class, 'traningInfoEdit'])->name('traning.info.edit');
        Route::put('/traning-information/edit/{id}', [PersonalInfoController::class, 'traningInfoUpdate'])->name('traning.info.edit');
        Route::get('/traning-information/delete/{id}', [PersonalInfoController::class, 'traningInfoDelete'])->name('traning.info.delete');
        Route::post('/certificate-information/create', [PersonalInfoController::class, 'certificateInfoPost'])->name('certificate.info.create');
        Route::get('/certificate-information/edit/{id}', [PersonalInfoController::class, 'certificateInfoEdit'])->name('certificate.info.edit');
        Route::put('/certificate-information/edit/{id}', [PersonalInfoController::class, 'certificateInfoUpdate'])->name('certificate.info.edit');
        Route::get('/certificate-information/delete/{id}', [PersonalInfoController::class, 'certificateInfoDelete'])->name('certificate.info.delete');
        Route::post('/employment-history/create', [PersonalInfoController::class, 'employmentInfoPost'])->name('employment.info.create');
        Route::get('/employment-history/edit/{id}', [PersonalInfoController::class, 'employmentInfoEdit'])->name('employment.info.edit');
        Route::put('/employment-history/edit/{id}', [PersonalInfoController::class, 'employmentInfoUpdate'])->name('employment.info.edit');
        Route::get('/employment-history/delete/{id}', [PersonalInfoController::class, 'employmentInfoDelete'])->name('employment.info.delete');
        Route::post('/Specialization/create',   [PersonalInfoController::class, 'specializationInfoPost'])->name('specialization.info.create');
        Route::get('/Specialization/edit/{id}', [PersonalInfoController::class, 'specializationInfoEdit'])->name('specialization.info.edit');
        Route::put('/Specialization/edit/{id}', [PersonalInfoController::class, 'specializationInfoUpdate'])->name('specialization.info.edit');
        Route::get('/Specialization/delete/{id}', [PersonalInfoController::class, 'specializationInfoDelete'])->name('specialization.info.delete');
        Route::post('/language/create', [PersonalInfoController::class, 'languageInfoPost'])->name('language.info.create');
        Route::get('/language/edit/{id}', [PersonalInfoController::class, 'languageInfoEdit'])->name('language.info.edit');
        Route::put('/language/edit/{id}', [PersonalInfoController::class, 'languageInfoUpdate'])->name('language.info.edit');
        Route::get('/language/delete/{id}', [PersonalInfoController::class, 'languageInfoDelete'])->name('language.info.delete');
        Route::post('/reference/create', [PersonalInfoController::class, 'referenceInfoPost'])->name('reference.info.create');
        Route::get('/reference/edit/{id}', [PersonalInfoController::class, 'referenceInfoEdit'])->name('reference.info.edit');
        Route::put('/reference/edit/{id}', [PersonalInfoController::class, 'referenceInfoUpdate'])->name('reference.info.edit');
        Route::get('/reference/delete/{id}', [PersonalInfoController::class, 'referenceInfoDelete'])->name('reference.info.delete');
        Route::get('/photo/edit/{id}', [PersonalInfoController::class, 'photoInfoEdit'])->name('photo.info.edit');
        Route::put('/photo/edit/{id}', [PersonalInfoController::class, 'photoInfoPost'])->name('photo.info.edit');

        Route::post('/update-social-accounts', 'Frontend\UserController@updateSocials')->name('update.social.user');
        Route::post('/insert-location', 'Frontend\UserController@insertLocation')->name('insert.location.user');
        Route::post('/communication', 'Frontend\UserController@communicateUser')->name('communication');

        Route::get('save-job/{id}', [JobController::class, 'saveJob'])->name('save.job');
        Route::get('saved-jobs', [JobController::class, 'getSavedJobs'])->name('saved.jobs');
        Route::get('delete-saved-job/{id}', [JobController::class, 'deleteSavedJob'])->name('saved.job.delete');


        Route::get('applications/{job_id}', [WebController::class, 'application'])->name('application');
        Route::post('application-submit', [JobController::class, 'applyJob'])->name('application.submit');


        // applied jobs

        Route::get('applied-jobs', [JobController::class, 'getAppliedJob'])->name('applied.jobs');

        // upload resume
        Route::get('upload-resume', [ResumeController::class, 'uploadResume'])->name('upload.resume');
        Route::post('resume-upload', [ResumeController::class, 'resumeUpload'])->name('resume.upload');
        Route::post('resume-upload-update/{id}', [ResumeController::class, 'resumeUploadUpdate'])->name('resume.upload.update');

        // external resume
        Route::get('external-resume', [ResumeController::class, 'externalResume'])->name('external.resume');
        Route::get('external-resume-edit/{id}', [ResumeController::class, 'externalResumeEdit'])->name('external.resume.edit');
        Route::get('external-resume-view/{id}', [ResumeController::class, 'externalResumeView'])->name('external.resume.view');
        Route::get('external-resume-download/{id}', [ResumeController::class, 'externalResumeDownload'])->name('external.resume.download');
        Route::post('external-resume-delete/{id}', [ResumeController::class, 'externalResumeDelete'])->name('external.resume.delete');


          // Routes for only Employers
        Route::group(["middleware" => ["job.provider"]], function(){
            Route::get('/myjobs',[JobController::class, 'getMyJobs'])->name('job.myjobs');
            Route::get('/applier-list/{id}',[JobController::class, 'getApplierList'])->name('jobs.applier.list');
            Route::get('/create-job',[JobController::class, 'createJob'])->name('job.create');
            Route::post('/store-job',[JobController::class, 'storeJob'])->name('job.store');
            Route::get('/edit-job/{id}', [JobController::class, 'editJob'])->name('edit.job');
            Route::get('/view-job/{id}', [JobController::class, 'viewJob'])->name('view.job');
            Route::get('/job-status/{id}', [JobController::class, 'changeJobStatus'])->name('job.status');

            Route::get("/active-jobs", [JobController::class, 'getActiveJobs'])->name('active.jobs');
            Route::get("/inactive-jobs", [JobController::class, 'getInActiveJobs'])->name('inactive.jobs');
            Route::get("/pending-jobs", [JobController::class, 'getPendingJobs'])->name('pending.jobs');
            Route::get("/rejected-jobs", [JobController::class, 'getRejectedJobs'])->name('rejected.jobs');

            Route::post('/change-level', [JobController::class, 'changeLevel'])->name('change.level');
            Route::post('/update-job/{id}', [JobController::class, 'update'])->name('update.job.employer');

            // Route::get("/saved-resumes", [EmployerController::class, 'getSavedResume'])->name('saved.resumes');
            // Route::get('/save-resume/{id}', [EmployerController::class, 'saveResume'])->name('save.resume.employer');
            // Route::get("/delete-saved-resume/{id}", [EmployerController::class, 'deleteSavedResume'])->name('saved.resume.delete');
            // Route::get("/followers", [EmployerController::class, 'getFollowers'])->name('followers.of.employer');
            // Route::get("/delete/follower/{id}", [EmployerController::class, 'deleteFollower'])->name('follower.delete');

            Route::get('/delete-job/{id}', [JobController::class, 'deleteJob'])->name('delete.job.employer');

            Route::get('hire-me/{id}', [JobController::class, 'hireMe'])->name('hire.me');
        });
    });
});
