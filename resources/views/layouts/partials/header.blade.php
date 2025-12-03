<header class="h-16 bg-white shadow flex items-center justify-between px-4 lg:px-8">
    <!-- Mobile Toggle -->
    <button @click="sidebarOpen = true" class="lg:hidden">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Breadcrumb -->
    <div class="font-medium text-gray-700"> </div>

    <!-- Profile Actions -->
    <div class="relative" x-data="{ open:false }">

        <button @click="open = !open" class="w-7 h-7 rounded-full flex items-center justify-center text-gray-300 hover:bg-gray-100">
            <img src="{{asset('assets/user-profile.png')}}" alt="user-profile" class="w-full h-full object-cover">
        </button>

        <!-- Dropdown -->
        <div x-show="open" x-transition @click.away="open=false"
            class="absolute right-0 mt-2 w-40 bg-white shadow-lg rounded-lg p-2 z-50">
            <a href="#" class="block px-3 py-2 hover:bg-gray-100 rounded">Profile</a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="w-full text-left px-3 py-2 hover:bg-gray-100 rounded">Logout</button>
            </form>
        </div>

    </div>
</header>
