@props(['realestate'])
<div class="p-6 col-span-2">
    <a href="{{ route('single', $realestate->id) }}" class="text-md">{{ $realestate->title }}</a>
    <img src="{{ asset('storage/' . $realestate->image) }}" alt="">
    <p class="text-sm">{{ $realestate->description }}</p>
</div>
