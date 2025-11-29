<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
        <div class="w-full max-w-md bg-white shadow-xl rounded-2xl p-8">

            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Welcome Back</h1>
                <p class="text-gray-500 text-sm mt-1">Please sign in to continue</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 text-center text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block mb-1 text-sm text-gray-600">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2.5 border rounded-lg focus:ring focus:ring-indigo-200 focus:border-indigo-600"
                        required autofocus>
                    @error('email')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password + Show/Hide -->
                <div x-data="{ show: false }">
                    <div class="flex justify-between mb-1">
                        <label class="text-sm text-gray-600">Password</label>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}"
                           class="text-sm text-indigo-600 hover:underline">Forgot?</a>
                        @endif
                    </div>

                    <div class="relative">
                        <input 
                            :type="show ? 'text' : 'password'"
                            name="password"
                            class="w-full px-4 py-2.5 border rounded-lg focus:ring focus:ring-indigo-200 focus:border-indigo-600"
                            required>

                        <!-- Eye Icon Toggle -->
                        <button type="button"
                            @click="show = !show"
                            class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700">
                            <i class="fa-regular fa-eye-slash" x-show="!show"></i>
                            <i class="fa-regular fa-eye" x-show="show"></i>
                        </button>
                    </div>

                    @error('password')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember_me" name="remember" type="checkbox"
                           class="h-4 w-4 border-gray-300 text-indigo-600 rounded">
                    <label for="remember_me" class="ml-2 text-sm text-gray-700">Remember me</label>
                </div>

                <!-- Submit -->
                <button
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2.5 rounded-lg font-semibold shadow-md transition">
                    Sign In
                </button>
            </form>

            <!-- Register Link -->
            <p class="text-center text-sm text-gray-600 mt-6">
                Don’t have an account?
                <a href="{{ route('register') }}" class="text-indigo-600 hover:underline font-medium">
                    Create one
                </a>
            </p>

        </div>
    </div>
</x-guest-layout>
