<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      @vite('resources/css/app.css')

      <title>Blog App - Home</title>

      <link rel="preconnect" href="https://fonts.bunny.net">
      <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  </head>
  <body class="antialiased">
      <div class="bg-white">
          <header class="fixed inset-x-0 top-0 z-50 bg-gray-500 bg-opacity-5 backdrop-blur-sm">
						<nav class="flex items-center justify-between  lg:px-8" aria-label="Global">
							<div class="flex lg:flex-1">
								<a href="#" class="-m-1.5 p-1.5">
										<span class="sr-only">Blog App</span>
										<img class="h-8 w-auto" src="{{ asset('images/logo.png') }}" alt="https://www.flaticon.com/free-icons/blog">
								</a>
							</div>
							<div class="flex lg:hidden">
								<button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
									<span class="sr-only">Open main menu</span>
									<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
										<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
									</svg>
								</button>
							</div>
							<div class="hidden lg:flex lg:gap-x-12">
								<a href="{{ route('beranda') }}" class="text-sm p-5 font-semibold leading-6 text-gray-900 hover:bg-gray-900 hover:text-white">Beranda</a>
								<a href="{{ route('post') }}" class="text-sm p-5 font-semibold leading-6 text-gray-900 hover:bg-gray-900 hover:text-white">Post</a>
								<a href="{{ route('akun') }}" class="text-sm p-5 font-semibold leading-6 text-gray-900 hover:bg-gray-900 hover:text-white">Akun</a>
							</div>
							<div class="hidden lg:flex lg:flex-1 lg:justify-end">
								<a href="{{ route('login') }}" class="text-sm font-semibold leading-6 p-5 text-gray-900 hover:bg-gray-900 hover:text-white">Log in <span aria-hidden="true">&rarr;</span></a>
							</div>
						</nav>
						<div class="lg:hidden" role="dialog" aria-modal="true">
							<div class="fixed inset-0 z-50"></div>
							<div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
								<div class="flex items-center justify-between">
									<a href="#" class="-m-1.5 p-1.5">
										<span class="sr-only">Blog App</span>
										<img class="h-8 w-auto" src="{{ asset('images/logo.png') }}" alt="https://www.flaticon.com/free-icons/blog">
									</a>
									<button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
										<span class="sr-only">Close menu</span>
										<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
											<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
										</svg>
									</button>
								</div>
								<div class="mt-6 flow-root">
									<div class="-my-6 divide-y divide-gray-500/10">
										<div class="space-y-2 py-6">
											<a href="{{ route('beranda') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Beranda</a>
											<a href="{{  route('post') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Post</a>
											<a href="{{ route('akun') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Akun</a>
										</div>
										<div class="py-6">
											<a href="{{ route('login') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in</a>
										</div>
									</div>
								</div>
							</div>
						</div>
          </header>
					@yield('content')
      </div>
    </body>
</html>
