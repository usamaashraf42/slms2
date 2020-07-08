<?php

namespace App\Http\Controllers\Hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\salaryPostedRequest;
use App\Models\EmployeeSalaryPost;
use App\Models\EmployeeDate;
use App\Models\EmployeeProfidentFund;
use App\Models\EmployeeSalaryPostTemp;
use App\Models\User;
use App\Models\Employee;
use App\Models\PayrollItem;
use App\Models\Account;
use App\Models\Branch;
use App\Models\Master;
use App\Models\EmployeeSalary;

use Session;
use Auth;
use DB;
class EmployeeSalaryPostController extends Controller
{
	public function index(){

		$branch=Branch::with('courses');
    	if(Auth::user()->branch_id){
    		$branch->where('id',Auth::user()->branch_id);
    	}
    	$branches=$branch->get();
		return view('admin.Hr.SalaryPost.create',compact('branches'));
	}


	public function store(Request $request){


		// dd($request->all());
		$month=$request->month;
		$year=$request->year;
		$days=cal_days_in_month(CAL_GREGORIAN, $request->month, $request->year);

		$payroll=PayrollItem::orderBy('id','DESC')->first();
		$employee=Employee::orderBy("emp_id",'ASC')->with('Employeesalary')->whereHas('Employeesalary')->where('status',1);
		
		if($request->employee_id && $request->employee_id>0){
			$employee->where('emp_id',$request->employee_id);
		}

		if($request->branch_id && $request->branch_id>0){
			$employee->where('branch_id',$request->branch_id);
		}

		if(Auth::user()->branch_id){
			$employee->where('branch_id',Auth::user()->branch_id);
		}

		$employees=$employee->get();


		

		if(!count($employees)){
			session()->flash('error_message', __('Failed! To Insert Record'));
			return redirect()->back();
		}
		$data=array();
		foreach ($employees as $emplo) {
			$salary=(isset($emplo->Employeesalary->monthly_salary)?$emplo->Employeesalary->monthly_salary:$emplo->salary);
			$daily=round($salary/$days);


			$total_present=0;
			$total_absent=0;
			$total_leave=0;
			$total_e_off=0;
			$holidays=0;

			$EmployeeDateByMonth=EmployeeDate::where('emp_id',$employees[0]->emp_id)->with('attendance')->whereMonth('attendance_date',$month)->whereYear('attendance_date',$year)->get();
			foreach ($EmployeeDateByMonth as $emp_attandance) {
				// dd($emp_attandance);
				if($emp_attandance->absent){
					$total_absent++;
				}
				
				if($emp_attandance->holiday_id){
					$holidays++;
				}
				if($emp_attandance->leave_id){
					$total_leave++;
				}

				if($emp_attandance->present){
					$total_present++;
					foreach ($emp_attandance->attendance as $attand) {

					}

				}


			}

			$object = new \stdClass;


			$object->emp_id=$emplo->emp_id;
			$object->emp_name=$emplo->name;

			$object->total_absent=$emplo->name;
			$object->absent_fine=$emplo->name;

			$object->total_late=$emplo->name;
			$object->late_fine=$emplo->name;

			$object->total_e_off=$emplo->name;
			$object->e_off_fine=$emplo->name;

			$object->total_leave=$emplo->name;
			$object->leave_fine=$emplo->name;

			$object->total_salary=$emplo->name;
			$object->ta=$emplo->name;
			$object->medical=$emplo->name;
			$object->tax=$emplo->name;
			$object->security=$emplo->name;
			$object->advance=$emplo->name;
			$object->pf=$emplo->name;
			$object->pf_amount=$emplo->name;
			$object->net_salary=$emplo->name;

			$data[]=$object;

			
		}


		
		

		return view('admin.Hr.SalaryPost.index',compact('employees','month','year','days','payroll'));
		

	}





	public function salaryPosted(salaryPostedRequest $request){


		// dd($request->all());
		$payroll=PayrollItem::orderBy('id','DESC')->first();
		$users=Employee::whereIn('emp_id',$request->emp_ids)->get();
		$days=cal_days_in_month(CAL_GREGORIAN, $request->month, $request->year);
		$month=$request->month;
		$year=$request->year;
		foreach ($users as $emp) {

			$presents=0;
			$absents=0;
			$leave_ids=0;
			$holiday_ids=0;
			$employeeDate=$emp->EmployeeDateByMonth($month,$year);
			$monthly_salary=isset($emp->Employeesalary->monthly_salary)?$emp->Employeesalary->monthly_salary:0;
			$ta=isset($emp->Employeesalary->ta)?$emp->Employeesalary->ta:0;

			$medical=isset($emp->Employeesalary->medical)?$emp->Employeesalary->medical:0;
			$house_rent=isset($emp->Employeesalary->house_rent)?$emp->Employeesalary->house_rent:0;
			$transport=isset($emp->Employeesalary->transport)?$emp->Employeesalary->transport:0;
			$mobile=isset($emp->Employeesalary->mobile)?$emp->Employeesalary->mobile:0;

			$oneDay=$monthly_salary/$days;
			foreach ($employeeDate as $emp_day) {
				if($emp_day->present){
					$presents++;
				}
				if($emp_day->absent){
					$absents++;
				}
				if($emp_day->leave_id){
					$leave_ids++;
				}
				if($emp_day->holiday_id){
					$holiday_ids++;
				}
			}

			$pf=isset($payroll->pf)?$payroll->pf:0;
			// dd($pf);
			$eobi=isset($payroll->eobi)?$payroll->eobi:0;
			$tax=isset($payroll->tax)?$payroll->tax:0;
			$paidDays=$presents + $leave_ids + $holiday_ids;
			$paidAmount=($paidDays * $oneDay) ;
			$pfAmount=$pf*$paidAmount/100;
			$advance=0;
			$security=0;
			$carry_forward=isset($emp->salary->carry_forward)?$emp->salary->carry_forward:0;

			$annual_salary=$monthly_salary*12;


			$incomeTax=\App\Models\IncomeTax::where('annual_start_amount','<=',$annual_salary)->where('annual_end_amount','>=',$annual_salary)->first();

			$fixTax=isset($incomeTax->fix_tax)?$incomeTax->fix_tax:0;

			$total_amount=$annual_salary - (isset($incomeTax->after_amount_percentage)?$incomeTax->after_amount_percentage:0);
			$per_amount_afterPrice=0;
			if($total_amount>0){
				$per_amount_afterPrice= ($total_amount * (isset($incomeTax->per_tax)?$incomeTax->per_tax:0))/100;
			}

			$total_tax_amount_df=$per_amount_afterPrice + $fixTax;
			$eobi_deduction= ($eobi * $paidAmount/100);
			$total_given_salary=$paidAmount + $ta - $pfAmount - $total_tax_amount_df - $eobi_deduction - $security - $advance ;

			DB::beginTransaction();

			$checkSalary=EmployeeSalaryPost::where('employee_id',$emp->emp_id)->where('month',$request->month)->where('year',$request->year)->where('monthly_salary','>',0)->first();
			if(!$checkSalary){
				// dd($pfAmount);
				// `employee_id`, `branch_id`, `month`, `year`, `current_salay`, `monthly_salary`, `insurance_deduction`, `total_insurance`, `total_insurance_install`, `pf`, `ta`, `medical`, `house_rent`, `transport`, `mobile`, `advance_deduction`, `total_leaves`, `prevBalance`, `carryForward`, `total_absent`, `total_days`, `total_present`, `latedays`, `Earlyoffdays`, `totaldeductdays`, `totalpaydays`, `misc1_des`, `misc1`, `misc2_desc`, `misc2`, `total_salary`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`, `carry_forward`, `adminCreditDays`, `tbPF`, `EOBI`, `summerSalary`, `actualSalaryGiven`, `paidFromBankid`, `chkCashed`, `dopost`, `isApproved`, `isUnapproved`, `approvalRemarks`, `approvalStatusUpdatedOn`, `advance`, `tax`, `security`,'total_holidays'


				$salaryPosted=EmployeeSalaryPost::create([
					'employee_id'=>$emp->emp_id,
					'branch_id'=>$emp->branch_id,
					'month'=>$request->month,
					'year'=>$request->year,
					'monthly_salary'=>$monthly_salary,
					'current_salay'=>$monthly_salary,
					'monthly_salary'=>$monthly_salary,
					'dopost'=>date('Y-m-d'),
					'carry_forward'=>0,
					'carryForward'=>0,
					'prevBalance'=>0,
					'total_holidays'=>$holiday_ids,
				// 'insurance_deduction'=>$t_insurance,
				// 'total_insurance'=>$total_insurance,
				// 'total_insurance_install'=>$total_insurance_install,
					'security'=>$security,
					'pf'=>$pf,
					'tbPF'=>$pfAmount,
					'EOBI'=>$request->eobi_deduction,
					'totalpaydays'=>$paidDays,
					'totaldeductdays'=>$days-$paidDays,
					'total_days'=>$days,
					'tax'=>$total_tax_amount_df,
					'ta'=>$ta,
					'medical'=>$medical,
					'house_rent'=>$house_rent,
					'transport'=>$transport,
					'mobile'=>$mobile,
					'advance_deduction'=>$advance,
					'total_leaves'=>$leave_ids,
					'total_absent'=>$days-$presents,
					'isApproved'=>$request->isApproved,
					'total_present'=>$presents,
					'total_salary'=>$total_given_salary,
					'actualSalaryGiven'=>$total_given_salary,
					'description'=>"Salary posted of ".getMonthName($request->month). "$request->year",
					'created_by'=>Auth::user()->id,
					'updated_by'=>Auth::user()->id,

				]);
				if($salaryPosted){
					DB::commit();
					// $pf_fund_effected=EmployeeProfidentFund::create([
					// 	'employee_id'=>$emp->id,
					// 	'month'=>$request->month,
					// 	'year'=>$request->year,
					// 	'pf_amount'=>$pfAmount
					// ]);
					// if($pf_fund_effected){
					// 	DB::commit();
					// 	// $account=Account::where('user_id',$emp->id)->first();
					// 	// if(!$account){
					// 	// 	$account=Account::create([
					// 	// 		'user_id'=>$emp->id,
					// 	// 		'name'=>$emp->name,
					// 	// 		'type'=>'employee'
					// 	// 	]);
					// 	// }

					// 	// $master=Master::where('account_id',$account->id)->orderBy('id','DESC')->first();
					// 	// $ledger=[
					// 	// 	'salary_id'=>isset($salaryPosted)?$salaryPosted->id:null,
					// 	// 	'a_credit'=>isset($total_given_salary)?$total_given_salary:0,
					// 	// 	'account_id'=>$account->id,
					// 	// 	'a_debit'=>0,
					// 	// 	'balance'=>isset($master->balance)?$master->balance-$total_given_salary:(-$total_given_salary),
					// 	// 	'posting_date'=>date('Y-m-d'),
					// 	// 	'description'=>"Salary Post of ". getMonthName($request->month) ."$request->year",
					// 	// 	'month'=>$request->month,
					// 	// 	'year'=>$request->year,
					// 	// 	'created_by'=>Auth::user()->id,
					// 	// 	'updated_by'=>Auth::user()->id,
					// 	// ];
					// 	// $std=Master::create($ledger);
					// 	if($std){
					// 		DB::commit();
					// 	}else{
					// 		DB::rollBack();
					// 	}

					// }else{
					// 	DB::rollBack();
					// }
				}else{
					DB::rollBack();
				}
			}
			

			
		}


		if(isset($salaryPosted) && $salaryPosted){
			session()->flash('success_message', __('Record Inserted Successfully'));
		}else{

			session()->flash('error_message', __('Failed! To Insert Record'));
		}
		return redirect()->back();
	}


	public function EmployeeSalaryPostTemp(Request $request){

		// return $request->all();

		$emp=Employee::where('emp_id',$request->emp_id)->first();
		$days=cal_days_in_month(CAL_GREGORIAN, $request->month, $request->year);
		$month=$request->month;
		$year=$request->year;

		if(isset($emp) && ($emp)){

			$employeeDate=EmployeeDate::where('emp_id',$request->emp_id)->whereMonth('attendance_date',$month)->whereYear('attendance_date',$year)->get();


			$monthly_salary=isset($emp->Employeesalary->monthly_salary)?$emp->Employeesalary->monthly_salary:0;
			$ta=isset($emp->Employeesalary->ta)?$emp->Employeesalary->ta:0;

			$pf=round(isset($emp->Employeesalary->pf)?$emp->Employeesalary->pf:0);
			

			$medical=isset($emp->Employeesalary->medical)?$emp->Employeesalary->medical:0;
			$house_rent=isset($emp->Employeesalary->house_rent)?$emp->Employeesalary->house_rent:0;
			$transport=isset($emp->Employeesalary->transport)?$emp->Employeesalary->transport:0;
			$mobile=isset($emp->Employeesalary->mobile)?$emp->Employeesalary->mobile:0;

			$presents=0;
			$absents=0;
			$leave_ids=0;
			$holiday_ids=0;
			$late=0;
			$e_off=0;
			$given_salary=$monthly_salary;
			$today_salary=$monthly_salary/$days;
			$one_fourth_salary=$today_salary/4;


			foreach ($employeeDate as $emp_day) {
				if($emp_day->present){
					$presents++;
				}
				if($emp_day->absent){
					$absents++;
				}
				if($emp_day->leave_id){
					$leave_ids++;
				}
				if($emp_day->holiday_id){
					$holiday_ids++;
				}
				if($emp_day->late){
					$late++;
				}
				if($emp_day->e_off){
					$e_off++;
				}
			}
			$absent_fine=0;
			if($absents && $absents ){
				$absent_fine=($absents)*$today_salary;
			}
			$late_fine=0;
			if($late && $late>2 ){
				$late_fine=($late-2)*$one_fourth_salary;
			}
			$e_off_fine=0;
			if($e_off && $e_off>2 ){
				$e_off_fine=($e_off-2)*$one_fourth_salary;
			}
			
			// $late_fine=$late*$one_fourth_salary;
			// $e_off_fine=$e_off*$one_fourth_salary;

			$given_salary=$given_salary-$absent_fine-$late_fine-$e_off_fine;

			$pf_deduction=((isset($emp->Employeesalary->monthly_salary)?$emp->Employeesalary->monthly_salary:0)*$pf )/100;

			$data=EmployeeSalaryPostTemp::where([
				'emp_id'=>$request->emp_id,
				'month'=>$request->month,
				'year'=>$request->year])->first();
			if(!$data){
				$data=EmployeeSalaryPostTemp::create([
					'emp_id'=>$request->emp_id,
					'month'=>$request->month,
					'year'=>$request->year,
					'monthly_salary'=>$monthly_salary,
					'total_days'=>$days,
					'present_days'=>$presents,
					'absent'=>$absents,
					'leaves'=>$leave_ids,
					'e_off'=>$e_off,
					'late'=>$late,
					'pf'=>$pf,
					'pf_deduction'=>$pf_deduction,
					'given_salary'=>$given_salary,

					'branch_id'=>$emp->branch_id,
					'requested_comment'=>$request->comment

				]);

			}else{
				$data=EmployeeSalaryPostTemp::where([
					'emp_id'=>$request->emp_id,
					'month'=>$request->month,
					'year'=>$request->year])->update([
					'emp_id'=>$request->emp_id,
					'month'=>$request->month,
					'year'=>$request->year,
					'monthly_salary'=>$monthly_salary,
					'total_days'=>$days,
					'present_days'=>$presents,
					'pf'=>$pf,
					'pf_deduction'=>$pf_deduction,
					'absent'=>$absents,
					'leaves'=>$leave_ids,
					'e_off'=>$e_off,
					'late'=>$late,
					'branch_id'=>$emp->branch_id,
					'given_salary'=>$given_salary,
					'requested_comment'=>$request->comment

				]);
			}

			
		}

		if(isset($data) && $data){
			return response()->json(['data'=>$data,'status'=>1]);
		}else{
			return response()->json(['status'=>0]);
		}
	}

}
