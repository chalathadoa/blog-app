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
					<div class="relative overflow-x-auto">
						<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
								<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
										<tr>
												<th scope="col" class="px-6 py-3">
														No.
												</th>
												<th scope="col" class="px-6 py-3">
														Title
												</th>
												<th scope="col" class="px-6 py-3">
														Content
												</th>
												<th scope="col" class="px-6 py-3">
														Created By
												</th>
												<th scope="col" class="px-6 py-3">
														Created At
												</th>
												<th scope="col" class="px-6 py-3">
														Aksi
												</th>
										</tr>
								</thead>
								<tbody>
									@foreach ($posts as $index => $post)
										<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
											<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
													{{ $index + 1 }}
											</th>
											<td class="px-6 py-4">
													{{ $post->title }}
											</td>
											<td class="px-6 py-4">
													{{ $post->content }}
											</td>
											<td class="px-6 py-4">
													{{ $post->username }}
											</td>
											<td class="px-6 py-4">
													{{ $post->date }}
											</td>
											<td class="px-6 py-4" style="display: inline">
												<a href="{{ route('post.edit', $post->idpost) }}" class="rounded-md self-center mb-2 bg-black px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-white hover:text-black hover:outline hover:outline-1 hover:outline-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">Edit</a>
												<form action="{{ route('post.delete', $post->idpost) }}" method="POST" style="display:inline;">
													@csrf
													@method('DELETE')
													<button type="submit" class="rounded-md self-center bg-black px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-white hover:text-black hover:outline hover:outline-1 hover:outline-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black" onclick="return handleDelete('{{ $post->idpost }}');">Delete</button>
												</form>
											</td>
										</tr>
									@endforeach
								</tbody>
						</table>
					</div>
        @endif
    </ul>
</div>

<script>
function handleDelete(idpost) {
    if (confirm('Are you sure you want to delete this item?')) {
        document.getElementById('delete-form-' + idpost).submit();
    }
}
</script>
@endsection