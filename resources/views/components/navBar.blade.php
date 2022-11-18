<nav class="flex bg-orange-500 justify-end text-gray-700 text-md pt-2 pb-2">
    @auth
        <p class="mr-10">Welcome {{ auth()->user()->username }}</p>
        <a href="{{ route('addRealestate') }}" class="mr-10 hover:text-gray-900">Add Realestate</a>
        <a href="{{ route('favourites') }}" class="mr-10 hover:text-gray-900">Favourites</a>
        <a href="{{ route('logout') }}" class="mr-6 hover:text-gray-900">Logout</a>
    @endauth
    @guest
        <a href="{{ route('login') }}" class="mr-10 hover:text-gray-900">Login</a>
        <a href="{{ route('register') }}" class="mr-6 hover:text-gray-900">Register</a>
    @endguest
</nav>
