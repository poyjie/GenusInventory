<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
        $inventory = Inventory::where(['branchid' => $request->input('branchidto'), 'productid' => $request->input('productid')])->first();
        
        if($inventory){
          $inventory->stockin = $inventory->stockin + $request->input('stockin');

          $inventoryfrom = Inventory::where(['branchid' => $request->input('branchidfrom'), 'productid' => $request->input('productid')])->first();
        
          Inventory::
          where('branchid', $request->input('branchidfrom'))
          ->where('productid', $request->input('productid'))
          ->update([
            'stockin' =>  $inventoryfrom->stockin - $request->input('stockin')
          ]);


          $inventory->save();
        }
        else{
          $products = new Inventory();
          $products->branchid = $request->input('branchidto');
          $products->productid = $request->input('productid');
          $products->stockin = $request->input('stockin');
          $products->save();
        }
      
      return response()->json([
        'msg'=>'Successfully Saved',
      ],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
