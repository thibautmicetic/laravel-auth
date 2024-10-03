<x-app-layout>
    @foreach($roles as $role)
        <x-card>
            <span class="font-bold text-xl">Card: </span> <br>
            name: {{$role->name}} <br>
            id: {{$role->id}} <br>
        </x-card>
    @endforeach
</x-app-layout>
