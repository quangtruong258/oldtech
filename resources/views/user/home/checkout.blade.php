@extends('user.layout')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div><!--/breadcrums-->

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-md-4">

                        <div class="shopper-info">
                            <p>Thông tin nhận hàng</p>
                            <form method="post">
                                @csrf

                                <span class="text-danger error-message">{{ $errors->first('name') }}</span>

                                <input type="text" placeholder="Họ tên" name="name" value="{{ $auth->name }}" />

                                <span class="text-danger error-message">{{ $errors->first('email') }}</span>

                                <input type="email" placeholder="Email" name="email" value="{{ $auth->email }}" />

                                <span class="text-danger error-message">{{ $errors->first('phone') }}</span>

                                <input type="phone" placeholder="Điện thoại" name="phone" value="{{ $auth->phone }}" />

                                <span class="text-danger error-message">{{ $errors->first('address') }}</span>

                                <input type="address" placeholder="Địa chỉ" name="address" value="{{ $auth->address }}" />
                                <a class="btn btn-success">Tiếp tục mua sắm</a>
                                <button type="submit" class="btn btn-danger">Thanh toán khi nhận hàng</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="review-payment">
                            <h2>Danh sách sản phẩm</h2>
                        </div>
                        <div class="table-responsive cart_info">
                            <table class="table table-condensed">
                                <thead>
                                    <tr class="cart_menu">
                                        <td class="text-center">STT</td>
                                        <td class="text-center">Sản phẩm</td>

                                        <td class="text-center">Giá</td>
                                        <td class="text-center">Số lượng</td>
                                        <td class="text-center">Thành tiền</td>
                                        {{-- <td class="text-center">Thành tiền</td> --}}
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            @php
                                                $total = 0;
                                            @endphp
                                            <td class="text-center">{{ $loop->index + 1 }}</td>
                                            <td class="text-center">{{ $cart->product->ten }}</td>
                                            <td class="text-center">{{ $cart->price }}</td>
                                            <td class="text-center">{{ $cart->quantity }}</td>
                                            <td class="text-center">{{ number_format($cart->quantity * $cart->price) }}
                                            </td>
                                            {{-- <td class="text-center"></td> --}}
                                            @php
                                                $total += $cart->quantity * $cart->price;
                                                number_format($total);
                                            @endphp

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>


                        <form action="{{ route('order.checkout.momo') }}" method="post">
                            @csrf
                            <input type="hidden" name="total" value="{{ $total }}">
                            <button type="submit" class="btn btn-danger">Thanh toán qua MOMO</button>

                        </form>




                    </div>
                </div>
                {{-- <div class="col-sm-5 clearfix">
                    <div class="bill-to">
                        <p>Bill To</p>
                        <div class="form-one">
                            <form>
                                <input type="text" placeholder="Company Name">
                                <input type="text" placeholder="Email*">
                                <input type="text" placeholder="Title">
                                <input type="text" placeholder="First Name *">
                                <input type="text" placeholder="Middle Name">
                                <input type="text" placeholder="Last Name *">
                                <input type="text" placeholder="Address 1 *">
                                <input type="text" placeholder="Address 2">
                            </form>
                        </div>
                        <div class="form-two">
                            <form>
                                <input type="text" placeholder="Zip / Postal Code *">
                                <select>
                                    <option>-- Country --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <select>
                                    <option>-- State / Province / Region --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <input type="password" placeholder="Confirm password">
                                <input type="text" placeholder="Phone *">
                                <input type="text" placeholder="Mobile Phone">
                                <input type="text" placeholder="Fax">
                            </form>
                        </div>
                    </div>
                </div> --}}
                {{-- <div class="col-sm-4">
                    <div class="order-message">
                        <p>Shipping Order</p>
                        <textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                        <label><input type="checkbox"> Shipping to bill address</label>
                    </div>	
                </div>	 --}}

                <div></div>
            </div>
        </div>

        {{-- <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span>
            </div> --}}

        <div class=" text-center">


        </div>
        </div>
    </section> <!--/#cart_items-->
@endsection
