<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('tbl_posts')->insert([
			'post_title' => 'Lorem Ipsum',
			'post_content' => 'Lorem Ipsum dolor sit amet...',
			'post_status' => 'published',
			'post_author' => 1,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		]);
		DB::table('tbl_posts')->insert([
			'post_title' => 'Laravel: A PHP Framework',
			'post_content' => 'Laravel is one of the best frameworks out there not only in the PHP realm but it dominates other frameworks built on top of other languages',
			'post_status' => 'published',
			'post_author' => 1,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s'),
		]);
	}
}
