<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\BrandRepository;
use App\Models\Brand;  
use App\Repositories\Manager\ColorRepository;
use App\Models\Color;  
use App\Repositories\Manager\ProductRepository; 
use App\Models\Product;  
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class ProductController extends Controller
{
    protected $brand; 
    protected $color;
    protected $product; 

    public function __construct(Brand $brand, Color $color, Product $product ){
        $this->brand             = new BrandRepository($brand);  
        $this->color             = new ColorRepository($color);  
        $this->product             = new ProductRepository($product);  
    }
    public function index(){
        return view("admin.manager.product");
    }

    public function get(){
        $data = $this->product->get_all();
        return $this->product->send_response(201, $data, null);
    }
    public function get_one($id){
        $data = $this->product->get_one($id);
        return $this->product->send_response(200, $data, null);
    }
    public function store(Request $request){ 
        $data = [
            "brand_id"          => $request->data_brand,
            "category_id"          => $request->data_category,
            "name"          => $request->data_name,
            "slug"          => $this->product->to_slug($request->data_name),  
            "description"   => nl2br($request->data_description ?? ""),
            "sex"          => $request->data_gender,
            "prices"          => $request->data_prices,
        ];
        $image_list     = [];
        if ($request->image_list_length) {
            for ($i = 0; $i < $request->image_list_length; $i++) {  
                array_push($image_list, $this->product->imageInventor('images', $request['image_list_item_'.$i], 600)); 
            }
            $data['images'] = implode(",",$image_list);
        }
        
        $data_return = $this->product->create($data);
        $color_list = json_decode($request["data_color"]);
        foreach ($color_list as $key => $value) {
            DB::table('product_color')->insert([
                'product_id' => $data_return->id,
                'color_id' => $value
            ]);
        }
        return $this->product->send_response(201, $data_return, null);
    }

    public function update(Request $request){  
        $data = [ 
            "name"          => $request->data_name,  
            "description"   => $request->data_description, 
        ]; 
        if ($request->data_image != "null") {
            $data["image"] = $this->product->imageInventor('images', $request->data_image, 500);
        }
        dd($this->product->update($data, $request->data_id));
        $data_update = $this->product->update($data, $request->data_id);
        return $this->product->send_response("Update successful", $data_update, 200);
    }

    public function delete($id){
        $this->product->delete($id); 
        return $this->product->send_response(200, "Delete successful", null);
    }
}
