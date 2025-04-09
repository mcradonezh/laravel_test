<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        html {
            min-height: 100%;
        }
        body {
            width: 960px;
            border: 1px solid black;
            min-height: 100%;
            margin: auto;
        }
    </style>
</head>
<header>
    <a href="/cart">Корзина({{$vars["cart_count"]}})</a>
    @auth
        <a href="/orders">Заказы</a>
        <a href="/logout">Выйти</a>
    @else
        <a href="/login">Войти</a>
        <a href="/reg">Зарегистрироваться</a>
    @endauth
</header>
<body>
Here's gonna be the catalogue

<ul>
    @foreach ($vars["products"] as $elem)
            <li class="catalog-item" id="{{$elem->id}}">{{ $elem->name }} {{ $elem->price }} Р.</li>
            <form action="{{route('addtocart')}}" method="post">
                @csrf
                <input type="hidden" name="addedid" value="{{$elem->id}}">
                <button onclick="this.form.count.value--;return false;">-</button>
                <input type="text" name="count" value="1">
                <button onclick="this.form.count.value++;return false;">+</button>
                <input type="submit" value="В корзину">
            </form>
    @endforeach
</ul>
</body>
</html>
