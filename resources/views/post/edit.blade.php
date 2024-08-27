@extends('layout/header')

@section('content')
<div class="mx-auto w-[75%] my-32">
	<form action="{{ route('post.update', $post->idpost) }}" method="POST">
		@csrf
		<div>
			<h2 class="text-base text-center font-semibold leading-7 text-gray-900">Edit Post</h2>
			<p class="mt-1 text-sm text-center leading-6 text-gray-600">Fill this form to edit information of the post.</p>

			<div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <div class="mt-2">
                        <input type="text" value="{{ $post->title }}" name="title" id="title" autocomplete="title" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 placeholder:text-gray-400 focus:ring-2 focus:ring-gray-800 sm:text-sm sm:leading-6" placeholder="blog's title">
                    </div>
                </div>
                <div class="col-span-full">
                    <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Content</label>
                    <div class="mt-2">
                        <textarea name="content" rows="5" id="content" autocomplete="content" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 placeholder:text-gray-400 focus:ring-2 focus:ring-gray-800 sm:text-sm sm:leading-6" placeholder="Write your content here">{{ $post->content }}</textarea>
                    </div>
                </div>
                <div class="col-span-full">
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
                    <div class="mt-2">
                        <select id="username" name="username" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 placeholder:text-gray-400 focus:ring-2 focus:ring-gray-800 sm:text-sm sm:leading-6">
                            @foreach ($accounts as $account)
                              <option value="{{ $account->username }}" {{ $post->username === $account->username ? ' selected' : '' }}>{{ $account->username }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
		</div>

		<div class="mt-6 flex items-center justify-end gap-x-6">
			<button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
			<button type="submit" class="rounded-md bg-black px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-white hover:text-black hover:outline hover:outline-1 hover:outline-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">Update Post</button>
		</div>
	</form>
</div>
@endsection