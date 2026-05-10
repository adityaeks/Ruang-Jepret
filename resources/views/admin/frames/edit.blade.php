@extends('layouts.admin')

@section('title', 'Edit Frame - Admin RuangJepret')

@section('content')
<div class="max-w-3xl">
    <div class="flex items-center mb-8">
        <a href="{{ route('admin.frames.index') }}" class="mr-4 p-2 rounded-full hover:bg-gray-200 transition-colors text-gray-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <h2 class="text-3xl font-extrabold text-black">Edit Frame</h2>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.frames.update', $frame->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

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
                    <input type="text" name="name" id="name" required value="{{ old('name', $frame->name) }}" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-black focus:border-black outline-none transition-colors">
                </div>

                <div>
                    <label for="category" class="block text-sm font-bold text-gray-700 mb-2">Category (Optional)</label>
                    <input type="text" name="category" id="category" value="{{ old('category', $frame->category) }}" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-black focus:border-black outline-none transition-colors">
                </div>

                <div>
                    <label for="rasio" class="block text-sm font-bold text-gray-700 mb-2">Ratio</label>
                    <input type="text" name="rasio" id="rasio" value="{{ old('rasio', $frame->rasio) }}" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-black focus:border-black outline-none transition-colors">
                </div>

                <div>
                    <label for="qty_photo" class="block text-sm font-bold text-gray-700 mb-2">Quantity Photos</label>
                    <input type="number" name="qty_photo" id="qty_photo" required value="{{ old('qty_photo', $frame->qty_photo) }}" min="1" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-black focus:border-black outline-none transition-colors">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Current Image Preview</label>
                    <div class="mb-4 p-4 border border-gray-200 rounded-xl bg-gray-50 flex justify-center">
                        <img id="imagePreview" src="{{ asset('frames/' . $frame->image) }}" alt="Current Image" class="max-h-64 object-contain shadow-sm">
                    </div>
                    
                    <label for="image" class="block text-sm font-bold text-gray-700 mb-2">Update Image (Leave empty to keep current)</label>
                    <input type="file" name="image" id="image" accept="image/*" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-black focus:border-black outline-none transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 cursor-pointer">
                </div>
            </div>

            <div class="pt-6 border-t border-gray-100 flex justify-end">
                <button type="submit" class="bg-black text-white px-8 py-3 rounded-xl font-bold hover:bg-gray-800 transition-colors shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 duration-200">
                    Update Frame
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
        const previewImage = document.getElementById('imagePreview');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
            }
            reader.readAsDataURL(file);
        } else {
            // Revert to original if cancelled? Or just leave the last selected one.
            // Actually let's revert to original if they cancel.
            previewImage.src = "{{ asset('frames/' . $frame->image) }}";
        }
    });
</script>
@endpush
