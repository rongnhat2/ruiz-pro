<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\ColorRepository;
use App\Models\Color;  
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class ColorController extends Controller
{
    protected $color; 

    public function __construct(Color $color ){
        $this->color             = new ColorRepository($color);  
    }
    
    public function get(){
        $data = $this->color->get_all();
        return $this->color->send_response(201, $data, null);
    }
}
