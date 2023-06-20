<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //direct category list page
    public function list(){
        $categories = Category::when(request('key'), function ($query) {
            $query->where('category_name', 'like', '%' . request('key') . '%');
        })
                            ->orderBy('id', 'asc')
                            ->paginate(4);
        $categories->appends(request()->all());
        return view('admin.category.list',compact('categories'));
    }

    //direct category create page
    public function createPage(){
        return view('admin.category.create');
    }

    //create category
    public function create(Request $request){
        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);
        Category::create($data);
        return redirect()->route("category#list")->with(['createSuccess'=>'Category Created !']);
    }


    //delete category
    public function delete($id){
        Category::where('id', $id)->delete();
        return back()->with(['deleteSuccess'=> 'Category Deleted !']);
    }


    //edit category
    public function edit($id){
        $category = Category::where('id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }



    //update page
    public function update(Request $request){
        // dd($request->all());
        $this->categoryValidationCheck($request);
        $data = $this->requestCategoryData($request);

        Category::where('id', $request->categoryId )->update($data);
        return redirect()->route('category#list');
    }







    //private datas
    private function categoryValidationCheck($request){
        Validator::make($request->all(), [
            'categoryName' => 'required|unique:categories,category_name,'.$request->categoryId
        ])->validate();
    }

    private function requestCategoryData($request){
        return [
            'category_name' => $request->categoryName
        ];
    }
}
