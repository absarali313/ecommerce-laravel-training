<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>Home Index Page
Accessible to Everyone
</h1>
@auth
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">logout</button>
    </form>
@endauth
</body>
</html>
