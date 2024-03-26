<div>
    <h3>Chào {{ $order->customer->name }}</h3>

    <h4>Đơn hàng của bạn:</h4>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        @php
            $total = 0;
        @endphp

        @foreach ($order->details as $detail)
            <tr>
                <th>{{ $loop->index + 1 }}</th>
                <th>{{ $detail->product->ten }}</th>
                <th>{{ number_format($detail->price) }} VNĐ</th>
                <th>{{ $detail->quantity }}</th>
                <th>{{ number_format($detail->price * $detail->quantity) }} VNĐ</th>
            </tr>
            @php
                $total += $detail->price * $detail->quantity;
                number_format($total);
            @endphp
        @endforeach
        <tr>
            <th colspan="4">Tổng tiền</th>
            
            <th>{{ number_format($total) }} VNĐ</th>
        </tr>

    </table>
    <p>
        <a href="{{ route('order.verify', $token) }}" style="display: inline-block">Bấm vào đây để xác nhận đơn hàng</a>
    </p>
</div>
