@extends('layout.template')

@section('main')
    <main class="flex-1 p-6">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Detail Article</h1>
        </div>

        <div class="mt-3">
            <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                    <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm">Title</th>
                        <td class="px-4 py-3">: {{ $article->title }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm">Category</th>
                        <td class="px-4 py-3">: {{ $article->Category->name }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm">Description</th>
                        <td class="px-4 py-3 prose max-w-none">{!! $article->desc !!}</td>
                    </tr>

                    <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm">Image</th>
                        <td class="px-4 py-3">
                        <a href="{{ asset('storage/' . $article->img) }}"target="_blank" rel="noopener noreferrer"></a>
                        <img src="{{ asset('storage/'. $article->img) }}" alt="" width="50%">
                         
                        </td>
                    </tr>
                    <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm">Views</th>
                        <td class="px-4 py-3">: {{ $article->views }}</td>
                    </tr>
                    <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm">Status</th>
                        @if ($article->status == 0)
                            <td class="px-4 py-3 text-red-900">Private</td>
                        @else
                            <td class="px-4 py-3 text-green-900">Public</td>
                        @endif
                    </tr>
                    <tr>
                      <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm">Publish Date</th>
                      <td class="px-4 py-3">:   {{ $article->publish_date }}</td>
                    </tr> 
                  </thead>
                </table>
                <div class="float-end">
                  <a href="{{ url('article') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">Back</a>
                </div>
        </div>
        </div>





        </body>
    </main>
@endsection
