@props(['fruits'])

<div class="grid grid-cols-4 gap-4">
    @forelse($fruits as $fruit)
        <!-- Food Card -->
        <div class="bg-white rounded-md overflow-hidden relative shadow-md flex flex-col">
            <div>
                <img class="w-full" src="{{ $fruit->image }}" alt="Recipe Title">
            </div>
            <div class="p-4 flex flex-col flex-grow">
                <h2 class="text-2xl text-green-400">{{ $fruit->title }}</h2>
                <div class="flex justify-between mt-4 mb-4 text-gray-500">
                    <!-- Your three icons and values go here -->
                </div>
                <p class="mb-4 text-gray-500 flex-grow">A recipe that's quick and easy to make and super tasty!</p>
                <a href="{{ $fruit->source_url }}" class="mt-auto">
                    <button class="text-white bg-green-400 p-4 rounded-md w-full uppercase">View Recipe</button>
                </a>
            </div>
        </div>
    @empty
        <p class="col-span-4 text-center">No Salad Found</p>
    @endforelse

    <!-- Pagination -->

        <div class="col-span-4 flex justify-center mt-6 space-x-">
            {{ $fruits->links() }}
        </div>
</div>
