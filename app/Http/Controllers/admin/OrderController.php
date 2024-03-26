<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $config = $this->config();
        $title = config('apps.user');
        $template = 'admin.dashboard.order.index';
        $status = request('status',1);
        $orders = Order::where('status',$status)->orderBy('id','DESC')->paginate(10);
        return view('admin.dashboard.layout', compact('template', 'config', 'title', 'orders'));
    }


    public function order_detail(Order $order) {
        $config = $this->config();
        $title = config('apps.user');
        $template = 'admin.dashboard.order.detail';

        $auth = $order->customer;
        return view('admin.dashboard.layout', compact('template', 'config', 'title', 'order','auth'));
    }

    public function update(Order $order) {
        $config = $this->config();
        $title = config('apps.user');
        $template = 'admin.dashboard.order.detail';

        $status = request('status',1);
       
        if($order->status != 2){
            $order->update(['status' => $status]);
            return redirect()->route('admin.order.index')->with('success','Cập nhật đơn hàng thành công');
        }

        return redirect()->route('admin.order.index')->with('error','Có lỗi khi cập nhật đơn hàng ');
        
    }





    public function config()
    {
        return [
            'js' => [
                'backend/js/plugins/flot/jquery.flot.js',
                'backend/js/plugins/flot/jquery.flot.tooltip.min.js',
                'backend/js/plugins/flot/jquery.flot.spline.js',
                'backend/js/plugins/flot/jquery.flot.resize.js',
                'backend/js/plugins/flot/jquery.flot.pie.js',
                'backend/js/plugins/flot/jquery.flot.symbol.js',
                'backend/js/plugins/flot/jquery.flot.time.js',
                'backend/js/plugins/peity/jquery.peity.min.js',
                'backend/js/demo/peity-demo.js',
                'backend/js/inspinia.js',
                'backend/js/plugins/pace/pace.min.js',
                'backend/js/plugins/jquery-ui/jquery-ui.min.js',
                'backend/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js',
                'backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
                'backend/js/plugins/easypiechart/jquery.easypiechart.js',
                'backend/js/plugins/sparkline/jquery.sparkline.min.js',
                'backend/js/demo/sparkline-demo.js',

            ]
        ];
    }
}
