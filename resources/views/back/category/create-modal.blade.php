<!-- Create Modal -->
<input type="checkbox" id="createModalToggle" class="peer hidden">
<div class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50 hidden peer-checked:flex">
    <div class="bg-white rounded-lg shadow-lg w-1/3">
        <div class="flex items-center justify-between p-4 border-b">
            <h3 class="text-xl font-semibold">Create Category</h3>
            <label for="createModalToggle" class="text-gray-600 hover:text-gray-900 cursor-pointer">&times;</label>
        </div>
        <div class="p-4">
            <form action="{{ url('categories') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="createName" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="createName" name="name" class="w-full border border-gray-300 rounded-lg px-3 py-2 mt-1 text-sm" placeholder="Enter name" >
                </div>
                <div class="flex justify-end">
                    <label for="createModalToggle" class="bg-gray-300 text-gray-700 px-4 py-2 rounded mr-2 hover:bg-gray-400 cursor-pointer">Cancel</label>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>