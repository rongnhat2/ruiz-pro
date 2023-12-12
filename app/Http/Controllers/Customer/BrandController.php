<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\BrandRepository;
use App\Models\Brand;  
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class BrandController extends Controller
{
    protected $brand; 

    public function __construct(Brand $brand ){
        $this->brand             = new BrandRepository($brand);  
    } 
    public function get(){
        $data = $this->brand->get_all();
        return $this->brand->send_response(201, $data, null);
    }
}
