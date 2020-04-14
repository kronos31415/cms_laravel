<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'pawcio120@op.pl')->first();
        if(!$user){
            User::create([
                'name'=>"PAwcio",
                'email'=>"pawcio120@op.pl",
                'role'=>"admin",
                'password'=>Hash::make('password'),
            ]);
        }
    }
}
