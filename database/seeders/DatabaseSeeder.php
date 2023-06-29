<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'address' => "yangon",
            'phone' => '097880035804',
            'role' => 'admin',
            'password' => Hash::make('admin1234'),
            'gender'=>'male'
        ]);
        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'address' => "yangon",
            'phone' => '09778005512',
            'role' => 'user',
            'password' => Hash::make('user1234'),
            'gender'=>'female'
        ]);
    }
}
