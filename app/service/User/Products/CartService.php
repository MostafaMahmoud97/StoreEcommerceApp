<?php

namespace App\service\User\Products;

use App\Models\Cart;
use App\Models\ProductColorSize;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class CartService{

    public function addToCart($request){
        $ProductColorSize = ProductColorSize::where('product_id',$request->product_id)
            ->where('product_color_id',$request->product_color_id)
            ->where('product_size_id',$request->product_size_id)
            ->where('status',1)->first();

        if (!$ProductColorSize){
            return Response::json(['status' => "error","message" => "no product by this id"]);
        }

        $user = Auth::user();
        $user->Cart()->syncWithPivotValues([$ProductColorSize->id],['quantity' => $request->quantity]);
        return Response::json(['status' => "success","message" => "product has been added to cart success"]);
    }

}
