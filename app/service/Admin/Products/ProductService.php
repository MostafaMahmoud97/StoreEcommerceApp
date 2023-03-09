<?php
namespace App\service\Admin\Products;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductColorSize;
use App\Models\ProductImage;
use App\Models\ProductSize;
use App\Traits\GeneralFileService;

class ProductService{
    use GeneralFileService;

    public function index(){
        $Products = Product::with(['Category',"ProductColorSizes" => function($q){
            $q->select("product_color_id","product_id")->where("status",1)->distinct("product_color_id");
        }])->get();

        foreach ($Products as $product){
            $product->count_color = count($product->ProductColorSizes);
        }


        $Colors = ProductColor::get();
        $Sizes = ProductSize::get();
        $Categories = Category::where('parent_id','!=','0')->orWhere('parent_id','!=',null)->get();
        return view('admin.products.product_index',compact('Products','Categories','Colors','Sizes'));
    }

    public function store($request){
        $file_path = "/ImageProduct";
        if ($request->file('image_val')){
            $LogoPath = $this->SaveFile($request->image_val,$file_path);
            $request->merge([
                'image' => $LogoPath
            ]);
        }

        $Product = Product::create($request->all());


        $file_path = "/Images_Product";
        foreach ($request->images as $image){
            $LogoPath = $this->SaveFile($image,$file_path);
            ProductImage::create([
                "product_id" => $Product->id,
                "image" => $LogoPath
            ]);
        }


        foreach ($request->colors as $color){
            foreach ($request->sizes as $size){
                ProductColorSize::create([
                    "product_id" => $Product->id,
                    "product_color_id" => $color,
                    "product_size_id" => $size,
                    'quantity' => 0,
                    'in_stock' => 0,
                    "price" => 0,
                    "discount_price" => 0,
                    "status" => 0
                ]);
            }
        }

        return redirect()->back()->with(['status' => 'success','message' => 'Product Has Been Added Success']);
    }

    public function showProductGallery($product_id){
        $ProductImages = ProductImage::where('product_id',$product_id)->get();
        return view('admin.products.product_gallery',compact('ProductImages'));
    }

    public function showProductColorSize($product_id){
        $Product = Product::select("id","name")->with('ProductColorSizes',function ($q){
            $q->with(['ProductColor','ProductSize']);
        })->find($product_id);

        return view('admin.products.product_index_detail',compact('Product'));
    }

    public function updateProductColorSize($request){
        $ProductColorSize = ProductColorSize::find($request->id);
        if (!$ProductColorSize){
            return redirect()->back()->with(['status' => "error","message" => "No Product Color Size By This Id"]);
        }

        $ProductColorSize->update([
            'quantity' => $request->quantity,
            'in_stock' => $request->in_stock,
            "price" => $request->price,
            "discount_price" => $request->discount_price,
            "status" => $request->status == "on" ? 1 : 0
        ]);

        return redirect()->back()->with(['status' => 'success',"message" => "Product Has Been Updated Success"]);

    }


    public function update(){

    }

    public function edit(){

    }

    public function delete(){

    }

}
