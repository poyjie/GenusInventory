<?php

namespace App\Http\Controllers;
use App\Models\Customers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Hash;

class addcustomersController extends Controller
{
    public function Store(Request $request)
    {
        $customers = new Customers();
        $customers->fname = $request->input('fname');
        $customers->mname = $request->input('mname');
        $customers->lname = $request->input('lname');
        $customers->bday = $request->input('bday');
        $customers->companyname = $request->input('companyname');
        $customers->companyaddress = $request->input('companyaddress');
        $customers->cpnumber = $request->input('cpnumber');
        $customers->password = 'default';//$request->input('password');
        $email = $request->input('emailadd');
        $customers->emailadd =  $email;
        $customers->profilepic = $request->input('profilepic');
        $customers->roleid = 1;


        $user = new User();
        $user->cpnumber = $request->input('cpnumber');
        $user->password = Hash::make($request->input('cpnumber'));
        $user->email =  $email;
        $user->roleid =  1;

        $user->save();
        $customers->save();

      return response()->json([
        'msg'=>'Successfully Saved',
      ],200);
    }

    public function GetCustomers()
    {
      $data = DB::table('customers')
          ->select(DB::raw('*'))
          ->get();

      return response()->json(['data'=> $data]);
    }


}
