<x-app-layout>
  <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
<!-- <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.5/dist/flowbite.min.css" /> -->
<script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>
  <!-- Mobile Menu Button (only visible on small screens) -->
  <div class="text-left ml-8 mt-4 lg:hidden h-full">
    <button type="button"
      class="text-black hover:bg-blue-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 dark:hover:bg-gray-700 focus:outline-none hover:text-white"
      data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
      </svg>
    </button>
  </div>

  <!-- Flex layout to position sidebar and content side-by-side -->
  <div class="flex">
    <!-- Sidebar -->
    <div id="drawer-navigation" class="fixed lg:relative top-0 left-0 z-40 w-64 h-screen p-4 overflow-y-auto transition-transform 
             -translate-x-full lg:translate-x-0 bg-white dark:bg-gray-800">
      <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">
        Menu
      </h5>
      <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white lg:hidden">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 
            4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Close menu</span>
      </button>

      <!-- Navigation Links -->
      <div class="py-4 overflow-y-auto">
        <ul class="space-y-2 font-medium">
          <li>
            <a href="{{ route('about-food') }}"
              class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
              <img src="../images/about.png" alt="" class="w-8 h-8">
              <span class="ml-3">About Food</span>
            </a>
          </li>
          <li>
            <a href="{{ route('international-food') }}"
              class="{{ request()->routeIs('international-food')
  ? 'flex items-center p-2 text-gray-900 rounded-lg dark:text-white bg-gray-200 border-l-4 border-green-500 group'
  : 'flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' }}"> <img src="../images/international.png"
                alt="" class="w-8 h-8">
              <span class="ml-3">International Cusine</span>
            </a>
          </li>
          <li>
            <a href="{{ route('top-hundred') }}"
              class="{{ request()->routeIs('top-hundred')
  ? 'flex items-center p-2 text-gray-900 rounded-lg dark:text-white bg-gray-200 border-l-4 border-green-500 group'
  : 'flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' }}"> <img
                src="../images/top-three.png" alt="" class="w-8 h-8">
              <span class="ml-3">Top 100 International Food in 2025</span>
            </a>
          </li>
          <li>
            <a href="{{ route('salads') }}"
              class="{{ request()->routeIs('salads')
  ? 'flex items-center p-2 text-gray-900 rounded-lg dark:text-white bg-gray-200 border-l-4 border-green-500 group'
  : 'flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' }}">
              <img src="../images/salad.png" alt="" class="w-8 h-8">
              <span class="ml-3">Salads</span>
            </a>
          </li>
          <li>
            <a href="{{ route('frequently-asked-questions') }}"
              class="{{ request()->routeIs('frequently-asked-questions')
  ? 'flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group'
  : 'flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group' }}">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 
                  3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 
                  0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
              </svg>
              <span class="ml-3">FAQ</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
<x-search-bar :foods="$foods ?? ''" :query="$query ?? ''" />
    @if(Route::currentRouteName() == 'dashboard')
    <div class="flex-1 p-4 mt-10 h-[80vh] overflow-y-auto mt-24">
      <x-food-cart :foods="$foods" />
    </div>
  @elseif(Route::currentRouteName() == 'international-food')
    <div class="flex-1 p-4 mt-10 h-[80vh] overflow-y-auto mt-24">
      <x-international-food :internationals="$internationals" />
    </div>
  @elseif(Route::currentRouteName() == 'top-hundred')
    <div class="flex-1 p-4 mt-10 h-[80vh] overflow-y-auto mt-24">
      <x-top-hundred :foods="$foods" />
    </div>
  @elseif(Route::currentRouteName() == 'salads')
    <div class="flex-1 p-4 mt-10 h-[80vh] overflow-y-auto mt-24">
      <x-salads :salads="$salads" />
    </div>
  @elseif(Route::currentRouteName() == 'search')
    <div class="flex-1 p-4 mt-10 h-[80vh] overflow-y-auto">
    </div>
  @else
    <div class="flex-1 p-4 mt-10 h-[80vh] overflow-y-auto">
      No Page Found
    </div>
  @endif
  </div>
</x-app-layout>