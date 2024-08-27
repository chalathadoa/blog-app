@extends('layout/header')

@section('content')
	<div class="w-[75%] pt-20 mx-auto">
		<div class="mt-10 flex items-center justify-between gap-x-6">
			<h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-3xl">List Akun</h1>
			<a href="{{ route('add-user') }}" class="rounded-md bg-black px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-white hover:text-black hover:outline hover:outline-1 hover:outline-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">Add New User</a>
		</div>
		<div class="border-b border-gray-900/10 pb-12"></div>
		<ul role="list" class="divide-y divide-gray-100">
			@if ($users)
				@foreach ($users as $user)
					<li class="flex justify-between gap-x-6 py-5">
						<div class="flex min-w-0 gap-x-4">
							<img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{ asset('images/profile.png') }}" alt="https://www.flaticon.com/free-icons/user">
							<div class="min-w-0 flex-auto">
								<p class="text-sm font-semibold leading-6 text-gray-900">{{ $user->username }}</p>
								<p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $user->name }}</p>
								<p class="text-sm leading-6 text-gray-900">{{ $user->role }}</p>
							</div>
						</div>
						<div class="hidden shrink-0 items-center space-x-2 sm:flex sm:flex-col sm:items-end" style="display: inline">
							<a href="{{ route('akun.edit', $user->username) }}" class="rounded-md self-center mb-2 bg-black px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-white hover:text-black hover:outline hover:outline-1 hover:outline-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">Edit</a>
							<form action="{{ route('akun.delete', $user->username) }}" method="POST" style="display:inline;">
								@csrf
								@method('DELETE')
								<button type="submit" class="rounded-md self-center bg-black px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-white hover:text-black hover:outline hover:outline-1 hover:outline-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black" onclick="return handleDelete('{{ $user->username }}');">Delete</button>
							</form>
						</div>
					</li>
				@endforeach
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