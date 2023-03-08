<?php

namespace App\Http\Controllers\User\Product;

use App\Http\Controllers\Controller;
use App\service\User\Products\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $service;
    public function __construct(ProductService $service)
    {
        $this->middleware('auth');
        $this->service = $service;
    }

    public function index(Request  $request){
        return $this->service->index($request);
    }

    public function filterProducts(Request $request){
        return $this->service->filterProducts($request);
    }

    public function searchProducts(Request $request){
        return $this->service->searchProducts($request);
    }
}
