<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Products Details
    public function index(){
        $products = Product::all();
        $data=[
            'title'=>'Products',
            'products'=>$products
        ];
        return view('admin.products.index',$data);
    }

    // Products register
    public function register(){        
        $url = '/admin/products/store';
        $title = 'Products Register';
        $data= compact('url','title');
        return view('admin.products.register')->with($data);
    }

    // Products store
    public function store(Request $request){
        $request->validate(
            [
                'product_name'=>'required'
            ]
        );

        $product = new Product;
        $product->product_name = $request['product_name'];
        $product->save();
        return redirect('/admin/products');

    }

    // Products edit
    public function edit($id){
        $product = Product::find($id);
        if(is_null($product)){
            // product not found
            return redirect('/admin/products');
        }else {
            // product found
            $url = '/admin/products/update'.'/'.$id;
            $title = 'Product Edit';

            $data= compact('product','url','title');
            return view('admin.products.register')->with($data);

        }
    }

    // Products update
    public function update($id, Request $request){
        $product = Product::find($id);
        $product->product_name = $request['product_name'];

        $product->save();

        return redirect('/admin/products');

    }

    // product delete
    public function delete($id){
        $product = Product::find($id);
        if(!is_null($product)){
            $product->delete();
        }

        return redirect()->back();

    }
}
