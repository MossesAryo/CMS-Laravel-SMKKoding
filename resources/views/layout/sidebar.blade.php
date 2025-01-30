<!-- Sidebar -->
<nav class="w-64 bg-gray-900 text-white min-h-screen">
    <div class="p-4">
        <h4 class="text-center text-lg font-bold mb-4">Welcome, {{ auth()->user()->name }}</h4>
        <ul class="space-y-3">
            <li>
                <a href="{{ route('back.dashboard.index') }}" class="flex items-center p-3 hover:bg-gray-700 rounded transition">
                    <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ url('article') }}" class="flex items-center p-3 hover:bg-gray-700 rounded transition">
                    <i class="fas fa-newspaper mr-3"></i> Articles
                </a>
            </li>
            @if (auth()->user()->role == 1)
            <li>
                <a href="{{ url('categories') }}" class="flex items-center p-3 hover:bg-gray-700 rounded transition">
                    <i class="fas fa-tags mr-3"></i> Categories
                </a>
            </li>       
            <li>
                <a href="{{ url('users') }}" class="flex items-center p-3 hover:bg-gray-700 rounded transition">
                    <i class="fas fa-users mr-3"></i> Users
                </a>
            </li>
            @endif
            <li>
                <a href="{{ route('Blogs') }}" class="flex items-center p-3 bg-red-600 hover:bg-red-700 rounded transition">
                    <i class="fas fa-arrow-left mr-3"></i> Back
                </a>
            </li>
        </ul>
    </div>
</nav>
