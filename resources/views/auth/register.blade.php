<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
        <div class="w-full max-w-md bg-white shadow-xl rounded-2xl p-8">

            <!-- Header -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Create Account</h1>
                <p class="text-gray-500 text-sm mt-1">Fill the form to get started</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label class="block text-sm mb-1 text-gray-600">Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full px-4 py-2.5 border rounded-lg focus:ring focus:ring-indigo-200 focus:border-indigo-600"
                        required autofocus>
                    @error('name')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm mb-1 text-gray-600">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full px-4 py-2.5 border rounded-lg focus:ring focus:ring-indigo-200 focus:border-indigo-600"
                        required>
                    @error('email')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div x-data="{ show: false }">
                    <label class="block text-sm mb-1 text-gray-600">Password</label>

                    <div class="relative">
                        <input 
                            :type="show ? 'text' : 'password'"
                            name="password"
                            class="w-full px-4 py-2.5 border rounded-lg focus:ring focus:ring-indigo-200 focus:border-indigo-600"
                            required>

                        <!-- Eye Icon -->
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

                <!-- Confirm Password -->
                <div x-data="{ show: false }">
                    <label class="block text-sm mb-1 text-gray-600">Confirm Password</label>

                    <div class="relative">
                        <input 
                            :type="show ? 'text' : 'password'"
                            name="password_confirmation"
                            class="w-full px-4 py-2.5 border rounded-lg focus:ring focus:ring-indigo-200 focus:border-indigo-600"
                            required>

                        <!-- Eye Icon -->
                        <button type="button"
                            @click="show = !show"
                            class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-gray-700">

                            <i class="fa-regular fa-eye-slash" x-show="!show"></i>
                            <i class="fa-regular fa-eye" x-show="show"></i>
                        </button>
                    </div>
                </div>

                <!-- Button -->
                <button
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2.5 rounded-lg font-semibold shadow-md transition">
                    Create Account
                </button>
            </form>

            <!-- Login Redirect -->
            <p class="text-center text-sm text-gray-600 mt-6">
                Already have an account?
                <a href="{{ route('login') }}" class="text-indigo-600 hover:underline font-medium">
                    Sign in
                </a>
            </p>
        </div>
    </div>
</x-guest-layout>
