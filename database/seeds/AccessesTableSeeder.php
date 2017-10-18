<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AccessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accesses')->insert([
            'id' => 1,
            'access_name' => 'Administrator',
            'access_description' => 'System administrator who can access all areas of this application',
            'access_level' => 1,
            'created_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('accesses')->insert([
        	'id' => 2,
            'access_name' => 'Examinations Officer',
            'access_description' => 'Examinations officer, one who can issue results plus audit queries',
            'access_level' => 2,
            'created_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('accesses')->insert([
            'id' => 3,
            'access_name' => 'Management',
            'access_description' => 'Management of the college like principality, admissions and officers.',
            'access_level' => 3,
            'created_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('accesses')->insert([
        	'id' => 4,
            'access_name' => 'Senior Lecturer',
            'access_description' => 'Prof',
            'access_level' => 4,
            'created_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('accesses')->insert([
            'id' => 5,
            'access_name' => 'Lecturer',
            'access_description' => 'Phd',
            'access_level' => 4,
            'created_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('accesses')->insert([
            'id' => 6,
            'access_name' => 'Assistant Lecturer',
            'access_description' => 'Masters',
            'access_level' => 4,
            'created_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('accesses')->insert([
            'id' => 7,
            'access_name' => 'Tutorial Assistant',
            'access_description' => 'Bachelor',
            'access_level' => 4,
            'created_at' => date('Y-m-d h:m:s')
        ]);

        // DB::table('accesses')->insert([
        // 	'id' => 8,
        //     'access_name' => 'Student',
        //     'access_description' => 'Students who are allowed to login and view results. Appeals can also be filed by them',
        //     'access_level' => 5,
        //     'created_at' => date('Y-m-d h:m:s')
        // ]);
    }
}
