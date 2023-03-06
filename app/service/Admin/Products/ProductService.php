<?php
namespace App\service\Admin\Products;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductColorSize;
use App\Models\ProductSize;
use App\Traits\GeneralFileService;

class ProductService{
    use GeneralFileService;

    public function index(){
        $Products = Product::with('Category')->get();
        $Categories = Category::where('parent_id','!=','0')->orWhere('parent_id','!=',null)->get();
        return view('admin.products.product_index',compact('Products','Categories'));
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

        foreach ($request->colors as $color){
            ProductColor::create([
                "color_name" => $color,
                "product_id" => $Product->id
            ]);
        }

        foreach ($request->sizes as $size){
            ProductSize::create([
                "product_id" => $Product->id,
                "size" => $size
            ]);
        }

        $ProductColors = $Product->ProductColors;
        $ProductSizes = ProductSize::select('id')->where('product_id',$Product->id)->get();

        $SizesArray = [];
        foreach ($ProductSizes as $size_id){
            array_push($SizesArray,$size_id->id);
        }

        foreach ($ProductColors as $productColor){
            $productColor->ProductSizes()->attach($SizesArray,['quantity' => 0, 'in_stock' => 0 , 'status' => 0]);
        }

        return redirect()->back()->with(['status' => 'success','message' => 'Product Has Been Added Success']);

    }

    public function showProductColorSize($product_id){
        $ProductColorSize = ProductColor::where('product_id',$product_id)->with('ProductSizes')->get();

    }

    public function update(){

    }

    public function edit(){

    }

    public function delete(){

    }

}
