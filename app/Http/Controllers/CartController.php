<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;


class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('customer_id',auth('cus')->id())->get();
        return view('user.home.cart', compact('carts'));
    }

    public function add(Product $product, Request $request)
    {
        $quantity = $request->quantity ? floor($request->quantity) : 1;
        $customer_id = auth('cus')->id();
        $exitsCart = Cart::where([
            'customer_id' => $customer_id,
            'product_id' => $product->id
        ])->first();

        if ($exitsCart) {
            Cart::where([
                'customer_id' => $customer_id,
                'product_id' => $product->id
            ])->increment('quantity', $quantity);
            // $exitsCart->increment('quantity',$quantity);
            // $exitsCart->update([
            //     'quantity'=>$exitsCart->quantity + $quantity
            // ]);
            return redirect()->route('cart.index')->with('success', 'Chỉnh sửa số lượng thành công');
        } else {
            $data = [
                'customer_id' => auth('cus')->id(),
                'product_id' => $product->id,
                'price' => $product->price,
                'quantity' => $quantity
            ];
            if (Cart::create($data)) {
                return redirect()->route('cart.index')->with('success', 'Thêm sản phẩm vào giỏ hàng thành công');
            }
        }
        return redirect()->back()->with('error', 'Xảy ra lỗi, hãy thử lại');
    }

    public function update(Product $product, Request $request)
    {
        $quantity = $request->quantity ? floor($request->quantity) : 1;
        $customer_id = auth('cus')->id();
        $exitsCart = Cart::where([
            'customer_id' => $customer_id,
            'product_id' => $product->id
        ])->first();

        if ($exitsCart) {
            Cart::where([
                'customer_id' => $customer_id,
                'product_id' => $product->id
            ])->update([
                'quantity' => $quantity
            ]);
            return redirect()->route('cart.index')->with('success', 'Chỉnh sửa số lượng thành công');
        }
        return redirect()->back()->with('error', 'Xảy ra lỗi, hãy thử lại');
    }

    public function delete($product)
    {
        $customer_id = auth('cus')->id();
        Cart::where([
            'customer_id' => $customer_id,
            'product_id' => $product
        ])->delete();

        return redirect()->route('cart.index')->with('success', 'Xóa sản phẩm thành công');
    }

    public function clear()
    {
        $customer_id = auth('cus')->id();
        Cart::where([
            'customer_id' => $customer_id
        ])->delete();
        return redirect()->route('cart.index')->with('success', 'Xóa sản phẩm thành công');
    }
}
