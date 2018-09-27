<?php

use Illuminate\Database\Seeder;
use App\User;
use \Illuminate\Support\Facades\Hash;

class UserTempSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'secret',
            'email' => 'secret@secret.com',
            'password' => Hash::make('secret'), // secret
            'remember_token' => str_random(10),
        ]);
    }
}
