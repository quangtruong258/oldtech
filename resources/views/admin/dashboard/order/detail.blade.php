@include('admin.dashboard.components.breadcumb', ['title' => $title['order']['detail']['indexTitle']])



<div class="container">
    {{-- <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Chi tiết đơn hàng</li>
            </ol>
        </div> --}}
    <div class="row">
        <div class="col-lg-4">

            <h3>Thông tin khách hàng</h3>
            <div class="form-group">
                <label for="">Tên khách hàng</label>
                <input readonly type="text" class="form-control" name="name" value="{{ $auth->name }}">
            </div>
            <div class="form-group">
                <label for="">Điện thoại</label>
                <input readonly type="text" class="form-control" name="name" value="{{ $auth->phone }}">
            </div>
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input readonly type="text" class="form-control" name="name" value="{{ $auth->address }}">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input readonly type="text" class="form-control" name="name" value="{{ $auth->email }}">
            </div>

        </div>

        <div class="col-lg-4">
            <h3>Thông tin người nhận</h3>
            <div class="form-group">
                <label for="">Tên người nhận</label>
                <input readonly type="text" class="form-control" name="name" value="{{ $order->name }}">
            </div>
            <div class="form-group">
                <label for="">Điện thoại</label>
                <input readonly type="text" class="form-control" name="name" value="{{ $order->phone }}">
            </div>
            <div class="form-group">
                <label for="">Địa chỉ</label>
                <input readonly type="text" class="form-control" name="name" value="{{ $order->address }}">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input readonly type="text" class="form-control" name="name" value="{{ $order->email }}">
            </div>

        </div>
        <br>
        @if ($order->status != 2)

            @if ($order->status != 3)
                <div class="col-lg-4">
                    <div class="form-group">
                        <a href="{{ route('admin.order.update', $order->id) }}?status=2" class="btn btn-success">Đã giao
                            hàng</a>
                        <a href="{{ route('admin.order.update', $order->id) }}?status=3" class="btn btn-primary">Hủy đơn
                            hàng</a>
                    </div>
                </div>
            @else
                <a href="{{ route('admin.order.update', $order->id) }}?status=2" class="btn btn-success">Khôi phục đơn
                    hàng</a>
            @endif
        @endif
    </div>

    <br>
    <div class="row">
        <table class="table" border="2" style="border-collapse: separate">
            <p>Chi tiết đơn hàng</p>
            <thead>
                <tr class="cart_menu">
                    <td class="text-center">STT</td>
                    <td class="text-center">Ảnh</td>

                    <td class="text-center">Tên sản phẩm</td>

                    <td class="text-center">Giá bán</td>
                    <td class="text-center">Số lượng</td>
                    <td class="text-center">Tổng tiền</td>


                </tr>
            </thead>
            <tbody>
                @foreach ($order->details as $detail)
                    <tr>
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td class="text-center"><img src="uploads/images/{{ $detail->product->image }}" alt=""
                                width="40"></td>
                        <td class="text-center">{{ $detail->product->ten }}</td>
                        <td class="text-center">{{ number_format($detail->price) }} VNĐ</td>
                        <td class="text-center">{{ $detail->quantity }}</td>
                        <td class="text-center">{{ number_format($detail->price * $detail->quantity) }} VNĐ</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
