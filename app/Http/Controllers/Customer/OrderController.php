<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Mail; 


use App\Repositories\Manager\OrderRepository;
use App\Models\OrderList;
use App\Models\OrderDetail; 

use App\Repositories\Manager\ProductRepository;
use App\Models\Product;

use App\Repositories\CustomerRepository;
use App\Models\CustomerAuth;

use Carbon\Carbon;
use Session;
use Hash;
use DB;

class OrderController extends Controller
{
    
    protected $product;
    protected $order;
    protected $order_detail;
    protected $customer;

    public function __construct(Product $product, CustomerAuth $customer, OrderList $order, OrderDetail $order_detail){
        $this->customer         = new CustomerRepository($customer);
        $this->order            = new OrderRepository($order);
        $this->order_detail     = new OrderRepository($order_detail); 
        $this->product          = new ProductRepository($product);
    }

    // Lấy ra danh sách đơn hàng
    public function get(Request $request){
        $is_user = static::check_token($request); 
        $route_redirect = "/";
        if ($is_user) { 
            
            list($user_id, $token) = static::unpack_token($request); 
            $data   = [];
            $order = $this->order->customer_get_all($user_id);
            foreach ($order as $key => $value) {
                $order_detail = $this->order->get_detail($value->id);
                $order_group = [
                    "order"         => $value,
                    "order_detail"  => $order_detail,
                ];
                array_push($data, $order_group);
            }
            return $this->order->send_response("Danh sách đơn hàng", $data, 200); 
        }else{
            return $this->order->send_response("Phiên đăng nhập hết hạn", $route_redirect, 404); 
        } 
    }
    
    // Đặt hàng
    public function checkout(Request $request){ 
        
        $name       = preg_replace('/(<([^>]+)>)/', '', $request->data_name);
        $email      = preg_replace('/(<([^>]+)>)/', '', $request->data_email);
        $address    = preg_replace('/(<([^>]+)>)/', '', $request->data_address);
        $phone      = preg_replace('/(<([^>]+)>)/', '', $request->data_phone);
        $description      = preg_replace('/(<([^>]+)>)/', '', $request->data_description);
        $customer_id   = $request->data_id ? $request->data_id : null;
        $metadata = json_decode($request->metadata);
        $total      = 0; 
        foreach ($metadata as $key => $value) {
            $data = json_decode($value); 
            $product = $this->product->get_one($data->id);
            $total += $product->prices * $data->quantity;
        }
        $route_redirect = "/profile?tab=Order";
        $data_order = [
            "customer_id"       => $customer_id,
            "username"          => $name,
            "email"             => $email,
            "phone"             => $phone,
            "address"           => $address,
            "note"              => $description,
            "total"             => $total,
            "payment_value"     => $request->data_payment == "bank" ? "2" : "1",
            "payment_status"    => 0,
            "order_value"       => Carbon::now()->toDateTimeString() . "|Order Successful",
            "order_status"      => 0,
            "status"            => 1,
        ];  
        $order_item = $this->order->create($data_order);
        

        foreach ($metadata as $key => $value) {
            $data = json_decode($value); 
            $product = $this->product->get_one($data->id);
            $total += $product->prices * $data->quantity;
            
            $item_order = [
                "order_id"      => $order_item->id,
                "product_id"    => $data->id,
                "color_id"      => $data->color,
                "quantity"      => $data->quantity,
                "prices"        => $product->prices,
                "total_price"   => $product->prices * $data->quantity,
                "status"        => 1,
            ];
            $this->order_detail->create($item_order);
        }
        $data = [
            'email'             => $email,
            'date_created'      => Carbon::now()->toDateTimeString(),
            'total'             => $total,
            'description'      => $description,
            'customer_login'   => $customer_id ? $customer_id : null,
            'metadata'          => $metadata,
            'order_data_name'    => $name,
            'order_data_phone'    => $phone,
            'order_data_email'    => $email,
            'order_data_address'    => $address,
            'order_data_description'    => $description,
        ];
        Mail::send('customer/confirm-order', array('data'=> $data), function($message) use ($email) {
            $message->from('admin.ruiz@gmail.com', 'Ruiz - Order email');
            $message->to($email)->subject('Ruiz-order');
        });
        // $this->order->remove_cart($user_id);
        if ( $request->payment == "cod") {
            $route_redirect = "/profile?tab=Order";
            return $this->order->send_response("Đặt hàng thành công", $route_redirect, 200); 
        }else{
            $route_redirect = static::create_pay($request, $total, $order_item->id); 
            return $this->order->send_response("Đặt hàng thành công, chuyển hướng đến VNPay", $route_redirect, 200); 
        }
    }

    public function create_pay($request, $prices, $order_id){  

        session(['url_prev' => '/profile', 'item_id' => $order_id]);

        $vnp_TmnCode = "2QXUI4J4"; //Mã website tại VNPAY 
        $vnp_HashSecret = "20081f0ee1cc6b524e273b6d4050fefd"; //Chuỗi bí mật
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8000/return-vnpay";
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'other';
        $vnp_Amount = $prices * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();
        //Expire
        $startTime = date("YmdHis");
        $expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));

        $inputData = array(
            "vnp_Version"   => "2.1.0",
            "vnp_TmnCode"   => $vnp_TmnCode,
            "vnp_Amount"    => $vnp_Amount,
            "vnp_Command"   => "pay",
            "vnp_CreateDate"=> date('YmdHis'),
            "vnp_CurrCode"  => "VND",
            "vnp_IpAddr"    => $vnp_IpAddr,
            "vnp_Locale"    => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef"    => $vnp_TxnRef,
            "vnp_ExpireDate"=> $expire 
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
           // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            // $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);
            // $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        return $vnp_Url;
    }
    // Kiểm tra token hợp lệ
    public function check_token(Request $request){
        $token = $request->cookie('_token_');
        if ($token) {
            list($user_id, $token) = explode('$', $token, 2); 
            $user = $this->customer->get_secret($user_id); 
            if ($user) {
                return Hash::check($user_id . '$' . $user[0]->secret_key, $token);
            }else{
                return false;
            }
        }else{
            return false;
        }
        
    }

    // Tách token
    public function unpack_token(Request $request){
        $token = $request->cookie('_token_');
        return explode('$', $token, 2); 
    }
}
