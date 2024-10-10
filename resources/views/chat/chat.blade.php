<x-app-layout>
    <script>
        function getMessages() {
            fetch('/chat')
                .then(response => response.text())
                .then(html => {
                    document.getElementById('messages').innerHTML = html;
                });
        }

        setInterval(() => {
            getMessages();
        }, 15000);

        document.addEventListener('DOMContentLoaded', function () {
            getMessages();
        });
    </script>
    <div class="flex flex-col sm:justify-center items-center mt-10">
        <form method="POST" action="{{ route('createMessage') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="content" :value="__('content')"/>
                <x-text-input id="content" type="text" name="content" :value="old('content')"
                              required autofocus/>
                <x-input-error :messages="$errors->get('content')" class="mt-2"/>
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-primary-button class="ms-3">
                    {{ __('Envoyer') }}
                </x-primary-button>
            </div>
        </form>

        <div id="messages">
            @foreach($messages as $message)
                <p><span style="font-weight: bold">Personne: {{$message->user->name}}</span> |
                    Contenu: {{$message->content}}</p><br>
            @endforeach
        </div>
    </div>


</x-app-layout>
