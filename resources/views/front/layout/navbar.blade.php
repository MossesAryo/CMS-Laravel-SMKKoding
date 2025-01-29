<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('Blogs') }}">MoBlogs</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('Blogs') ? 'active' : '' }}"
                        href="{{ Route('Blogs') }}">Home</a>
                </li>
                <li class="nav-item">

                    <a class="nav-link {{ Request::routeIs('about') ? 'active' : '' }}"
                        href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('contact') ? 'active' : '' }}" href="{{ route("contact") }}">Contact</a>
                </li>

                @if (Auth::check())
                    <!-- Show these links if the user is authenticated -->
                    <li class="nav-item">
                        <a class="unlink" href="{{ route('back.dashboard.index') }}">
                            <button class="btn btn-upload ms-3">
                                <i class="fas fa-plus"></i> Upload New Articles
                            </button>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="btn btn-logout ms-3">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            Logout
                        </button>
                    </li>
                @else
                    <!-- Show these buttons if the user is not authenticated -->
                    <li class="nav-item">
                        <a class="btn btn-primary ms-3" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-secondary ms-3" href="{{ route('register') }}">Register</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
