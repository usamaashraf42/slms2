<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BankChecqueRequest;
use App\Models\Student;
use App\Models\Bank;
use App\Models\Account;
use App\Models\Checque;
use Session;
use Auth;

class BankChecqueController extends Controller
{
    function __construct()
    {
         $this->middleware('role_or_permission:Checque Book Add', ['only' => ['create','store']]);
         // $this->middleware('role_or_permission:Checque', ['only' => ['index']]);
         
    }


    public function index(){
        // dd(Checque::with('bank','account','detail.IssueAccount')->where('status',1)->get());
        return view('admin.account.checqueBook.index');
    }
    
    public function create(){
    	$banks=Bank::get(); 
    	return view('admin.account.checqueBook.create',compact('banks'));
    }

    public function store(BankChecqueRequest $request){
    	// dd($request->all());
    	$bank=Account::where('id',$request->account_id)->first();

        for($i=$request->cheque_start;$i<=$request->cheque_end; $i++){
            $checque=Checque::create([
                'bank_id'=>$bank->bank_id,
                'account_id'=>$bank->id,
                'checque_no'=>$i,

                'account_id'=>$request->account_id,
                'cheque_start'=>$request->cheque_start,
                'cheque_end'=>$request->cheque_end,
                'cheque_book_issue_date'=>date('Y-m-d',strtotime($request->cheque_book_issue_date))
            ]);
        }
        if($checque){
                session()->flash('success_message', __('Record Inserted Successfully'));
        }else{
                session()->flash('error_message', __('Failed! To update Record'));
        }
        return redirect()->back();
    }
    public function AvailableChecque(Request $request){

        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start?$start+1:$start;
        $search = $request->input('search.value');
        $order_column_no = $request->input('order.0.column');
        $order_dir = $request->input('order.0.dir');
        $order_column_name = $request->input("columns.$order_column_no.data");
        $records = Checque::with('bank','account')->where('status',0)->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);
        if(!empty($search)){

            $records->where('checque_no', 'like', "%{$search}%")
                ->orWhere('status','like',"%{$search}%");

        }
        $data = $records->get();
        // return $data;
        $totalFiltered = Checque::count();
        $json_data = array(
            "draw"      => intval($request->input('draw')),
            "recordsTotal"  => count($data),
            "recordsFiltered" => intval($totalFiltered),
            "data"      => $data
        );

        return response()->json($json_data, 200);
    }
    public function IssuedChecque(Request $request){

        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start?$start+1:$start;
        $search = $request->input('search.value');
        $order_column_no = $request->input('order.0.column');
        $order_dir = $request->input('order.0.dir');
        $order_column_name = $request->input("columns.$order_column_no.data");
        $records = Checque::with('bank','account','detail.IssueAccount')->where('status',1)->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);
        if(!empty($search)){

            $records->where('checque_no', 'like', "%{$search}%")
                ->orWhere('status','like',"%{$search}%");

        }
        $data = $records->get();
        // return $data;
        $totalFiltered = Checque::where('status',1)->count();
        $json_data = array(
            "draw"      => intval($request->input('draw')),
            "recordsTotal"  => count($data),
            "recordsFiltered" => intval($totalFiltered),
            "data"      => $data
        );

        return response()->json($json_data, 200);
    }
    public function ClearChecque(Request $request){

        $limit = $request->input('length');
        $start = $request->input('start');
        $start = $start?$start+1:$start;
        $search = $request->input('search.value');
        $order_column_no = $request->input('order.0.column');
        $order_dir = $request->input('order.0.dir');
        $order_column_name = $request->input("columns.$order_column_no.data");
        $records = Checque::with('bank','account','detail.IssueAccount')->where('status',2)->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);
        if(!empty($search)){

            $records->where('checque_no', 'like', "%{$search}%")
                ->orWhere('status','like',"%{$search}%");

        }
        $data = $records->get();
        // return $data;
        $totalFiltered = Checque::where('status',2)->count();
        $json_data = array(
            "draw"      => intval($request->input('draw')),
            "recordsTotal"  => count($data),
            "recordsFiltered" => intval($totalFiltered),
            "data"      => $data
        );

        return response()->json($json_data, 200);
    }
}
