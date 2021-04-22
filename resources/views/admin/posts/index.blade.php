@extends('admin.layouts.app')

@section('content')
	<div class="postidx-tbl-cont">
		<a class="btn btn-primary" href="{{ url('admin/posts/create')}}" role="button"><i class="fas fa-plus"></i>&nbsp;Add
			Post</a>
		<table class="table table-bordered table-striped mt-2">
			<thead>
			<tr>
				<th>Post Title</th>
				<th>Content</th>
				<th>Status</th>
				<th>Author</th>
				<th>Created At</th>
				<td>Actions</td>
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
					<td>
						<a href="{{ action('PostController@show', ['post' => $post->id]) }}" title="View">View</a> |
						<a href="{{ action('PostController@edit', ['post' => $post->id]) }}" title="Edit">Edit</a> |
						<form class="d-inline" action="{{ action('PostController@destroy', ['post' => $post->id]) }}" method="post">
							@method('DELETE')
							@csrf
							<button type="submit" class="btn btn-link m-0 p-0" title="Delete" value="Delete">Delete</button>
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>

		</table>
	</div>
@endsection
