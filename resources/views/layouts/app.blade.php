<!DOCTYPE html>
<html lang="en" x-data="{ 
        sidebarOpen:false, 
        sidebarCollapse:false, 
        profileOpen:false 
      }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <!-- MOBILE OVERLAY -->
    <div x-show="sidebarOpen" x-transition.opacity @click="sidebarOpen = false"
        class="fixed inset-0 bg-black bg-opacity-50 z-30 lg:hidden"></div>

    <!-- SIDEBAR -->
    @include('layouts.partials.sidebar')

    <!-- MAIN WRAPPER -->
    <div :class="sidebarCollapse ? 'lg:ml-16' : 'lg:ml-64'" class="transition-all min-h-screen">
        <!-- HEADER -->
        @include('layouts.partials.header')
        <!-- MAIN CONTENT -->
        <main class="p-6">
            {{$slot}}
        </main>
    </div>
</body>

</html>
