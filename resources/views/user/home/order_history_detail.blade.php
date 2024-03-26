@extends('user.layout')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Chi tiết đơn hàng</li>
                </ol>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="shopper-info">
                        <p>Thông tin khách hàng</p>
                        <form>
                            <input readonly type="text" placeholder=" Name" value="{{ $auth->name }}">
                            <input readonly type="text" placeholder=" Name" value="{{ $auth->email }}">
                            <input readonly type="" placeholder="" value="{{ $auth->phone }}">
                            <input readonly type="" placeholder=" " value="{{ $auth->address }}">
                        </form>

                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="shopper-info">
                        <p>Thông tin người nhận</p>
                        <form>
                            <input readonly type="text" placeholder=" Name" value="{{ $order->name }}">
                            <input readonly type="text" placeholder=" Name" value="{{ $order->email }}">
                            <input readonly type="" placeholder="" value="{{ $order->phone }}">
                            <input readonly type="" placeholder=" " value="{{ $order->address }}">
                        </form>

                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table ">
                    <p>Chi tiết đơn hàng</p>
                    <thead>
                        <tr class="cart_menu">
                            <td class="text-center">STT</td>
                            <td class="text-center">Ảnh</td>

                            <td class="text-center">Tên sản phẩm</td>

                            <td class="text-center">Giá bán</td>
                            <td class="text-center">Số lượng</td>
                            <td class="text-center">Tổng tiền</td>

                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->details as $detail)
                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td class="text-center"><img src="uploads/images/{{ $detail->product->image }}"
                                        alt="" width="40"></td>
                                <td class="text-center">{{ $detail->product->ten }}</td>
                                <td class="text-center">{{ number_format($detail->price) }} VNĐ</td>
                                <td class="text-center">{{ $detail->quantity }}</td>
                                <td class="text-center">{{ number_format($detail->price * $detail->quantity) }} VNĐ</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection
