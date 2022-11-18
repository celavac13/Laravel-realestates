@props(['realestate'])
<div class="p-6 col-span-2">
    <a href="#" class="text-md">{{ $realestate->title }}</a>
    <img src="{{ $realestate->image }}" alt="">
    <p class="text-sm">{{ $realestate->description }}</p>
</div>
