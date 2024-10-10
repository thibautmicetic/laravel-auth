@foreach($messages as $message)
    <p><span style="font-weight: bold">Personne: {{$message->user->name}}</span> |
        Contenu: {{$message->content}}</p><br>
@endforeach
