@props(['categories'])

<div 
    x-show="editOpen" 
    x-transition
    style="display: none;"
    class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50"
>
    <div @click.away="editOpen = false" class="bg-gray-800 rounded-lg p-6 w-full max-w-xl border border-gray-600">
        <h2 class="text-xl font-bold mb-4 text-white">Edit Product</h2>
        <form :action="`/profile/products/${editProduct.id}`" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
            <div>
                <label class="block mb-1">Name</label>
                <input type="text" name="name" x-model="editProduct.name" class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600 text-white" required>
            </div>

            <div>
                <label class="block mb-1">Description</label>
                <textarea name="description" rows="3" x-model="editProduct.description" class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600 text-white" required></textarea>
            </div>

            <div>
                <label class="block mb-1">Image URL (optional)</label>
                <input type="text" name="image" placeholder="Leave blank for placeholder" x-model="editProduct.image" class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600 text-white">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1">Price</label>
                    <input type="number" name="price" step="0.01" x-model="editProduct.price" class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600 text-white" required>
                </div>
                <div>
                    <label class="block mb-1">Stock</label>
                    <input type="number" name="stock" x-model="editProduct.stock" class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600 text-white" required>
                </div>
            </div>

            <div>
                <label class="block mb-1">Category</label>
                <select name="categories[]" multiple class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600 text-white" size="5" x-model="editProduct.categories">
                    @foreach ($categories as $category)
                        <option value="{{ $category->name }}">{{ ucfirst($category->name) }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1">Or add new category</label>
                <input type="text" name="new_category" placeholder="Optional" x-model="editProduct.new_category" class="w-full px-4 py-2 rounded bg-gray-700 border border-gray-600 text-white">
            </div>

            <div class="text-right">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-5 py-2 rounded">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
