@extends('admin.layouts.app')

@section('content')
	<div>
		<a class="btn btn-primary" href="{{ url('admin/posts/create')}}" role="button"><i class="fas fa-plus"></i>&nbsp;Add Post</a>
		<table class="table table-bordered table-striped mt-2">
			<thead>
			<tr>
				<th>Post Title</th>
				<th>Content</th>
				<th>Status</th>
				<th>Author</th>
				<th>Created At</th>
			</tr>
			</thead>
			<tbody>
			@foreach($posts as $post)
				<tr>
					<td>{{ $post->post_title }}</td>
					<td>{{ $post->post_content }}</td>
					<td>{{ $post->post_status }}</td>
					<td>{{ $post->post_author }}</td>
					<td>{{ $post->created_at }}</td>
				</tr>
			@endforeach
			</tbody>

		</table>
	</div>
@endsection
