<?php
namespace App\service\User\Products;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSize;

class ProductService{
    public function index($request){
        if (!$request->search){
            $request->search = "";
        }
        $Categories = Category::get()->toTree();
        $Sizes = ProductSize::get();
        $Products = Product::where('name','like','%'.$request->search.'%')->orWhere('description','like','%'.$request->search.'%')->orderBy('id','desc')->paginate(10);
        return view('main.home',compact('Categories','Sizes','Products'));
    }

    public function filterProducts($request){
        $Categories = Category::get()->toTree();
        $Sizes = ProductSize::get();
        $Products = Product::whereIn('category_id',$request->categories)
            ->WhereHas('ProductColorSizes',function ($q) use ($request){
                $q->where('status',1)->where('product_size_id',$request->size);
            })
            ->orderBy('id','desc')->paginate(10);
        return view('main.home',compact('Categories','Sizes','Products'));
    }

    public function searchProducts($request){
        $Categories = Category::get()->toTree();
        $Sizes = ProductSize::get();
        $Products = Product::where('name','like','%'.$request->search.'%')->orWhere('description','like','%'.$request->search.'%')->orderBy('id','desc')->paginate(10);
        return view('main.home',compact('Categories','Sizes','Products'));
    }
}
