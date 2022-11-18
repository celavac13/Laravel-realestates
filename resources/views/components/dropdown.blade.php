@props(['cities', 'totalInCity'])
<div class="flex align-center justify-center">
    <button id="dropdownDefault" data-dropdown-toggle="dropdown"
        class="text-gray-700 bg-orange-500 hover:bg-orange-600 hover:text-gray-900 rounded-md text-sm px-4 py-2.5 mt-2 text-center inline-flex items-center"
        type="button">Dropdown
        button <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg></button>
    <!-- Dropdown menu -->
    <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
            <li>
                <a href="{{ route('home') }}"
                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">All</a>
            </li>
            @foreach ($cities as $city)
                <li>
                    <a href="{{ route('city') }}?city={{ $city->id }}"
                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $city->name }}
                        {{ $totalInCity($city->id) }}</a>
                </li>
            @endforeach

        </ul>
    </div>

</div>
