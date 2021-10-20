<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User();
        $user->name='admin';
        $user->password=1234;
        $user->mobile='09388732320';
        $user->role=1;
        $user->save();
    }
}
