<aside class="fixed inset-y-0 left-0 z-40 bg-white shadow-xl border-r
               transform transition-all duration-300 ease-in-out
               flex flex-col" :class="{
            'w-64': !sidebarCollapse,
            'w-16': sidebarCollapse,
            '-translate-x-full': !sidebarOpen && window.innerWidth < 1024,
            'translate-x-0': sidebarOpen || window.innerWidth >= 1024
        }">

    <!-- Logo + Collapse Button -->
    <div class="h-16 flex items-center justify-between px-4 border-b">

        <!-- LOGO (hidden when collapsed) -->
        <span class="text-xl font-bold text-indigo-600" x-show="!sidebarCollapse" x-transition>
            MyAdmin
        </span>

        <!-- Icon logo when collapsed -->
        <span x-show="sidebarCollapse" x-transition>
            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2" />
            </svg>
        </span>

        <!-- Collapse Button (desktop only) -->
        <button @click="sidebarCollapse = !sidebarCollapse"
            class="hidden lg:flex items-center justify-center w-8 h-8 rounded hover:bg-gray-100">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path x-show="!sidebarCollapse" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    d="M20 12H4" />
                <path x-show="sidebarCollapse" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    d="M4 12h16" />
            </svg>
        </button>
    </div>

    <!-- MENU -->
    <nav class="p-3 flex-1 space-y-1 text-gray-700">

        <!-- Dashboard -->
        <a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-100">
            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6
                             0h6" />
            </svg>

            <span x-show="!sidebarCollapse" x-transition class="font-medium">Dashboard</span>
        </a>

        <!-- Users with Dropdown -->
        <div x-data="{ open:false }">

            <button @click="open = !open"
                class="flex items-center w-full space-x-3 px-3 py-2 rounded-lg hover:bg-gray-100">

                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m0 0a4
                                 4 0 118 0m-8 0v1m8-1v1" />
                </svg>

                <span x-show="!sidebarCollapse" x-transition class="flex-1 text-left font-medium">
                    Users
                </span>

                <svg x-show="!sidebarCollapse" :class="open ? 'rotate-90' : ''" class="w-4 h-4 transition-transform"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>

            </button>

            <!-- Dropdown Items -->
            <div x-show="open && !sidebarCollapse" x-collapse class="pl-12 space-y-1">
                <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">All Users</a>
                <a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Add User</a>
            </div>
        </div>
        <!-- Users with Dropdown -->

        <!-- Notification Nav -->
        <a href="{{route('admin.notification.list')}}" class="flex items-center space-x-2.5 px-3 py-2 rounded-lg hover:bg-gray-100 {{ Route::is('admin.notification.list') ? 'bg-gray-100 font-semibold' : '' }}">
            <i class="fa-regular fa-bell text-xl"></i>
            <span x-show="!sidebarCollapse" x-transition class="font-medium">Notification</span>
        </a>
        <!-- Notification Nav -->
    </nav>
</aside>
