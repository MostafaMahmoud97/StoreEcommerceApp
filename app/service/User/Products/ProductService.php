<?php
namespace App\service\User\Products;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColorSize;
use App\Models\ProductRate;
use App\Models\ProductSize;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

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

        $Product->product_rate = $this->calcProductRate($product_id);

        $LastProducts = Product::where('id','!=',$product_id)->with(['Category' => function($q){
            $q->select('id','name');
        }])->latest()->take(4)->get();

        return view('user.product.product-details',compact('Product','LastProducts'));
    }

    public function getProductColorSize($request){
        $ProductColorSize = ProductColorSize::where('product_id',$request->product_id)->where('product_color_id',$request->product_color_id)->where('product_size_id',$request->product_size_id)->first();
        if (!$ProductColorSize){
            return Response::json(['status' => "error","message" => "no product by this requirement"]);
        }

        return Response::json($ProductColorSize);

    }

    public function rateProduct($request){
        $user = Auth::user();
        $rateProduct  = $user->RateProducts()->syncWithPivotValues([$request->product_id],['rate' => $request->rating_stars]);

        return redirect()->route('user.product.details',$request->product_id);
    }

    public function calcProductRate($product_id){
        $Sum_rates = ProductRate::select('rate')->where('product_id',$product_id)->get()->sum('rate');
        $CountRate = ProductRate::select('id')->where('product_id',$product_id)->get()->count('id');
        if ($CountRate == 0){
            return ['rate' => 0,'count' => $CountRate];
        }
        $CalcRate = floor($Sum_rates / $CountRate);
         return ['rate' => $CalcRate,'count' => $CountRate];
    }
}
