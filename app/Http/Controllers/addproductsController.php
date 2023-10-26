<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addproductsController extends Controller
{
    public function Store(Request $request)
    {
        $products = new Products();
        $statement = DB::select("SHOW TABLE STATUS LIKE 'products'");

        $products->supplierid = $request->input('supplierid');

        $products->brandid = $request->input('brandid');
        $products->categoryid = $request->input('categoryid');
        $products->sku =  '00'.$request->input('supplierid').'00'.$request->input('brandid').'00'.$request->input('categoryid').'00'.$statement[0]->Auto_increment;

        $products->name = $request->input('name');
        $products->proddesc = $request->input('proddesc');
        $products->baseprice = $request->input('baseprice');
        $products->sellprice = $request->input('sellprice');
        $products->min_stock = $request->input('min_stock');
        $products->image ='NA';

        $products->save();



      return response()->json([
        'msg'=>'Successfully Saved',
      ],200);
    }

    public function GetProducts()
    {
      $data = DB::table('v_products')
          ->select(DB::raw('*'))
          ->get();

      return response()->json(['data'=> $data]);
    }

    public function GetProductsCashier()
    {
      $data = DB::table('v_products')
          ->select(DB::raw('*'))
          ->get()->toArray();

      return response()->json($data);
    }



}
