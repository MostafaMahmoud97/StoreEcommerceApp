<?php

namespace App\Http\Controllers\User\Product;

use App\Http\Controllers\Controller;
use App\service\User\Products\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $service;
    public function __construct(CartService $service)
    {
        $this->service = $service;
    }

    public function addProductToCart(Request $request){
        return $this->service->addToCart($request);
    }
}
