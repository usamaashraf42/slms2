<?php

namespace App\Http\Controllers\admins\Student\Academics\Dairy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\DairyHomeWorkRequest;
use App\Models\StudentDairy;

use App\Models\StudentDiaryManage;

use Session;
use Auth;
use DB;
class HomeWorkController extends Controller
{
    public function index(){
		$homeworks=StudentDairy::where('status',1)->paginate(20);
		return view('admin.student.Academics.Dairy.HomeWork.index',compact('homeworks'));
	}


	public function SearchAjax(Request $request){

		$limit = $request->input('length');
		$start = $request->input('start');
		$start = $start?$start+1:$start;
		$search = $request->input('search.value');
		$order_column_no = $request->input('order.0.column');
		$order_dir = $request->input('order.0.dir');
		$order_column_name = $request->input("columns.$order_column_no.data");
		$records = Branch::offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);


		if(Auth::user()->branch_id){
			$records->where('id',Auth::user()->branch_id);
		}
		if(Auth::user()->school_id){
			$records->where('school_id',Auth::user()->school_id);
		}
		if(Auth::user()->s_countryCode){
			$records->where('b_countryCode',Auth::user()->s_countryCode);
		}



		if(!empty($search)){

			$records->where('branch_name', 'like', "%{$search}%")
			->orWhere('mangerName','like',"%{$search}%")
			->orWhere('b_contactPerson','like',"%{$search}%")
			->orWhere('b_emil','like',"%{$search}%")
			->orWhere('status','like',"%{$search}%");

		}
		$data = $records->get();
		$totalFiltered = Branch::count();
		$json_data = array(
			"draw"      => intval($request->input('draw')),
			"recordsTotal"  => count($data),
			"recordsFiltered" => intval($totalFiltered),
			"data"      => $data
		);

		return response()->json($json_data, 200);
	}


	public function create(Request $request){
		return view('admin.student.Academics.Dairy.HomeWork.create',compact('branch','course','') );

	}
	public function store(ProdcatCategoryRequest $request){
		$branch=InvProductCategory::create([
			'pro_cat_name'=>$request->pro_cat_name,
			'created_by'=>Auth::id(),
		]);


		

		if(!$branch){
			Session::flash('error_message', 'Failed to inserted ');

		}else {
			Session::flash('success_message', 'Record Inserted Successfully');
		}

		return redirect(route('product-category.index'));
	}
	public function edit($id){
		$cat = InvProductCategory::find($id);
		if(!$cat){
			Session::flash('error_message',  'Record not found');
			return redirect(route('product-category.index'));
		}
		return View('admin.inventory.productCategory.edit',compact('cat','courses'));
	}


	public function productCategoryDelete(Request $request){
	// return $request->all();
		$cat=InvProductCategory::find($request->id);
		if(!$cat){
			return response()->json(['status'=>0]);
		}
		$cat->status=$cat->status?0:1;
		if($cat->save()){
			return response()->json(['status'=>1]);
		}
		else{
			return response()->json(['status'=>0]);
		}
	}

	public function update(ProdcatCategoryRequest $request, $id)
	{
		$branch = InvProductCategory::find($id);
		if(!$branch){
			Session::flash('error_message',  __('messages.Record not found'));
			return redirect(route('product-category.index'));
		}

		$branch->pro_cat_name=$request->pro_cat_name;

		if($branch->save())
			session()->flash('success_message', "Record update Successfully");
		else
			session()->flash('error_message', 'failed! To update');

		return redirect()->route('product-category.index');


	}

}
