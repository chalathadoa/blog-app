@extends('layout/header')

@section('content')
<div class="w-[75%] pt-20 mx-auto">
    <div class="mt-10 flex items-center justify-between gap-x-6">
        <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-3xl">List Post</h1>
        <a href="{{ route('post.create') }}" class="rounded-md bg-black px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-white hover:text-black hover:outline hover:outline-1 hover:outline-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">Add New Post</a>
    </div>
    <div class="border-b border-gray-900/10 pb-12"></div>
    <ul role="list" class="divide-y divide-gray-100">
        @if ($posts)
					<table class="table-auto">
						<thead>
							<tr>
								<th>No.</th>
								<th>Title</th>
								<th>Content</th>
								<th>Date</th>
								<th>Created By</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								@foreach ($posts as $post=>$index)
									<td>{{ $index++ }}</td>
									<td>{{ $post->title }}</td>
									<td>{{ $post->content }}</td>
									<td>{{ $post->date }}</td>
									<td>{{ $post->username }}</td>
									<td>
										<a href="{{ route('posts.edit', $post->idpost) }}">Edit</a>
										<form action="{{ route('posts.destroy', $post->idpost) }}" method="POST" style="display:inline;">
												@csrf
												@method('DELETE')
												<button type="submit">Delete</button>
										</form>
									</td>
								@endforeach
							</tr>
						</tbody>
					</table>
        @endif
    </ul>
</div>

<script>
function handleDelete(username) {
    if (confirm('Are you sure you want to delete this item?')) {
        document.getElementById('delete-form-' + username).submit();
    }
}
</script>
@endsection