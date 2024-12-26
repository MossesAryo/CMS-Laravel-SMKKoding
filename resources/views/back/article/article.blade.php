@extends('layout.template')

@section('main')
    <main class="flex-1 p-6">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Article</h1>
        </div>

        <!-- Table Section -->
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-bold">Recent Articles</h2>
            <label for="createModalToggle"
                class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                Create
            </label>
        </div>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                <strong class="font-bold">Error(s):</strong>
                <ul class="list-disc pl-5 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden p-4">
            <table id="articlesTable" class="min-w-full bg-white border-collapse display">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-4 text-left uppercase font-medium text-sm">No</th>
                        <th class="py-3 px-4 text-left uppercase font-medium text-sm">Title</th>
                        <th class="py-3 px-4 text-left uppercase font-medium text-sm">Category</th>
                        <th class="py-3 px-4 text-left uppercase font-medium text-sm">Status</th>
                        <th class="py-3 px-4 text-left uppercase font-medium text-sm">Views</th>
                        <th class="py-3 px-4 text-left uppercase font-medium text-sm">Publish Date</th>
                        <th class="py-3 px-4 text-left uppercase font-medium text-sm">Function</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    {{-- @foreach ($articles as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-3 px-4 text-sm">{{ $loop->iteration }}</td>
                    <td class="py-3 px-4 text-sm">{{ $item->title }}</td>
                    <td class="py-3 px-4 text-sm">{{ $item->Category->name }}</td>

                    @if ($item->status == 0)
                    <td class="py-3 px-4 text-sm text-white bg-red-400">Private</td>
                    @else
                    <td class="py-3 px-4 text-sm text-white bg-green-500">Public</td>    
                    @endif
                    <td class="py-3 px-4 text-sm">{{ $item->status}}</td>

                    <td class="py-3 px-4 text-sm">{{ $item->publish_date }}</td>
                    <td class="py-3 px-4 text-sm">
                        <div class="flex space-x-2">
                            <button type="button" onclick="openModal('{{ $item->id }}')" 
                                class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            Detail
                            </button>
                            <button type="button" onclick="openModal('{{ $item->id }}')" 
                                class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            Edit
                            </button>
                            <button type="button" onclick="openDeleteModal('{{ $item->id }}')" 
                                class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            Delete
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach --}}
                </tbody>
            </table>
        </div>




        <script>
            $(document).ready(function() {
                $('#articlesTable').DataTable({
                    responsive: true,
                    processing: true,
                    serverside: true,
                    ajax: '{{ url()->current() }}',
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'title',
                            name: 'title'
                        },
                        {
                            data: 'category_id',
                            name: 'category_id'
                        },
                        {
                            data: 'views',
                            name: 'views'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'publish_date',
                            name: 'publish_date'
                        },
                        {
                            data: 'button',
                            name: 'button',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });
            });
        </script>
        </body>
    </main>
@endsection
