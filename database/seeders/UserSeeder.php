<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        //
        DB::table('users')->insert([
          'name'=>'Admin',
          'email'=>'admin@localhost',
          'password'=>Hash::make('admin'),
          'role'=>'admin'
        ]);

        DB::table('users')->insert([
          'name'=>'Knowledge Engineer',
          'email'=>'ke@localhost',
          'password'=>Hash::make('ke'),
          'role'=>'ke'
        ]);
    }
}
