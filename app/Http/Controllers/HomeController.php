<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ViewProducts;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){
        $products = Products::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('name', 'LIKE', '%' . $search . '%')
                          ->orWhere('categoryid', 'LIKE', '%' . $search . '%')
                            ->get();
                }
            }]
        ])->paginate(4);
        return view('customer.pages.shop',compact('products'));
    }

    public function category(Request $request){
        $products = Products::where([
            ['categoryid', '!=', Null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->Where('categoryid', $search )
                        // ->orWhere('email', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->paginate(4);
  
        return view('customer.pages.shop',compact('products'));
    }


    public function productsingle($id){

        $products = DB::table('v_products')
        ->select(DB::raw('*'))
        ->where('id',$id)
        ->first();

        return view('customer.pages.shop_single')->with('product',$products);
    }
}
