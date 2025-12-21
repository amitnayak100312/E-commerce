<x-guest-layout>
    <div class="flex flex-col items-center justify-center">

        <div class="mb-4 bg-indigo-50 dark:bg-gray-700 p-3 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-indigo-600 dark:text-indigo-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
            </svg>
        </div>

        <h2 class="mb-2 text-lg font-bold text-gray-900 dark:text-white">
            {{ __('Forgot Password?') }}
        </h2>

        <div class="mb-6 text-sm text-center text-gray-600 dark:text-gray-400">
            {{ __('No problem. Just let us know your email address and we will email you a password reset link.') }}
        </div>

        <x-auth-session-status class="mb-4 w-full text-center" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="w-full">
            @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" class="sr-only" />
                
                <x-text-input id="email" class="block mt-1 w-full py-3" 
                                type="email" 
                                name="email" 
                                :value="old('email')" 
                                placeholder="name@example.com"
                                required autofocus />
                                
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-center" />
            </div>

            <div class="flex flex-col mt-6 gap-4">
                <x-primary-button class="w-full justify-center py-3 text-base">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>

                <a href="{{ route('login') }}" class="text-sm text-center text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 underline decoration-indigo-500 underline-offset-4">
                    {{ __('Back to Login') }}
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>