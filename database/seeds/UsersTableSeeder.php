<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'admin';
        $user->email = 'admin@aqi.co.id';
        $user->password = bcrypt('adminadmin');
        $user->role = 'admin';
        $user->save();
    }
}
