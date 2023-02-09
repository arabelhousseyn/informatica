<?php

namespace App\Http\Controllers;

use App\Http\Requests\WishlistRequest;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Auth::user()->wishlistProducts()->get();

        return view('pages.wishlist', compact('wishlist'));
    }

    public function store(WishlistRequest $request)
    {
        $wishlist = Auth::user()->getWishlistFromProduct($request->input('product_id'));

        if (blank($wishlist)) {
            Auth::user()->wishlist()->create($request->validated());
        } else {
            $this->destroy($wishlist);
        }

        return response()->noContent();
    }

    public function destroy(Wishlist $wishlist)
    {
        $wishlist->delete();

        return redirect()->back();
    }
}
