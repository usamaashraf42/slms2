<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccountCategoryRequest;
use App\Models\AccountCategory;
use Session;
use Auth;
class AccountCategoryController extends Controller
{
    public function index(){
    	$categories=AccountCategory::get();
    	return view('admin.account.account-category.index',compact('categories'));
    }


     public function SearchAjax(Request $request){

        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start?$start+1:$start;
        $search = $request->input('search.value');
        $order_column_no = $request->input('order.0.column');
        $order_dir = $request->input('order.0.dir');
        $order_column_name = $request->input("columns.$order_column_no.data");
        $records = AccountCategory::with('parent')->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);
        if(!empty($search)){

            $records->where('name', 'like', "%{$search}%")
                ->orWhere('code','like',"%{$search}%")
                ->orWhere('status','like',"%{$search}%");

        }
        $data = $records->get();
        // return $data;
        $totalFiltered = AccountCategory::count();
        $json_data = array(
            "draw"      => intval($request->input('draw')),
            "recordsTotal"  => count($data),
            "recordsFiltered" => intval($totalFiltered),
            "data"      => $data
        );

        return response()->json($json_data, 200);
    }


    public function create(Request $request){
        $categories=AccountCategory::get();
        return view('admin.account.account-category.create',compact('categories'));

    }
    public function store(AccountCategoryRequest $request){
        
        $request->request->add([
            'created_by'=>Auth::id(),
            'last_updated_by'=>Auth::id(),
        ]);

        $customer=AccountCategory::create($request->all());

        if(!$customer){
            Session::flash('error_message', 'Failed to inserted ');
           
        }else {
            Session::flash('success_message', 'Record Inserted Successfully');
        }

            return redirect(route('account-category.index'));
    }
    public function edit($id){
        $category = AccountCategory::find($id);
        $categories=AccountCategory::get();
        if(!$category){
            Session::flash('error_message',  'Record failed to inserted');
            return redirect(route('account-category.index'));
        }
        return View('admin.account.account-category.edit',compact('category','categories'));
    }

    public function update(Request $request, $id)
    {
        
        $customer = AccountCategory::find($id);
        if(!$customer){
            Session::flash('error_message',  __('messages.Record not found'));
            return redirect(route('account-category.index'));
        }

        $request->request->add([
            'last_updated_by'=>Auth::id()
        ]);
        $data= $request->all();

        $affected = $customer->update($data);

        if($affected)
            session()->flash('success_message', "Record update Successfully");
        else
            session()->flash('error_message', 'failed! To update');

        return redirect()->route('account-category.index');


    }

}
