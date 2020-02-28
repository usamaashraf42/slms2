<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InvProductCategory;
use App\Models\InvInventory;

use App\Models\InvProduct;
use App\Models\InvOrder;
use App\Models\School;
use App\Models\Branch;
use Session;
use Auth;
use DB;
class InventoryController extends Controller
{
    public function index(){
    	$inventories=InvInventory::orderBy('branch_id','ASC')->orderBy('cat_id','ASC')->orderBy('sub_id','ASC')->where('qty','>',0)->get();
    	return view('admin.inventory.inventory.index',compact('inventories'));
    }
}
