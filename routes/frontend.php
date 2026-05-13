<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\airTicketController;
use App\Http\Controllers\BkashController;
use App\Http\Controllers\courseController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\hrController;
use App\Http\Controllers\ImageResizeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\loanController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\statemntController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\visaController;
use App\Http\Controllers\VisitorLogController;
use App\Http\Controllers\websiteSettingController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\universalPaymentController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


//Auth Management-------------------------------------------------------
Route::get('/register', function () {
    return view('userAuth.register');
});
Route::get('/', 'App\Http\Controllers\homeController@home');
Route::get('all-login', 'App\Http\Controllers\authController@allLogin')->name('all-login');
Route::get('customer-signup', 'App\Http\Controllers\authController@customerSignup');
Route::post('create-new-customer', 'App\Http\Controllers\authController@createNewCustomer');
Route::get('agent-signup', 'App\Http\Controllers\authController@agentSignup');
Route::get('forgot-password', 'App\Http\Controllers\authController@forgotPassword');
Route::get('email-check', 'App\Http\Controllers\authController@emailCheck');
Route::post('otp-verification', 'App\Http\Controllers\authController@otpVerification');
Route::post('password-recover', 'App\Http\Controllers\authController@passwordRecover');
Route::post('createNewUser', 'App\Http\Controllers\authController@createNewUser');
Route::get('login', 'App\Http\Controllers\authController@allLogin');
Route::get('logout', 'App\Http\Controllers\authController@logout');
Route::post('verifyUsers', 'App\Http\Controllers\authController@verifyUsers');
Route::get('report-dashboard', 'App\Http\Controllers\authController@dashboard');
Route::get('main-dashboard', 'App\Http\Controllers\authController@mainDashboard');

//Random Flight Scrap URL
Route::get('flightScrap', 'App\Http\Controllers\homeController@flightScrap');
Route::get('/resize-images', [ImageResizeController::class, 'resize']);

//Academy Routes frontend 
Route::get('/academy', [homeController::class, 'academy']);
Route::get('/ebook/{slug}', [EbookController::class, 'show'])->name('ebook.details');
Route::get('/ebooks/{ebook}', [EbookController::class, 'index']);
Route::get('/ebooks/{ebook}/chapter/{chapter}', [EbookController::class, 'chapter']);
Route::get('/ebooks', [homeController::class, 'ebooks']);
Route::get('/courses', [homeController::class, 'courses']);
Route::get('course/{slug}', 'App\Http\Controllers\homeController@searchCourseBySlug');
Route::get('course-enroll', 'App\Http\Controllers\homeController@courseEnroll');

//Flight Booking Routes Frontend
Route::get('getAirportDetails', 'App\Http\Controllers\homeController@getAirportDetails');
Route::get('getAirportDetails1', 'App\Http\Controllers\homeController@getAirportDetails1');
Route::get('flight-search-result', 'App\Http\Controllers\homeController@flightSearchResult');
Route::get('flight-details', 'App\Http\Controllers\homeController@flightDetails');
Route::post('flight-booking', 'App\Http\Controllers\homeController@flightBooking');

//Tour Packaage Routes Frontend
Route::get('search-tour-package', 'App\Http\Controllers\homeController@searchTourPackage');
Route::get('tour-package', 'App\Http\Controllers\homeController@tourPackage');
Route::get('tour-package/{slug}', 'App\Http\Controllers\homeController@searchTourPackageBySlug');
Route::post('tour-client-details', 'App\Http\Controllers\homeController@tourClientDetails');

//Visa Package Routes Frontend
Route::get('search-visa', 'App\Http\Controllers\homeController@searchVisa');
Route::get('visa', 'App\Http\Controllers\homeController@visa');
Route::get('visa/{slug}', 'App\Http\Controllers\homeController@searchVisaBySlug');

//Manpower Package Routes Frontend
Route::get('work-permit', 'App\Http\Controllers\homeController@manpower');
Route::get('search-manpower', 'App\Http\Controllers\homeController@searchManpower');
Route::get('manpower/{slug}', 'App\Http\Controllers\homeController@searchManpowerBySlug');

//Service Package Routes Frontend
Route::get('service', 'App\Http\Controllers\homeController@service');
Route::get('services', 'App\Http\Controllers\homeController@services');
Route::get('services/{slug}', [homeController::class, 'searchServiceBySlug'])->name('frontend.service.slug');
Route::post('bookService', [homeController::class, 'bookService'])->name('book.service');

//Hajj Umrah Package Routes Frontend
Route::get('hajj-umrah', 'App\Http\Controllers\homeController@hajjUmrah');
Route::get('hajj-umrah/{slug}', 'App\Http\Controllers\homeController@searchHajjUmrahBySlug');
Route::get('search-hajj-umrah-package', 'App\Http\Controllers\homeController@searchHajjUmrahPackage');

//Blog Routes Frontend
Route::get('blogs', 'App\Http\Controllers\homeController@blogs');
Route::get('blog/{slug}', 'App\Http\Controllers\homeController@searchBlogBySlug');

//Study Abroad Routes Frontend
Route::get('study-abroad', [homeController::class, 'studyAbroad'])->name('study.abroad');
Route::get('countries/{slug}', [homeController::class, 'universityList'])->name('university.list');
Route::post('frontend/get-universities-by-country', [homeController::class, 'getUniversitiesByCountry'])->name('frontend.get.universities.by.country');
Route::get('institutions/{slug}', [homeController::class, 'courseList'])->name('course.list');
Route::get('institutions/{university_slug}/{course_type}/{course_slug}', [homeController::class, 'courseDetails'])->name('course.details');
Route::get('apply/{slug}/{courseType}/{courseSlug}', [homeController::class, 'applyNow'])->name('apply.form');
Route::post('submit-application', [homeController::class, 'submitApplication'])->name('application.submit');
Route::get('study-abroad-application', [homeController::class, 'studyAbroadForm'])->name('study.abroad.form');
Route::get('get-universities/{country_id}', [homeController::class, 'getUniversities']);
Route::get('get-courses/{university_id}', [homeController::class, 'getCourses']);
Route::post('submit-abroad-application', [homeController::class, 'submitAbroadApplication'])->name('study.abroad.submit');
Route::get('search-university', [HomeController::class, 'searchUniversity']);
Route::get('search-university-course', [HomeController::class, 'searchUniversityCourse'])->name('search.university.course');

//Order Request & Other Pages
Route::get('order-request', 'App\Http\Controllers\homeController@orderRequest');
Route::get('success-order-request', 'App\Http\Controllers\homeController@successOrderRequest');

//Policies & About Pages
Route::get('about-us', 'App\Http\Controllers\homeController@aboutUs');
Route::post('contactUS', 'App\Http\Controllers\homeController@contactUS');
Route::post('subscribe', 'App\Http\Controllers\homeController@subscribe');
Route::get('contact-us', function () {return view('frontend.contact-us');});
Route::get('privacy-policy', 'App\Http\Controllers\homeController@privacyPolicy');
Route::get('terms-conditions', 'App\Http\Controllers\homeController@termsCondition');
Route::get('refund-policy', 'App\Http\Controllers\homeController@refundPolicy');
Route::get('cookie-policy', 'App\Http\Controllers\homeController@CookiePolicy');



//Payment Gateway
Route::post('/course/enroll/{id}', [paymentController::class, 'enroll'])->name('course.enroll');
Route::post('/ebook/buy/{id}', [PaymentController::class, 'ebookBuy'])->name('ebook.buy');

//Bkash Gateway
Route::match(['get', 'post'], '/bkash-create', [BkashController::class, 'createPayment'])->name('bkash.create');
Route::get('/bkash-callback', [BkashController::class, 'callback'])->name('url-callback');

//SSL Course and eBook Payment
Route::match(['get', 'post'], '/success', [paymentController::class, 'success']);
Route::match(['get', 'post'], '/fail', [paymentController::class, 'fail']);
Route::match(['get', 'post'], '/cancel', [paymentController::class, 'cancel']);


//SSL Commerz Payment B2C
Route::post('pay-online-b2b', [SslCommerzPaymentController::class, 'payOnlineb2b']);

//Universal Payment Gateway
Route::get('universal-payment', [universalPaymentController::class, 'universalPaymentPage']);
Route::post('universal-payment', [universalPaymentController::class, 'universalPaymentProcess'])->name('universal.payment.process');

//Customer Private Url
Route::middleware(['customer'])->group(function () {
    Route::get('my-booking', [customerController::class, 'myBooking']);
    Route::get('customer-profile', [customerController::class, 'customerProfile']);
    Route::post('update-customer-profile', [customerController::class, 'updateCustomerProfile']);
    Route::post('update-password', [customerController::class, 'updatePassword']);
    Route::get('/invoice/{tran_id}', [customerController::class, 'downloadInvoice'])->name('invoice.download');
    Route::get('booking/view/{tran_id}', [CustomerController::class, 'viewBooking'])->name('booking.view');
    Route::get('download-course-details/{tran_id}', [customerController::class, 'downloadCourseDetails']);
    Route::get('course/view/{transaction_id}', [customerController::class, 'courseView']);

});
Route::get('payment-success-message', [paymentController::class, 'paymentSuccessPage']);