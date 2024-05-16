<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gallery Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('style_main/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('style_main/css/theme.css') }}">

</head>

<body>
    {{-- page nav --}}
    @extends('layouts.nav')
    {{-- end page nav --}}

    {{-- page content --}}
    <main role="main">
        @yield('content')
    </main>
    {{-- end page content --}}

    <footer class="footer pt-5 pb-5 text-center">

        <div class="container">
                    {{--<div class="socials-media">

                        <ul class="list-unstyled">
                            <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i
                                        class="fa fa-facebook"></i></a></li>
                            <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i
                                        class="fa fa-twitter"></i></a></li>
                            <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i
                                        class="fa fa-instagram"></i></a></li>
                            <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i
                                        class="fa fa-google-plus"></i></a></li>
                            <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i
                                        class="fa fa-behance"></i></a></li>
                            <li class="d-inline-block ml-1 mr-1"><a href="#" class="text-dark"><i
                                        class="fa fa-dribbble"></i></a></li>
                        </ul>

                    </div> --}}

            <!--
              All the links in the footer should remain intact.
              You may remove the links only if you donate:
              https://www.wowthemes.net/freebies-license/
            -->
            <p>© <span class="credits font-weight-bold">
                  <script>document.write(new Date().getFullYear())</script>, made by gall
                </span>
            </p>

        </div>

    </footer>

    <script src="{{asset('style_main/js/app.js')}}"></script>
    <script src="{{asset('style_main/js/theme.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
