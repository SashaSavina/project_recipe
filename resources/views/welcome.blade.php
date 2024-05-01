<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>
       <h1>Hello, User</h1>
        @isset($path)
            <img src="{{asset('/storage' . $path)}}">
        @endisset
    </body>
</html>
