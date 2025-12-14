<div class="space-y-6">
    <h2 class="text-xl font-bold text-gray-600">Guardian Details</h2>

    {{-- Mobile Numbers --}}
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-600">Father's Mobile Number</label>
            <input type="text" wire:model.defer="father_mobile"
                   class="mt-1 block w-full rounded-md border-gray-300"
                   placeholder="Enter Father's Mobile Number" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600">Mother's Mobile Number</label>
            <input type="text" wire:model.defer="mother_mobile"
                   class="mt-1 block w-full rounded-md border-gray-300"
                   placeholder="Enter Mother's Mobile Number" />
        </div>
    </div>

    {{-- Profession & Income --}}
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-600">Father's Profession</label>
            <input type="text" wire:model.defer="father_profession"
                   class="mt-1 block w-full rounded-md border-gray-300"
                   placeholder="Enter Father's Profession" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600">Annual Income (BDT)</label>
            <input type="number" wire:model.defer="annual_income"
                   class="mt-1 block w-full rounded-md border-gray-300"
                   placeholder="Enter Annual Income" />
            @error('annual_income')<span class="text-xs text-red-500">{{ $message }}</span>@enderror
        </div>
    </div>

    {{-- Land Information --}}
    <h3 class="mt-6 text-lg font-semibold">Land Information</h3>
    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-600">Cultivated Land (Acres)</label>
            <input type="number" wire:model.defer="land_area_cultivated"
                   class="mt-1 block w-full rounded-md border-gray-300"
                   placeholder="Enter cultivated land in acres" />
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600">Residential Land (Acres)</label>
            <input type="number" wire:model.defer="land_area_residential"
                   class="mt-1 block w-full rounded-md border-gray-300"
                   placeholder="Enter residential land in acres" />
        </div>
    </div>
</div>