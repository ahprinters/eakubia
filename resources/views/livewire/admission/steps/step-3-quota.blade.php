<div class="space-y-6">
    <h2 class="text-xl font-bold text-gray-600">Quota Categories</h2>
    <p class="text-sm text-gray-500">Select applicable quota categories (multiple selections allowed)</p>

    <div class="grid grid-cols-2 gap-4">
        @foreach($categories as $category)
            <label class="inline-flex items-center">
                <input type="checkbox"
                       wire:model="selectedCategories"
                       value="{{ $category }}"
                       class="form-checkbox h-4 w-4 text-indigo-600">
                <span class="ml-2 text-gray-700">{{ $category }}</span>
            </label>
        @endforeach
    </div>

    {{-- Validation error --}}
    @error('selectedCategories')
        <span class="text-xs text-red-500">{{ $message }}</span>
    @enderror
</div>