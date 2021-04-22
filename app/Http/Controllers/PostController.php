<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Traits\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
	 */
	public function index(Request $request)
	{
		$posts = Post::get();

		if ($request->query('status') !== null) {
			$posts = $posts->where('post_status', $request->query('status'));
		}

		return view('admin.posts.index', ['posts' => $posts]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
	 */
	public function create()
	{
		return view('admin.posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function store(Request $request)
	{
		$id = DB::table('tbl_posts')->insertGetId([
			'post_title' => $request->input('post_title'),
			'post_content' => $request->input('post_content'),
			'post_status' => $request->input('post_status', 'published'),
			'post_author' => Auth::id(),
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		]);

		return redirect()->action('PostController@index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param \App\Post $post
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
	 */
	public function show(Post $post)
	{
		return view('admin.posts.show', ['post' => $post]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Post $post
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
	 */
	public function edit(Post $post)
	{
		return view('admin.posts.edit')
			->with('post', $post);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Post $post
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function update(Request $request, Post $post)
	{
		DB::table('tbl_posts')
			->where('id', $post->id)
			->update([
				'post_title' => $request->input('post_title'),
				'post_content' => $request->input('post_content'),
				'post_status' => $request->input('post_status', 'published'),
				'updated_at' => date('Y-m-d H:i:s')
			]);

		return redirect()->action('PostController@index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Post $post
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy(Post $post)
	{
		DB::table('tbl_posts')->where('id', $post->id)->delete();

		return redirect()->action('PostController@index');
	}
}
