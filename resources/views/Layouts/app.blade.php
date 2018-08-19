<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="shortcut icon" href="{{{ asset('img/hearthStoneRose.png') }}}">
    <title>{{config('app.name', 'Boomsday Project: Card Contest')}}</title>
</head>
<body>

    @include('inc.brandbar')


            @yield('content')

    
</body>
</html>