<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class CreateUsersSeeder extends Seeder
{
    public function run()
    {
        $users = [
           
            [
               'name'=>'Admin',
               'email'=>'admin@educare.com',
               'type'=>1,
               'password'=> bcrypt('wekwekwek'),
            ],
        
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}