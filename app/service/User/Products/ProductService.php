<?php
namespace App\service\User\Products;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

    public function showProductDetails($product_id){
        $Product = Product::with(['ProductColorSizes' => function ($q){
            $q->where('status',1);
        },'ProductColors','ProductSizes','Images'])->find($product_id);

        $LastProducts = Product::where('id','!=',$product_id)->with(['Category' => function($q){
            $q->select('id','name');
        }])->latest()->take(4)->get();

        return view('user.product.product-details',compact('Product','LastProducts'));
    }

    public function rateProduct($request){
        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        $rateProduct  = $user->RateProducts()->attach([$request->product_id],['rate' => $request->rating_stars]);

        return true;
    }
}
