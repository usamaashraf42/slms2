<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\InvProductCategory;
use App\Models\InvProduct;
use App\Models\InvOrderDetail;
use App\Models\InvOrder;
use App\Models\School;
use App\Models\Branch;
use Session;
use Auth;
use DB;
class OrderController extends Controller
{
	public function index(){
		$products=InvProduct::where('status',1)->get();
		$categories=InvProductCategory::where('parent_id',null)->get();
		$orders=InvOrder::where('order_status',1)->where('is_paid',1)->get();
		$branch=Branch::where('status',1);

		if(Auth::user()->branch_id){
			$branch->where('id',Auth::user()->branch_id);
		}
		if(Auth::user()->s_countryCode){
			$branch->where('b_countryCode',Auth::user()->s_countryCode);
		}
		if(Auth::user()->school_id){
			$branch->where('school_id',Auth::user()->school_id);
		}
		$branches=$branch->get();
		$school=School::where('school_status',1);
		if(Auth::user()->school_id){
			$school->where('id',Auth::user()->school_id);
		}
		$schools=$school->get();
		return view('admin.inventory.order.index',compact('products','categories','orders','schools','branches'));
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
		$categories=InvProductCategory::where('parent_id',null)->get();
		$branch=Branch::where('status',1);

		if(Auth::user()->branch_id){
			$branch->where('id',Auth::user()->branch_id);
		}
		if(Auth::user()->s_countryCode){
			$branch->where('b_countryCode',Auth::user()->s_countryCode);
		}
		if(Auth::user()->school_id){
			$branch->where('school_id',Auth::user()->school_id);
		}
		$branches=$branch->get();
		$school=School::where('school_status',1);
		if(Auth::user()->school_id){
			$school->where('id',Auth::user()->school_id);
		}
		$schools=$school->get();
        // dd($schools);
		return view('admin.inventory.product.create',compact('categories','branches','schools'));

	}
	public function store(OrderRequest $request){
		// dd($request->all());
		 // `pro_id`, `school_id`, `branch_id`, `cat_id`, `sub_cat_id`, `qty`, `price`,
		$order=InvOrder::create([
			'type'=>$request->type,
			'school_id'=>$request->school_id,
			'branch_id'=>$request->branch_id,
			// 'pro_id'=>$request->pro_id,
			'cat_id'=>$request->cat_id,
			'sub_cat_id'=>$request->sub_cat_id,
			'description'=>$request->description,
			// 'price'=>$request->price,
			// 'qty'=>$request->qty,
			'created_by'=>Auth::id(),
		]);

		if($order && isset($order->id) && isset($request->pro_id) && is_array($request->pro_id) ){
			for($i=0; $i<count($request->pro_id); $i++){
				if(isset($request->pro_id[$i])){
					InvOrderDetail::create([
						'order_id'=>$order->id,
						'pro_id'=>$request->pro_id[$i],
						'qty'=>isset($request->qty[$i])?$request->qty[$i]:0,
						'pro_total_price'=>isset($request->price[$i])?$request->price[$i]:0

					]);

				}
			}
		}
		
		
		if(!$order){
			Session::flash('error_message', 'Failed to inserted ');

		}else {


			Session::flash('success_message', 'Record Inserted Successfully');
		}

		return redirect(route('order.index'));
	}
	public function edit($id){

		$cat = InvProduct::where('pro_id',$id)->first();
		if(!$cat){
			Session::flash('error_message',  'Record not found');
			return redirect(route('product.index'));
		}
		$categories=InvProductCategory::where('parent_id',null)->get();
		return View('admin.inventory.product.edit',compact('cat','categories'));
	}


	public function productDelete(Request $request){
	// return $request->all();
		$cat=InvProduct::find($request->id);
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

	public function update(OrderRequest $request, $id)
	{
		$branch = InvProduct::where('pro_id',$id)->first();
		if(!$branch){
			Session::flash('error_message',  __('messages.Record not found'));
			return redirect(route('product.index'));
		}

		if($request->hasfile('images')){
			$Extension_profile = $request->file('images')->getClientOriginalExtension();
			$profile = 'product'.'_'.date('YmdHis').'.'.$Extension_profile;
			$request->file('images')->move('images/Inventory/product/', $profile);
		}

		$branch=InvProduct::where('pro_id',$id)->update([
			'images'=>isset($profile)?$profile:'no-image.png',
			'pro_name'=>$request->pro_name,
			'cat_id'=>$request->cat_id,
			'sub_cat_id'=>$request->sub_cat_id,
			'description'=>$request->description,
			'price'=>$request->price,
			'retail_price'=>$request->retail_price,
			'trade_price'=>$request->trade_price,
		]);

		if($branch)
			session()->flash('success_message', "Record update Successfully");
		else
			session()->flash('error_message', 'failed! To update');

		return redirect()->route('product.index');


	}


	public function cancelOrder( Request $request){
		$cat=InvOrder::where('order_id',$request->id)->first();
		if(!$cat){
			return response()->json(['status'=>0]);
		}
		if(InvOrder::where('order_id',$request->id)->update(['order_status'=>0])){
			return response()->json(['status'=>1]);
		}
		else{
			return response()->json(['status'=>0]);
		}
	}
	public function deliverOrder( Request $request){
		// return $request->all();
		$cat=InvOrder::where('order_id',$request->id)->first();
		if(!$cat){
			return response()->json(['status'=>0]);
		}
		if(InvOrder::where('order_id',$request->id)->update(['order_status'=>2])){
			return response()->json(['status'=>1]);
		}
		else{
			return response()->json(['status'=>0]);
		}
	}


	public function deliver($id){

		$branch=Branch::where('status',1);

		if(Auth::user()->branch_id){
			$branch->where('id',Auth::user()->branch_id);
		}
		if(Auth::user()->s_countryCode){
			$branch->where('b_countryCode',Auth::user()->s_countryCode);
		}
		if(Auth::user()->school_id){
			$branch->where('school_id',Auth::user()->school_id);
		}
		$branches=$branch->get();
		$school=School::where('school_status',1);
		if(Auth::user()->school_id){
			$school->where('id',Auth::user()->school_id);
		}
		$schools=$school->get();

		$products=InvProduct::where('status',1)->get();


		$order=InvOrder::where('order_id',$id)->first();
		if(!$order){
			session()->flash('error_message', 'failed! Record not found');
			return redirect()->back();
		}

		return view('admin.inventory.order.deliver',compact('order','schools','branches','products'));

	}
	

}
