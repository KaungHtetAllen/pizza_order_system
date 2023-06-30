<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //
    public function list(){
        $pizzas = Product::orderBy('created_at','asc')->paginate(5);
        return view('admin.products.pizzaList',compact('pizzas'));
    }

    //create Page
    public function createPage(){
        $categories = Category::select('id','category_name')->get();
        // dd($categories->toArray());
        return view('admin.products.create',compact('categories'));
    }

    //create Function
    public function create(Request $request){
        // dd($request->all());
        $this->productValidationCheck($request);
        $data = $this->requestProductInfo($request);

        // dd($data);

            $fileName = uniqid() . $request->file('pizzaImage')->getClientOriginalName();
            $request->file('pizzaImage')->storeAs('public', $fileName);
            $data['image'] = $fileName;

        // dd(collect($data));
        Product::create($data);
        return redirect()->route('product#list');
    }


    /********************************************************************************************/

    //product validation check
    private function productValidationCheck($request){
        Validator::make($request->all(), [
            'pizzaName'=> 'required | min:5 |unique:products,name',
            'pizzaDescription'=> 'required | min:10',
            'pizzaCategory'=> 'required',
            'pizzaImage'=> 'required | mimes:jpg,jpeg,png,webp | file',
            'pizzaPrice'=> 'required',
            'pizzaWaitingTime'=> 'required',
        ])->validate();
    }


    //data
    private function requestProductInfo($request){
        return [
            'category_id' => $request->pizzaCategory,
            'name' => $request->pizzaName,
            'description' => $request->pizzaDescription,
            'price' => $request->pizzaPrice,
            'waiting_time' => $request->pizzaWaitingTime,
        ];
    }


    /********************************************************************************************/
}
