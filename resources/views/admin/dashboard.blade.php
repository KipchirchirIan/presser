@extends('admin.layouts.app')

@section('content')
	<div>
		<button class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp;Add Post</button>
		<table class="table table-bordered table-striped mt-2">
			<thead>
			<tr>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Email</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td>John</td>
				<td>Doe</td>
				<td>john@example.com</td>
			</tr>
			<tr>
				<td>Mary</td>
				<td>Moe</td>
				<td>mary@example.com</td>
			</tr>
			<tr>
				<td>July</td>
				<td>Dooley</td>
				<td>july@example.com</td>
			</tr>
			</tbody>
		</table>
	</div>
@endsection
