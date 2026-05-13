<?php

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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

require __DIR__.'/frontend.php';

//Backend Routes with Role Middleware
Route::middleware(['role'])->group(function () {
    //Number Export
    Route::get('/numbers/{slug}', 'App\Http\Controllers\senderController@allPaxNumber');

    //Dashboard----------------------------------------------------------
    Route::get('/report-dashboard', 'App\Http\Controllers\authController@dashboard');
    Route::get('salesDataGraph', 'App\Http\Controllers\airTicketController@salesDataGraph');

    //Report--------------------------------------------
    Route::get('/course-sale-report', [reportController::class, 'courseSaleReport'])->name('course.sale.report');
    Route::get('/course-sale-report/pdf', [ReportController::class, 'exportCoursePdf'])->name('course.sale.report.pdf');
    Route::get('visitor-logs', [VisitorLogController::class, 'index']);
    Route::get('login-history', [VisitorLogController::class, 'loginHistory'])->name('login.history');
    Route::get('/service-leads-report', [ReportController::class, 'serviceLeadsReport'])->name('service.leads.report');
    Route::get('/service-leads-report/pdf', [ReportController::class, 'serviceLeadsReportPDF'])->name('service.leads.report.pdf');
    Route::post('/service-leads/update-status', [ReportController::class, 'updateLeadStatus'])->name('service.lead.update.status');
    Route::get('/service-leads/{id}/get', [ReportController::class, 'getLead'])->name('service.lead.get');


    //General Invoice
    Route::get('g_invoice', 'App\Http\Controllers\accountsController@generalInvoice');
    Route::post('insertGInvoice', 'App\Http\Controllers\accountsController@insertGInvoice');
    Route::get('printGInvoice', 'App\Http\Controllers\accountsController@printGInvoice');
    Route::post('deleteGInvoice', 'App\Http\Controllers\accountsController@deleteGInvoice');
    //----------------------------------------------------------

    //Contacts-------------------------------------------------------------
    Route::get('contacts', 'App\Http\Controllers\usersController@contacts');
    Route::post('createNewContacts', 'App\Http\Controllers\usersController@createNewContacts');
    Route::get('editContactsPage', 'App\Http\Controllers\usersController@editContactsPage');
    Route::post('updateContacts', 'App\Http\Controllers\usersController@updateContacts');
    Route::post('createNewContactsDetails', 'App\Http\Controllers\usersController@createNewContactsDetails');
    Route::get('/contact-us-support', [usersController::class, 'contactSupportList']);
    Route::get('/contact-us-support/view/{id}', [usersController::class, 'contactSupportView']);
    Route::post('/contact-us-support/status-update', [usersController::class, 'contactSupportStatusUpdate']);
    Route::post('/contact-us-support/reply', [usersController::class, 'contactSupportReply']);
    //----------------------------------------------------------

    //B2C Order Request
    Route::get('orderReceiver', 'App\Http\Controllers\usersController@orderReceiver');
    Route::post('changeB2COrderStatus', 'App\Http\Controllers\usersController@changeB2COrderStatus');
    //----------------------------------------------------------

    //Air Ticket Management------------------------------------------------
    Route::get('newAirTicket', 'App\Http\Controllers\airTicketController@newAirTicket');
    Route::post('createNewAirTicket', 'App\Http\Controllers\airTicketController@createNewAirTicket');
    Route::get('editTicketPage', 'App\Http\Controllers\airTicketController@editTicketPage');
    Route::post('updateNewAirTicket', 'App\Http\Controllers\airTicketController@updateNewAirTicket');
    Route::post('deleteAirTicket', 'App\Http\Controllers\airTicketController@deleteAirTicket');
    Route::get('reissueAirTicket', 'App\Http\Controllers\airTicketController@reissueAirTicket');
    Route::get('searchPNRforReissue', 'App\Http\Controllers\airTicketController@searchPNRforReissue');
    Route::get('refundAirTicket', 'App\Http\Controllers\airTicketController@refundAirTicket');
    Route::get('searchPNRforRefund', 'App\Http\Controllers\airTicketController@searchPNRforRefund');
    Route::get('cancelAirTicket', 'App\Http\Controllers\airTicketController@cancelAirTicket');
    Route::get('searchPNRforCancel', 'App\Http\Controllers\airTicketController@searchPNRforCancel');
    Route::get('viewTicket', 'App\Http\Controllers\airTicketController@viewTicket');
    Route::get('editPaymentStatus', 'App\Http\Controllers\airTicketController@editPaymentStatus');
    Route::post('updateAirTicketPaymentStatus', 'App\Http\Controllers\airTicketController@updateAirTicketPaymentStatus');
    Route::get('filterAirTicket', 'App\Http\Controllers\airTicketController@filterAirTicket');
    Route::get('getAirportCode', 'App\Http\Controllers\airTicketController@getAirportCode');
    Route::post('generateAirInvoicePDF', 'App\Http\Controllers\airTicketController@generateAirInvoicePDF');
    Route::get('printAirTicket', 'App\Http\Controllers\airTicketController@printAirTicket');
    Route::get('makeAirTicketInvoice', [airTicketController::class, 'makeAirTicketInvoice']);
    Route::post('sendSms-AirTicket', [airTicketController::class, 'sendSmsAirTicket'])->name('sendSmsAirTicket');
    Route::get('search-airport', [airTicketController::class, 'searchAirport']);
    Route::get('/search-airlines', [airTicketController::class, 'searchAirlines']);
    //----------------------------------------------------------

    //Hotel Management------------------------------------------------
    Route::get('hotelBooking', 'App\Http\Controllers\hotelController@hotelBooking');
    Route::post('createNewHotelBooking', 'App\Http\Controllers\hotelController@createNewHotelBooking');
    Route::get('viewHotelBooking', 'App\Http\Controllers\hotelController@viewHotelBooking');
    Route::get('editHotelBookingPage', 'App\Http\Controllers\hotelController@editHotelBookingPage');
    Route::get('editHotelBookingPayment', 'App\Http\Controllers\hotelController@editHotelBookingPayment');
    Route::post('updateHotelBookingPaymentStatus', 'App\Http\Controllers\hotelController@updateHotelBookingPaymentStatus');
    Route::post('updateHotelBooking', 'App\Http\Controllers\hotelController@updateHotelBooking');
    Route::post('deleteHotelBooking', 'App\Http\Controllers\hotelController@deleteHotelBooking');
    Route::get('printHotelBookingB2b', 'App\Http\Controllers\hotelController@printHotelBookingB2b');
    //----------------------------------------------------------

    //Visa Processing----------------------------------------------------------
    Route::get('newVisaProcess', 'App\Http\Controllers\visaController@newVisaProcess');
    Route::get('filter-visa', 'App\Http\Controllers\visaController@filterVisa');
    Route::post('createNewVisa', 'App\Http\Controllers\visaController@createNewVisa');
    Route::get('viewVisa', 'App\Http\Controllers\visaController@viewVisa');
    Route::get('editVisaPaymentStatus', 'App\Http\Controllers\visaController@editVisaPaymentStatus');
    Route::post('updateVisaPaymentStatus', 'App\Http\Controllers\visaController@updateVisaPaymentStatus');
    Route::get('editVisaPage', 'App\Http\Controllers\visaController@editVisaPage');
    Route::post('editVisa', 'App\Http\Controllers\visaController@editVisa');
    Route::post('deleteVisa', 'App\Http\Controllers\visaController@deleteVisa');
    Route::get('printVisaInvoice', 'App\Http\Controllers\visaController@printVisaInvoice');
    Route::get('book-visa-package-page-b2b', 'App\Http\Controllers\visaController@bookVisaPackagePageB2b');
    Route::post('book-visa-package-b2b', 'App\Http\Controllers\visaController@bookVisaPackageB2b');
    Route::get('download-b2b-visa-package', 'App\Http\Controllers\visaController@downloadB2bVisaPackage');
    Route::get('print-b2b-visa', 'App\Http\Controllers\visaController@prinB2bVisa');
    Route::get('/downloadVisaInvoice', [visaController::class, 'downloadInvoice']);
    //----------------------------------------------------------

    //Tour Package----------------------------------------------------------
    Route::get('newTourPackage', 'App\Http\Controllers\tourController@newTourPackage');
    Route::post('createNewTourPackage', 'App\Http\Controllers\tourController@createNewTourPackage');
    Route::get('editPackagePage', 'App\Http\Controllers\tourController@editPackagePage');
    Route::post('updateTourPackage', 'App\Http\Controllers\tourController@updateTourPackage');
    Route::post('deleteTourPackage', 'App\Http\Controllers\tourController@deleteTourPackage');
    Route::get('viewTourPackage', 'App\Http\Controllers\tourController@viewTourPackage');
    Route::get('printTourPackageInvoice', 'App\Http\Controllers\tourController@printTourPackageInvoice');
    Route::get('editTourPackagePayment', 'App\Http\Controllers\tourController@editTourPackagePayment');
    Route::post('updateTourPackagePaymentStatus', 'App\Http\Controllers\tourController@updateTourPackagePaymentStatus');
    Route::get('book-tour-package-page-b2b', 'App\Http\Controllers\tourController@bookTourPackagePageB2b');
    Route::post('book-tour-package-b2b', 'App\Http\Controllers\tourController@bookTourPackageB2b');
    Route::get('download-b2b-tour-package', 'App\Http\Controllers\tourController@downloadB2bTourPackage');
    Route::get('print-b2b-tour-package', 'App\Http\Controllers\tourController@printB2bTourPackage');
    //----------------------------------------------------------

    //Service Package----------------------------------------------------------
    Route::get('newServicePackage', [ServiceController::class, 'newServiceInvoicePage']);
    Route::post('newServiceInvoiceCreate', [ServiceController::class, 'newServiceInvoiceCreate']);
    Route::post('newServiceInvoiceDelete', [ServiceController::class, 'newServiceInvoiceDelete']);
    Route::get('editServiceInvoice', [ServiceController::class, 'editServiceInvoice']);
    Route::post('updateServiceInvoice', [ServiceController::class, 'updateServiceInvoice']);
    Route::get('downloadServiceInvoice', [ServiceController::class, 'downloadServiceInvoice']);

    //Umrah Package----------------------------------------------------------
    Route::get('newUmrahPackage', 'App\Http\Controllers\umrahController@newUmrahPackage');
    Route::post('createNewUmrahPackage', 'App\Http\Controllers\umrahController@createNewUmrahPackage');
    Route::get('editUmrahPackagePage', 'App\Http\Controllers\umrahController@editUmrahPackagePage');
    Route::post('updateUmrahPackage', 'App\Http\Controllers\umrahController@updateUmrahPackage');
    Route::post('deleteUmrahPackage', 'App\Http\Controllers\umrahController@deleteUmrahPackage');
    Route::get('viewUmrahPackage', 'App\Http\Controllers\umrahController@viewUmrahPackage');
    Route::get('editUmrahPackagePayment', 'App\Http\Controllers\umrahController@editUmrahPackagePayment');
    Route::post('updateUmrahPackagePaymentStatus', 'App\Http\Controllers\umrahController@updateUmrahPackagePaymentStatus');
    Route::get('book-umrah-package-page-b2b', 'App\Http\Controllers\umrahController@bookUmrahPackagePageB2b');
    Route::post('book-umrah-package-b2b', 'App\Http\Controllers\umrahController@bookUmrahPackageB2b');
    Route::get('printUmrahPackageInvoice', 'App\Http\Controllers\umrahController@printUmrahPackageInvoice');
    Route::get('print-b2b-umrah-package', 'App\Http\Controllers\umrahController@printB2bUmrahPackage');
    Route::get('download-b2b-umrah-package', 'App\Http\Controllers\umrahController@downloadB2bUmrahPackage');
    //----------------------------------------------------------

    //Umrah Package----------------------------------------------------------
    Route::get('/country-data-scrapper', [EducationController::class, 'countryDataScrapper']);
    //----------------------------------------------------------

    //B2B Section
    Route::get('search-tour-package-b2b', 'App\Http\Controllers\tourController@searchTourPackageB2b');
    Route::get('search-visa-b2b', 'App\Http\Controllers\visaController@searchVisaB2b');
    Route::get('search-manpower-b2b', 'App\Http\Controllers\visaController@searchManpowerB2b');
    Route::get('search-hajj-umrah-package-b2b', 'App\Http\Controllers\visaController@searchHajjUmrahB2b');
    Route::get('service-b2b', 'App\Http\Controllers\visaController@serviceB2b');
    Route::get('tour-package-b2b/{slug}', 'App\Http\Controllers\visaController@tourPackageB2bBySlug');
    Route::get('visa-b2b/{slug}', 'App\Http\Controllers\visaController@visaB2bBySlug');
    Route::get('manpower-b2b/{slug}', 'App\Http\Controllers\visaController@manpowerB2bBySlug');
    Route::get('hajj-umrah-b2b/{slug}', 'App\Http\Controllers\visaController@hajjUmrahB2bBySlug');
    Route::get('service-b2b/{slug}', 'App\Http\Controllers\visaController@serviceB2bBySlug');
    //----------------------------------------------------------

    //Manpower Package----------------------------------------------------------
    Route::get('newManPowerPackage', 'App\Http\Controllers\manpowerController@newManPowerPackage');
    Route::post('addNewWorkPermit', 'App\Http\Controllers\manpowerController@addNewWorkPermit');
    Route::get('viewManPowerVisa', 'App\Http\Controllers\manpowerController@viewManPowerVisa');
    Route::get('editManPowerVisaPage', 'App\Http\Controllers\manpowerController@editManPowerVisaPage');
    Route::post('editManPowerVisa', 'App\Http\Controllers\manpowerController@editManPowerVisa');
    Route::post('deleteManPowerVisa', 'App\Http\Controllers\manpowerController@deleteManPowerVisa');
    Route::get('printWorkPermitInvoice', 'App\Http\Controllers\manpowerController@printWorkPermitInvoice');
    Route::get('editManPowerVisaPaymentStatus', 'App\Http\Controllers\manpowerController@editManPowerVisaPaymentStatus');
    Route::post('updateManpowerVisaPaymentStatus', 'App\Http\Controllers\manpowerController@updateManpowerVisaPaymentStatus');
    Route::get('download-work-permit/{slug}', 'App\Http\Controllers\manpowerController@downloadWorkPermit');
    Route::get('print-work-permit', 'App\Http\Controllers\manpowerController@printWorkPermit');
    //----------------------------------------------------------

    //User Management------------------------------------------------
    Route::get('users', 'App\Http\Controllers\usersController@users');
    Route::get('usersInfo', 'App\Http\Controllers\usersController@usersInfo');
    Route::get('isPassengerActive', 'App\Http\Controllers\usersController@isPassengerActive');
    Route::get('isPassengerActive', 'App\Http\Controllers\usersController@isPassengerActive');
    Route::get('isPassengerInActive', 'App\Http\Controllers\usersController@isPassengerInActive');
    Route::post('createNewPassenger', 'App\Http\Controllers\usersController@createNewPassenger');
    Route::get('editPassengerPage', 'App\Http\Controllers\usersController@editPassengerPage');
    Route::post('editPassengerInfo', 'App\Http\Controllers\usersController@editPassengerInfo');
    Route::post('deletePassenger', 'App\Http\Controllers\usersController@deletePassenger');
    Route::get('searchPDetails', 'App\Http\Controllers\usersController@searchPDetails');
    //----------------------------------------------------------

    //AgencyManagement----------------------------------------------------------
    Route::get('agency', 'App\Http\Controllers\usersController@agency');
    Route::get('isAgencyInActive', 'App\Http\Controllers\usersController@isAgencyInActive');
    Route::get('isAgencyActive', 'App\Http\Controllers\usersController@isAgencyActive');
    Route::get('editCompanyInfo', 'App\Http\Controllers\usersController@editCompanyInfo');
    Route::post('updateCompanyInfo', 'App\Http\Controllers\usersController@updateCompanyInfo');
    Route::get('searchUsersDetails', 'App\Http\Controllers\usersController@searchUsersDetails');
    //-------------------------------------------------------------------

    //Accounts Management------------------------------------------------
    Route::get('payment-request', 'App\Http\Controllers\accountsController@paymentRequest');
    Route::get('transactions', 'App\Http\Controllers\accountsController@transactions');
    Route::get('officeExpenses', 'App\Http\Controllers\accountsController@officeExpenses');
    Route::post('addOfficeExpense', 'App\Http\Controllers\accountsController@addOfficeExpense');
    Route::get('bankAccounts', 'App\Http\Controllers\accountsController@bankAccounts');
    Route::post('addBankAccounts', 'App\Http\Controllers\accountsController@addBankAccounts');
    Route::get('editBankAccount', 'App\Http\Controllers\accountsController@editBankAccount');
    Route::post('updateBankAccountsAmount', 'App\Http\Controllers\accountsController@updateBankAccountsAmount');
    Route::post('deleteBankAccount', 'App\Http\Controllers\accountsController@deleteBankAccount');
    Route::get('filterTransaction', 'App\Http\Controllers\accountsController@filterTransaction');
    Route::get('filterOfficeExpense', 'App\Http\Controllers\accountsController@filterOfficeExpense');
    Route::get('bank-accounts', 'App\Http\Controllers\accountsController@bankAccountsSuper');
    Route::post('addBankAccountsSuper', 'App\Http\Controllers\accountsController@addBankAccountsSuper');
    Route::get('editBankAccountSuperPage', 'App\Http\Controllers\accountsController@editBankAccountSuperPage');
    Route::post('updateBankAccountsSuper', 'App\Http\Controllers\accountsController@updateBankAccountsSuper');
    Route::post('deleteBankAccountSuper', 'App\Http\Controllers\accountsController@deleteBankAccountSuper');
    Route::get('payment-request', 'App\Http\Controllers\accountsController@paymentRequest');
    Route::post('addManualPayment', 'App\Http\Controllers\accountsController@addManualPayment');
    Route::get('editManualPaymentPage', 'App\Http\Controllers\accountsController@editManualPaymentPage');
    Route::post('updateManualPayment', 'App\Http\Controllers\accountsController@updateManualPayment');
    Route::get('accountsHead', 'App\Http\Controllers\accountsController@accountsHead');
    Route::post('addAccountsHead', 'App\Http\Controllers\accountsController@addAccountsHead');
    Route::get('editAccountHead', 'App\Http\Controllers\accountsController@editAccountHead');
    Route::post('updateAccountsHead', 'App\Http\Controllers\accountsController@updateAccountsHead');
    Route::post('deleteAccountHead', 'App\Http\Controllers\accountsController@deleteAccountHead');
    //-------------
    Route::post('pay-online-b2b', [SslCommerzPaymentController::class, 'payOnlineb2b']);
    //----------------------------------------------------------

    //HR Management------------------------------------------------
    Route::get('designation', 'App\Http\Controllers\hrController@designation');
    Route::post('addDesignation', 'App\Http\Controllers\hrController@addDesignation');
    Route::get('editDesignationPage', 'App\Http\Controllers\hrController@editDesignationPage');
    Route::post('updateDesignation', 'App\Http\Controllers\hrController@updateDesignation');
    Route::post('deleteDesignation', 'App\Http\Controllers\hrController@deleteDesignation');

    Route::get('employees', 'App\Http\Controllers\hrController@employeeSettings');
    Route::post('addNewEmployee', 'App\Http\Controllers\hrController@addNewEmployee');
    Route::get('editEmployeePage', 'App\Http\Controllers\hrController@editEmployeePage');
    Route::post('editEmployee', 'App\Http\Controllers\hrController@editEmployee');
    Route::post('deleteEmployee', 'App\Http\Controllers\hrController@deleteEmployee');

    Route::get('menu-builder', [hrController::class, 'menuBuilder'])->name('menu.builder');
    Route::post('menu-builder/store', [hrController::class, 'menuStore'])->name('menu.store');
    Route::get('menu-builder/edit/{id}', [hrController::class, 'menuEdit'])->name('menu.edit');
    Route::put('menu-builder/update/{id}', [hrController::class, 'menuUpdate'])->name('menu.update');
    Route::delete('menu-builder/delete/{id}', [hrController::class, 'menuDelete'])->name('menu.delete');

    Route::get('role-assign', [hrController::class, 'roleAssign'])->name('role.assign');
    Route::post('role-assign/store', [hrController::class, 'roleAssignStore'])->name('role.assign.store');

    Route::get('roles', 'App\Http\Controllers\hrController@roles');
    Route::post('addRole', 'App\Http\Controllers\hrController@addRole');
    Route::post('deleteRole', 'App\Http\Controllers\hrController@deleteRole');

    Route::get('leaves', 'App\Http\Controllers\hrController@leaves');
    Route::post('newLeaveRequest', 'App\Http\Controllers\hrController@newLeaveRequest');
    Route::get('approveLeave', 'App\Http\Controllers\hrController@approveLeave');
    Route::get('rejectLeave', 'App\Http\Controllers\hrController@rejectLeave');
    Route::post('requestEarnedLeave', [hrController::class, 'requestEarnedLeave']);
    Route::get('approveEarnedLeave', [hrController::class, 'approveEarnedLeave']);
    Route::get('/leave-adjustment', [App\Http\Controllers\hrController::class, 'leaveAdjustmentPage']);
    Route::post('/leave-adjustment', [App\Http\Controllers\hrController::class, 'updateLeaveBalance']);

    Route::resource('loan', loanController::class);
    Route::post('loan/{id}/status', [loanController::class, 'updateStatus'])->name('loan.updateStatus');
    Route::post('loan/{id}/pay', [loanController::class, 'addPayment'])->name('loan.payment');

    Route::get('/generate-salary', [hrController::class, 'generateSalary'])->name('salary.create');
    Route::post('/generate-salary', [hrController::class, 'salaryEntry'])->name('salary.store');
    Route::post('/generate-salary/update', [hrController::class, 'updateBulkSalary'])->name('salary.update.bulk');
    Route::get('/salary/details/{year}/{month}', [hrController::class, 'salaryDetails'])->name('salary.details');
    Route::get('/salary/payslip/{emp_id}/{month}/{year}', [hrController::class, 'salaryPayslip'])->name('salary.payslip');
    Route::get('/salary/details/download/{year}/{month}', [hrController::class, 'downloadSalaryReport'])->name('salary.details.download');

    Route::get('attendance', 'App\Http\Controllers\hrController@attendance');
    Route::get('entry-attendance', 'App\Http\Controllers\hrController@entryAttendance');
    Route::get('exit-attendance', 'App\Http\Controllers\hrController@exitAttendance');
    Route::get('filter-attendance', 'App\Http\Controllers\hrController@filterAttendance');
    Route::get('download-attendance-pdf', 'App\Http\Controllers\hrController@downloadAttendancePdf');
    Route::get('download-attendance-pdf', [hrController::class, 'downloadAttendancePdf'])->name('attendance.download.pdf');
    Route::post('attendance/remark', [hrController::class, 'saveRemark'])->name('attendance.remark');
    //----------------------------------------------------------

    //Inventory Management------------------------------------------------
    Route::prefix('inventory')->group(function () {
        Route::get('categoryManagement', [InventoryController::class, 'categoryManagement'])->name('inventory.categoryManagement');
        Route::post('createCategory', [InventoryController::class, 'createCategory'])->name('inventory.createCategory');
        Route::get('editCategoryPage', [InventoryController::class, 'editCategoryPage'])->name('inventory.editCategoryPage');
        Route::post('updateCategory', [InventoryController::class, 'updateCategory'])->name('inventory.updateCategory');
        Route::post('deleteCategory', [InventoryController::class, 'deleteCategory'])->name('inventory.deleteCategory');

        Route::get('productManagement', [InventoryController::class, 'productManagement'])->name('inventory.productManagement');
        Route::post('createProduct', [InventoryController::class, 'createProduct'])->name('inventory.createProduct');
        Route::get('editProductPage', [InventoryController::class, 'editProductPage'])->name('inventory.editProductPage');
        Route::post('updateProduct', [InventoryController::class, 'updateProduct'])->name('inventory.updateProduct');
        Route::post('deleteProduct', [InventoryController::class, 'deleteProduct'])->name('inventory.deleteProduct');

        Route::get('downloadAcknowledgementSlip', [InventoryController::class, 'downloadAcknowledgementSlip'])->name('inventory.downloadAcknowledgementSlip');
    });

    //Statement Management------------------------------------------------
    Route::get('ucbSolvency', 'App\Http\Controllers\statemntController@ucbSolvency');
    Route::post('generatePDF', 'App\Http\Controllers\statemntController@generatePDF');
    Route::get('ucbStatement', 'App\Http\Controllers\statemntController@ucbStatement');
    Route::post('generatePDFStatement', 'App\Http\Controllers\statemntController@generatePDFStatement');
    Route::get('cityStatement', 'App\Http\Controllers\statemntController@cityStatement');
    Route::post('generateCityStatement', [App\Http\Controllers\statemntController::class, 'cityStatementGenerate'])->name('generateCityStatement');
    Route::get('citySolvency', 'App\Http\Controllers\statemntController@citySolvency');
    Route::post('/generateCityPDF', [statemntController::class, 'generateCitySolvencyPDF'])->name('certificate.generate');
    Route::get('bracSolvency', [statemntController::class, 'bracSolvency']);
    Route::post('bracSolvencyGenerate', [statemntController::class, 'bracSolvencyGenerate'])->name('bracSolvency.bracSolvencyGenerate');
    Route::get('siblFdrSolvency', [statemntController::class, 'siblFdrSolvency']);
    Route::post('siblFdrSolvency-generate', [statemntController::class, 'siblFdrSolvencyGenerate'])->name('siblFdr.generate');
    Route::get('siblFdrStatement', [statemntController::class, 'statementForm']);
    Route::post('siblFdrStatementGenerate', [statemntController::class, 'siblGenerateStatement'])->name('siblFdrStatement.generate');
    //----------------------------------------------------------

    //Sender Management------------------------------------------------
    Route::get('smsSender', 'App\Http\Controllers\senderController@smsSender');
    Route::post('sendSMS', 'App\Http\Controllers\senderController@sendSMS');
    Route::get('smsLog', 'App\Http\Controllers\senderController@smsLog');
    Route::get('emailSender', [App\Http\Controllers\senderController::class, 'emailSenderPage'])->name('emailSender');
    Route::post('sendEmail', [App\Http\Controllers\senderController::class, 'sendEmail'])->name('sendEmail');
    Route::get('emailSenderLog', [App\Http\Controllers\senderController::class, 'emailLog'])->name('emailSenderLog');
    Route::get('emailSenderLog', [App\Http\Controllers\senderController::class, 'emailLog'])->name('emailSenderLog');
    Route::get('emailRetry/{id}', [App\Http\Controllers\senderController::class, 'retryEmail'])->name('emailRetry');
    Route::get('emailLog/delete/{id}', [App\Http\Controllers\senderController::class, 'deleteEmailLog'])->name('deleteEmailLog');
    Route::get('emailLog/export-excel', [App\Http\Controllers\senderController::class, 'exportExcel'])->name('emailLog.exportExcel');
    Route::get('emailLog/export-pdf', [App\Http\Controllers\senderController::class, 'exportPDF'])->name('emailLog.exportPDF');
    //----------------------------------------------------------

    //Settings Management------------------------------------------------
    Route::get('vendors', 'App\Http\Controllers\settingController@vendorSettings');
    Route::post('addNewVendor', 'App\Http\Controllers\settingController@addNewVendor');
    Route::get('editVendorPage', 'App\Http\Controllers\settingController@editVendorPage');
    Route::post('editVendor', 'App\Http\Controllers\settingController@editVendor');
    Route::post('deleteVendor', 'App\Http\Controllers\settingController@deleteVendor');


    Route::get('userInfo', 'App\Http\Controllers\settingController@userInfo');
    Route::post('updateUser', 'App\Http\Controllers\settingController@updateUser');
    Route::get('companyInfo', 'App\Http\Controllers\settingController@companyInfo');
    Route::post('updateCompany', 'App\Http\Controllers\settingController@updateCompany');

    Route::get('airports', 'App\Http\Controllers\settingController@airports');
    Route::post('insertAirports', 'App\Http\Controllers\settingController@insertAirports');
    Route::get('/editAirport/{id}', [App\Http\Controllers\settingController::class, 'editAirport']);
    Route::post('/updateAirport', [App\Http\Controllers\settingController::class, 'updateAirport']);

    Route::get('airlines', 'App\Http\Controllers\settingController@airlines');
    Route::post('insertAirlines', 'App\Http\Controllers\settingController@insertAirlines');

    Route::get('airlinesLogo', 'App\Http\Controllers\settingController@airlinesLogoPage');
    Route::get('editAirlinesPage', 'App\Http\Controllers\settingController@editAirlinesPage');
    Route::post('editAirlines', 'App\Http\Controllers\settingController@editAirlines');
    Route::post('deleteAirlines', 'App\Http\Controllers\settingController@deleteAirlines');

    //Course Management
    Route::get('course-management', 'App\Http\Controllers\courseController@courseManagement');
    Route::post('add-new-course', 'App\Http\Controllers\courseController@addNewCourse');
    Route::get('editCoursePage', 'App\Http\Controllers\courseController@editCoursePage');
    Route::post('updateCourse', 'App\Http\Controllers\courseController@updateCourse');
    Route::get('/toggle-course-status/{id}', [CourseController::class, 'toggleCourseStatus'])->name('course.toggle');
    Route::post('/delete-course/{id}', [CourseController::class, 'deleteCourse'])->name('course.delete');
    Route::get('/class-videos', [CourseController::class, 'classVideoPage'])->name('classVideoPage');
    Route::post('/addClassVideo', [CourseController::class, 'addClassVideo'])->name('addClassVideo');
    Route::get('/editClassVideo', [CourseController::class, 'editClassVideo'])->name('editClassVideo');
    Route::post('/updateClassVideo', [CourseController::class, 'updateClassVideo'])->name('updateClassVideo');
    Route::get('/deleteClassVideo', [CourseController::class, 'deleteClassVideo'])->name('deleteClassVideo');
    Route::get('ebook-management', [EbookController::class, 'index']);
    //E-Book Management Routes
    Route::get('ebook-management', [EbookController::class, 'ebookManagementPage']);
    Route::post('ebook-store', [EbookController::class, 'ebookStoreProcess']);
    Route::get('ebook-edit', [EbookController::class, 'ebookEditPage']);
    Route::post('ebook-update', [EbookController::class, 'ebookUpdateProcess']);
    Route::post('ebook-delete', [EbookController::class, 'ebookDeleteProcess']);
    Route::get('ebook-status-toggle/{id}', [EbookController::class, 'ebookStatusToggle']) ->name('ebook.status.toggle');

    //Website Settings Management------------------------------------------------
    Route::get('b2cVisaManagement', 'App\Http\Controllers\websiteSettingController@b2cVisaManagement');
    Route::post('createNewB2CVisa', 'App\Http\Controllers\websiteSettingController@createNewB2CVisa');
    Route::get('editB2CVisaPage', 'App\Http\Controllers\websiteSettingController@editB2CVisaPage');
    Route::post('editNewB2CVisa', 'App\Http\Controllers\websiteSettingController@editNewB2CVisa');
    Route::post('deleteB2CVisaManagement', 'App\Http\Controllers\websiteSettingController@deleteB2CVisaManagement');
    Route::get('b2cVisaCountry', 'App\Http\Controllers\websiteSettingController@b2cVisaCountry');
    Route::post('addVisaCountry', 'App\Http\Controllers\websiteSettingController@addVisaCountry');
    Route::get('editVisaCountryName', 'App\Http\Controllers\websiteSettingController@editVisaCountryName');
    Route::post('editVisaPackCountry', 'App\Http\Controllers\websiteSettingController@editVisaPackCountry');
    Route::post('deleteVisaCountryName', 'App\Http\Controllers\websiteSettingController@deleteVisaCountryName');
    Route::get('b2cCompany', 'App\Http\Controllers\websiteSettingController@b2cCompany');
    Route::post('addCompanyInfo', 'App\Http\Controllers\websiteSettingController@addCompanyInfo');
    Route::get('tourPackCountry', 'App\Http\Controllers\websiteSettingController@tourPackCountry');
    Route::post('addTourPackCountry', 'App\Http\Controllers\websiteSettingController@addTourPackCountry');
    Route::get('editTourCountryName', 'App\Http\Controllers\websiteSettingController@editTourCountryName');
    Route::post('editTourPackCountry', 'App\Http\Controllers\websiteSettingController@editTourPackCountry');
    Route::post('deleteTourCountryName', 'App\Http\Controllers\websiteSettingController@deleteTourCountryName');
    Route::get('b2cTourPackage', 'App\Http\Controllers\websiteSettingController@b2cTourPackage');
    Route::post('addB2CTourPackage', 'App\Http\Controllers\websiteSettingController@addB2CTourPackage');
    Route::get('editB2CTourPackagePage', 'App\Http\Controllers\websiteSettingController@editB2CTourPackagePage');
    Route::post('editB2CTourPackage', 'App\Http\Controllers\websiteSettingController@editB2CTourPackage');
    Route::post('deleteB2CTourPackage', 'App\Http\Controllers\websiteSettingController@deleteB2CTourPackage');
    Route::get('blogManagement', 'App\Http\Controllers\websiteSettingController@blogManagement');
    Route::post('addB2CBlog', 'App\Http\Controllers\websiteSettingController@addB2CBlog');
    Route::get('editB2CBlogPage', 'App\Http\Controllers\websiteSettingController@editB2CBlogPage');
    Route::post('editB2CBlog', 'App\Http\Controllers\websiteSettingController@editB2CBlog');
    Route::post('deleteB2CBlog', 'App\Http\Controllers\websiteSettingController@deleteB2CBlog');
    Route::get('domainManage', 'App\Http\Controllers\websiteSettingController@domainManage');
    Route::post('addDomain', 'App\Http\Controllers\websiteSettingController@addDomain');
    Route::get('b2cManpowerCountry', 'App\Http\Controllers\websiteSettingController@b2cManpowerCountry');
    Route::post('addManpowerCountry', 'App\Http\Controllers\websiteSettingController@addManpowerCountry');
    Route::get('editManpowerCountryName', 'App\Http\Controllers\websiteSettingController@editManpowerCountryName');
    Route::post('editManpowerPackCountry', 'App\Http\Controllers\websiteSettingController@editManpowerPackCountry');
    Route::post('deleteManpowerCountryName', 'App\Http\Controllers\websiteSettingController@deleteManpowerCountryName');
    Route::get('b2cManpowerManagement', 'App\Http\Controllers\websiteSettingController@b2cManpowerManagement');
    Route::post('addB2CManpower', 'App\Http\Controllers\websiteSettingController@addB2CManpower');
    Route::get('editB2CManpowerPackagePage', 'App\Http\Controllers\websiteSettingController@editB2CManpowerPackagePage');
    Route::post('editB2CManpowerPackage', 'App\Http\Controllers\websiteSettingController@editB2CManpowerPackage');
    Route::post('deleteB2CManpowerPackage', 'App\Http\Controllers\websiteSettingController@deleteB2CManpowerPackage');
    Route::get('b2cServiceManagement', 'App\Http\Controllers\websiteSettingController@b2cServiceManagement');
    Route::post('addB2CServices', 'App\Http\Controllers\websiteSettingController@addB2CServices');
    Route::get('editB2CServicePage', 'App\Http\Controllers\websiteSettingController@editB2CServicePage');
    Route::post('editB2CService', 'App\Http\Controllers\websiteSettingController@editB2CService');
    Route::post('deleteB2CService', 'App\Http\Controllers\websiteSettingController@deleteB2CService');
    Route::get('b2cHajjUmrahManagememt', 'App\Http\Controllers\websiteSettingController@b2cHajjUmrahManagememt');
    Route::post('addB2CHajjUmrahPackage', 'App\Http\Controllers\websiteSettingController@addB2CHajjUmrahPackage');
    Route::get('editB2CHajjUmrahPage', 'App\Http\Controllers\websiteSettingController@editB2CHajjUmrahPage');
    Route::post('editB2CHajjUmrahPackage', 'App\Http\Controllers\websiteSettingController@editB2CHajjUmrahPackage');
    Route::post('deleteB2CHajjUmrahPackage', 'App\Http\Controllers\websiteSettingController@deleteB2CHajjUmrahPackage');
    Route::get('webEduCountryManagement', [websiteSettingController::class, 'webEduCountryManagement']);
    Route::post('webEduCountryManagement/store', [websiteSettingController::class, 'webEduCountryStore']);
    Route::get('webEduCountryManagement/edit/{id}', [websiteSettingController::class, 'webEduCountryEdit']);
    Route::post('webEduCountryManagement/update/{id}', [websiteSettingController::class, 'webEduCountryUpdate']);
    Route::post('webEduCountryManagement/delete', [websiteSettingController::class, 'webEduCountryDelete']);
    Route::get('webEduUniversityManagement', [WebsiteSettingController::class, 'webEduUniversityManagement']);
    Route::post('webEduUniversity/store', [WebsiteSettingController::class, 'webEduUniversityStore']);
    Route::get('webEduUniversity/edit/{id}', [WebsiteSettingController::class, 'webEduUniversityEdit']);
    Route::post('webEduUniversity/update/{id}', [WebsiteSettingController::class, 'webEduUniversityUpdate']);
    Route::post('webEduUniversity/delete', [WebsiteSettingController::class, 'webEduUniversityDelete']);
    Route::get('webEduCourseManagement', [WebsiteSettingController::class, 'webEduCourseManagement']);
    Route::post('webEduCourse/store', [WebsiteSettingController::class, 'webEduCourseStore']);
    Route::get('webEduCourse/edit/{id}', [WebsiteSettingController::class, 'webEduCourseEdit']);
    Route::post('webEduCourse/update/{id}', [WebsiteSettingController::class, 'webEduCourseUpdate']);
    Route::post('webEduCourse/delete', [WebsiteSettingController::class, 'webEduCourseDelete']);
    Route::post('get-universities-by-country', [WebsiteSettingController::class, 'getUniversitiesByCountry']);
});
//----------------------------------------------------------

