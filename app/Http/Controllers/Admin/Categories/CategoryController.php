<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\CategoryStoreRequest;
use App\Http\Requests\Admin\Category\CategoryUpdateRequest;
use App\service\Admin\Categories\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $service;
    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index(){
        return $this->service->index();
    }

    public function store(CategoryStoreRequest $request){
        return $this->service->store($request);
    }

    public function update($id){
        return $this->service->update($id);
    }

    public function edit(CategoryUpdateRequest $request,$id){
        return $this->service->edit($request,$id);
    }

    public function delete($id){
        return $this->service->delete($id);
    }
}
