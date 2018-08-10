<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run(){
		Model::unguard();
		 
		//$this->call('ForumTableSeeder');
		//$this->command->info('User Table Seeded!');
	}
}
 
class UserTableSeeder extends Seeder {
	public function run(){
		
		DB::table('users')->insert([
		'username' => 'admin4',
		'email' => 'nattatatasdas@gmail.com',
		'password' => Hash::make('12345'),
		'name' => 'ณัฐธรรศ ทองใบ',
		'tel' => '123456789',
		'type' => 'student',
		'active' => 'Y',
		'created_at' => date('Y-m-d H:i:s')
		]);
	}
}
class ForumTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('forum_groups')->insert([
        	'title' => 'Generl Discustion',
        	'author_id' =>33

        	]);
        	
        DB::table('forum_categories')->insert([
        	'group_id' => 1,
        	'title' =>'Test Categry 1',
        	'author_id'=>33
        	]);
        DB::table('forum_categories')->insert([
        	'group_id' => 1,
        	'title' =>'Test Categry 2',
        	'author_id'=>33
        	]);

 	}
}
