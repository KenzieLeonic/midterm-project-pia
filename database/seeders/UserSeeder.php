<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'admin@example.com')->first();
        if (!$user) {
            $user = new User;
            $user->name = "admin";
            $user->role = 'ADMIN';
            $user->email = 'admin@example.com';
            $user->password = Hash::make('adminpass');
            $user->save();
        }

        $user = User::where('email', 'student.affair@gmail.com')->first();
        if (!$user) {
            $user = new User;
            $user->name = "Rose";
            $user->role = 'STUDENTAFFAIR';
            $user->email = 'student.affair@gmail.com';
            $user->password = Hash::make('student.affair');
            $user->save();
        }

        $user = User::where('email', 'staff@gmail.com')->first();
        if (!$user) {
            $user = new User;
            $user->name = "Beauty";
            $user->role = 'STAFF';
            $user->email = 'staff@gmail.com';
            $user->password = Hash::make('staffpass');
            $user->save();
        }

        $user = User::where('email', 'manager@gmail.com')->first();
        if (!$user) {
            $user = new User;
            $user->name = "Peter";
            $user->role = 'MANAGER';
            $user->email = 'manager@gmail.com';
            $user->password = Hash::make('managerpass');
            $user->save();
        }

        $user = User::where('email', 'user01@gmail.com')->first();
        if (!$user) {
            $user = new User;
            $user->name = "Mute";
            $user->role = 'USER';
            $user->email = 'user01@gmail.com';
            $user->password = Hash::make('userpass');
            $user->save();
        }

        $user = User::where('email', 'user02@gmail.com')->first();
        if (!$user) {
            $user = new User;
            $user->name = "Smart";
            $user->role = 'USER';
            $user->email = 'user02@gmail.com';
            $user->password = Hash::make('userpass');
            $user->save();
        }

        User::factory(5)->create();
    }
}
