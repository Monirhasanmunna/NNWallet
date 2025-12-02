@props([
    'items' => []
])

<nav class="flex items-center text-sm text-gray-600 space-x-2">
    <!-- Home Link -->
    <a href="{{ route('dashboard')}}" class="hover:text-gray-800 font-medium">Dashboard</a>

    @foreach ($items as $item)
        <!-- Separator -->
        <i class="fa-solid fa-angle-right text-md text-gray-400"></i>

        <!-- Active Item -->
        @if ($item['is_active'])
            <span class="text-gray-900 font-semibold">
                {{ $item['label'] }}
            </span>

            <!-- Non-active link -->
        @else
            <a href="{{ $item['route'] }}" class="hover:text-gray-800">
                {{ $item['label'] }}
            </a>
        @endif
    @endforeach
</nav>
