<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;

class ChangePublishController extends Controller
{
    //

    public function __invoke( Request $request){
        $post = $request->input();
        $userServiceNameSpace = '\App\Services\\' . ucfirst($post['model']). 'Service';
        if(class_exists($userServiceNameSpace)){
            $serviceInstance = app($userServiceNameSpace);
        }
        $flag = $serviceInstance->updateStatus($post);

        return response()->json(['flag' => $flag]);


    }
}
