<x-layout>
    <x-navBar />
    <x-dropdown :cities="$cities" />
    @auth
        <div class="flex items-start">
            <div class="p-6 col-span-2">
                <p class="text-xl">{{ $realestate->title }}</p>
                <img src="{{ asset('storage/' . $realestate->image) }}" alt="">
                <p class="text-md">{{ $realestate->description }}</p>
                <i class="fa fa-heart {{ $isFavourite ? 'liked' : '' }}" id="likeBtn" style="font-size:48px;"
                    data-realestate="{{ $realestate->id }}"></i>
                <p class="text-md" id="successMsg"></p>
            </div>
        </div>
        @if (auth()->user()->id === $realestate->user_id)
            <a href="{{ route('edit', $realestate) }}"
                class="text-blue-500 text-xl ml-10 mt-10 hover:text-blue-800">Edit</a>
        @endif
    @endauth

    @guest
        <div class="p-6 col-span-2">
            <p class="text-xl">{{ $realestate->title }}</p>
            <img src="{{ asset('storage/' . $realestate->image) }}" alt="">
            <p class="text-md">{{ $realestate->description }}</p>
        </div>
    @endguest
    <script type="text/javascript" src="{{ asset('js/favouritesBtn.js') }}"></script>
</x-layout>
