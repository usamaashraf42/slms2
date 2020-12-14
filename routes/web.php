<?php

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

include('Ajax/customRoute.php');
Route::get('/', function () { return view('welcome'); });
Route::get('/home', function () { return redirect('admin'); });



// Route::get('/checkout', function () { return view('web.checkout'); });
Route::get('/checkout', function () { return view('checkout'); });


Route::post('contactus','HomeController@ContactFom')->name('ContactFom');


	Route::get('fees-chalan','NewApplicationController@feeChalan')->name('fee.chalan');



Route::get('/easypaisa', function () { return view('web.easypaisa.index'); });
Route::get('/easypaisa/token', function () { return view('web.easypaisa.get_token'); });

Route::get('easypaisa/payment/status','Web\EasypaisaController@easypaisaCallback')->name('easypaisaCallback');

Route::post('easypaisa/store','Web\EasypaisaController@store')->name('easypaisaStore');
Route::post('easypaisa/encriptHasKey','Web\EasypaisaController@EncriptHashedKey')->name('EncriptHashedKey');

Route::get('/unauthorized/user', function () { return view('error.401'); })->name('401');

Route::get('challan/{fee_id}','Web\OnlineFeeDepositChallanController@onlineChallan')->name('fee.billing');
Route::get('fee','Web\OnlineFeeDepositChallanController@feees');
Route::get('challan-form','admins\ChallanForm\ChallanFormController@index')->name('challan_form');

Route::prefix('muscat')->group(function () {
	Route::get('/', 'Web\Muscat\PublicController@index')->name('muscat.index');
	Route::get('/nursery', 'Web\Muscat\PublicController@nursery')->name('muscat.nursery');
	Route::get('/school', 'Web\Muscat\PublicController@school')->name('muscat.school');
	Route::get('/academic', 'Web\Muscat\PublicController@academy')->name('muscat.academy');
	Route::get('/nursery_activity', 'Web\Muscat\PublicController@nursery_activity')->name('muscat.nursery_activity');
	Route::get('/academics', 'Web\Muscat\PublicController@academys')->name('muscat.academys');
	Route::get('/jobs', 'Web\Muscat\PublicController@jobs')->name('muscat.jobs');
	Route::get('/ceo_messege', 'Web\Muscat\PublicController@ceo_messege')->name('muscat.ceo_messege');
    Route::get('/ceo_messege_school', 'Web\Muscat\PublicController@ceo_messege_school')->name('muscat.ceo_messege_school');
	Route::get('/curriculum', 'Web\Muscat\PublicController@curriculum')->name('muscat.curriculum');
    Route::get('/curriculum_school', 'Web\Muscat\PublicController@curriculum_school')->name('muscat.curriculum_school');
	Route::get('/news_nursery', 'Web\Muscat\PublicController@news_nursery')->name('muscat.news_nursery');
	Route::get('/event_nursery', 'Web\Muscat\PublicController@event_nursery')->name('muscat.event_nursery');
	Route::get('/news_school', 'Web\Muscat\PublicController@news_school')->name('muscat.news_school');
	Route::get('/event_school', 'Web\Muscat\PublicController@event_school')->name('muscat.event_school');
	Route::get('/faq', 'Web\Muscat\PublicController@faq')->name('muscat.faq');
    Route::get('/contact', 'Web\Muscat\PublicController@contact')->name('muscat.contact');
    Route::get('/contact_school', 'Web\Muscat\PublicController@contact_school')->name('muscat.contact_school');

    Route::get('/admission', 'Web\Muscat\PublicController@admission')->name('muscat.admission');
    Route::post('/admission/fee/deposit', 'Web\Muscat\PublicController@admission_query')->name('muscat.admission_query');
    Route::post('strip/payment', 'Web\Muscat\StripController@stripPayment')->name('muscat.stripPayment');
    Route::post('paypal', 'Web\Muscat\PaymentPaypalController@payWithpaypal')->name('admission.payWithpaypal');
	Route::get('admission/paypal/status', 'Web\Muscat\PaymentPaypalController@getPaymentStatus')->name('admission.payWithpaypalStatus');


});
Route::post('admission/query','Web\Pakistan\PublicController@admission_query')->name('admission_query');
Route::get('/about', 'Web\Pakistan\PublicController@about')->name('pakistan.about');
Route::get('/history', 'Web\Pakistan\PublicController@history')->name('pakistan.history');
Route::get('/coreValue', 'Web\Pakistan\PublicController@coreValue')->name('pakistan.coreValue');
Route::get('/date_sheet', 'Web\Pakistan\PublicController@date_sheet')->name('pakistan.date_sheet');
Route::get('/Examination', 'Web\Pakistan\PublicController@Examination')->name('pakistan.Examination');
Route::get('/leadership', 'Web\Pakistan\PublicController@leadership')->name('pakistan.leadership');
Route::get('/mision', 'Web\Pakistan\PublicController@mision')->name('pakistan.mision');
Route::get('/vision', 'Web\Pakistan\PublicController@vision')->name('pakistan.vision');
Route::get('/why-e-school', 'Web\Pakistan\PublicController@why_e_school')->name('pakistan.why_e_school');
Route::get('/mission/two', 'Web\Pakistan\PublicController@mission_two')->name('pakistan.mission_two');
Route::get('/Vision/two', 'Web\Pakistan\PublicController@Vision_two')->name('pakistan.Vision_two');
Route::get('/history/two', 'Web\Pakistan\PublicController@History_two')->name('pakistan.History_two');
Route::get('/information', 'Web\Pakistan\PublicController@Information')->name('pakistan.Information');
Route::get('/admission', 'Web\Pakistan\PublicController@Apply')->name('pakistan.Apply');
Route::get('/leader', 'Web\Pakistan\PublicController@Leader')->name('pakistan.Leader');
Route::get('/fee/structure','Web\Pakistan\PublicController@Fee_Structure')->name('pakistan.Fee_Structure');
Route::get('/life', 'Web\Pakistan\PublicController@life')->name('pakistan.life');
Route::get('/explore', 'Web\Pakistan\PublicController@explore')->name('pakistan.explore');
Route::get('/clubs', 'Web\Pakistan\PublicController@clubs')->name('pakistan.clubs');
Route::get('/job', 'Web\Pakistan\PublicController@Jobs_now')->name('pakistan.Jobs_now');
Route::get('/why/us', 'Web\Pakistan\PublicController@why_Us')->name('pakistan.why_Us');
Route::get('/franchise/apply', 'Web\Pakistan\PublicController@Apply_now')->name('pakistan.Apply_now');
Route::get('/branch', 'Web\Pakistan\PublicController@branch')->name('pakistan.branch');
Route::get('/camps', 'Web\Pakistan\PublicController@Summer')->name('pakistan.Summer');
Route::get('/summer/fee', 'Web\Pakistan\PublicController@Summer_fee')->name('pakistan.Summer_fee');
Route::get('/contact/us','Web\Pakistan\PublicController@contactus')->name('pakistan.contactus');
Route::get('/news','Web\Pakistan\PublicController@news')->name('pakistan.news');
Route::get('/event','Web\Pakistan\PublicController@event')->name('pakistan.event');
Route::get('/student_picture','Web\Pakistan\PublicController@student_picture')->name('pakistan.student_picture');
Route::resource('feedeposit','Web\FeeDepositController');

Route::get('/student_picture','Web\Pakistan\PublicController@student_picture')->name('pakistan.student_picture');

Route::get('/survey/staff','Web\Pakistan\PublicController@surveryStaff')->name('pakistan.survey.staff');
Route::get('/survey/staff/questions','Web\Pakistan\PublicController@surveryStaffquestions')->name('pakistan_survey_staff_questions');
Route::post('/survey/staff/ans','admins\survey\SurveyAnswerController@surveryStaffanswers')->name('pakistan_survey_staff_answers');
Route::get('how-to-pay','Web\Pakistan\PublicController@howToPay')->name('pakistan.howToPay');



Route::POST('feedeposit-status','Web\FeeDepositController@feeDepositstatus')->name('feeDepositstatus');
Route::POST('searchChallan','Web\FeeDepositController@searchChallan')->name('searchChallan');

Route::POST('feedeposit-paypal','Web\PaypalFeeDepositController@feeDepositpaypal')->name('feeDepositpaypal');
Route::get('feedeposit-paypal-status','Web\PaypalFeeDepositController@getPaymentStatus')->name('payment.status');
Route::GET('feedeposit-status','Web\FeeDepositController@feeDepositstatus')->name('feeDepositstatus');


Route::get('order', 'Web\Pakistan\PublicController@summerBook')->name('pakistan.summerBook');

Route::POST('feeChallan','Web\FeeDepositController@feeChallan')->name('feeChallan');
Route::post('summer/book/charge','Web\SummerBookChargeController@summerBookCharge')->name('summerBookCharge');


Route::get('job/internship','Web\Pakistan\PublicController@job_internship')->name('job_internship');
Route::get('job/application/','Web\Pakistan\PublicController@job_application')->name('job_application');


Route::prefix('pakistan')->group(function () {
	Route::get('/', 'Web\Pakistan\PublicController@index')->name('pakistan.index');
	Route::get('/student_picture','Web\Pakistan\PublicController@student_picture')->name('pakistan.student_picture');
	Route::get('/about', 'Web\Pakistan\PublicController@about')->name('pakistan.about');
	Route::get('/history', 'Web\Pakistan\PublicController@history')->name('pakistan.history');
	Route::get('/coreValue', 'Web\Pakistan\PublicController@coreValue')->name('pakistan.coreValue');
	Route::get('/leadership', 'Web\Pakistan\PublicController@leadership')->name('pakistan.leadership');
	Route::get('/mision', 'Web\Pakistan\PublicController@mision')->name('pakistan.mision');
	Route::get('/vision', 'Web\Pakistan\PublicController@vision')->name('pakistan.vision');
	Route::get('/why-e-school', 'Web\Pakistan\PublicController@why_e_school')->name('pakistan.why_e_school');
	Route::get('/mission/two', 'Web\Pakistan\PublicController@mission_two')->name('pakistan.mission_two');
	Route::get('/Vision/two', 'Web\Pakistan\PublicController@Vision_two')->name('pakistan.Vision_two');
	Route::get('/history/two', 'Web\Pakistan\PublicController@History_two')->name('pakistan.History_two');
	Route::get('/information', 'Web\Pakistan\PublicController@Information')->name('pakistan.Information');
	Route::get('/admission', 'Web\Pakistan\PublicController@Apply')->name('pakistan.Apply');
	Route::get('/leader', 'Web\Pakistan\PublicController@Leader')->name('pakistan.Leader');
	Route::get('/fee/structure','Web\Pakistan\PublicController@Fee_Structure')->name('pakistan.Fee_Structure');
	Route::get('/life', 'Web\Pakistan\PublicController@life')->name('pakistan.life');
	Route::get('/explore', 'Web\Pakistan\PublicController@explore')->name('pakistan.explore');
	Route::get('/clubs', 'Web\Pakistan\PublicController@clubs')->name('pakistan.clubs');
	Route::get('/job', 'Web\Pakistan\PublicController@Jobs_now')->name('pakistan.Jobs_now');
	Route::get('/why/us', 'Web\Pakistan\PublicController@why_Us')->name('pakistan.why_Us');
	Route::get('/franchise/apply', 'Web\Pakistan\PublicController@Apply_now')->name('pakistan.Apply_now');
	Route::get('/branch', 'Web\Pakistan\PublicController@branch')->name('pakistan.branch');
	Route::get('/camps', 'Web\Pakistan\PublicController@Summer')->name('pakistan.Summer');
	Route::get('/summer/fee', 'Web\Pakistan\PublicController@Summer_fee')->name('pakistan.Summer_fee');
	Route::get('/contact/us','Web\Pakistan\PublicController@contactus')->name('pakistan.contactus');
	Route::get('/news','Web\Pakistan\PublicController@news')->name('pakistan.news');
	Route::get('job/internship','Web\Pakistan\PublicController@job_internship')->name('pakistan_job_internship');
	Route::get('/feedeposit','Web\FeeDepositController@index')->name('onlineFeeDeposit');


	Route::get('order', 'Web\Pakistan\PublicController@summerBook')->name('pakistan.summerBook');

        // Route::get('/why_Us', 'Web\Pakistan\PublicController@why_Us')->name('pakistan.why_Us');
        // Route::get('/apply_frenchise','Web\Pakistan\PublicController@apply_frenchise')->name('pakistan.apply_frenchise');
	Route::POST('franchise/store','Web\Pakistan\PublicController@franchise_form')->name('pakistan.franchise_form');
	Route::get('/event','Web\Pakistan\PublicController@event')->name('pakistan.event');
	Route::post('/event_posted','Web\Pakistan\PublicController@event_posted')->name('pakistan.event_posted');


	Route::resource('jobs','Web\Pakistan\JobsController');
	Route::get('email/verification/{email}','Web\Pakistan\JobsController@email_verification')->name('email_verification');
	Route::get('email/code/{email}','Web\Pakistan\JobsController@againEmailCode')->name('againEmailCode');
	Route::POST('emailVerificationCode','Web\Pakistan\JobsController@emailVerificationCode')->name('emailVerificationCode');
	Route::POST('phoneVerifictionCode','Web\Pakistan\JobsController@phoneVerifictionCode')->name('phoneVerifictionCode');


	Route::get('summer/camp','Web\Pakistan\SummerController@index')->name('summer-camp');
	Route::get('summer/detail','Web\Pakistan\SummerController@SummerDetail')->name('summer-detail');
	Route::get('pakistan/summer-camp/registration','Web\Pakistan\SummerController@pakistanRegister')->name('pakistanRegister');
	Route::get('oman/summer-camp/registration','Web\Pakistan\SummerController@omanRegister')->name('omanRegister');
	Route::post('registeration','Web\Pakistan\SummerController@registeration')->name('registeration');
});
Route::get('/forgot-password',function(){ return view('_layouts.admin.forgot-password'); })->name('forgot-password');

Auth::routes();




Route::prefix('admin')->group(function () {



	Route::get('/login', function () { return view('_layouts.admin.login'); })->name('admin.login');
	Route::get('/register', function () { return view('_layouts.admin.register'); })->name('admin.register');
	Route::post('registeration','Auth\RegisterController@admin_register')->name('admin_register');
	Route::get('/verify/{email}', 'Auth\RegisterController@verifyUser')->name('verifyUser');
	Route::post('VerifyMailUser','Auth\RegisterController@VerifyMailUser')->name('VerifyMailUser');

	Route::post('password/request/email', 'Auth\UserFortgotPasswordController@token_create')->name('admin.create_token');
	Route::get('/password/reset/{token}', 'Auth\UserFortgotPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('/password/reset', 'Auth\UserFortgotPasswordController@reset')->name('admin.reset');

	Route::post('/login', 'Auth\LoginController@login')->name('admin.loginSubmit');

	Route::group(['middleware' => ['auth:web']], function () {

		Route::get('/','admins\DashboardController@index')->name('dashboard');
		Route::get('/profile', function () { return view('_layouts.admin.profile'); })->name('admin.profile');
		Route::resource('class','admins\CourseController');
		Route::resource('sms-send','admins\SmsSendController');

		Route::resource('fee-posted-sms','Marketing\sms\FeePostedSmsController');

		Route::resource('branch','Branch\BranchController');
		Route::resource('subject','admins\SubjectController');
		Route::resource('certifcation','admins\CertificationController');
		Route::resource('parent','admins\GuardianController');
		Route::resource('section','admins\SectionController');
		Route::resource('students','admins\Student\StudentController');
		Route::resource('school','Branch\SchoolController');
		Route::resource('student-parents','admins\StudentParentRecordController');
		Route::post('student/search','admins\Student\StudentController@SearchAjax')->name('student_search');
		Route::resource('syllabus','admins\SyllabusController');
		Route::resource('student-card','admins\StudentCardController');
		Route::resource('attandance','admins\AttandanceController');
		Route::resource('branch-class','admins\BranchClassController');
		Route::resource('branch-detail','Branch\BranchDetailController');
		Route::resource('branch-detail-monthly','Branch\MonthlyBranchDetailController');
		Route::resource('branch-monthly-fee','Branch\BranchMonthlyFeeController');
		Route::resource('admission-package','admins\Student\admissionPackage\AdmissionPackageController');
		Route::resource('branch-status','Branch\BranchStatusController');
		Route::resource('bank','Branch\BankController');
		Route::resource('branch-performance','Branch\BranchPerformanceController');
		Route::resource('net-admission-status','Branch\NetAdmissionStatusController');
		Route::resource('branch-class-student','Branch\BranchStudentDetailController');

		Route::resource('bank-student-list','Account\Bank\BankStudentListController');



	        /////////////////// Staff mangement//////
		Route::resource('staff','Staff\AdminController');
		Route::resource('role','Staff\RoleController');
		Route::resource('permission','Staff\PermissionController');

	        //////////// Student///////////////////////registration  registeration student-registeration
		Route::resource('student-category','admins\Student\StudentCategoryController');
		Route::resource('student-registration','admins\Student\StudentRegister\StudentRegisterController');
		Route::resource('franchise-applicant','Account\FranchiseApplicantController');


		Route::prefix('student')->group(function () {
			Route::resource('feepost','admins\Student\feepost\FeePostController');
			Route::resource('individual-feepost','admins\Student\feepost\IndividualFeePostController');
			Route::resource('fee-deposit','admins\Student\feeDeposit\FeeDepositController');

			Route::resource('jazzcash-file-read','admins\Student\feeDeposit\JazzCashDepositController');
			Route::resource('manual-fee-deposit','admins\Student\feeDeposit\ManualFeeDepositController');
			Route::resource('edit-student','admins\Student\EditStudent\EditStudentController');
			Route::post('EditStudentProfile','admins\Student\EditStudent\EditStudentController@EditStudentProfile')->name('EditStudentProfile');


            Route::resource('fee-challan','admins\Student\feeChallen\FeeChallenController');

            Route::resource('outstanding-fee-challan','admins\Student\feeChallen\OutstandingFeeChallanController');
			Route::resource('blis-fee-challan','Account\Blis\BlisFeeChallanController');


			Route::get('fee/challan/pdf/{branch_id}/{class_id}/{ly_no}','admins\Student\feeChallen\FeeChallenController@fee_challan_pdf')->name('fee_challan_pdf');



			Route::resource('left-student','admins\Student\leftStudent\LeftStudentController');
			Route::resource('approval-left-student','admins\Student\leftStudent\LeftStudentApprovalController');
			Route::get('leaving-certificate/{id}','admins\Student\leftStudent\LeftStudentApprovalController@certificate')->name('student.certificate');
			Route::resource('transfer','admins\Student\studentTransfer\StudentTransferController');
			Route::resource('outstanding','admins\Student\outstanding\OutStandingController');
			Route::resource('class-list','admins\Student\classList\ClassListController');
			Route::resource('attendance','admins\AttandanceController');
			Route::resource('fee-structure','admins\Student\StudentFeeStructureController');
			Route::resource('manual-attendance','admins\Student\Attendance\ManualAttendanceController');

			Route::resource('attendance-report','admins\Student\Attendance\AttendanceReportController');
			Route::resource('initial-admission','admins\Student\InitalAdmissionQueryController');





			Route::get('manual-attendance-class-wise/{branch_id}/{class_id}/{date_id}','admins\Student\Attendance\ManualAttendanceController@manualAttendance')->name('manual-attendance-class-wise');

			Route::post('add-manual-attendance','admins\Student\Attendance\ManualAttendanceController@AddAttendance')->name('AddAttendance');
			Route::post('marked-manual-attendance','admins\Student\Attendance\ManualAttendanceController@attendanceMarked')->name('attendanceMarked');




			Route::post('get_student_attandence','admins\AttandanceController@get_student_attandence')->name('get_student_attandence');
			Route::resource('attendance-list','admins\Student\attandanceSheet\StudentAttandanceListController');
			Route::resource('approval-transfer-student','admins\Student\studentTransfer\StudentTransferApprovalController');
			Route::resource('student-edit','admins\Student\StudentBulkEditController');
			Route::resource('student-freeze','admins\Student\studentFreeze\StudentFreezeController');
			Route::resource('student-unfreeze','admins\Student\studentFreeze\StudentUnFreezeController');


			Route::get('register/{id}','admins\Student\StudentRegister\InitialStudentRegisterController@NewAdmission')->name('student.NewAdmission');




			Route::POST('student-edit_update','admins\Student\StudentBulkEditController@edit_update')->name('student_edit_update');
			Route::resource('re-admission','admins\Student\StatusChangeController');

			Route::resource('re-admission-report','admins\Student\ReAdmission\StudentReAdmissionReportController');

			Route::resource('approval-re-admission','admins\Student\ReAdmission\StudentReAdmissionApprovalController');


			Route::resource('card','admins\Student\Card\StudentCardController');

			Route::get('challan/{id}','admins\Student\feepost\FeePostController@challen')->name('student.challen');



			Route::prefix('academic')->group(function () {
				Route::prefix('dairy')->group(function () {
					Route::resource('home-work','admins\Student\Academics\Dairy\HomeWorkController');
					// Route::resource('dairy-manage','admins\Student\Academics\Dairy\DairyManageController');
					// Route::resource('dairy-manage','admins\Student\Academics\Dairy\DairyManageController');
				});

			});
		});
	        /////////////// HR Routes ///////////////////////
		Route::resource('application','Hr\ApplicationController');
		Route::resource('new-application','Hr\NewApplicationController');
		Route::resource('short-list','Hr\ShortListController');
		Route::resource('interview','Hr\InterviewController');
		Route::resource('application-status','Hr\ApplicationStatusController');
		Route::resource('hr','Hr\HumanResourceController');
		Route::resource('job','Hr\JobController');
		Route::resource('employee','Hr\EmployeeController');
		Route::resource('employee-attandance','Hr\EmployeeAttandanceController');
		Route::resource('employee-card','Hr\EmployeeCardController');
		Route::resource('salary-post','Hr\EmployeeSalaryPostController');
		Route::resource('salary-sheet','Hr\SalarySheetController');
		Route::resource('employee-profident-sheet','Hr\EmployeeProfidentSheetController');
		Route::resource('employee-advance-requests','Hr\EmployeeAdvanceControlelr');
		Route::resource('employee-insurance-list','Hr\EmployeeInsuranceListController');
		Route::resource('department','Hr\DepartmentController');
		Route::resource('designation','Hr\DesignationController');
		Route::resource('payroll-item','Hr\PayrollItemController');
		Route::resource('salary-post-approval','Hr\SalaryPostApprovalController');



		Route::resource('employee-list','Hr\EmployeeListController');
		Route::resource('employee-salary-list','Hr\EmployeeSalaryListController');
		Route::resource('department-shift','Hr\DepartmentShiftController');


		Route::post('realSalaryPosted','Hr\SalaryPostApprovalController@realSalaryPosted')->name('realSalaryPosted');


		Route::resource('advance-request','Hr\Advance\AdvanceRequestController');
		Route::resource('advance-approval','Hr\Advance\AdvanceApprovalController');
		Route::resource('advance','Hr\Advance\AdvanceController');


		Route::resource('employee-salary','Hr\EmployeeSalaryController');
		Route::resource('pay-slip','Hr\PaySlipController');
		Route::resource('employee-statement','Hr\EmployeeStatementController');
		Route::resource('income-tax','admins\IncomeTaxController');
		Route::post('salaryPosted','Hr\EmployeeSalaryPostController@salaryPosted')->name('salaryPosted');

		Route::post('temp-salary-posted','Hr\EmployeeSalaryPostController@EmployeeSalaryPostTemp')->name('emp.EmployeeSalaryPostTemp');


		Route::prefix('performance')->group(function () {
			Route::resource('performance-indicator','Hr\PerformanceIndicatorController');
			Route::post('performance-indicator-delete','Hr\PerformanceIndicatorController@delete__request')->name('performance-indicator-delete');

		});
		Route::resource('performance-list','Hr\PerformanceListController');
		Route::resource('performance','Hr\PerformanceController');
		Route::POST('branch-volution','Hr\PerformanceController@branch_eveluation')->name('branch_eveluation');
		Route::post('emp_eveluation_modal','Hr\PerformanceController@emp_eveluation_modal')->name('emp_eveluation_modal');


		Route::resource('leaves-requests','Hr\EmployeeLeaveController');
		Route::post('delete_leave_request','Hr\EmployeeLeaveController@delete_leave_request')->name('leave_requests.delete_leave_request');
		Route::resource('leaves','Hr\AdminLeavesController');
		Route::resource('holidays','Hr\HolidaysController');
		Route::post('updateHoliday','Hr\HolidaysController@updateHoliday')->name('holidays.updateHoliday');
		Route::post('deleteHoliday','Hr\HolidaysController@deleteHoliday')->name('holidays.deleteHoliday');
		Route::post('leaves_request_update','Hr\AdminLeavesController@leaves_request_update')->name('leaves_request_update');

		Route::resource('leaves-setting','Hr\LeaveSettingController');
		Route::post('updateLeaveSetting','Hr\LeaveSettingController@updateLeaveSetting')->name('LeaveSettings.updateLeaveSetting');
		Route::post('deleteLeaveSetting','Hr\LeaveSettingController@deleteLeaveSetting')->name('LeaveSettings.deleteLeaveSetting');


		Route::post('department-search','Hr\DepartmentController@SearchAjax')->name('department.SearchAjax');
		Route::post('designation-search','Hr\DesignationController@SearchAjax')->name('designation.SearchAjax');

		Route::post('branchHasDepartment','admins\AjaxSecondCallController@branchHasDepartment')->name('branchHasDepartment');
		Route::post('departmentHasShift','admins\AjaxSecondCallController@departmentHasShift')->name('departmentHasShift');

		Route::post('active-employee-search','Hr\EmployeeController@activeEmployeeSearch')->name('activeEmployeeSearch');
		Route::post('left-employee-search','Hr\EmployeeController@leftEmployeeSearch')->name('leftEmployeeSearch');
		Route::post('EmployeeStatusChange','Hr\EmployeeController@EmployeeStatusChange')->name('EmployeeStatusChange');
		Route::get('employee-statement/{id}','Hr\EmployeeController@statement');


		Route::post('NewApplications','Hr\ApplicationController@NewApplications')->name('NewApplications');
		Route::post('shortListApplication','Hr\ApplicationController@shortListApplication')->name('shortListApplication');
		Route::post('interviewApplication','Hr\ApplicationController@interviewApplication')->name('interviewApplication');
		Route::post('candidate/sms','Hr\InterviewController@selectedCandidateSmsEmail')->name('selectedCandidateSmsEmail');
		Route::post('sendSmsEmail','Hr\InterviewController@sendSmsEmail')->name('sendSmsEmail');




		Route::post('rejectApp','Hr\ApplicationController@rejectApp')->name('rejectApp');
		Route::post('shortlistApp','Hr\ApplicationController@shortlistApp')->name('shortlistApp');

	        /////////////////////Account ?/////////////////////////////
		Route::prefix('account')->group(function () {
			Route::resource('account-category','Account\AccountCategoryController');
			Route::resource('account','Account\AccountController');
			Route::resource('statement','Account\StatementCountroller');
			Route::resource('cash-receipt','Account\CashReceiptController');
			Route::resource('cash-payment','Account\CashPaymentController');
			Route::resource('bank-deposit','Account\BankDepositController');
			Route::resource('bank-payment','Account\BankPaymentController');
			Route::resource('ledger','Account\LedgerController');
			Route::resource('general-voucher','Account\GenernalVoucherController');
			Route::resource('fee-increment','Account\FeeIncrementController');
			Route::resource('bank-outstanding','Account\BankOutstandingController');
			Route::resource('correction','Account\correction\CorrectionController');
			Route::resource('approval-correction','Account\correction\ApproveCorrectionController');
			// Route::resource('multi-correction-approval','Account\MultiCorrectionApprovalController');
			Route::resource('tentive','Account\tentive\TentiveController');
			Route::resource('paid-account','Account\paidList\PaidListController');
			Route::resource('trial-balance','Account\TrialAccountController');


			Route::resource('fee-deposit-detail','Account\FeeDepositDetailController');

			Route::resource('bank-checque','Account\BankChecqueController');
			Route::resource('account-statement','Account\AccountStatementController');

			// Route::post('multiApproved','Account\MultiCorrectionApprovalController@multiApproved')->name('multiApproved');
			Route::post('incrementUpdate','Account\FeeIncrementController@incrementUpdate')->name('incrementUpdate');

			///////////// datatable ////////////////
			Route::post('/get_account_category','Account\AccountCategoryController@SearchAjax')->name('get_account_category');
			Route::post('/get_branch','Branch\BranchController@SearchAjax')->name('get_branch');


		});

		//////////////////// MaintenanceCategoryController

		Route::prefix('maintenance')->group(function () {
			Route::resource('category','admins\Maintenance\MaintenanceCategoryController');

			Route::post('category-status-change','admins\Maintenance\MaintenanceCategoryController@categoryStatusChange')->name('category-status-change');

			Route::resource('resolved','admins\Maintenance\ResolvedMaintenanceController');
			Route::resource('pending','admins\Maintenance\PendingMaintenanceController');
			Route::resource('list','admins\Maintenance\MaintenanceListController');
			Route::post('maintenance-list','admins\Maintenance\MaintenanceListController@maintenceList')->name('maintenance-list');


		});

		Route::prefix('inventory')->group(function () {
			Route::resource('product-category','Inventory\ProductCategoryController');
			Route::post('productCategoryDelete','Inventory\ProductCategoryController@productCategoryDelete')->name('productCategoryDelete');

			Route::resource('product-sub-category','Inventory\ProductSubCategoryController');
			Route::resource('product','Inventory\ProductController');
			Route::post('productCategoryHasSubCategory','Inventory\ProductController@productCategoryHasSubCategory')->name('productCategoryHasSubCategory');
			Route::post('SubCategoryHasProduct','Inventory\ProductController@SubCategoryHasProduct')->name('SubCategoryHasProduct');
			Route::post('productGetById','Inventory\ProductController@productGetById')->name('productGetById');
			Route::post('closedProduct','Inventory\ProductController@closedProduct')->name('closedProduct');
			Route::post('cancelled_orders','Inventory\ProductController@cancelled_orders')->name('cancelled_orders');
			Route::get('deliver/{id}','Inventory\OrderController@deliver')->name('deliver');

			Route::resource('order','Inventory\OrderController');
			Route::post('deliverOrder','Inventory\OrderController@deliverOrder')->name('deliverOrder');
			Route::post('cancelOrder','Inventory\OrderController@cancelOrder')->name('cancelOrder');
			Route::post('get_product','Inventory\ProductController@get_product')->name('get_product');


		});
		Route::resource('inventory','Inventory\InventoryController');




		Route::resource('maintenance-user','admins\Maintenance\MaintenanceUserController');
		Route::resource('maintenance','admins\Maintenance\MaintenanceController');

		Route::get('employee-sheet','Hr\EmployeeController@completeEmployee');

		/////////////////// QUery Mangement ??????????????????
		Route::resource('query','Query\QueryController');
		Route::post('closedQueries','Query\QueryController@closedQueries')->name('closedQueries');
		Route::get('follow-up/query/{id}','Query\QueryController@followUP')->name('followUP');
		Route::post('queryClosed/','Query\QueryController@queryClosed')->name('queryClosed');
		Route::post('followUpRemarks','Query\QueryController@followUpRemarks')->name('followUpRemarks');
		///////////////////// Event Applicants////////////////////
		Route::get('admission-inquiry','Event\EventApplicantController@admission_inquiry')->name('admission_inquiry');
		Route::get('camp-applicant','Event\EventApplicantController@camp_applicant')->name('camp_applicant');
//		Survey tab
        Route::prefix('survey')->group(function () {
            Route::resource('survey_questions','admins\survey\SurveyQuestionController');
            Route::post('survey_question_update','admins\survey\SurveyQuestionController@update')->name('survey_question_update');
            Route::post('survey_question_status_change','admins\survey\SurveyQuestionController@Statuschange')->name('survey_question_status_change');
            Route::resource('survey_category','admins\survey\SurveyController');
            Route::post('survey_category_update','admins\survey\SurveyController@update')->name('survey_category_update');
            Route::post('survey_category_status_change','admins\survey\SurveyController@Statuschange')->name('survey_category_status_change');
            Route::get('survey_attempts','admins\survey\surveyattempsController@surveyattemps')->name('survey_attemps');
            Route::resource('survey_attempts_modal','admins\survey\surveyattempsController');

        });

	         //////////////////////MarkPostController /
		Route::prefix('exam')->group(function () {
			Route::resource('post','Exam\MarkPostController');

			Route::resource('student-card','Exam\ResultCardController');
			Route::resource('marks-list','Exam\MarksListController');
			Route::resource('marks-edit','Exam\MarkPostEditController');
			Route::resource('discipline-marks','Exam\DisciplineMarksPostController');
			Route::resource('progress-card','Exam\ProgressResultCardController');
			Route::post('desciplineMarksPosted','Exam\DisciplineMarksPostController@desciplineMarksPosted')->name('desciplineMarksPosted');


		});
		Route::post('deleteSubjectMarks','Exam\MarkPostController@deleteSubjectMarks')->name('deleteSubjectMarks');
		Route::post('marks-subject-edit','Exam\MarkPostEditController@marksEdit')->name('marks-subject-edit');
		Route::resource('exam','Exam\ExamController');
		Route::resource('exam-category','Exam\ExamCategoryController');


	          ///////////////////////
		Route::POST('student/personal/info','admins\Student\StudentRegister\StudentRegisterController@PersonalInfoRe')->name('PersonalInfo');
		Route::POST('student/admission/info','admins\Student\StudentRegister\StudentRegisterController@AdmissionInfo')->name('AdmissionInfo');
		Route::POST('student/contact/info','admins\Student\StudentRegister\StudentRegisterController@ContactInfo')->name('ContactInfo');
		Route::POST('student/medical/info','admins\Student\StudentRegister\StudentRegisterController@MedicalInfo')->name('MedicalInfo');
		Route::POST('student/Fee/info','admins\Student\StudentRegister\StudentRegisterController@FeeInfo')->name('FeeInfo');
		Route::POST('student/installment/info','admins\Student\StudentRegister\StudentRegisterController@InstallmentInfo')->name('InstallmentInfo');
		Route::POST('studentFeeStrutureChange','admins\Student\StudentFeeStructureController@studentFeeStrutureChange')->name('studentFeeStrutureChange');
		Route::get('applicants/{id}','Hr\JobController@applicants')->name('applicants');
		Route::get('cv/preview/{id}','Hr\ApplicationController@cvPreview')->name('cvPreview');
		Route::get('selected/applicants/','Hr\ApplicationController@selectedApplicant')->name('application.selectedApplicant');
		Route::post('application/interview/schdule','Hr\ApplicationController@updateStatus')->name('application.updateStatus');
		Route::get('student/statement/{id}','Account\StatementCountroller@studentStatement')->name('studentStatement');
		Route::get('interview/marks/{id}','Hr\InterviewController@interviewMarks')->name('interview.marks');
		Route::get('interview/marks/list/{id}','Hr\InterviewController@markslist')->name('interview.markslist');

		Route::post('account/get_account','Account\AccountController@get_account')->name('get_account');
		Route::post('account/get_employee','admins\AjaxSecondCallController@get_employee')->name('get_employee');
		Route::post('account/get_student_search','Account\AccountController@get_student_search')->name('get_student_search');
		Route::post('branch-has-employee','admins\AjaxSecondCallController@branchHasEmployee')->name('branchHasEmployee');

		Route::post('exam-type/exame','admins\AjaxCallController@ExamTypeHastExam')->name('ExamTypeHastExam');
		Route::post('marksPostingData','admins\AjaxCallController@marksPostingData')->name('marksPostingData');
		Route::post('get/student','admins\AjaxCallController@getStudent')->name('getStudent');

		Route::post('get/studentCorrection','admins\AjaxCallController@correctionStudentCorrection')->name('correctionStudentCorrection');

		Route::post('get/correctionRecord','admins\AjaxCallController@correctionRecord')->name('correctionRecord');
		Route::post('correction/approval/','Account\correction\ApproveCorrectionController@approveBranchWise')->name('approveBranchWise');
		Route::post('correction-approved/report','Account\correction\ApproveCorrectionController@correctionReport')->name('correctionReport');
		Route::post('branch/correction/report','Account\correction\CorrectionController@branch_correction_report')->name('branch_correction_report');
		Route::post('branch/student-left/report','admins\Student\leftStudent\LeftStudentController@branch_student_left_report')->name('branch_student_left_report');
		Route::post('branch/student-transfer/report','admins\Student\studentTransfer\StudentTransferController@branch_student_transfer_report')->name('branch_student_transfer_report');
		Route::post('student-left/approval/','admins\Student\leftStudent\LeftStudentApprovalController@approveBranchWise')->name('approveBranchWiseLeft');
		Route::post('maintain/Sub-Category','admins\Maintenance\MaintenanceController@maintainSubCategory')->name('maintainSubCategory');
		Route::post('maintain/Sub-Category-users','admins\Maintenance\MaintenanceController@maintainceUser')->name('maintainceUser');
		Route::post('get/issued/checque','admins\AjaxSecondCallController@get_issue_checque')->name('get_issue_checque');
		Route::post('get/checque/detail','admins\AjaxSecondCallController@checqueDetail')->name('checqueDetail');

		Route::post('maintain/resolved','admins\Maintenance\MaintenanceController@maintainceResolved')->name('maintainceResolved');
		Route::post('maintain/approval','admins\Maintenance\MaintenanceController@approvedMaintaince')->name('approvedMaintaince');
		Route::post('maintain/approval/high/level','admins\Maintenance\MaintenanceController@approvedMaintainceHighLevel')->name('approvedMaintainceHighLevel');
		Route::post('maintain/approval/transfer/high/level','admins\Maintenance\MaintenanceController@maintenanceTransferToHigherLevel')->name('maintenanceTransferToHigherLevel');



	        /////////////////// Ajax Controller Call/////////////////////

		Route::post('course/has-section','admins\AjaxCallController@CourseHasSection')->name('CourseHasSection');
		Route::post('parent/has-kids','admins\AjaxCallController@parentHasKids')->name('parentHasKids');
		Route::post('studentById','admins\AjaxCallController@studentById')->name('studentById');
		Route::post('admissionPackage','admins\AjaxCallController@admissionPackage')->name('admissionPackage');
		Route::post('admissionPackageFirst','admins\AjaxCallController@admissionPackageFirst')->name('admissionPackageFirst');
		Route::post('bankHasAccount','admins\AjaxSecondCallController@bankHasAccount')->name('bankHasAccount');
		Route::post('bankHasChecque','admins\AjaxSecondCallController@bankHasChecque')->name('bankHasChecque');
		Route::post('admissionPackageNulls','admins\AjaxSecondCallController@admissionPackageNulls')->name('admissionPackageNulls');
		Route::post('branchHasClasses','admins\AjaxSecondCallController@branchHasClass')->name('branchHasClasses');

		Route::post('AvailableChecque','Account\BankChecqueController@AvailableChecque')->name('AvailableChecque');
		Route::post('IssuedChecque','Account\BankChecqueController@IssuedChecque')->name('IssuedChecque');
		Route::post('ClearChecque','Account\BankChecqueController@ClearChecque')->name('ClearChecque');

		Route::post('branchHasCourse','admins\AjaxSecondCallController@branchHasCourse')->name('branchHasCourse');
		Route::post('examSearch','Exam\ExamCategoryController@SearchAjax')->name('examSearch');
		Route::post('ExamTypeCategory','Exam\ExamCategoryController@ExamTypeCategory')->name('ExamTypeCategory');
		Route::post('readonlyBranchSetting','admins\AjaxSecondCallController@readonlyBranchSetting')->name('readonlyBranchSetting');
		Route::post('empoyee-attandance-mark','Hr\EmployeeAttandanceController@empoyee_attandance_mark')->name('empoyee_attandance_mark');
		Route::post('attandance_mark','Hr\EmployeeAttandanceController@attandance_mark')->name('attandance_mark');

		//////////////???????????? Datatable search?????????????///////////////////////////
		Route::post('RejectAfterInterview','Hr\InterviewController@RejectAfterInterview')->name('RejectAfterInterview');
		Route::post('maintainceSearch','admins\Maintenance\MaintenanceController@maintainceSearch')->name('maintainceSearch');
		Route::post('maintainceApprovedSearch','admins\Maintenance\MaintenanceController@maintainceApprovedSearch')->name('maintainceApprovedSearch');
		Route::post('maintainceResolvedSearch','admins\Maintenance\MaintenanceController@maintainceResolvedSearch')->name('maintainceResolvedSearch');
		Route::post('maintainceNeedApprovalSearch','admins\Maintenance\MaintenanceController@maintainceNeedApprovalSearch')->name('maintainceNeedApprovalSearch');

		Route::post('branchHasSectionStudent','admins\AjaxSecondCallController@branchHasSectionStudent')->name('branchHasSectionStudent');

		//////////////////////????????????????????? UpdateStudentStatementController??????????????
		Route::resource('update-student-statement','Account\UpdateStudentStatementController');
		Route::post('updateStdStatementMaster','Account\UpdateStudentStatementController@updateStdStatementMaster')->name('updateStdStatementMaster');


	});

});

Route::prefix('job/applicant')->group(function () {

    Route::get('login','Auth\JobApplicantLoginController@showLoginForm')->name('JobApplicant.login');
    Route::post('login','Auth\JobApplicantLoginController@login')->name('JobApplicant.login.submit');
    Route::get('register','Auth\JobApplicantLoginController@registerForm')->name('JobApplicant.register');
    Route::post('register','Auth\JobApplicantLoginController@registerSubmit')->name('JobApplicant.register.submit');


    Route::group(['middleware' => ['auth:JobApplicant']], function () {

        Route::get('logout','Auth\JobApplicantLoginController@logout')->name('JobApplicant.logout');
        Route::group(['namespace' => 'JobApplicant'], function () {

            Route::get('/', 'JobApplicantDashboardController@dashboard')->name('jobApplicant.dashboard');
            Route::get('profile','ProfileController@index')->name('jobApplicant.profile');
            Route::get('record', 'JobApplicantDashboardController@record_video')->name('jobApplicant.record_video');
        });
        //education
        Route::post('education/added','JobApplicant\jobApplicantDashboardController@jobapplicanteducationAdd')->name('jobapplicant_educationAdd');
        Route::post('job/applicant_qualification_ajax','JobApplicant\jobApplicantDashboardController@jobapplicant_qualification_ajax')->name('jobapplicant_qualification_get_ajax');
        Route::post('job/applicant_qualification_ajax_delete','JobApplicant\jobApplicantDashboardController@jobapplicant_qualification_delete')->name('jobapplicant_qualification.delete');
        Route::get('job/applicant_qualification_ajax_edit','JobApplicant\jobApplicantDashboardController@jobapplicant_qualification_edit')->name('jobapplicant_qualification_edit');
        Route::post('job/applicant_qualification_ajax_update','JobApplicant\jobApplicantDashboardController@jobapplicant_qualification_Update')->name('jobapplicant_qualification_update');

        //experience
        Route::post('job/applicant_experience/added','JobApplicant\jobApplicantDashboardController@obapplicant_experienceAdd')->name('jobapplicant_experienceAdd');
        Route::post('job/applicant_experience_ajax','JobApplicant\jobApplicantDashboardController@jobapplicant_experience_ajax')->name('jobapplicant_experience_get_ajax');
        Route::post('job/applicant_experience_delete','JobApplicant\jobApplicantDashboardController@jobapplicant_experience_delete')->name('jobapplicant_experience_delete');
        Route::get('job/applicant_experience_ajax_edit','JobApplicant\jobApplicantDashboardController@jobapplicant_experience_edit')->name('jobapplicant_experience_edit');
        Route::post('job/applicant_experience_ajax_update','JobApplicant\jobApplicantDashboardController@jobapplicant_experience_Update')->name('jobapplicant_experience_update');
        Route::post('job/applicant_profile_update','JobApplicant\jobApplicantDashboardController@jobapplicantProfileUpdate')->name('jobapplicant_profile_update');
    });
    Route::prefix('ajax')->group(function () {
        Route::post('get_degree_ajax','JobApplicant\jobApplicantDashboardController@get_degree_ajax')->name('get_degree_ajax');
        Route::post('get_institude_ajax','JobApplicant\jobApplicantDashboardController@get_institude_ajax')->name('get_institude_ajax');
        Route::get('exp_institude_ajax','JobApplicant\jobApplicantDashboardController@exp_institude_ajax')->name('exp_institude_ajax');
        Route::post('get_subject_ajax','JobApplicant\jobApplicantDashboardController@get_subject_ajax')->name('get_subject_ajax');
        Route::post('get_grade_ajax','JobApplicant\jobApplicantDashboardController@get_grade_ajax')->name('get_grade_ajax');
        Route::post('get_topic_ajax','Teacher\Ajax\FirstAjaxTeacherController@get_topic_ajax')->name('get_topic_ajax');
        Route::post('get-city-ajax','Teacher\TeacherAjaxController@get_city_ajax')->name('get_city_ajax');
        Route::post('get-state-ajax','Teacher\TeacherAjaxController@get_state_ajax')->name('get_state_ajax');

    });
});




Route::post('countryHasBranch','admins\AjaxCallController@countryHasBranch')->name('countryHasBranch');
Route::post('schoolHasBranch','admins\AjaxCallController@schoolHasBranch')->name('schoolHasBranch');

Route::get('/employee', 'HomeController@employee');

