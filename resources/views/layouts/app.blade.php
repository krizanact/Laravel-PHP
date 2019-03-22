<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">




</head>
<body>
    <div id="app">
            @include('navbar.nav')
            @include('navbar.check')
            @yield('content')

    </div>

    <!-- testing ajax request,it works but I do not use it in this project -->

    <script type="text/javascript">


       /* $(document).ready(function() {

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });





                $("form#data").submit(function (e) {

                e.preventDefault();


                    var formData = new FormData(this);




                $.ajax({

                    type: 'POST',

                    url: '/home',

                    data: formData,

                    success: function (data) {

                       console.log(data);

                    },
                    cache: false,
                    contentType: false,
                    processData: false

                });

            });

        });

*/
    </script>

</body>

</html>
