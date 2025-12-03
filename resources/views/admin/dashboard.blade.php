<x-app-layout>
    <!-- Stats Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">

                <div class="bg-white p-6 rounded-xl shadow">
                    <p class="text-sm text-gray-500">Notification</p>
                    <h2 class="text-2xl font-bold mt-1">{{$totalNotification}}</h2>
                </div>

                <div class="bg-white p-6 rounded-xl shadow">
                    <p class="text-sm text-gray-500">Category</p>
                    <h2 class="text-2xl font-bold mt-1">{{$totalCategory}}</h2>
                </div>

                <div class="bg-white p-6 rounded-xl shadow">
                    <p class="text-sm text-gray-500">Feature</p>
                    <h2 class="text-2xl font-bold mt-1">{{$totalFeature}}</h2>
                </div>

                <div class="bg-white p-6 rounded-xl shadow">
                    <p class="text-sm text-gray-500">Banner</p>
                    <h2 class="text-2xl font-bold mt-1">{{$totalBanner}}</h2>
                </div>
            </div>
</x-app-layout>
