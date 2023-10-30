<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
// use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomAuthController extends Controller
{
    public function index_loginadmin()
    {
        return view('admin.index');
    }

    public function index_logincustomer()
    {
        return view('customer.index');
    }


    public function customLogin(Request $request)
    {

        $request->validate([
            'cpnumber' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('cpnumber', 'password');

        if (Auth::attempt($credentials)) {
            $user = DB::table('users')
                  ->select(DB::raw('*'))
                  ->where('cpnumber', '=', $request->cpnumber)
                  ->get();

            // print_r( $user );

            session()->put('user', $user);
            $roleid = session('user')[0]->roleid;
            if ( $roleid=="2"){
                return redirect("/admin")->with(['msg'=>'Login details are not valid']);
            }else{
                return redirect("/customer")->with(['msg'=>'Login details are not valid']);
            }
        }

        return redirect("/login")->with(['msg'=>'Login details are not valid']);
    }

   public function dashboard()
    {
        if(Auth::check()){

            $roleid = session('user')[0]->roleid;
            if ( $roleid=="2"){
                return view('admin.pages.index');
            }else{
                return view('customer.pages.index');
            }

        }
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
        return redirect()->route('userlogin');
    }
}
