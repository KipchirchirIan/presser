@extends('admin.layouts.app')

@section('content')
	<dl class="row">
		<dt class="col-sm-3">ID</dt>
		<dd class="col-sm-9">{{ $post->id }}</dd>

		<dt class="col-sm-3">Title</dt>
		<dd class="col-sm-9">{{ $post->post_title }}</dd>

		<dt class="col-sm-3">Content</dt>
		<dd class="col-sm-9">{{ $post->post_content }}</dd>

		<dt class="col-sm-3">Status</dt>
		<dd class="col-sm-9">{{ $post->post_status }}</dd>

		<dt class="col-sm-3">Author</dt>
		<dd class="col-sm-9">{{ $post->post_author }}</dd>
	</dl>
@endsection
