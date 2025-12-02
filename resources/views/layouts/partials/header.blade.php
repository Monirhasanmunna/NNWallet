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

        <button @click="open = !open" class="w-10 h-10 rounded-full flex items-center justify-center hover:bg-gray-100">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 15c2.314
                                 0 4.47.523 6.379 1.45M15 10a3 3 0
                                 11-6 0 3 3 0 016 0z" />
            </svg>
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
