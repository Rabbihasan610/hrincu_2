<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteRegistrar;
use App\Http\Controllers\WebController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\User\ServiceController;
use App\Http\Controllers\User\FavoriteController;
use App\Http\Controllers\Admin\PartnershipRequestController;

Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    return back();
});

// User Support Ticket
Route::controller(SupportController::class)->prefix('support')->name('support.')->group(function () {
    Route::get('/all', 'supportTicket')->name('index');
    Route::get('new', 'openSupport')->name('open');
    Route::post('create', 'storeSupport')->name('store');
    Route::get('view/{number}', 'viewSupport')->name('view');
    Route::post('reply/{number}', 'replySupport')->name('reply');
    Route::post('close/{number}', 'closeSupport')->name('close');
    Route::get('download/{number}', 'supportDownload')->name('download');
});

 // Service Management
 Route::get('service-request', [ServiceController::class, 'serviceRequest'])->name('user.service.request');
 Route::post('service-request-submit', [ServiceController::class, 'serviceRequestSubmit'])->name('user.service.request.submit');

Route::get('our-service-rerquest/{slug}', [WebController::class, 'ourServiceRequest'])->name('ourservice.request');

Route::post('/our-services/request/{slug}', [WebController::class, 'submitForm'])
    ->name('ourservice.submit');

Route::post('/community-partnership-request-store', [PartnershipRequestController::class, 'store'])->name('community.partnership.request.store');


Route::controller(WebController::class)->group(function () {
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'contactSubmit')->name('contact.form.submit');
    Route::post('/contact-query', 'contactQuery')->name('contact.query.submit');

    Route::get('/about', 'about')->name('about');
    Route::get('/privacy-policy', 'privacy')->name('privacy');

    Route::get('/blogs', 'blogs')->name('blogs');
    Route::get('/blog/{slug}', 'blogDetails')->name('blog.details');

    // pages

    Route::get('/service', 'service')->name('service');
    Route::get('/targeted-sector', 'targetedSector')->name('targeted.sector');
    Route::get('/training-program', 'trainingProgram')->name('training.program');
    Route::get('/special-training', 'specialTraining')->name('special.training');
    Route::get('/community-engagement', 'communityEngagement')->name('community.engagement');
    Route::get('/community-partnership-request', 'communityPartnershipRequest')->name('community.partnership.request');
    Route::get('/training-and-qualification-request/{slug?}', 'trainingAndQualificationRequest')->name('training.and.qualification.request');
    Route::get('/job-listing', 'jobListing')->name('job.listing');

    Route::get('/licenses-documents', 'licensesDocument')->name('licenses.document');
    Route::get('/submit-resume', 'submitResume')->name('submit.resume');
    Route::post('/submit-resume-store', 'submitResumeStore')->name('submit.resume.store');


    Route::get('/jobincu-service', 'jobincuService')->name('jobincu.service');
    Route::get('/sectors', 'sectors')->name('sectors');
    Route::get('/community-partnership', 'communityPartnership')->name('community.partnership');
    Route::get('/qualification-and-empowerment', 'qualificationAndEmpowerment')->name('qualification.and.empowerment');

    Route::get('/employers', 'employers')->name('employers');
    Route::get('/seekers', 'seekers')->name('seekers');

    // sponsorship transfer
    Route::get('/sponsorship-transfer', 'sponsorshipTransfer')->name('sponsorship.transfer');
    Route::post('/sponsorship-transfer-submit', 'sponsorshipTransferStore')->name('sponsorship.transfer.submit');

    // Sector request

    Route::get('/sector-request/{slug}', 'sectorRequest')->name('sector.request');
    Route::post('/sector-request-submit', 'sectorRequestStore')->name('sector.request.submit');

    // Training request

    Route::get('/training-request/{slug}', 'trainingRequest')->name('training.request');
    Route::post('/training-request-submit', 'trainingRequestStore')->name('training.request.submit');

    // search
    Route::get('/search', 'search')->name('search');
    Route::get('/job/{id}', 'jobDetails')->name('job.details');
    Route::get('/related-job/{category_id?}', 'relatedJob')->name('related.job');

    Route::get('districts', 'districts')->name('districts');

    //web
    Route::get('/change/{lang?}', 'changeLanguage')->name('lang');
    Route::get('cookie-policy', 'cookiePolicy')->name('cookie.policy');
    Route::get('/cookie/accept', 'cookieAccept')->name('cookie.accept');
    Route::post('subscribe', 'subscribe')->name('subscribe');
    Route::get('policy/{slug}/{id}', 'policyPages')->name('policy.pages');
    Route::get('/{slug}', 'pages')->name('pages');
    Route::get('/', 'index')->name('home');
});


require __DIR__ . '/auth.php';
