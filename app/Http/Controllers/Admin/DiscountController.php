<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\DiscountRepository;
use App\Models\Discount;  
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class DiscountController extends Controller
{
    protected $discount; 

    public function __construct(Discount $discount ){
        $this->discount             = new DiscountRepository($discount);  
    }
    public function index(){
        return view("admin.manager.discount");
    }

    public function get(){
        $data = $this->discount->get_all();
        return $this->discount->send_response(201, $data, null);
    }

    public function get_one($id){
        $data = $this->discount->get_one($id);
        return $this->discount->send_response(200, $data, null);
    }
 
    public function store(Request $request){ 
        $data = [  
            "product_id"          => $request->product_id,  
            "valuation"          => $request->data_valuation,   
            "status"   => 1,  
        ];

        $data_create = $this->discount->create($data); 
        return $this->discount->send_response("Create successful", $data_create, 201);
    }

    public function update(Request $request){  
        $data = [ 
            "product_id"          => $request->product_id,
        ]; 
        $data_update = $this->discount->update($data, $request->data_id);
        return $this->discount->send_response("Update successful", $data_update, 200);
    }

    public function delete($id){
        $this->discount->delete($id); 
        return $this->discount->send_response(200, "Delete successful", null);
    } 
}
