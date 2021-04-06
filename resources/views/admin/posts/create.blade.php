@extends('admin.layouts.app')

@section('content')
	<div>
		<h2>Create New Post</h2>
		<form action="{{ route('post.store') }}" method="post">
			@csrf
			<div class="form-group">
				<label for="post_title">Post Title</label>
				<input type="text" class="form-control" id="post_title" name="post_title">
			</div>
			<div class="form-group">
				<label for="post_content">Content</label>
				<textarea class="form-control" name="post_content" id="post_content" cols="40" rows="5" placeholder="Post Content"></textarea>
			</div>
			<div class="form-group">
				<label for="post_status">Status</label>
				<select class="form-control" name="post_status" id="post_status">
					<option value="published">Publish</option>
					<option value="draft">Draft</option>
					<option value="scheduled">Schedule</option>
				</select>
			</div>
			<div class="form-group">
				<input class="btn btn-primary" type="submit" name="btnPost" value="Submit">
			</div>
		</form>
	</div>
@endsection
