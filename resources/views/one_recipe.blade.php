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
        img{
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
            background-color: #ffffff;
            border-radius: 15px;
            display: flex;
            flex-wrap: wrap;
            margin: 70px 180px;
        }
        .headline{
            font-size: 22px;
        }
        td{
            padding: 10px;
        }
        .edit{
            border: 1px solid #BDCDDD;
            border-radius: 15px;
            padding: 0 3px 0 7px ;
            margin-top: -29%;
            margin-bottom: 5px;
            text-align: center;
        }
        .td_text{
        }
        .rec_name{
            font-size: 22px;
        }
        .empty{
            margin-left: -20%;
        }
    </style>
</head>
<body>
<header>
    <nav>
        <a href="#profile">Профиль</a>
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
    <table>
            @foreach($recipes as $recipe)
            <tr>
                <td rowspan="2">
                    @foreach($photos as $photo)
                        @if($photo->id==$recipe->photo_id)
                            @isset($photo->path)
                                <img src="{{ asset('storage/' . $photo->path) }}" alt="recipe{{$recipe->name}}">
                            @endisset
                        @endif
                    @endforeach
                </td>
                <td>
                    <div class="td_text">
                        @foreach($subcategories as $subcategory)
                            @if($subcategory->id==$recipe->subcategories_id)
                                <p class="headline">Категория: {{$subcategory->name}}</p>
                            @endif
                        @endforeach
                    </div>
                    <div class="td_text">
                        Время приготовления: {{$recipe->cooking_time}}
                    </div>
                </td>
                <td>
                    @if($recipe->users_id==Auth::id())
                        <div class="edit">
                            <a href="{{ route('recipes.update', $recipe->id) }}" ><p>Редактировать рецепт</p></a>
                        </div>
                    @else
                        <div class="empty"></div>
                    @endif
                </td>
            </tr>
            <tr>
                <td>
                    <div class="td_text">
                        <p class="headline">Ингридиенты:<br></p><p>{{$recipe->ingredients}}</p>
                    </div>
                </td>
            </tr>
            <tr><td class="rec_name" colspan="3">{{$recipe->name}}</td></tr>
            <tr>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">
                    <p class="headline">Шаги приготовления:<br></p>
                    <p>{{$recipe->cooking_steps}}</p>
                </td>
            </tr>
            @endforeach
    </table>
</div>
</body>
</html>

