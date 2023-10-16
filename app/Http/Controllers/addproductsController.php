<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;

class addproductsController extends Controller
{
    public function Store(Request $request)
    {
        $products = new Products();
        $products->sku = $request->input('sku');
        $products->number = $request->input('number');
        $products->category = $request->input('category');
        $products->name = $request->input('name');
        $products->stock = $request->input('stock');
        $products->min_stock = $request->input('min_stock');
        $products->price = $request->input('price');
        $products->image ='NA';

        $products->save();



      return response()->json([
        'msg'=>'Successfully Saved',
        'approved'=>$request->input('id', [])
      ],200);
    }
}
