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
        * {box-sizing: border-box;}
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
        nav, .wrap-logo{
            display: flex;
            align-items: center;
        }
        .form_search {
            position: relative;
            width: 500px;
            margin: 0 auto;
        }
        input, button, select,textarea {
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
            display: block;
            width: 85%;
            height: 30px;
            margin: 10px;
            padding: 8px 20px;
            text-align: center;
            border-radius: 15px;
            background-color: #BDCDDD;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border: 0;
            font-family: algerian, serif;
            font-size: 14px;
        }
        .steps{
            width: 95.5%;
            height:200px;
        }
        li {
            list-style-type: none;
        }
        li:before {
            content: "! ";
            color:red;
        }
        .form {
            background: #ffffff;
            margin-top: 30px;
            position: fixed; top: 50%; left: 50%;
            transform: translate(-50%, -50%);
        }
        .reg{
            left:175px;
            top:30px;
            font-size: 20px;
            position: relative;
        }
        .btn {
            left:65px;
            top:100px;
            position: relative;
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
        img{
            height: 180px;
            width: 180px;
            border-radius: 15px;
            position: relative;
            top:40px;
            left:210px;
            object-fit: cover;
        }
        .input-file span {
            position: relative;
            top: 80px;
            left: 48px;
            border: 1px solid #BDCDDD;
            font-size: 14px;
            vertical-align: middle;
            text-align: center;
            border-radius: 15px;
            background-color: #BDCDDD;
            height: 25px;
            padding: 10px 20px;
            box-sizing: border-box;
            margin: 0;
            transition: background-color 0.2s;
        }
        .input-file input[type=file] {
            position: absolute;
            z-index: -1;
            opacity: 0;
            display: block;
            width: 0;
            height: 0;
        }
        .input-file:hover span {
            background-color: #A6CAF0;
        }
        .container{
            background-color: #ffffff;
            border-radius: 15px;
            display: flex;
            flex-wrap: wrap;
            margin: 70px 300px;
            padding-bottom: 30px;
            height: 620px;
        }
        .text{
            position: relative;
            top: 100px;
            left: 150px;
        }
        .password{
            text-decoration-color:white;
        }
    </style>
</head>
<body scroll="no">
<header>
    <nav>
        <a href="/show/profile{{Auth::id()}}">Профиль</a>
        <a href="#categpory">Категории</a>
        <a href="/show/recipes">Главная</a>
    </nav>
    <form action="" method="" class="form_search">
        <input class="search" name="search" placeholder="Поиск..." type="search">
        <button class="but_search" type="submit"></button>
    </form>
    <div class="wrap-logo">
        <a>Логотип сайта</a>
    </div>
</header>
<div class="container">
    @foreach($users as $user)
        <form enctype="multipart/form-data" action="/edit/profile{{$user->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="reg">Отредактируйте ваш профиль:</div>
            <ul>
                @foreach($errors->all() as $message)
                    <li>{{$message}}</li>
                @endforeach
            </ul>
            <div >
                <label class="input-file">
                    <input type="file" name="photo">
                        @isset($user->photo)
                            <img src="{{ asset('storage/' . $user->photo) }}" alt="{{$user->name}}">
                        @endisset
                    <span>Выберите файл</span>
                </label>
            </div>
            <div class="text">
                <textarea name="name" class="input" placeholder="Редактировать название">{{$user->name}}</textarea>
                <textarea name='email' class="input">{{$user->email}}</textarea>
                <textarea name='phone_number' class="input">{{$user->phone_number}}</textarea>
                <input name="password" class="input" type="password" placeholder="Пароль">
                <input name="password_confirmation" class="input" type="password" placeholder="Пароль еще раз">
            </div>
            <button class="btn" type="submit">Сохранить</button>
            @endforeach
        </form>
</div>
</body>
</html>







