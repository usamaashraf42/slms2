<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProdcatCategoryRequest;

use App\Models\InvProductCategory;
use Session;
use Auth;
use DB;
class ProductSubCategoryController extends Controller
{
	public function index(){
		$categories=InvProductCategory::where('parent_id','<>',null)->get();
		return view('admin.inventory.productSubCategory.index',compact('categories'));
	}





	public function create(Request $request){
		$categories=InvProductCategory::where('parent_id',null)->get();
		return view('admin.inventory.productSubCategory.create',compact('categories'));

	}
	public function store(ProdcatCategoryRequest $request){
		// dd($request->all());
		$branch=InvProductCategory::create([
			'pro_cat_name'=>$request->pro_cat_name,
			'parent_id'=>$request->parent_id,
			'created_by'=>Auth::id(),
		]);




		if(!$branch){
			Session::flash('error_message', 'Failed to inserted ');

		}else {
			Session::flash('success_message', 'Record Inserted Successfully');
		}

		return redirect(route('product-sub-category.index'));
	}
	public function edit($id){
		$cat = InvProductCategory::find($id);
		$categories=InvProductCategory::where('parent_id',null)->get();
		if(!$cat){
			Session::flash('error_message',  'Record not found');
			return redirect(route('product-sub-category.index'));
		}
		return View('admin.inventory.productSubCategory.edit',compact('cat','categories'));
	}


	public function productCategoryDelete(Request $request){
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

	public function update(Request $request, $id)
	{
		$branch = InvProductCategory::find($id);
		if(!$branch){
			Session::flash('error_message',  __('messages.Record not found'));
			return redirect(route('product-sub-category.index'));
		}

		$branch->pro_cat_name=$request->pro_cat_name;
		$branch->parent_id=$request->parent_id;

		if($branch->save())
			session()->flash('success_message', "Record update Successfully");
		else
			session()->flash('error_message', 'failed! To update');

		return redirect()->route('product-sub-category.index');


	}
}
