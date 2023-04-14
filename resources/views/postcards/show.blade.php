<x-guest-layout>
	<div class="min-h-full">
	    <!-- Navbar -->
	    <nav class="bg-gray-50">
	      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
	        <div class="relative flex h-16 items-center justify-between border-b border-gray-200">
	          <div class="flex items-center">
	            <div class="flex-shrink-0">
	              <img class="h-8 w-auto" src="https://www.ringier.com/wp-content/themes/ringiercorporate/assets/images/ringier-logo.svg" alt="Ringier Logo">
	            </div>

	          </div>

	        </div>
	      </div>
	    </nav>

	    <!-- Page heading -->
	    <header class="bg-gray-50 py-8">
	      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 xl:flex xl:items-center xl:justify-between">
	        <div class="min-w-0 flex-1">
	          <nav class="flex" aria-label="Breadcrumb">
	            <ol role="list" class="flex items-center space-x-2">
	              <li>
	                <div>
	                  <a href="/" class="text-sm font-medium text-gray-500 hover:text-gray-700">Home</a>
	                </div>
	              </li>	              
	              <li>
	                <div class="flex items-center">
	                	<svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
			              <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
			            </svg>
	                  <a href="#" class="text-sm font-medium text-gray-500 hover:text-gray-700">{{ $postcard->title }}</a>
	                </div>
	              </li>
	            </ol>
	          </nav>
	          <h1 class="mt-2 text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Postcard details</h1>
	        </div>

	      </div>
	    </header>

    	<main class="pt-8 pb-16">
	      	<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
			    <div class="mx-auto max-w-3xl">
			      <div class="flex flex-row">
                      <img class="h-100 w-100 rounded-md" src="https://picsum.photos/400/200?random={{$postcard->id}}" alt="{{$postcard->title}}">
                      <div class="ml-4">
			          <h1 class="text-2xl font-bold text-gray-900">{{ $postcard->title }}</h1>
			          <p class="text-sm font-medium text-gray-500">Available on <time datetime="{{ $postcard->online_at }}">{{ $postcard->online_at }}</time> to <time datetime="{{ $postcard->offline_at }}">{{ $postcard->offline_at }}</time></p>
			          <p>Author: {{ $postcard->user->name }}</p>
			          <p>Price: R{{ $postcard->price }} </p>
			        </div>
			      </div>
			    </div>
		    </div>
		</main>
        {!! $product->toScript() !!}
	</div>
</x-guest-layout>
