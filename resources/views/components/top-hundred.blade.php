@props(['foods'])

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4">
    @forelse($foods as $food)
        <!-- Food Card -->
        <div class="bg-white rounded-md overflow-hidden shadow-md flex flex-col relative">
            <img class="w-full h-48 object-cover" src="{{ $food->image }}" alt="{{ $food->title }}">

            <!-- Likes Badge -->
            <div
                class="absolute top-0 right-0 mt-3 mr-3 bg-green-400 text-white rounded-full px-3 py-1 text-xs uppercase shadow-sm">
                {{ $food->aggregateLikes }} Likes
            </div>

            <div class="p-4 flex flex-col flex-grow">
                <h2 class="text-xl md:text-2xl text-green-500 font-semibold mb-2">{{ $food->title }}</h2>

                <div class="flex justify-between mt-2 mb-2 text-gray-500 text-sm">
                    <!-- Optional icons/stats area -->
                </div>

                <p class="text-gray-500 flex-grow">A recipe that's quick and easy to make and super tasty!</p>

                <a href="{{ $food->source_url }}" class="mt-4">
                    <button class="text-white bg-green-500 hover:bg-green-600 p-3 rounded-md w-full uppercase text-sm">
                        View Recipe
                    </button>
                </a>
            </div>
        </div>
    @empty
        <p class="col-span-full text-center text-gray-500">No Food Found</p>
    @endforelse

    @if ($foods->hasPages())
        <div class="col-span-full flex justify-center mt-6">
            {{ $foods->links() }}
        </div>
    @endif
</div>