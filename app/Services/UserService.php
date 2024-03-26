<?php

namespace App\Services;

use App\Services\Interfaces\UserServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository ;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests\StoreUserRequest;



/**
 * Class UserService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{
protected $userRepository ;
protected $model;
    public function __construct(UserRepository $userRepository, User $model)
    {
        $this->userRepository = $userRepository;
        $this->model = $model;
    }

    public function pagination(array $column =['*'], array $condition = [], array $join =[], int $perpage =20){


        // $users = $this->userRepository->getAllPaginate();

        // $users = $this->model->paginate(20);
//        $condition['keyword'] = addslashes($request->input('keywo'))

        $query  = $this->model->select($column)->where($condition);
        if(!empty($join)){
            $query->join(...$join);
        }
        return $query->paginate($perpage); 
        
    }


    public function paginationByKeyword(array $column =['*'], array $condition = [], array $join =[], int $perpage =20, $request){


        // $users = $this->userRepository->getAllPaginate();

        // $users = $this->model->paginate(20);
//        $condition['keyword'] = addslashes($request->input('keywo'))
        $condition['keyword'] = addslashes($request->input('keyword'));
        dd($condition);

        $query  = $this->model->select($column)->where($condition);
        if(!empty($join)){
            $query->join(...$join);
        }
        return $query->paginate($perpage); 
        
    }

    public function create($request){
        // DB::beginTransaction();
        // try {

        //     $payload = $request->except(['send','_token','re_password']);
        //     $payload['password'] = Hash::make( $payload['password']);
        //     $payload['re_password'] = Hash::make( $payload['re_password']);
        //     dd($payload);
        //     // $user = $this->userRepository->create($payload);
        //     // dd($user);

             
        //     DB::commit();
        //     return true;
        // } catch (\Exception $e) {
        //     //throw $th;
        //     DB::rollBack();
        //     echo $e->getMessage();
        //     return false;
        // }
        $dataInput = [
            'email' => $request->input('email'),
            'password' => Hash::make( $request->input('password')),  
            'image'=> $request->input('image'),
            'user_catalogue_id'=> $request->input('user_catalogue_id'),
        ];
        $model = $this->model->create($dataInput);
        return $model->fresh();
        // dd($dataInput);
        // try {
        //     User::create([
        //         'email' => $storeUserRequest->input('email'),
        //         'password' => Hash::make( $storeUserRequest->input('password')),  
        //         'image'=> $storeUserRequest->input('image'),
        //         'user_catalogue_id'=> $storeUserRequest->input('user_catalogue_id'),
        //     ]);
        // } catch (\Throwable $th) {
        //     return redirect()->route('admin.dashboad.user')->with('error','Có lỗi xảy ra');
        // }
    }

    public function findById(int $modelId, array  $column = ['*'], array $relation = [] ){
        return $this->model->select($column)->with($relation)->findOrFail($modelId);
    }


    public function update($id, $request){
        $dataInput = [
            'image'=> $request->input('image'),
            'user_catalogue_id'=> $request->input('user_catalogue_id'),
        ];
        $model = $this->findById($id);
        // dd($dataInput);
        return $model->update($dataInput);
    }


    public function destroy($id){
        $model = $this->findById($id);
        // dd($dataInput);
        return $model->delete();

    }


    public function updateStatus($post =[]){

        dd( $post['value']);
        if ($post['value'] == 1) {
            $post['value'] == 0;
        }
        $post['value'] == 1;
        //dd( $post['value']);
        $dataInput =  $post['value'] ;
        //$dataInput[$post['field']] = (($post['value'] == 1)?0:1);
        //dd( $dataInput[$post['field']]);
        $modelId = $post['modelId'];
        //dd($modelId);

        $model = $this->findById($modelId);
        return $model->update($dataInput);
        

    }


}
