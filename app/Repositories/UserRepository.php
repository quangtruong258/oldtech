<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;


/**
 * Class UserService
 * @package App\Services
 */
class UserRepository implements UserRepositoryInterface
{
    protected $user;

public function __construct( User $user){
   $this->user = $user;

    
}


    public function getAllPaginate(){
        
        return User::paginate(20); 
    }

    public function create( array $payload =[]){
        $user = $this->user->store($payload);
        return $user ->fresh();

    }

}