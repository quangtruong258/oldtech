<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i <=50 ; $i++) { 
            # code...
            $user = new User;   
            $user->email = 'admin'.$i.'@gmail.com';
            $user->password =  Hash::make('matkhau');
            $user->save();

        }
    }
}
