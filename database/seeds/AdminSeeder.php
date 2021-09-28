<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'Esrat jahan',
            'email' =>'admin@gmail.com',
            'password' => bcrypt('admin123456789'),
            'role_as' => 'admin'
        ]);
    }
}
