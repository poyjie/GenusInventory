<?php

namespace App\Http\Controllers;
use App\Models\Sales;
use App\Models\Branchcounter;
use App\Models\Transactioncash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class salesController extends Controller
{
    //
    public function Store(Request $request)
    {
        $sales = new Sales();
        $sales->branch = $request->input('branch');      
        $sales->cashiernum = $request->input('cashiernum'); 
        
        $sales->user = $request->input('user');           
        $sales->transactionnum = $request->input('transactionnum');
        $sales->sku = $request->input('sku');
        $sales->amount = $request->input('amount');
        $sales->totalamount = $request->input('totalamount');
        $sales->qty = $request->input('qty');
        $sales->save();

      return response()->json([
        'msg'=>'Successfully Saved',
        'approved'=>$request->input('id', [])
      ],200);

    }

    public function AddTranscationNumber( $branchname,$cashiernum)
    {

    $currentTransactionNum = DB::table('branchcounter')
    ->select(DB::raw('transnum'))
    ->where('branchname', $branchname)
    ->where('cashiernum', $cashiernum)
    ->first();

    $transnum = $currentTransactionNum->transnum + 1;

    DB::table('branchcounter')
    ->where('branchname', $branchname)
    ->where('cashiernum', $cashiernum)
    ->update(['transnum' => $transnum]);

   
    return  $this->GetTransactionNum($branchname,$cashiernum);;
    }

    
    public function GetTransactionNum($branchname,$cashiernum)
    {
      $data = DB::table('branchcounter')
          ->select(DB::raw('*'))
          ->where('branchname',$branchname)
          ->where('cashiernum',$cashiernum)
          ->get()->toArray();

      return response()->json($data);
    }

    public function TransactCash(Request $request)
    {
      $transactioncash = new Transactioncash();
      $transactioncash->branch = $request->input('branch'); 
      $transactioncash->cashiernum = $request->input('cashiernum'); 
      $transactioncash->transactionnum = $request->input('transactionnum');
      $transactioncash->totalamount = $request->input('totalamount');      
      $transactioncash->totalcash = $request->input('totalcash');      
      $transactioncash->totalchange = $request->input('totalchange');  
      $transactioncashd->save();
      return response()->json([
        'msg'=>'Successfully Saved',
      ],200);


    }


  }

