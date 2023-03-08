<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ProductStoreRequest;
use App\service\Admin\Products\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $service;
    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    public function index(){
        return $this->service->index();
    }

    public function store(ProductStoreRequest $request){
        return $this->service->store($request);
    }

    public function showProductGallery($product_id){
        return $this->service->showProductGallery($product_id);
    }

    public function showProductColorSize($id){
        return $this->service->showProductColorSize($id);
    }

    public function updateProductColorSize(Request $request){
        return $this->service->updateProductColorSize($request);
    }
}
