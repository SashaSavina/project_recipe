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
        .wrapper {
            display: flex;
            width:850px;
            height:200px;
            flex-wrap: wrap;
        }
        .first {
            width: 49%;
            height: 140px;
            order: 1;
        }
        .second {
            width: 49%;
            height: 140px;
            order: 2;
        }
        .third {
            width: 49%;
            height: 45px;
            order: 3;
        }
        .fourth {
            width: 49%;
            height: 45px;
            order: 4;
        }
        .input {
            width: 95%;
            height: 95%;
        }
        .steps{
            width: 95.5%;
            height:200px;
        }
        .time{
            width: 46.5%;
            height:20px;
            margin-bottom: 10px;
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
            margin: 0 40%;
            font-size: 20px;
            position: relative;
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
        .input-file span {
            position: relative;
            border: 1px solid #BDCDDD;
            display: inline-block;
            font-size: 14px;
            vertical-align: middle;
            color: rgb(255 255 255);
            text-align: center;
            border-radius: 4px;
            background-color: #BDCDDD;
            line-height: 22px;
            height: 40px;
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
    </style>
</head>
<body scroll="no">

<div>
    <form enctype="multipart/form-data" class="form" action="/add/recipe" method="POST">
        @csrf
        <input type="hidden" name="users_id" value="{{ Auth::id() }}">
        <div class="reg">Ваш новый рецепт:</div>
        <ul>
            @foreach($errors->all() as $message)
                <li>{{$message}}</li>
            @endforeach
        </ul>
        <div class="wrapper">
            <div class="first">
                <label class="input-file">
                    <input type="file" name="recipe_photo">
                    <span>Выберите файл</span>
                </label>
            </div>
            <div class="second">
                <textarea name="ingredients" class="input" placeholder="Добавьте ингридиенты"></textarea>
            </div>
            <div class="third">
                <textarea name="name" class="input" placeholder="Добавьте название"></textarea>
            </div>
            <div class="fourth">
                <select name="subcategory" class="input" >
                    <option>Выберите категории</option>
                    @foreach($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div>
            <div>
                <input name="cooking_time" class="time" type="time" placeholder="Добавьте время приготовления">
            </div>
            <div>
                <textarea name="cooking_steps" class="steps" placeholder="Добавьте шаги приготовления"></textarea>
            </div>
        </div>
        <button class="btn" type="submit">Сохранить</button>
    </form>
</div>
</body>
</html>
