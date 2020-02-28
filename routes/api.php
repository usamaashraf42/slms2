<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('sms4connect','Api\ApiQueryLogController@sms4connect');
// Route::get('correction/reverse','Api\ApiQueryLogController@correctionApproved');
// Route::get('studentStructureChange','Api\ApiSecondQueryController@studentStructureChange');
// Route::get('branches/transfer','Api\ApiQueryLogController@branches');
// Route::get('courses/transfer','Api\ApiQueryLogController@classes');
// Route::get('student/transfer','Api\ApiQueryLogController@students');
// Route::get('branch-course/transfer','Api\ApiQueryLogController@BranchCourse');
// Route::get('feepost/transfer','Api\ApiQueryLogController@feePost');
// Route::get('balance/correction','Api\ApiQueryLogController@balanceCorrection');
// Route::get('feefactor','Api\ApiQueryLogController@feeFactorCheck');
// Route::get('feepostrevert','Api\ApiQueryLogController@feepostrevert');
// Route::get('feeDepositedReverted','Api\ApiQueryLogController@feeDepositedReverted');

// Route::get('fee/stracture/update','Api\ApiQueryLogController@feePostedUpdate');

Route::get('sendsms','Api\ApiQueryLogController@sendsms');


// Route::get('account','Api\ApiSecondQueryController@category_balance');


Route::POST('attandance','Api\ApiSecondQueryController@attandance');
Route::POST('attandance/mark','Api\ApiSecondQueryController@attandanceBulk');
Route::POST('student/record','Api\ApiSecondQueryController@branchstudent');
// Route::get('deleteCourse','Api\ApiSecondQueryController@deleteCourse');

// Route::get('salary-post','Api\ApiSqlToMysqlController@salaryPost');
// Route::get('employee-accounts','Api\ApiSqlToMysqlController@account_master');
// Route::get('create_account','Api\ApiSqlToMysqlController@create_account');
// Route::get('profident_fund','Api\ApiSqlToMysqlController@profident_fund');
// Route::get('feePostDateChange','Api\ApiSqlToMysqlController@feePostDateChange');
Route::get('exam_add_section','Api\ApiSecondQueryController@exam_add_section');
Route::post('salary-sheet-read','Api\ApiSecondQueryController@salarySheetRead');

















////////////////////////////////////////
Route::prefix('user')->group(function () {
	Route::post('login','Api\Auth\AuthController@login');
});
