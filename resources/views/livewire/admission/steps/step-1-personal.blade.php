<div class="space-y-6">
    <h2 class="text-xl font-bold text-gray-800">
        Step 1: Personal & Guardian Name
    </h2>
    <p class="text-sm text-red-500">
        Note: Name (English) is pre-filled from your login profile
    </p>

    {{-- Student Info --}}
    <div class="grid grid-cols-3 gap-4">
        {{-- Student name in English --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Student Name (English)
            </label>
            <input type="text" wire:model.defer="name_en" disabled
                   class="mt-1 block w-full bg-gray-100 border-gray-300 rounded-md">
        </div>

        {{-- Student name Bangla --}}
        <div>
            <label for="name_bn" class="block text-sm font-medium text-gray-700">
                Student Name (Bangla)
            </label>
            <input type="text" wire:model.defer="name_bn" id="name_bn"
                   class="mt-1 block w-full border-gray-300 rounded-md">
            @error('name_bn')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
        </div>

        {{-- Date of Birth --}}
        <div>
            <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
            <input type="date" wire:model.defer="date_of_birth" id="dob"
                   class="mt-1 block w-full border-gray-300 rounded-md">
        </div>
    </div>

    {{-- Parent Info --}}
    <div class="grid grid-cols-4 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">Father's Name (Bangla)</label>
            <input type="text" wire:model.defer="father_name_bn"
                   class="mt-1 block w-full border-gray-300 rounded-md"
                   placeholder="Enter Father name in Bangla">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Father's Name (English)</label>
            <input type="text" wire:model.defer="father_name_en"
                   class="mt-1 block w-full border-gray-300 rounded-md"
                   placeholder="Enter Father name in English">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Mother's Name (Bangla)</label>
            <input type="text" wire:model.defer="mother_name_bn"
                   class="mt-1 block w-full border-gray-300 rounded-md"
                   placeholder="Enter Mother name in Bangla">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Mother's Name (English)</label>
            <input type="text" wire:model.defer="mother_name_en"
                   class="mt-1 block w-full border-gray-300 rounded-md"
                   placeholder="Enter Mother name in English">
        </div>
    </div>

    {{-- NID, Mobile, Religion --}}
    <div class="grid grid-cols-3 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">NID/Birth Registration No</label>
            <input type="text" wire:model.defer="nid_birth_reg"
                   class="mt-1 block w-full border-gray-300 rounded-md"
                   placeholder="Enter NID/Birth Certificate Number">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Mobile Number</label>
            <input type="text" wire:model.defer="mobile_number"
                   class="mt-1 block w-full border-gray-300 rounded-md"
                   placeholder="Enter Your Mobile Number">
            @error('mobile_number')<span class="text-red-500 text-xs">{{ $message }}</span>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Religion</label>
            <select wire:model.defer="religion"
                    class="mt-1 block w-full border-gray-300 rounded-md">
                <option value="">-- Select Religion --</option>
                <option value="Islam">Islam</option>
                <option value="Hinduism">Hinduism</option>
                <option value="Christian">Christian</option>
            </select>
        </div>
    </div>

    {{-- Address Components --}}
    <div class="grid grid-cols-2 gap-6 mt-8">
        <div>
            <h3 class="font-semibold mb-2">Permanent Address</h3>
            @livewire('address-form', ['addressType' => 'permanent'], key('permanent-addr'))
        </div>

        <div>
            <h3 class="font-semibold mb-2">Current Address</h3>
            @livewire('address-form', ['addressType' => 'current'], key('current-addr'))
        </div>
    </div>
</div>