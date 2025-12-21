<x-guest-layout>
    <div class="flex flex-col items-center justify-center">
        
        <div class="mb-4 bg-indigo-50 dark:bg-gray-700 p-3 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-indigo-600 dark:text-indigo-400">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
            </svg>
        </div>

        <h2 class="mb-2 text-lg font-bold text-gray-900 dark:text-white">
            {{ __('Confirm Password') }}
        </h2>

        <div class="mb-6 text-sm text-center text-gray-600 dark:text-gray-400">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}" class="w-full">
            @csrf

            <div>
                <x-input-label for="password" :value="__('Password')" class="sr-only" /> 

                <div class="relative">
                    <x-text-input id="password" class="block mt-1 w-full pl-4 pr-10 py-3"
                                    type="password"
                                    name="password"
                                    placeholder="Enter your password"
                                    required autocomplete="current-password" />
                                    
                    </div>

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-center" />
            </div>

            <div class="flex justify-end mt-6">
                <x-primary-button class="w-full justify-center py-3 text-base">
                    {{ __('Confirm') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>