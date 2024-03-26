@extends('user.layout')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="text-center">STT</td>
                            <td class="text-center">Sản phẩm</td>

                            <td class="text-center">Giá</td>
                            <td class="text-center">Số lượng</td>
                            {{-- <td class="text-center">Thành tiền</td> --}}
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carts as $cart)
                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td class="text-center">{{ $cart->product->ten }}</td>
                                <td class="text-center">{{ $cart->price }}</td>
                                <td class="text-center">
                                    <form action="{{route('cart.update',$cart->product_id)}}" method="get">
                                        <input type="number" value="{{ $cart->quantity }}" name="quantity" 
                                        style="text-align: center">
                                        <button><i class="fa fa-save"></i></button>
                                    </form>
                                </td>
                                {{-- <td class="text-center"></td> --}}
                                <td>
                                    <a onclick="return confirm('Bạn muốn xóa sản phẩm nays')"
                                        href="{{ route('cart.delete', $cart->product_id) }}"><i
                                            class="fas fa-trash">Xoa</i></a>
                                </td>


                            </tr>
                        @endforeach


                    </tbody>
                </table>

                <br>
                <div class=" text-center">
                    <a   class="btn btn-success">Tiếp tục mua sắm</a>
                    @if($carts->count())
                    <a onclick="return confirm('Bạn muốn xóa toàn bộ giỏ hàng ')"
                    href="{{ route('cart.clear')}}" class="btn btn-danger">Xóa sạch giỏ hàng</a>
                    <a href="{{route('order.checkout')}}" class="btn btn-success">Thanh toán</a>
                    @endif
                </div>
            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection
