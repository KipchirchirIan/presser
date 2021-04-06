<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class PostControllerTest extends TestCase
{
	/**
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function testIndexLoggedIn()
	{
		$user = factory(User::class)->create();

		$this->actingAs($user, 'web')
			->get('/admin/posts')
			->assertStatus(200)
			->assertSeeText('Post Title')
			->assertSeeText('Status')
			->assertSeeText('Content')
			->assertViewIs('admin.posts.index')
			->assertViewHas('posts');
	}

	public function testIndexLoggedOut()
	{
		$response = $this->get('/admin/posts');

		$response->assertStatus(302)
			->assertRedirect('/login');
	}

	public function testCreateLoggedIn()
	{
		$user = factory(User::class)->create();

		$this->actingAs($user, 'web')
			->get('/admin/posts/create')
			->assertStatus(200)
			->assertSeeText('Create New Post')
			->assertSeeText('Post Title')
			->assertSeeText('Content')
			->assertSeeText('Status')
			->assertViewIs('admin.posts.create');
	}

	public function testCreateLoggedOut()
	{
		$response = $this->get('/admin/posts/create');

		$response->assertStatus(302)
			->assertRedirect('/login');
	}

	public function testStoreLoggedIn()
	{
		$user = factory(User::class)->create();

		$response = $this->actingAs($user, 'web')
			->post(
				'/admin/posts',
				[
					'post_title' => 'Test post',
					'post_content' => 'Test content',
					'post_status' => 'published',
					'post_author' => Auth::id(),
					'_token' => csrf_token()
				]
			);

		$response->assertStatus(200)
			->assertRedirect('/admin/dashboard');
	}
}
