<!-- Update Modal -->
<style>
    .modal-open {
        overflow: hidden;
    }
    
    .modal-overlay.active {
        display: flex !important;
        align-items: center;
        justify-content: center;
    }
</style>

@foreach ($categories as $item)
<input type="checkbox" id="updateModalToggle{{ $item->id }}" class="hidden">
<div class="fixed inset-0 bg-black bg-opacity-50 z-40 modal-overlay hidden flex items-center justify-center" id="updateModalOverlay{{ $item->id }}" data-modal="updateModal{{ $item->id }}">
    <!-- Remove the min-h-screen and the outer flex container -->
    <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4" onclick="event.stopPropagation()">
        <div class="flex justify-between items-center p-6 border-b">
            <h3 class="text-lg font-medium">Update Category</h3>
            <button type="button" onclick="closeModal('{{ $item->id }}')" class="cursor-pointer">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <form action="{{ url('categories', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="p-6">
                <div class="mb-4">
                    <label for="name{{ $item->id }}" class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
                    <input type="text" name="name" id="name{{ $item->id }}" value="{{ $item->name }}" required 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-1 focus:ring-blue-500">
                </div>
            </div>
            <div class="px-6 py-4 border-t bg-gray-50 flex justify-end space-x-3 rounded-b-lg">
                <button type="button" onclick="closeModal('{{ $item->id }}')" 
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Update Category
                </button>
            </div>
        </form>
    </div>
</div>
@endforeach

<script>
document.addEventListener('DOMContentLoaded', function() {
   
    window.openModal = function(id) {
        const overlay = document.getElementById(`updateModalOverlay${id}`);
        const checkbox = document.getElementById(`updateModalToggle${id}`);
        
        if (overlay && checkbox) {
            checkbox.checked = true;
            overlay.classList.remove('hidden');
            overlay.classList.add('active');
            document.body.classList.add('modal-open');
        }
    };

   
    window.closeModal = function(id) {
        const overlay = document.getElementById(`updateModalOverlay${id}`);
        const checkbox = document.getElementById(`updateModalToggle${id}`);
        
        if (overlay && checkbox) {
            checkbox.checked = false;
            overlay.classList.add('hidden');
            overlay.classList.remove('active');
            document.body.classList.remove('modal-open');
        }
    };

    
    document.querySelectorAll('.modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', function(e) {
            if (e.target === this) {
                const id = this.dataset.modal.replace('updateModal', '');
                closeModal(id);
            }
        });
    });

    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal-overlay.active').forEach(overlay => {
                const id = overlay.dataset.modal.replace('updateModal', '');
                closeModal(id);
            });
        }
    });
});
</script>