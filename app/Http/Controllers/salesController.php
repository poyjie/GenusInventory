<?php

namespace App\Http\Controllers;
use App\Models\Sales;
use Illuminate\Http\Request;

class salesController extends Controller
{
    //
    public function Store(Request $request)
    {
        $sales = new Sales();
        $sales->transactionnum = $request->input('transactionnum');
        $sales->productid = $request->input('productid');
        $sales->amount = $request->input('amount');
        $sales->totalamount = $request->input('totalamount');
        $sales->cash = $request->input('cash');
        $sales->qty = $request->input('qty');
        $sales->save();

      return response()->json([
        'msg'=>'Successfully Saved',
        'approved'=>$request->input('id', [])
      ],200);

    }
}
