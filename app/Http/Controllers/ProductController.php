<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
    	$product = Product::all();
    	
    	return view('product.index')->with('product',$product);
    }
    public function create()
    {
        return view('product.create');
    }
    public function store(Request $request)
    {
        
        $product = new Product;
        $product ->name = $request->name;
        $product ->price = $request->price;
        $product ->save();
        
     
         return redirect()->route('product.index');
    }
    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show')->with('product',$product);
    }

    public function destroy($id){

        Product::destroy($id);
        return redirect()->route('product.index');
    }
    public function edit($id){

        $product = Product::find($id);

        
        return view('product.edit',compact('product',$product));
    }
    public function update(Request $request,$id){

       $product= Product::find($id);

       $product->name =$request->name;
       $product->price= $request->price;
       $product->save();
       return redirect()->route('product.index');
    }

}   
