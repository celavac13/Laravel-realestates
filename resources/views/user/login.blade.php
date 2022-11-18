<x-layout>

    <form action="{{ route('login') }}" method="POST" class="text-gray-700 flex flex-col w-1/2 m-auto mt-10 px-20">
        @csrf
        @if (session()->has('status'))
            <p class="text-red-600 text-md mb-2">{{ session('status') }}</p>
        @endif
        <label class="text-sm mt-3" name="email">Email</label>
        <input class="rounded-md border border-gray-300 px-4 py-2.5 @error('email') border-red-600 @enderror"
            type="email" name="email" id="email" value="{{ old('email') }}">
        @error('email')
            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
        @enderror

        <label class="text-sm mt-3" name="password">Password</label>
        <input class="rounded-md border border-gray-300 px-4 py-2.5 @error('password') border-red-600 @enderror"
            type="password" name="password" id="password">
        @error('password')
            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
        @enderror

        <button class="mt-8 w-96 p-4 bg-orange-500 rounded-md m-auto hover:text-gray-900 hover:bg-orange-700"
            type="submit" name="submit">Login</button>
    </form>
</x-layout>
