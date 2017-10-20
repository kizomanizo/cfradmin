<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'firstname' => 'Admin',
            'secondname' => 'Mkuu',
            'surname' => 'Mfawidhi',
            'email' => 'kizomanizo@gmail.com',
            'username' => 'admin',
            'temp_password' => 1234,
            'password' => bcrypt(1234),
            'status' => 0,
            'created_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('users')->insert([
        	'id' => 2,
            'firstname' => 'Peter',
            'secondname' => 'Samson',
            'surname' => 'Marusu',
            'email' => 'marusups@cfr.ac.tz',
            'username' => 'marusups',
            'temp_password' => 1234,
            'password' => bcrypt(1234),
            'status' => 0,
            'created_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('users')->insert([
        	'id' => 3,
            'firstname' => 'Joyce',
            'secondname' => 'Samson',
            'surname' => 'Ndengerio',
            'email' => 'ndengeriojs@cfr.ac.tz',
            'username' => 'ndengeriojs',
            'temp_password' => 1234,
            'password' => bcrypt(1234),
            'status' => 0,
            'created_at' => date('Y-m-d h:m:s')
        ]);

        DB::table('users')->insert([
        	'id' => 4,
            'firstname' => 'Saidi',
            'secondname' => 'Ally',
            'surname' => 'Mkunga',
            'email' => 'mkungasa@cfr.ac.tz',
            'username' => 'mkungasa',
            'temp_password' => 1234,
            'password' => bcrypt(1234),
            'status' => 0,
            'created_at' => date('Y-m-d h:m:s')
        ]);
    }
}
