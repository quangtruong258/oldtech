<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $auth = auth('cus')->user();
        return view('user.home.checkout', compact('auth'));
    }

    public function history()
    {
        $auth = auth('cus')->user();
        return view('user.home.history', compact('auth'));
    }


    public function detail(Order $order)
    {
        $auth = auth('cus')->user();
        return view('user.home.order_history_detail', compact('auth', 'order'));
    }
    public function check_checkout(Request $request)
    {
        $auth = auth('cus')->user();
        $request->validate(
            [
                'email' => 'required|email',
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required|string'
            ],
            [
                'name.required' => 'Bạn chưa nhập họ tên',
                'email.required' => 'Bạn chưa nhập email.',
                'email.email' => 'Email không đúng định dạng. Vd: abc@xyz.com',
                'address.required' => 'Bạn chưa nhập địa chỉ.'
            ]
        );

        $data = $request->only('name', 'email', 'phone', 'address');
        $data['customer_id'] = auth('cus')->id();
        //dd($data);     
        if ($order = Order::create($data)) {
            $token = Str::random(30);
            foreach ($auth->carts as $cart) {
                $dataOrderDetail = [
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'price' => $cart->price,
                    'quantity' => $cart->quantity,
                ];
                OrderDetail::create($dataOrderDetail);
            }
            $order->token = $token;
            $order->save();
            Mail::to($auth->email)->send(new OrderMail($order, $token));
            return redirect()->route('customer.index')->with('success', 'Đặt hàng thành công');
        }
        return redirect()->route('customer.index')->with('error', 'Đặt hàng không thành công');
    }


    public function verify($token)
    {
        $order = Order::where('token', $token)->first();
        if ($order) {
            $order->token = null;
            $order->status = 1;
            $order->save();
            return redirect()->route('customer.index')->with('success', 'Xác nhận đặt hàng thành công');
        } else {
            return abort(404);
        }
    }

    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }


    public function momo_payment(Request $request)
    {


        //include "../common/helper.php";

        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


        $partnerCode = 'MOMOBKUN20180529';
        $accessKey = 'klm05TvNBzhg7h7j';
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

        $orderInfo = "Thanh toán qua MoMo";
        $amount = $_POST['total'];
        $orderId = time() ."";
        $redirectUrl = "http://localhost:8080/oldtech.com/public/order/checkout";
        $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
        $extraData = "";


        // $partnerCode = $_POST["partnerCode"];
        // $accessKey = $_POST["accessKey"];
        // $serectkey = $_POST["secretKey"];
        $orderid = time() . "";
       
       
        $requestId = time() . "";
        $requestType = "payWithATM";
        //$extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $secretKey);
        $data = array('partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature);
        $result = $this->execPostRequest($endpoint, json_encode($data));
//dd($result);
       
        $jsonResult = json_decode($result, true);  // decode json
    
        //Just a example, please check more in there
        return redirect()->to($jsonResult['payUrl']);
       // header('Location: ' . $jsonResult['payUrl']);
    }
}
