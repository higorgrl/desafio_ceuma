<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //ADMIN

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'servidor' => 'N',
            'admin' => 'S',
			'password' => Hash::make('123456'),
        ]);

    }
}
