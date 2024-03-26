<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use app\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {

        // for ($i=1; $i <=50 ; $i++) { 
        //     # code...
        //     $user = new User;   
        //     $user->email = 'admin'.$i.'@gmail.com';
        //     $user->password =  Hash::make('matkhau');
        //     $user->save();

        // }

        // DB::table('users')->insert([
        //     'email'=> 'bigad@gmail.com',
        //     'password' => Hash::make('matkhau'),
        // ]);
        for ($i = 0; $i <= 50; $i++) {
            # code...
            DB::table('users')->insert([
                'email' => 'admin' . $i . '@gmail.com',
                'password' => Hash::make('matkhau'),
                'user_catalogue_id' =>'1'
            ]);
        }
    }
}
