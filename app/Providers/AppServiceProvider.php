<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\ProductType;

class AppServiceProvider extends ServiceProvider
{
    


    public $serviceBinding =[
        'App\Services\Interfaces\UserServiceInterface' => 'App\Services\UserService',
        'App\Repositories\Interfaces\UserRepositoryInterface' => 'App\Repositories\UserRepository',
    ];
    /**
     * Register any application services.
     *
     * @return void
     */



    public function register()
    {
        //
        foreach ($this->serviceBinding as $key => $value) {
            # code...
            $this->app->bind($key,$value);
        }

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view){
            $categories = Category::orderBy('ten','ASC')->get();
            foreach($categories as $cate){
                $typeprodcuts = ProductType::where('category_id',$cate->id)->get();
                //dd($typeprodcuts);
            }
            $carts = Cart::where('customer_id',auth('cus')->id())->get();

        
           
            //dd($categories);
          
            ;
            $view ->with(compact('categories','typeprodcuts','carts'));
        });
    }
}
