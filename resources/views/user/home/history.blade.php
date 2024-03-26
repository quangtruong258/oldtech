@extends('user.layout')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Lịch sử đơn hàng</li>
                </ol>
            </div>

            <div class="row">
                <table class="table ">
                    <thead>
                        <tr class="cart_menu">
                            <td class="text-center">STT</td>
                            <td class="text-center">Ngày đặt</td>

                            <td class="text-center">Trạng thái</td>
                            <td class="text-center">Tổng tiền</td>
                            {{-- <td class="text-center">Thành tiền</td> --}}
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($auth->orders as $order)
                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td class="text-center">{{ $order->created_at->format('d/m/Y') }}</td>

                                @if ($order->status == 0)
                                    <td class="text-center">Chưa xác nhận</td>
                                @elseif ($order->status == 1)
                                    <td class="text-center">Đã xác nhận</td>
                                @elseif ($order->status == 2)
                                    <td class="text-center">Đã thanh toán</td>
                                @else
                                    <td class="text-center">Đã hủy</td>
                                @endif
                                <td class="text-center">{{ number_format($order->totalPrice) }} VNĐ</td>
                                <td class="text-center">
                                    <a href="{{ route('order.detail', $order->id) }}"class="btn btn-sm btn-primary ">
                                        Xem chi tiết</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </section> <!--/#cart_items-->
@endsection
