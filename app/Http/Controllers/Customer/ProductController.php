<?php

namespace App\Http\Controllers\Customer;

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

    public function get(Request $request){
        $count = count($this->product->get_all_condition($request));

        $data_product = $this->product->get_condition($request, $count); 
        
        $data_return = [
            "data"      => $data_product,
            "count"     => $count,
        ];
        return $this->product->send_response(200, $data_return, null);
    }
    public function get_all_new(){
        $data = $this->product->get_all_new();
        return $this->product->send_response(201, $data, null);
    }

    public function get_best_sale(){
        $data = $this->product->get_best_sale();
        return $this->product->send_response(201, $data, null);
    }

    public function get_search(Request $request){
        $text = $request->data_text;
        $category = $request->data_category;
        $slug_data = $this->product->to_slug($text);
        $data = $this->product->find_real_time($slug_data, $category);
        return $this->product->send_response(200, $data, null);
    }
    public function get_one($id){
        $data = $this->product->get_one($id);
        return $this->product->send_response(200, $data, null);
    }
    
    public function get_related($id){
        $product = $this->product->get_one($id); 
        
        $data_product = $this->product->get_related($product->brand_id, $id, 4);
        
        return $this->product->send_response(200, $data_product, null);
    }
}
