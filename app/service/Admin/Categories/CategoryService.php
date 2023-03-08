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

        $ParentCategory = Category::find($request->parent_id);
        if ($ParentCategory){
            if ($ParentCategory->parent_id != null || $ParentCategory->parent_id != 0){
                return redirect()->back()->with(['status' => "error","message" => "The Parent has parent category"]);
            }
        }


        $Category = Category::create($request->all());
        return redirect()->route('admin.category.index')->with(['status' => 'success','message' => "Category Has Been Added Success"]);
    }

    public function update($id){
        $Category = Category::find($id);
        if (!$Category){
            return redirect()->back()->with(['status' => 'error','message' => 'No Category By This Id']);
        }

        $Category->parent = Category::find($Category->parent_id);
        $Categories = Category::get();

        return view('admin.categories.category_update',compact('Category','Categories'));
    }

    public function edit($request,$id){
        $Category = Category::find($id);
        if (!$Category){
            return redirect()->back()->with(['status' => 'error','message' => 'No Category By This Id']);
        }

        $file_path = "/ImageCategory";
        if ($request->file('img_val')){
            $LogoPath = $this->SaveFile($request->img_val,$file_path);
            $request->merge([
                'img' => $LogoPath
            ]);
        }

        $Category->update($request->all());
        return redirect()->back()->with(['status' => 'success','message' => "Category Has Been Updated Success"]);
    }

    public function delete($id){
        $Category = Category::find($id);
        if (!$Category){
            return redirect()->back()->with(['status' => 'error','message' => 'No Category By This Id']);
        }

        if (count($Category->descendants) > 0){
            return redirect()->back()->with(['status' => 'error','message' => "You Can't Delete This Category Because This Category Had Sub Categories"]);
        }

        $Category->delete();
        return redirect()->back()->with(['status' => 'success','message' => "Category Has Been Deleted Success"]);
    }

}
