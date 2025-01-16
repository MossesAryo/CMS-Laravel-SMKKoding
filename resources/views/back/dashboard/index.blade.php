@extends('layout.template')

@section('main')
    <main class="flex-1 p-6">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Dashboard</h1>
        </div>

        <div class="w-full p-4">
            <div class="grid grid-cols-2 gap-6">
                <!-- Categories Card -->
                <a href="{{ url('categories') }}">

                    <div class="bg-blue-500 rounded-lg shadow-lg transition-all duration-300 hover:bg-blue-600">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div class="text-white">
                                    <h3 class="text-lg font-semibold opacity-90">Total Categories</h3>
                                    <p class="text-3xl font-bold mt-2">{{ $total_categories }} Categories</p>
                                    <p class="text-sm mt-2 bg-blue bg-opacity-20 rounded-full px-2 py-1 inline-block">
                                        +2 new
                                    </p>
                                </div>
                                <div class="text-white opacity-80">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 3h18v18H3zM8 12h8M12 8v8" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Articles Card -->
                <a href="{{ url('article') }}">
                    <div class="bg-purple-500 rounded-lg shadow-lg transition-all duration-300 hover:bg-purple-600">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <div class="text-white">
                                    <h3 class="text-lg font-semibold opacity-90">Total Articles</h3>
                                    <p class="text-3xl font-bold mt-2">{{ $total_articles }} Articles</p>
                                    <p class="text-sm mt-2 bg-purple bg-opacity-20 rounded-full px-2 py-1 inline-block">
                                        +12 new
                                    </p>
                                </div>
                                <div class="text-white opacity-80">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                        <path d="M14 2v6h6" />
                                        <line x1="16" y1="13" x2="8" y2="13" />
                                        <line x1="16" y1="17" x2="8" y2="17" />
                                        <line x1="10" y1="9" x2="8" y2="9" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </a>

        <!-- Tables Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Popular Articles Table -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-bold mb-4">Popular Articles</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Title</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Category</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Created At</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        @foreach ($popular_article as $item)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$item->title}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span
                                            class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">{{$item->Category->name}}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$item->created_at}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="flex space-x-2">
                                          <a href="{{ url('article/'.$item->id) }}"
                                          class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Detail</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>

            <!-- Latest Articles Table -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-bold mb-4">Latest Articles</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Title</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Category</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Created At</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        @foreach ($latest_article as $item)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$loop->iteration}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{$item->title}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span
                                            class="px-2 py-1 text-xs font-semibold rounded-full bg-purple-100 text-purple-800">{{$item->Category->name}}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$item->created_at}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="flex space-x-2">
                                          <a href="{{ url('article/'.$item->id) }}"
                                          class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Detail</a>
                                        </div>
                                    </td>
                                </tr>
                                
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
