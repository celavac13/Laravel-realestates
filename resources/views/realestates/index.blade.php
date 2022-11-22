<x-layout>
    <x-navBar />
    <x-dropdown />
    <div class="lg:grid lg:grid-cols-6">
        @foreach ($realestates as $realestate)
            <x-realestate :realestate="$realestate" />
        @endforeach
    </div>
</x-layout>
