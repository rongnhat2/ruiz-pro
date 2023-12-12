<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\BannerRepository;
use App\Models\Banner;  
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class BannerController extends Controller
{
    protected $banner; 

    public function __construct(Banner $banner ){
        $this->banner             = new BannerRepository($banner);  
    }
    public function index(){
        return view("admin.manager.banner");
    }

    public function get(){
        $data = $this->banner->get_all();
        return $this->banner->send_response(201, $data, null);
    }

    public function get_one($id){
        $data = $this->banner->get_one($id);
        return $this->banner->send_response(200, $data, null);
    }
 
    public function store(Request $request){ 
        $data = [  
            "product_id"          => $request->product_id,  
            "status"   => 1,  
        ];
        if ($request->data_image != "null") {
            $data["image"] = $this->banner->imageInventor('images', $request->data_image, 1920);
        }
        $data_create = $this->banner->create($data); 
        return $this->banner->send_response("Create successful", $data_create, 201);
    }

    public function update(Request $request){  
        $data = [ 
            "product_id"          => $request->product_id,
        ]; 
        if ($request->data_image != "null") {
            $data["image"] = $this->banner->imageInventor('images', $request->data_image, 1920);
        }
        $data_update = $this->banner->update($data, $request->data_id);
        return $this->banner->send_response("Update successful", $data_update, 200);
    }

    public function delete($id){
        $this->banner->delete($id); 
        return $this->banner->send_response(200, "Delete successful", null);
    } 
}
