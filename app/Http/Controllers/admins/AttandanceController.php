<?php

namespace App\Http\Controllers\admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Student;
use App\Models\StudentDate;

class AttandanceController extends Controller
{


	public function index(){
		return view('admin.student.attendance.index');
	}
    public function updateStatus(Request $request){
    	
    	dd($request->all());
    }

    public function get_student_attandence(Request $request){
    	$limit = $request->input('length');
        $start = $request->input('start');
        $start = $start?$start+1:$start;
        $search = $request->input('search.value');
        $order_column_no = $request->input('order.0.column');
        $order_dir = $request->input('order.0.dir');
        $order_column_name = $request->input("columns.$order_column_no.data");

        $records = StudentDate::with('student.course','attendance')->orderBy('id','DESC')->offset($start)->limit($limit)->orderBy($order_column_name,$order_dir);
        if(!empty($search)){

            $records->where('attendance_date', 'like', "%{$search}%")
                ->orWhere('std_id','like',"%{$search}%");

        }
        $data = $records->get();
        // return $data;
        $totalFiltered = StudentDate::count();
        $json_data = array(
            "draw"      => intval($request->input('draw')),
            "recordsTotal"  => count($data),
            "recordsFiltered" => intval($totalFiltered),
            "data"      => $data
        );

        return response()->json($json_data, 200);
    }
}
