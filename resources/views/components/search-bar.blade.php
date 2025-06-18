@props(['foods', 'query'])

<form action="{{ route('search') }}" method="post">
    @method('post')
    @csrf
    <div class="flex xs:fixed sm:fixed sm:ml-24 md:fixed md:ml-36 lg:fixed lg:ml-52 mt-4 w-full float-right z-10">
        <div class="flex relative rounded-md w-full px-4 max-w-xl">
            <input type="text" name="q" id="query" placeholder="Search Food/Salad by name..."
                value="{{ $query }}"
                class="w-full p-3 rounded-md border-2 border-r-white rounded-r-none border-gray-300 placeholder-gray-500 dark:placeholder-gray-300 dark:bg-gray-500 dark:text-gray-300 dark:border-none" />
            <button
                class="inline-flex items-center gap-2 bg-violet-700 text-white text-lg font-semibold py-3 px-6 rounded-r-md">
                <span class="hidden md:block">
                    <!-- Search Icon -->
                    <svg class="text-gray-200 h-5 w-5 p-0 fill-current" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 56.966 56.966" width="512px" height="512px">
                        <path
                            d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23 
                               s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  
                               c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z 
                               M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  
                               s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </span>
            </button>
        </div>
    </div>
</form>

@if (!empty($query))
    <div class="grid grid-cols-3 gap-4 mt-20">
        @forelse($foods as $food)
            <div class="bg-white rounded-md overflow-hidden relative shadow-md flex flex-col">
                <div>
                    <img class="w-full" src="{{ $food->image }}" alt="Recipe Title">
                </div>
                <div class="p-4 flex flex-col flex-grow">
                    <h2 class="text-2xl text-green-400">{{ $food->title }}</h2>
                    <p class="mb-4 text-gray-500 flex-grow">A recipe that's quick and easy to make and super tasty!</p>
                    <a href="{{ $food->source_url }}" class="mt-auto">
                        <button class="text-white bg-green-400 p-4 rounded-md w-full uppercase">View Recipe</button>
                    </a>
                </div>
            </div>
        @empty
            <p class="col-span-3 text-center ml-72 mt-16flex absolute ml-52 mt-4 float-left"><strong>Search for "{{ $query }}" wasn't found.</strong></p>
        @endforelse
    </div>
@endif
