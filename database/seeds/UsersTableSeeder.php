<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	[
	        	'name' => 'Автор не известен',
	        	'email' => 'unknown@gmail.com',
	        	'password' => bcrypt(Str::random(16)),
        	],
        	[
	        	'name' => 'Автор',
	        	'email' => 'shilenkomp@mail.ru',
	        	'password' => bcrypt('123123'),
        	],
        ];

        DB::table('users')->insert($data);
    }
}
