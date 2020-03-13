<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeSalary;

use App\Models\EmployeeSalaryPost;

use App\Models\EmployeeProfidentFund;
// use App\Models\EmployeeProfidentFund;
use DB;
use Validator;

class ApiSqlToMysqlController extends Controller
{
	public function salaryPost(){
		return 'false';
		$salaries = DB::connection('mysql4')->table('emp_acc_credit')->get();
		// return response()->json(['status'=>0,'message'=>'Record not found','data'=>$salaries]);
		foreach ($salaries as $keyValue) {
			$emp=Employee::where('emp_id',$keyValue->EID)->first();
			if($emp){
				$record=EmployeeSalaryPost::where('id',$keyValue->ID)->first();
				if(!$record){
					$record=EmployeeSalaryPost::create([
						'id'=>$keyValue->ID,
						'employee_id'=>$keyValue->EID, 
						'branch_id'=>$emp->branch_id, 
						'month'=>$keyValue->month, 
						'year'=>$keyValue->year,
						'transport'=>$keyValue->Transport, 
						'medical'=>$keyValue->Medical,
						'carryForward'=>$keyValue->carryForward, 
						'total_absent'=>$keyValue->absentdays, 
						'total_days'=>$keyValue->totaldays, 
						'latedays'=>$keyValue->latedays, 
						'Earlyoffdays'=>$keyValue->Earlyoffdays, 
						'totaldeductdays'=>$keyValue->totaldeductdays, 
						'totalpaydays'=>$keyValue->totalpaydays,
						'prevBalance'=>$keyValue->prevBalance,
						'created_at'=>$keyValue->dopost, 
						'updated_at'=>$keyValue->dopost, 
						'carry_forward'=>$keyValue->carryForward,
						'advance'=>$keyValue->advance,
						'tax'=>$keyValue->tax,
						'security'=>$keyValue->security,
						'adminCreditDays'=>$keyValue->adminCreditDays,
						'advance_deduction'=>$keyValue->advance,
						'total_leaves'=>$keyValue->leaves,
						'EOBI'=>$keyValue->EOBI,
						'tbPF'=>$keyValue->tbPF, 
						'dopost'=>$keyValue->dopost,
						'total_salary'=>$keyValue->netsalary,
						'actualSalaryGiven'=>$keyValue->actualSalaryGiven,   
						'current_salay'=>$keyValue->salary, 
						'monthly_salary'=>$keyValue->salary,
						'pf'=>$keyValue->pfund,
						'chkCashed'=>$keyValue->chkCashed,
						'approvalStatusUpdatedOn'=>$keyValue->approvalStatusUpdatedOn,
						'summerSalary'=>$keyValue->summerSalary, 
						'approvalRemarks'=>$keyValue->approvalRemarks,
					]);
				}
				
			}
		}


		return 'true';
	}


	// public function account_master(){
	// 	$salaries = DB::connection('mysql4')->table('employee_account')->get();
	// 	return $salaries;
	// }


	public function create_account(){
		return 'false';
		$employees = Employee::get();

		foreach ($employees as $emp) {
			$acc=\App\Models\Account::where('employee_id',$emp->emp_id)->first();
			if(!$acc){
				$account=\App\Models\Account::create([
	                'name'=>$emp->name,' '.$emp->fname,
	                'c_balance'=>0,
	                'opening_balance'=>0,
	                'type'=>'employee',
	                'employee_id'=>$emp->emp_id

	            ]);
			}
			

		}


		return 'true';
			
	}


	public function profident_fund(){
		return 'false';
		$salaries=EmployeeSalaryPost::get();
		foreach ($salaries as $salary) {
			$total_pf_amount=EmployeeProfidentFund::where('employee_id',$salary->employee_id)->orderBy('id','DESC')->first();
			$pfund=EmployeeProfidentFund::create([
				'employee_id'=>$salary->employee_id,
				'pf_amount'=>$salary->pf,
				'total_pf_amount'=>$total_pf_amount?$total_pf_amount->$total_pf_amount+$salary->pf:$salary->pf,
				'month'=>$salary->month,
				'year'=>$salary->year
			]);
		}

		return 'true';
	}



	public function feePostDateChange(){
		$students=\App\Models\Student::select('id')->where('branch_id',11)->where('status',1)->get();

		// return $students;
		$feePosts=\App\Models\FeePost::whereIn('std_id',$students)->where('fee_month',12)->where('fee_year',2019)->get();
		 // return $feePosts;
		foreach ($feePosts as $feePost) {
			// return $feePost;
			$feePost->update(['fee_due_date1'=>'2019-12-09','fee_due_date2'=>'2019-12-09']);
		}
		return 'feePosts';
	}



}
