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
            font-family: Poppins, serif;
            font-size: 16px;
            background: #E8EFF8;
        }

        header {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            flex-wrap: wrap;
            background-color: #ffffff;
            padding: 10px 10px;
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
            margin-top: 28px;
            margin-left: 45px;
            width: 100%;
            height: 30px;
            padding-left: 15px;
        }
        .but_search {
            height: 26px;
            width: 26px;
            position: absolute;
            top: 30px;
            right: -43px;
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
        .rec_name{
            width: 250px;
            font-size: 24px;
        }
        .like{
            position: relative;
            left:28px;
            top:-31px;
        }
        .img_header{
            width: 30px;
            height: 30px;
            border: none;
            background-color: transparent;
            cursor: pointer;
            border-radius: 0px;
        }
        .img_header:hover {
            background-color: #BDCDDD;
            border-radius: 15px;
        }
        .list {
            position: relative;
            width: 900px;
            left: 200px;
            background-color: #ffffff;
            border-radius: 15px;
            margin:70px 100px;
            padding: 25px 30px 25px 45px;
            min-height: 100vh;
        }
        .list ul {
            position: relative;
        }
        .list ul li span {
          position: relative;
          z-index: 1;
          transition: 0.5s;
        }
        .list ul li {
          position: relative;
          left: 0;
          color: #BDCDDD;
          list-style: none;
          margin: 20px 10px;
          padding-left: 10px;
          border-left: 2px solid #BDCDDD;
          transition: 0.5s;
          cursor: pointer;
          font-size: 20px;
        }
        .list ul li:hover {
          left: 10px;
        }
        .list ul li:before {
          content: "";
          position: absolute;
          width: 100%;
          height: 100%;
          background: #BDCDDD;
          transform: scaleX(0);
          transform-origin: left;
          transition: 0.5s;
}
        .list ul li:hover:before {
          transform: scaleX(1);
        }
        a{
            text-decoration: none;
            color: black;
        }
        .img_log{
            width: 250px;
            height: 80px;
            position: relative;
            top:-4px;
        }
    </style>
</head>
<body>
<header>
    <nav>
        <a href="{{route('show.profile')}}"><img class="img_header" src="{{ asset('storage/uploads/профиль.png')}}"></a>
        <a href="/show/subcaterories"><img class="img_header" src="{{ asset('storage/uploads/icons8-категории-50.png')}}"></a>
        <a href="/show/recipes"><img class="img_header" src="{{ asset('storage/uploads/главная.png')}}"></a>
    </nav>
    <form action="/show/subcaterories/search" method="get" class="form_search">
        <input class="search" name="search" placeholder="Поиск..." type="search">
        <button class="but_search" type="submit"></button>
    </form>
    <div>
        <a><img class="img_log" src="{{ asset('storage/uploads/Desktop - 4.png')}}"></a>
    </div>
</header>
    <div class="list">
        @foreach($categories as $category)
                <h2>{{ $category->name }}</h2>
                    <ul>
                        @foreach($subcategories as $subcategory)
                        <li>
                            <span>
                            @if($category->id==$subcategory->categories_id)
                                <a href="/show/subcaterories{{$subcategory->id}}">{{$subcategory->name }}</a>
                            @endif  
                        </span>
                        </li>    
                        @endforeach
                    </ul>
        @endforeach
    </div>
</body>
</html>

