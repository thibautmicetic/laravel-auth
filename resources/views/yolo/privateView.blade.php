<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Hello</h2>
    </x-slot>

    <div class="p-5">
        <div class="text-center font-bold text-indigo-600">
            Bonjour {{Auth::user()->nom }} 👋
        </div>
    </div>
</x-app-layout>
