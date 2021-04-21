<?php

namespace Tests\Feature;

use App\Post;
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

		$response->assertStatus(302)
			->assertRedirect('/admin/posts');
	}

	public function testEditLoggedIn()
	{
		$user = factory(User::class)->create();
		$post = factory(Post::class)->create();

		$this->actingAs($user, 'web')
			->get("/admin/posts/{$post->id}/edit")
			->assertStatus(200)
			->assertSeeText('Post Title')
			->assertSeeText('Content')
			->assertSeeText('Status')
			->assertViewIs('admin.posts.edit')
			->assertViewHas('post');
	}

	public function testUpdateLoggedIn()
	{
		$this->actingAs(factory(User::class)->create());
		$post = factory(Post::class)->create(['post_author' => Auth::id()]);
		$post->post_title = "Updated Title";

		$this->put('/admin/posts/' . $post->id, $post->toArray())
			->assertRedirect('/admin/posts');
		$this->assertDatabaseHas('tbl_posts', ['id' => $post->id, 'post_title' => 'Updated Title']);
	}

	public function testShowLoggedIn()
	{
		$this->actingAs(factory(User::class)->create());
		$post = factory(Post::class)->create();

		$response = $this->get('/admin/posts/' . $post->id);

		$response->assertSee($post->post_title)
			->assertSee($post->post_content)
			->assertSee($post->post_status)
			->assertViewIs('admin.posts.show')
			->assertViewHas('post');
	}
}
