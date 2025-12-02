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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script>
        const notyf = new Notyf();

        @if(session('success'))
        notyf.success("{{ session('success') }}");
        @endif

        @if(session('error'))
        notyf.error("{{ session('error') }}");
        @endif
    </script>
    <script>
        function openModal(id) {
            window.dispatchEvent(new CustomEvent('open-modal', { detail: { id }}))
        }

        function closeModal(id) {
            window.dispatchEvent(new CustomEvent('close-modal', { detail: { id }}))
        }
    </script>
</body>

</html>
