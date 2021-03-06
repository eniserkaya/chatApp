<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <title>Chat Apps</title>
        <style>
            .under {
                position: absolute;
                bottom: 200px;
                right: 200px;
            }
            #container {
                position: fixed;
                bottom: 0;
                right: 0;
                pointer-events: none;
            }
            .chat {
                border: 1px solid #999;
                display: inline-block;
                vertical-align: bottom;
                position: relative;
                margin: 0 5px;
                pointer-events: auto;
            }
            .title {
                padding: 0.5em;
                background-color: blue;
                color: white;
            }
            .text {
                padding: 10px;
            }
        </style>

    </head>
    <body>
    <div id="app">
        <router-view></router-view>
    </div>
    <script>var BASE_URL = '{{URL::to('/')}}'</script>
    <script src="{{asset('js/app.js')}}" ></script>
    </body>
</html>
