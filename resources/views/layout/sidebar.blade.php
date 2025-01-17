<nav class="w-64 bg-gray-800 text-white h-screen">
    <div class="p-4">
        <h4 class="text-center text-xl font-bold">Welcome, {{ auth()->user()->name }}</h4>
        <ul class="mt-6">
            <li class="mb-4">
                <a href="{{ route('back.dashboard.index') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ url('article') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <i class="fas fa-users mr-3"></i>
                    Articles
                </a>
            </li>
            @if (auth()->user()->role == 1)
            <li class="mb-4">
                <a href="{{ url('categories') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <i class="fas fa-chart-line mr-3"></i>
                    Categories
                </a>
            </li>       
            @endif
            @if (auth()->user()->role == 1)
                  
            <li class="mb-4">
                <a href="{{ url('users') }}" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <i class="fas fa-cogs mr-3"></i>
                    Users
                </a>
            </li>
            @endif
            <li class="mb-4">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a href="{{ route('logout') }}"onclick="event.preventDefault();
                document.getElementById('logout-form').submit();" class="flex items-center p-2 hover:bg-gray-700 rounded">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>