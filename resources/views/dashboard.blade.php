<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="text-center py-12 bg-white">
        <form action="{{route('glowUpAsAdmin')}}" method="get">
            @csrf
            <div>
                <button>Changer de status</button>
            </div>
        </form>
    </div>

    <div class="p-5">
        <div class="text-center font-bold text-pink-600">
            Nom: {{Auth::user()->name}} 👋
        </div>
    </div>

    <div class="p-5">
        <div class="text-center font-bold text-green-900">
            Pseudo: {{Auth::user()->pseudo}}
        </div>
    </div>

    <div class="p-5">
        <div class="text-center font-bold text-amber-200">
            Email: {{Auth::user()->email}}
        </div>
    </div>

    <div class="p-5">
        <div class="text-center font-bold text-red-200">
            @foreach(Auth::user()->roles as $role)
                Role: {{$role->name}}
            @endforeach
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
