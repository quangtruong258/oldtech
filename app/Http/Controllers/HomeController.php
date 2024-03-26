<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$config = $this->config();
        // $template = 'user.home.index';
        $products = Product::where('cate_id','1')->paginate(6);
        return view('user.home.index',compact('products'));
    }

    public function category(Category $cat){
        //dd($cat->products);
        
        $products = $cat->products()->paginate(9);
        return view('user.home.category', compact('cat','products'));
    }


    public function product(Product $product){
        //dd($cat->products);
        $relativeProducts = Product::where('cate_id',$product->cate_id)->limit(5)->get();
        return view('user.home.product-detail',compact('product','relativeProducts') );
    }

    public function search(Request $request){
        $keyword = $request->keyword;
        $search_results = Product::where('ten','like','%' .$keyword.'%')->paginate(6);
        return view('user.home.search',compact('search_results'));
        //dd($search); 
    }

    // public function config() 
    // {
    //     return [
    //         'js' => [
                

    //         ]
    //     ];
    // }
}
