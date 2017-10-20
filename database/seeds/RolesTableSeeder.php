<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'Administrator',
            'description' => 'System Administrators',
            'level' => 1,
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('roles')->insert([
        	'id' => 2,
            'name' => 'Examinations Officer',
            'description' => 'Examinations officers',
            'level' => 2,
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'Manager',
            'description' => 'Management Staff',
            'level' => 3,
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('roles')->insert([
        	'id' => 4,
            'name' => 'Senior Lecturer',
            'description' => 'Proffesorial Academic Staff',
            'level' => 4,
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('roles')->insert([
            'id' => 5,
            'name' => 'Lecturer',
            'description' => 'Doctorate Academic Staff',
            'level' => 4,
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('roles')->insert([
            'id' => 6,
            'name' => 'Assistant Lecturer',
            'description' => 'Masters Academic Staff',
            'level' => 4,
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('roles')->insert([
            'id' => 7,
            'name' => 'Tutorial Assistant',
            'description' => 'Bachelor Degree Staff',
            'level' => 4,
            'created_at' => date('Y-m-d h:m:s'),
            'updated_at' => date('Y-m-d h:m:s')
        ]);
    }
}
