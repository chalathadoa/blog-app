@extends('layout/header')

@section('content')
  <div class="mx-auto w-[75%] my-32">
		<form action="/save-user" method="POST">
			@csrf
			<div>
				<h2 class="text-base text-center font-semibold leading-7 text-gray-900">Add New Account</h2>
				<p class="mt-1 text-sm text-center leading-6 text-gray-600">Fill this form to make a new account.</p>

				<div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
					<div class="col-span-full">
						<label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
						<div class="mt-2">
							<input type="text" name="username" id="username" autocomplete="username" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 placeholder:text-gray-400 focus:ring-2 focus:ring-gray-800 sm:text-sm sm:leading-6" placeholder="janesmith">
						</div>
					</div>
					<div class="col-span-full">
						<label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
						<div class="mt-2">
							<input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-1 focus:ring-inset focus:ring-gray-800 sm:text-sm sm:leading-6">
						</div>
					</div>
					<div class="col-span-full">
						<label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
						<div class="mt-2">
							<input type="text" name="name" id="username" autocomplete="name" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 placeholder:text-gray-400 focus:ring-2 focus:ring-gray-800 sm:text-sm sm:leading-6" placeholder="janesmith">
						</div>
					</div>
					<div class="col-span-full">
						<label for="role" class="block text-sm font-medium leading-6 text-gray-900">Role</label>
						<div class="mt-2">
							<select id="role" name="role" autocomplete="role" class="block w-full rounded-md border-0 py-1.5 pl-2 text-gray-900 shadow-sm ring-1 placeholder:text-gray-400 focus:ring-2 focus:ring-gray-800 sm:text-sm sm:leading-6">
								<option value="admin">Admin</option>
								<option value="author">Author</option>
							</select>
						</div>
					</div>
				</div>
			</div>

			<div class="mt-6 flex items-center justify-end gap-x-6">
				<button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
				<button type="submit" class="rounded-md bg-black px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-white hover:text-black hover:outline hover:outline-1 hover:outline-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">Create Account</button>
			</div>
		</form>
	</div>
@endsection