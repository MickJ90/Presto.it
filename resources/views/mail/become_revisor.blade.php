<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presto.it</title>
</head>

<body>
    <h2>Un utente ha richiesto di lavorare con noi!</h2>
    <p>Ecco i suoi dati;</p>
    <p>Nome: {{$user->name}}</p>
    <p>Email: {{ $user->email }}</p>
    <a href="{{ route('make.revisor', compact('user'))}}">Rendi revisore</a>
</body>

</html>