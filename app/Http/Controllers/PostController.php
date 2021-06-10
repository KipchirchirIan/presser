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
		$posts = Post::paginate(3);

		if ($request->query('status') !== null) {
			$posts = Post::where('post_status', $request->query('status'))->get();
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
		$request->merge([
			'post_author' => Auth::id(),
		]);
		$post = Post::create($request->input());

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
		$post->fill($request->input());
		$post->save();

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
		$post->delete();

		return redirect()->action('PostController@index');
	}
}
