@props([
    'id' => 'modal',
    'title' => '',
])

<div
    x-data="{ open: false }"
    x-on:open-modal.window="if ($event.detail.id === '{{ $id }}') open = true"
    x-on:close-modal.window="if ($event.detail.id === '{{ $id }}') open = false"
>

    <!-- MODAL OVERLAY -->
    <div
        x-show="open"
        x-transition.opacity
        class="fixed inset-0 bg-black bg-opacity-40 z-40"
        @click="open = false">
    </div>

    <!-- MODAL BOX -->
    <div
        x-show="open"
        x-transition
        class="fixed inset-0 z-50 flex items-center justify-center px-4"
    >
        <div @click.stop
             class="bg-white w-full max-w-lg rounded-lg shadow-xl p-6">

            <!-- HEADER -->
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">{{ $title }}</h2>
                <button @click="open = false" class="text-gray-500 hover:text-gray-700 text-xl">&times;</button>
            </div>

            <!-- CONTENT SLOT -->
            <div class="mt-4">
                {{ $slot }}
            </div>

        </div>
    </div>

</div>
