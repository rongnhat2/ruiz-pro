<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\BlogRepository;
use App\Models\Blog;  
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class BlogController extends Controller
{
    protected $blog; 

    public function __construct(Blog $blog ){
        $this->blog             = new BlogRepository($blog);  
    } 

    public function get(){
        $data = $this->blog->get_all();
        return $this->blog->send_response(201, $data, null);
    }
}
