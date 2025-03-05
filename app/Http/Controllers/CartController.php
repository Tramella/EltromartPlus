<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //

    public function index()
    {
        $cartItems = Auth::check() ? Cart::where('user_id', Auth::id())->orderBy('created_at', 'desc')->with('product')->get() : [];
        $message = $cartItems->isEmpty() ? 'Your cart is empty!' : null;
        $totalQuantity = $cartItems->count();
        session(['cart_total' => $totalQuantity]);
        return view('cart', compact('cartItems', 'message', 'totalQuantity'));

        // return view('cart', compact('cartItems'));
    }
    // public function getCartCount()
    // {
    //     // $cartCount = Auth::check() ? Cart::where('user_id', Auth::id())->sum('quantity') : 0;
    //     $cartCount = Auth::check() ? Cart::where('user_id', Auth::id())->count() : 0;
    //     return response()->json(['count' => $cartCount]);
    // }

    public function addToCart(Request $request)
    {
        $product = Products::findOrFail($request->product_id);
        $price = $product->sale_price ?? $product->regular_price;
        $cartItem = Cart::where(
            'user_id',
            Auth::id()
        )->where(
            'product_id',
            $request->product_id
        )->first();

        if ($cartItem) {
            $cartItem->update([
                'quantity' => $cartItem->quantity + $request->quantity
            ]);
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'price' => $price
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'The product added successfully!');
    }

    public function removeCart($productId)
    {
        Cart::where('user_id', Auth::id())->where('product_id', $productId)->delete();
        return redirect()->route('cart.index');
    }

    public function checkToPay(Request $request)
    {

        $cartItems = $request->input('cart', []);
        $total = $request->input('cart');
        $cartItems = $request->input('cart', []);
        $total = $request->input('total', 0);

        // Chuyển đổi mảng dữ liệu thành dạng phù hợp
        $cartFormatted = [];
        foreach ($cartItems as $productId => $item) {
            $cartFormatted[] = [
                'img' => $item['img'],
                'name' => $item['name'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'product_img' => $item['product_img'] ?? 'default.png', // Tránh lỗi nếu thiếu ảnh
            ];
        }

        return view('checktopay', compact('cartFormatted', 'total'));
    }
}
