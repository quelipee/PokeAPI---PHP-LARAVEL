<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
<form enctype="multipart/form-data" action="{{route('login')}}" method="post">
    @csrf
    @method('post')
    <input type="email" name="email" id=""><br>
    <input type="password" name="password" id="">
    <button type="submit" name="enviar" id="">enviar</button>
</form>
</body>
</html>
