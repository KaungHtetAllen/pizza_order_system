<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hi Bitch You are fucking annoying </h1>
    <h2>Role - {{ Auth::user()->role}}</h2>

    <form action="{{ route('logout')}}" method="POST">
        @csrf
        <input type="submit" value="Log Out">
    </form>
</body>
</html>
