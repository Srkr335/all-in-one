<!-- Logged In Page (dashboard.blade.php) -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Logged In') }} --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Welcome to the dashboard! You are now logged in.
                </div>
            </div>
        </div>
    </div>
    <div class="text-center">
        <a href="{{ url('products') }}" class="btn btn-primary">Go to Products</a>
    </div>
</x-app-layout>
