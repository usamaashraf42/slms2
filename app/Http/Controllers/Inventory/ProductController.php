<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProdcatRequest;
use App\Models\InvProductCategory;
use App\Models\InvProduct;
use App\Models\InvOrder;

use Session;
use Auth;
use DB;
class ProductController extends Controller
{
    public function index(){
		$products=InvProduct::where('status',1)->get();
		return view('admin.inventory.product.index',compact('products'));
	}


	public function closedProduct (Request $request){

		$limit = $request->input('length');
		$start = $request->input('start');
		$start = $start?$start+1:$start;
		$search = $request->input('search.value');
		$order_column_no = $request->input('order.0.column');
		$order_dir = $request->input('order.0.dir');
		$order_column_name = $request->input("columns.$order_column_no.data");
		$records = InvOrder::where('order_status',2)->with('product','branch','category','sub_category')->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);


		if(Auth::user()->branch_id){
			$records->where('branch_id',Auth::user()->branch_id);
		}
		if(Auth::user()->school_id){
			$records->where('school_id',Auth::user()->school_id);
		}
		


		if(!empty($search)){

			$records->where('pro_id', 'like', "%{$search}%")
			->orWhere('order_id','like',"%{$search}%")
			->orWhere('cat_id','like',"%{$search}%")
			->orWhere('sub_cat_id','like',"%{$search}%")
			->orWhere('order_status','like',"%{$search}%");

		}
		$data = $records->get();
		$totalFiltered = InvOrder::where('order_status',2)->count();
		$json_data = array(
			"draw"      => intval($request->input('draw')),
			"recordsTotal"  => count($data),
			"recordsFiltered" => intval($totalFiltered),
			"data"      => $data
		);

		return response()->json($json_data, 200);
	}

	public function cancelled_orders(Request $request){

		$limit = $request->input('length');
		$start = $request->input('start');
		$start = $start?$start+1:$start;
		$search = $request->input('search.value');
		$order_column_no = $request->input('order.0.column');
		$order_dir = $request->input('order.0.dir');
		$order_column_name = $request->input("columns.$order_column_no.data");
		$records = InvOrder::where('order_status',0)->with('product','branch','category','sub_category')->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);


		if(Auth::user()->branch_id){
			$records->where('branch_id',Auth::user()->branch_id);
		}
		if(Auth::user()->school_id){
			$records->where('school_id',Auth::user()->school_id);
		}
		


		if(!empty($search)){

			$records->where('pro_id', 'like', "%{$search}%")
			->orWhere('order_id','like',"%{$search}%")
			->orWhere('cat_id','like',"%{$search}%")
			->orWhere('sub_cat_id','like',"%{$search}%")
			->orWhere('order_status','like',"%{$search}%");

		}
		$data = $records->get();
		$totalFiltered = InvOrder::where('order_status',2)->count();
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
		return view('admin.inventory.product.create',compact('categories'));

	}
	public function store(ProdcatRequest $request){
		// dd($request->all());

		// `pro_name`, `cat_id`, `sub_cat_id`, `pro_type`, `status`, `description`, `created_by`, `updated_by`, `price`, `retail_price`, `trade_price`,
		if($request->hasfile('images')){
    		$Extension_profile = $request->file('images')->getClientOriginalExtension();
    		$profile = 'product'.'_'.date('YmdHis').'.'.$Extension_profile;
    		$request->file('images')->move('images/Inventory/product/', $profile);
    	}
		$branch=InvProduct::create([
			'images'=>isset($profile)?$profile:'no-image.png',
			'pro_name'=>$request->pro_name,
			'cat_id'=>$request->cat_id,
			'sub_cat_id'=>$request->sub_cat_id,
			'description'=>$request->description,
			'price'=>$request->price,
			'retail_price'=>$request->retail_price,
			'trade_price'=>$request->trade_price,
			'created_by'=>Auth::id(),
		]);

		if(!$branch){
			Session::flash('error_message', 'Failed to inserted ');

		}else {
			Session::flash('success_message', 'Record Inserted Successfully');
		}

		return redirect(route('product.index'));
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

	public function update(ProdcatRequest $request, $id)
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


	public function productCategoryHasSubCategory(Request $request){
		$data = InvProductCategory::where('parent_id',$request->id)->get();
		if(!count($data)){
			return response()->json(['status'=>0]);
		}
		return response()->json(['status'=>1,'data'=>$data]);
	}

	public function SubCategoryHasProduct(Request $request){
		$data=InvProduct::where('status',1)->where('sub_cat_id',$request->id)->get();
		if(!count($data)){
			return response()->json(['status'=>0]);
		}
		return response()->json(['status'=>1,'data'=>$data]);
	}

	public function productGetById(Request $request){
		// return $request->all();
		$data=InvProduct::where('pro_id',$request->id)->first();
		if(!($data)){
			return response()->json(['status'=>0]);
		}
		return response()->json(['status'=>1,'data'=>$data]);

	}


	public function get_product(Request $request){
		 $accounts = InvProduct::orderBy('pro_id','desc')->limit(20);
        $filter = $request->input('q');
        if(!empty($filter)){  
            $accounts->where('pro_id', 'like', "%{$filter}%")
            ->orWhere('pro_name', 'like', "%{$filter}%")
            ->orWhere('pro_type', 'like', "%{$filter}%")
            ->orWhere('description', 'like', "%{$filter}%");
        }

        
        $data=$accounts->get();
        if($data){
            $status = true;
            return response()->json($data, 200);
        }
        else
        {
          return response()->json($data, 200);
      }
	}
}
