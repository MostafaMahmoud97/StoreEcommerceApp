<?php

namespace App\service\Admin\Categories;

use App\Models\Category;
use App\Models\Setting;
use App\Traits\GeneralFileService;

class CategoryService{
    use GeneralFileService;

    public function index(){
        $Categories = Category::with('descendants')->get();

        return view('admin.categories.category_index',compact('Categories'));
    }

    public function store($request){
        $file_path = "/ImageCategory";
        if ($request->file('img_val')){
            $LogoPath = $this->SaveFile($request->img_val,$file_path);
            $request->merge([
                'img' => $LogoPath
            ]);
        }

        $Category = Category::create($request->all());
        return redirect()->route('admin.category.index')->with(['status' => 'success','message' => "Category Has Been Added Success"]);
    }

    public function delete($id){
        $Category = Category::find($id);
    }

}
