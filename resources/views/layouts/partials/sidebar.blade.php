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
        <span class="text-xl text-center grow font-bold text-indigo-600" x-show="!sidebarCollapse" x-transition>
            NN Wallet
        </span>

        <!-- Collapse Button (desktop only) -->
        <button @click="sidebarCollapse = !sidebarCollapse"
            class="hidden lg:flex items-center justify-center w-8 h-8 rounded hover:bg-gray-100">
            <i class="fa-solid fa-bars text-xl"></i>
        </button>
    </div>

    <!-- MENU -->
    <nav class="p-3 flex-1 space-y-1 text-gray-700">

        <!-- Dashboard -->
        <a href="{{route('dashboard')}}" class="flex items-center space-x-3 px-3 py-2 rounded-lg hover:bg-gray-100">
            <i class="fa-regular fa-house text-xl"></i>
            <span x-show="!sidebarCollapse" x-transition class="font-medium">Dashboard</span>
        </a>

        <!-- Notification Nav -->
        <a href="{{route('admin.notification.list')}}" class="flex items-center space-x-2.5 px-3 py-2 rounded-lg hover:bg-gray-100 {{ Route::is('admin.notification.list') ? 'bg-gray-100 font-semibold' : '' }}">
            <i class="fa-regular fa-bell text-xl"></i>
            <span x-show="!sidebarCollapse" x-transition class="font-medium">Notification</span>
        </a>
        <!-- Notification Nav -->

        <!-- Category Nav -->
        <a href="{{route('admin.category.list')}}" class="flex items-center space-x-2.5 px-3 py-2 rounded-lg hover:bg-gray-100 {{ Route::is('admin.category.list') ? 'bg-gray-100 font-semibold' : '' }}">
            <i class="fa-solid fa-table-cells-large text-xl"></i>
            <span x-show="!sidebarCollapse" x-transition class="font-medium">Category</span>
        </a>
        <!-- Category Nav -->

        <!-- Category Nav -->
        <a href="{{route('admin.feature.list')}}" class="flex items-center space-x-2.5 px-3 py-2 rounded-lg hover:bg-gray-100 {{ Route::is('admin.feature.list') ? 'bg-gray-100 font-semibold' : '' }}">
            <i class="fa-brands fa-delicious text-xl"></i>
            <span x-show="!sidebarCollapse" x-transition class="font-medium">Feature</span>
        </a>
        <!-- Category Nav -->

        <!-- Banner Nav -->
        <a href="{{route('admin.banner.list')}}" class="flex items-center space-x-2.5 px-3 py-2 rounded-lg hover:bg-gray-100 {{ Route::is('admin.banner.list') ? 'bg-gray-100 font-semibold' : '' }}">
            <i class="fa-solid fa-images text-xl"></i>
            <span x-show="!sidebarCollapse" x-transition class="font-medium">Banner</span>
        </a>
        <!-- Banner Nav -->
    </nav>
</aside>
