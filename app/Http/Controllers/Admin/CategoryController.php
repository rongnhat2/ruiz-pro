<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\CategoryRepository;
use App\Models\Category;  
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class CategoryController extends Controller
{
    protected $category; 

    public function __construct(Category $category ){
        $this->category             = new CategoryRepository($category);  
    }
    public function index(){
        return view("admin.manager.category");
    }

    public function get(){
        $data = $this->category->get_all();
        return $this->category->send_response(201, $data, null);
    }

    public function get_one($id){
        $data = $this->category->get_one($id);
        return $this->category->send_response(200, $data, null);
    }
 
    public function store(Request $request){ 
        $data = [  
            "name"          => $request->data_name,  
            "description"   => $request->data_description,  
        ]; 
        $data_create = $this->category->create($data); 
        return $this->category->send_response("Create successful", $data_create, 201);
    }

    public function update(Request $request){  
        $data = [ 
            "name"          => $request->data_name,  
            "description"   => $request->data_description, 
        ];  
        $data_update = $this->category->update($data, $request->data_id);
        return $this->category->send_response("Update successful", $data_update, 200);
    }

    public function delete($id){
        $this->category->delete($id); 
        return $this->category->send_response(200, "Delete successful", null);
    } 
}
