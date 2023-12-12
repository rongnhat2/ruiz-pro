<?php

namespace App\Repositories\Manager;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;
use Session;
use Hash;
use DB;

class CommentRepository extends BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }

    public function get_all($id){ 
        return DB::table('review')
            ->leftjoin("customer_detail", "customer_detail.customer_auth_id", "=", "review.customer_id")
            ->where("review.product_id", "=", $id)
            ->get(); 
    } 
    public function get_one($id){
        $sql = "SELECT * FROM category WHERE id = ".$id;
        return DB::select($sql);
    }
    
}
