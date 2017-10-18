<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AccessUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('access_user')->insert([
        	'id' => 1,
            'access_id' => 1,
            'user_id' => 1,
            'created_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('access_user')->insert([
        	'id' => 2,
            'access_id' => 2,
            'user_id' => 2,
            'created_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('access_user')->insert([
        	'id' => 3,
            'access_id' => 3,
            'user_id' => 3,
            'created_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('access_user')->insert([
        	'id' => 4,
            'access_id' => 4,
            'user_id' => 4,
            'created_at' => date('Y-m-d h:m:s')
        ]);
    }
}