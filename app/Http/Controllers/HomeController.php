<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
class HomeController extends Controller
{
    public function index(Request $request){
        $products = Products::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('name', 'LIKE', '%' . $search . '%')
                        // ->orWhere('email', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->paginate(4);
        return view('customer.pages.shop',compact('products'));
    }
}
