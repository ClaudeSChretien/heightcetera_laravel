<div class="row">
	<div class="col-sm-12">
		<h1 class="display-3">Trips</h1>
		<table class="table table-striped">
			<thead>
				<tr>
					<td>ID</td>
					<td>Name</td>
					<td>Email</td>
					<td>Job Title</td>
					<td>City</td>
					<td>Country</td>
					<td>Country</td>
					<td colspan=2>Actions</td>
				</tr>
			</thead>
			<tbody>
				@foreach($posts as $post)
				<tr>
					<td>{{$post->id}}</td>
					<td>{{$post->name}} </td>
					<td>{{$post->lon}}</td>
					<td>{{$post->lat}}</td>
					<td>{{$post->date}}</td>
					<td>{{$post->text_fr}}</td>
					<td>{{$post->text_en}}</td>

					<td>
						<a href="{{ route('postManager.edit', [$trip->name, $post->id]) }}"
							class="btn btn-primary">Edit</a>
					</td>
					<td>
						<form action="{{ route('postManager.destroy', [$trip->name, $post->id])}}" method="post">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger" type="submit">Delete</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<div class="btn btn-success">

                <a href="/trip/{{$trip->name}}/postManager/create">Create</a>
            </div>
	</div>
</div>