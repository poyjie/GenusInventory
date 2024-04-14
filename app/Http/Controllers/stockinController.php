<?php

namespace App\Http\Controllers;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class stockinController extends Controller
{
    public function Store(Request $request)
    {


      
        $inventory = Inventory::where(['branchid' => $request->input('branchid'), 'productid' => $request->input('productid')])->first();
        
        if($inventory){
          $inventory->stockin = $inventory->stockin + $request->input('stockin');
          $inventory->save();
        }
        else{
          $products = new Inventory();
          $products->branchid = $request->input('branchid');
          $products->productid = $request->input('productid');
          $products->stockin = $request->input('stockin');
          $products->save();
        }
      
      return response()->json([
        'msg'=>'Successfully Saved',
      ],200);
    }

    public function GetAllStocks()
    {
      $data = DB::table('v_stockall')
          ->select(DB::raw('*'))
          ->get();

      return response()->json(['data'=> $data]);
    }

    public function GetStocksInRecords()
    {
      $data = DB::table('v_stockrecords')
          ->select(DB::raw('*'))
          ->get();

      return response()->json(['data'=> $data]);
    }

    public function GetProductPerbranch($branchname){
      $data = DB::table('v_stockrecords')
          ->select(DB::raw('*'))
          ->where('branchname',$branchname)
          ->get();
          return response()->json(['data'=> $data]);
    }

}
