<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    //

    public function index()
    {
        $wishlists = Wishlist::where('user_id', Auth::id())->with('product')->get();
        return view('wishlist', compact('wishlists'));
    }

    public function addWishlist($productId)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'You need to log in']);
        }
        Wishlist::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $productId
        ]);
        // $wishlist = Wishlist::get();
        return redirect()->route('wishlist.index');
    }

    public function deleteWishlist($productId)
    {
        Wishlist::where('user_id', Auth::id())->where('product_id', $productId)->delete();
        return redirect()->route('wishlist.index');
    }
}
