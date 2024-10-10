<x-app-layout id="layout">
    <script src="https://unpkg.com/htmx.org@1.9.10"></script>
    <script>
        // Permet d'ajouter le token CSRF à chaque requête AJAX,
        // pour éviter les erreurs 419, spécifiques à Laravel.
        document.addEventListener('DOMContentLoaded', function () {
            document.body.addEventListener('htmx:configRequest', (event) => {
                event.detail.headers['X-CSRF-Token'] = '{{ csrf_token() }}';
            })
        });
    </script>
    <style>
        div.htmx-swapping div {
            opacity: 0;
            transition: opacity 1s ease-out;
        }
    </style>
    <div class="flex flex-col sm:justify-center items-center mt-10">
        <form hx-post="/chat" hx-target="#messages" hx-swap="" action="{{ route('createMessage') }}">
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

        <button id="messages" hx-trigger="every 2s" hx-get="messages">
            Chargement des messages...
        </button>
    </div>


</x-app-layout>
