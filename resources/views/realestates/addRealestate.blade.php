<x-layout>
    <form action="{{ route('addRealestate') }}" method="POST" class="text-gray-700 flex flex-col w-1/2 m-auto mt-10 px-20"
        enctype="multipart/form-data">
        @csrf
        <label class="text-sm mt-3" name="city" for="">Select City</label>
        <select class="rounded-md border border-gray-300 px-4 py-2.5 @error('city') border-red-600 @enderror p-2"
            name="city" id="city" required>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>

        <label class="text-sm mt-3" name="title">Title</label>
        <input class="rounded-md border border-gray-300 px-4 py-2.5 @error('title') border-red-600 @enderror"
            type="text" name="title" id="title">

        <label class="text-sm mt-3" name="description">Description</label>
        <textarea class="rounded-md border border-gray-300 px-4 py-2.5 @error('description') border-red-600 @enderror p-2"
            name="description" id="description" required> </textarea>

        <label class="text-sm mt-3" name="image">Image</label>
        <input class="rounded-md border border-gray-300 px-4 py-2.5 @error('image') border-red-600 @enderror"
            type="file" name="image" id="image" required>

        <button class="mt-8 w-96 p-4 bg-gray-700 rounded-md m-auto text-white hover:bg-gray-900" type="submit"
            name="submit">Add Realestate</button>
    </form>
</x-layout>
