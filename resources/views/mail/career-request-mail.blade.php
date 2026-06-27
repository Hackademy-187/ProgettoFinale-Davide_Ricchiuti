<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>È arrivata una richiesta per il ruolo di {{ $info['role'] }}</h1>

    <p>Ricevi da {{ $info['email'] }}</p>

    <h4>Messaggio:</h4>

    <p>{{ $info['message'] }}</p>

</body>

</html>
