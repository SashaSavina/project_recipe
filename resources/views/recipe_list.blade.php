<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <style>
        html {
            overflow: scroll;
        }
        * {
            box-sizing: border-box;
        }
        body {
            font-family: algerian, serif;
            font-size: 16px;
            background: #E8EFF8;
        }
        header {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            flex-wrap: wrap;
            background-color: #ffffff;
            padding: 20px 10px;
        }
        header a {
            color: #212121;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            border-radius: 4px;
        }
        nav, .wrap-logo {
            display: flex;
            align-items: center;
        }
        .form_search {
            position: relative;
            width: 500px;
            margin: 0 auto;
        }
        input, button, select {
            border: 1px solid #BDCDDD;
            background-color: #ffffff;
        }
        .search {
            border-radius: 15px;
            margin-top: 9px;
            width: 100%;
            height: 30px;
            padding-left: 15px;
        }
        .but_search {
            height: 26px;
            width: 26px;
            position: absolute;
            top: 11px;
            right: 3px;
            border-radius: 15px;
            background: #BDCDDD;
            cursor: pointer;
            content: "!";
        }
        .but_search:before {
            color: #BDCDDD;
            font-size: 20px;
            font-weight: bold;
        }
        .input {
            width: 95%;
            height: 95%;
        }
        .big_img{
            width: 265px;
            height: 300px;
            border-radius: 15px;
            object-fit: cover;
        }
        .btn {
            display: block;
            width: 73%;
            padding: 8px;
            margin: 30px 115px 50px;
            border-radius: 15px;
            background-color: #F7F0C6;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border: 0;
            font-family: algerian, serif;
            font-size: 16px;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            margin-top: 70px;
            margin-left: 80px;
            background-color: #ffffff;
            margin-right: 80px;
            border-radius: 15px;
        }
        .item {
            flex-basis: 33%;
            display: flex;
            justify-content: center;

            margin-top:37px;
        }
        .rec_name{
            width: 250px;
            font-size: 24px;
        }
        .img_like{}
        .like{
            position: relative;
            left:28px;
            top:-31px;
        }
    </style>
</head>
<body>
<header>
    <nav>
        <a href="/show/profile{{Auth::id()}}">Профиль</a>
        <a href="#categpory">Категории</a>
        <a href="/show/recipes">Главная</a>
    </nav>
    <form action="/show/recipes/search" method="get" class="form_search">
        <input class="search" name="search" placeholder="Поиск..." type="search">
        <button class="but_search" type="submit"></button>
    </form>
    <div class="wrap-logo">
        <a>Логотип сайта</a>
    </div>
</header>
    <div class="container">
        @foreach($recipes as $recipe)
            <div class="item">
                <div class="item-box">
                    @foreach($photos as $photo)
                        @if($photo->id==$recipe->photo_id)
                            @isset($photo->path)
                                <img class="big_img" src="{{ asset('storage/' . $photo->path) }}" alt="recipe{{$recipe->name}}">
                            @endisset
                        @endif
                    @endforeach
                    <div class="rec_name">
                        <div>
                            <a href="/show/recipe{{$recipe->id}}">{{ $recipe->name }}</a>
                        </div>
                        <div><img class="img_like" src="{{ asset('storage/uploads/icons8-сердце-24.png')}}"></div>
                        <div class="like">{{$recipe->likes_counter}}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>

