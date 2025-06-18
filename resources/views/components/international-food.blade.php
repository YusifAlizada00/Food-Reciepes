@props(['internationals'])

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4">
    @forelse($internationals as $food)
        <!-- Food Card -->
        <div class="bg-white rounded-md overflow-hidden shadow-md flex flex-col">
            <img class="w-full h-48 object-cover" src="{{ $food->image }}" alt="{{ $food->title }}">
            <div class="p-4 flex flex-col flex-grow">
                <h2 class="text-xl md:text-2xl text-green-500 font-semibold mb-2">{{ $food->title }}</h2>
                <div class="flex justify-between mt-2 mb-2 text-gray-500 text-sm">
                    <!-- Optional icons/stats area -->
                </div>
                <p class="text-gray-500 flex-grow">A recipe that's quick and easy to make and super tasty!</p>
                <a href="{{ $food->source_url }}" class="mt-4">
                    <button class="text-white bg-green-500 hover:bg-green-600 p-3 rounded-md w-full uppercase text-sm">View Recipe</button>
                </a>
            </div>
        </div>

    @empty
        <p class="col-span-4 text-center">No Food Found</p>
    @endforelse

    <!-- Pagination -->
    @if ($internationals->hasPages())
        <div class="col-span-4 flex justify-center mt-6 space-x-">
            {{ $internationals->links() }}
        </div>
    @endif
</div>
