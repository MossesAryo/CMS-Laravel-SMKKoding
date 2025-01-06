@extends('layout.template')

@section('main')
    <main class="flex-1 p-6">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Update Article</h1>
        </div>

        <!-- Table Section -->


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

        <form action="{{ url('article',$article->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <input type="hidden" name="oldImg" value="{{ $article->img }}">
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1 text-sm" placeholder="Enter Title"
                    value="{{ old('title', $article->title) }}">
            </div>

            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category_id" name="category_id"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1 text-sm">
                    @foreach ($categories as $item)
                        @if ($item->id == $article->category_id)
                            <option value="{{ $item->id }}"selected>{{ $item->name }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="desc" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="desc" name="desc" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1 text-sm"
                    placeholder="Enter Description">{{ old('description', $article->desc) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="img"class="block text-sm font-medium text-gray-700">Image (Max 2MB)</label>
                <input type="file" id="img" name="img"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1 text-sm">
                <div class="mt-3">
                    <small>Gambar Lama</small>
                    <img src="{{ asset('storage/' . $article->img) }}" alt="" width="100px">
                </div>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select id="status" name="status"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1 text-sm">        
                    <option value="1"{{ $article->status == 1 ? 'selected' : null }}>Public</option>
                    <option value="0"{{ $article->status == 0 ? 'selected' : null }}>Private</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="publish_date" class="block text-sm font-medium text-gray-700">Publish Date</label>
                <input type="date" id="publish_date" name="publish_date"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1 text-sm"
                    value="{{ old('publish_date', $article->publish_date) }}">
            </div>

            <div class="flex justify-end gap-2">
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</button>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Save</button>
            </div>
        </form>
        </tbody>
        </table>
        </div>

    @endsection
