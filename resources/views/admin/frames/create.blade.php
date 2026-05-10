@extends('layouts.admin')

@section('title', 'Add Frame - Admin RuangJepret')

@section('content')
    <div class="max-w-3xl">
        <div class="flex items-center mb-8">
            <a href="{{ route('admin.frames.index') }}"
                class="mr-4 p-2 rounded-full hover:bg-gray-200 transition-colors text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
            </a>
            <h2 class="text-3xl font-extrabold text-black">Add New Frame</h2>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <form action="{{ route('admin.frames.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                @if ($errors->any())
                    <div class="bg-red-50 text-red-500 p-4 rounded-xl text-sm border border-red-100 mb-6">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label for="name" class="block text-sm font-bold text-gray-700 mb-2">Frame Name</label>
                        <input type="text" name="name" id="name" required value="{{ old('name') }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-black focus:border-black outline-none transition-colors"
                            placeholder="e.g. Classic Vintage">
                    </div>

                    <div>
                        <label for="category" class="block text-sm font-bold text-gray-700 mb-2">Category (Optional)</label>
                        <select name="category" id="category"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-black focus:border-black outline-none transition-colors">
                            <option value="" {{ old('category') == '' ? 'selected' : '' }}>- Pilih Kategori -</option>
                            <option value="free" {{ old('category') == 'free' ? 'selected' : '' }}>Free</option>
                            <option value="premium" {{ old('category') == 'premium' ? 'selected' : '' }}>Premium
                            </option>
                        </select>
                    </div>

                    <div>
                        <label for="rasio" class="block text-sm font-bold text-gray-700 mb-2">Ratio</label>
                        <select name="rasio" id="rasio"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-black focus:border-black outline-none transition-colors">
                            <option value="4:3" {{ old('rasio') == '4:3' ? 'selected' : '' }}>4:3</option>
                            <option value="1:1" {{ old('rasio') == '1:1' ? 'selected' : '' }}>1:1</option>
                            <option value="16:9" {{ old('rasio') == '16:9' ? 'selected' : '' }}>16:9</option>
                        </select>
                    </div>

                    <div>
                        <label for="qty_photo" class="block text-sm font-bold text-gray-700 mb-2">Quantity Photos</label>
                        <select name="qty_photo" id="qty_photo"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-black focus:border-black outline-none transition-colors">
                            <option value="1" {{ old('qty_photo') == '1' ? 'selected' : '' }}>1</option>
                            <option value="3" {{ old('qty_photo') == '3' ? 'selected' : '' }}>3</option>
                            <option value="4" {{ old('qty_photo') == '4' ? 'selected' : '' }}>4</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label for="image" class="block text-sm font-bold text-gray-700 mb-2">Frame Image (PNG with
                            transparency recommended)</label>
                        <input type="file" name="image" id="image" required accept="image/*"
                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-black focus:border-black outline-none transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 cursor-pointer">
                        
                        <!-- Image Preview Container -->
                        <div id="imagePreviewContainer" class="hidden mt-4 p-4 border border-gray-200 rounded-xl bg-gray-50 flex justify-center">
                            <img id="imagePreview" src="#" alt="Image Preview" class="max-h-64 object-contain shadow-sm">
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 flex justify-end">
                    <button type="submit"
                        class="bg-black text-white px-8 py-3 rounded-xl font-bold hover:bg-gray-800 transition-colors shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 duration-200">
                        Save Frame
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const previewContainer = document.getElementById('imagePreviewContainer');
        const previewImage = document.getElementById('imagePreview');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        } else {
            previewContainer.classList.add('hidden');
            previewImage.src = '#';
        }
    });
</script>
@endpush
