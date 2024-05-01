<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>
<body>
<table bgcolor="" #e8e3d4 width="" 100%>
    <tr align=center>
        <td bgcolor=#ccc0b3>Меню</td>
    </tr>
    <tr align=center>
        <td bgcolor=#ebebeb>
            @foreach($photo as $ph)
                <p>{{ $ph-> }}</p>
            @endforeach
        </td>
    </tr>
    <tr align=center>
        <td bgcolor=#ccc0b3>Подвал сайта</td>
    </tr>
</table>
</body>
</html>

