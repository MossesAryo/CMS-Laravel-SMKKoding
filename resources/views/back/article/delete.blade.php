<form action="{{ url('article', $item->id) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
        Delete Category
    </button>
</form>