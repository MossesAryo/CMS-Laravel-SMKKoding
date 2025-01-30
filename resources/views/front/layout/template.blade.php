<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        @stack("meta-seo")
        <title>MoBlogs</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('front/img/favicon.ico') }}" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('front/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('front/css/custom.css') }}" rel="stylesheet" />
        @stack('css')
    </head>
    
    <body class="d-flex flex-column min-vh-100">
        @include('front.layout.navbar')
        @unless (Request::routeIs('about') || Request::routeIs('contact'))
        <header class="page-header mb-4">
            <div class="container ">
                <div class="header-content text-center">
                    <h1 class="header-title">Welcome to MoBlogs</h1>
                    <p class="header-subtitle">Exploring Ideas, Sharing Stories, Creating Connections</p>
                </div>
            </div>
        </header>
        @endunless
        @yield('content')
            </body>
        </html>
        <!-- Footer-->
        <footer class="py-4 bg-dark mt-auto">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; MoBlogs 2024</p>
            </div>
        </footer>
        
        
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('front/js/scripts.js') }}"></script>
        @stack('js')
    </body>
</html>