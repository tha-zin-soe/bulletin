<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        DB::table('users')->insert([
            'name'=> 'Admin',
            'email'=>'admin@gamil.com',
            'password'=>Hash::make('admin1234'),
            'isAdmin'=>'1',
            'isPremium'=>'1'
        ]);
    }
}
