<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function customLogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = DB::table('users')
                  ->select(DB::raw('*'))
                  ->where('email', '=', $request->email)
                  ->get();
            print_r( $user );
            session()->put('user', $user);

            return redirect()->intended('admin')
                        ->withSuccess('Signed in');
        }

        return redirect("login")->with(['msg'=>'Login details are not valid']);
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('admin.pages.index');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
