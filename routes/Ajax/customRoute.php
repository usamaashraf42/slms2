<?php
	Route::prefix('ajax/Api/')->group(function () {


		///////////Course Routes////////////////
		
		Route::post('updateCourse','admins\CourseController@updateCourse')->name('course.updateCourse');
		Route::post('deleteCourse','admins\CourseController@deleteCourse')->name('course.deleteCourse');
		Route::post('updateMainCategory','admins\Maintenance\MaintenanceCategoryController@updateMainCategory')->name('maintenance.updateMainCategory');
		
		Route::POST('deleteApplicationStatus','Hr\ApplicationStatusController@deleteApplicationStatus')->name('deleteApplicationStatus');

		Route::post('student-category/deleteCategory','admins\Student\StudentCategoryController@deleteCategory')->name('student-category.deleteCategory');
		Route::post('updateCategory','admins\Student\StudentCategoryController@updateCategory')->name('student.updateCategory');
		Route::post('branchHasClass','admins\BranchController@branchHasClass')->name('branchHasClass');
		Route::post('classHasStudent','admins\BranchController@classHasStudent')->name('classHasStudent');
		


		Route::post('updateAdminStatus','Staff\AdminController@deleteAdmin')->name('admin.deleteAdmin');
		


	});

?>