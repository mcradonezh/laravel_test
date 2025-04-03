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
<header>
    @auth
        <a href="/orders">Заказы</a>
        <a href="/logout">Выйти</a>
    @else
        <a href="/login">Войти</a>
    @endauth
</header>
<a href="/">К каталогу</a>
<table>
    @foreach ($cart as $elem)
        <tr>
            <td>{{$elem["name"]}}</td>
            <td>{{$elem["count"]}}</td>
            <td><a href="/cart?del={{$elem["id"]}}">X</a></td>
        </tr>
    @endforeach
</table>
</body>
</html>
