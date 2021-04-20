<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ URL::asset('styles.css') }}">
        <script src="https://kit.fontawesome.com/30db1c9b5d.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="{{ URL::asset('scripts/custom.js') }}"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500&family=Montserrat&display=swap" rel="stylesheet">


        <!--https://svg-clipart.com/red/rXt7Csf-red-shield-clipart logo reference-->
        <link rel="icon" type="image/png" href="{{ URL::asset('images/icon.png') }}" sizes="32x32">
        <title>
            @if(isset($title))
                {{ $title }}
            @else
                {{ "Fotheby's" }}
            @endif
        </title>

    </head>

    <body class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6943f5; width: 100%;">
            <a class="navbar-brand fancy-font " href="{{ route("home") }}">Fothebys <img src="/images/logo-450.png" class="logo-img"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent" style="background-color: #6943f5;">
                @auth
                <?php
                    $role = auth()->user()->permissions
                ?>
                @endauth
                @if(isset($role) && $role =="admin")
                @include('layouts.navs.admin')
                @else
                @include('layouts.navs.client')
                @endif
            </div>
          </nav>
            <main class="border-spacer">

                @yield('content')

            <section>
                <button title="Scroll to top" onclick="scrollUpTop()" class="btn btn-primary bt-fn top-button">Top</button>
            </section>

            </main>
            <footer class="containter-fluid mt-auto text-center text-white d-flex align-items-center justify-content-between">

                <!-- Copyright -->
                <a href="{{ route("home") }}" class="ml-2 fancy-font ">© 2021 Fothebys <img src="/images/logo-450.png" class="logo-img"></a>

                <ul class="horizontal-list m-1 fancy-font">
                  <li><a href="{{ route("general.construction") }}">Contact</a></li>
                  <li><a href="{{ route("general.construction") }}">About</a></li>
                  <li><a href="{{ route("general.construction") }}">Find Us</a></li>
                </ul>

                  <section class="mr-2">
                    <!-- Facebook -->
                    <a
                      class="btn btn-primary btn-floating m-1 rounded-circle border-0"
                      style="background-color: #3b5998;"
                      href="#!"
                      role="button"
                      ><i class="fab fa-facebook-f"></i
                    ></a>

                    <!-- Twitter -->
                    <a
                      class="btn btn-primary btn-floating m-1 rounded-circle border-0"
                      style="background-color: #55acee;"
                      href="#!"
                      role="button"
                      ><i class="fab fa-twitter"></i
                    ></a>

                    <!-- Instagram -->
                    <a
                      class="btn btn-primary btn-floating m-1 rounded-circle border-0"
                      style="background-color: #ac2bac;"
                      href="#!"
                      role="button"
                      ><i class="fab fa-instagram"></i
                    ></a>


                    <!--Youtube-->
                    <a
                      class="btn btn-primary btn-floating m-1 rounded-circle border-0"
                      style="background-color: #d11f1f;"
                      href="#!"
                      role="button"
                      ><i class="fab fa-youtube"></i>
                    </a>
                  </section>

                <!-- Copyright -->
              </footer>
    </body>

</html>
