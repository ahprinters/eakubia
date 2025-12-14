<div>
    <h3 class="text-lg font-semibold mb-4 capitalize"> {{ $addressType }} Address</h3>
    <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
        
        {{-- Division dropdown --}}
        
        <div>
            <label for="{{ $addressType }}-division" class="block text-sm font-medium text-gray-700 mb-1">Division</label>
            <select wire:model="divisionId" id="{{ $addressType }}-division"  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                <option value="">--Select Division--</option>
                @foreach($divisions as $division)
                    <option value="{{ $division->id }}"->{{ $division->name }}</option>
                @endforeach
            </select>
            @error('divisionId') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror       
        </div>
        {{-- District dropdown --}}
        <div>
            <label for="{{ $addressType }}-district" class="block text-sm font-medium text-gray-700 mb-1">District</label>
            <select wire:model="districtId" id="{{ $addressType }}-district" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
               @if(empty($districts)) disabled @ endif->
                <option value="">--Select District--</option>
                @foreach($districts as $district)
                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                @endforeach
            </select>
            @error('districtId') <span class="text-red-500 text-xs">{{ $
        </div>
        {{-- upuzela dropdown --}}
        <div>
        <label for="{{ $addressType }}-upazila" class="block text-sm font-medium text-gray-700 mb-1">Upazila</label>
            <select wire:model="upazilaId" id="{{ $addressType }}-upazila" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
               @if(empty($upazilas)) disabled @ endif->
                <option value="">--Select Upazila--</option>
                @foreach($upazilas as $upazila)
                    <option value="{{ $upazila->id }}">{{ $upazila->name }}</option>
                @endforeach
            </select>
            @error('upazilaId') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        {{-- Union dropdown --}}
        <div>
        <label for="{{ $addressType }}-union" class="block text-sm font-medium text-gray-700 mb-1">Union</label>
            <select wire:model="unionId" id="{{ $addressType }}-union" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
               @if(empty($unions)) disabled @ endif->
                <option value="">--Select Union--</option>
                @foreach($unions as $union)
                    <option value="{{ $union->id }}">{{ $union->name }}</option>
                @endforeach
            </select>
            @error('unionId') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror    
        </div>

        {{-- ward dropdown --}}
        <div>
        <label for="{{ $addressType }}-ward" class="block text-sm font-medium text-gray-700 mb-1">Ward</label>
            <select wire:model="wardId" id="{{ $addressType }}-ward" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
               @if(empty($wards)) disabled @ endif->
                <option value="">--Select Ward--</option>
                @foreach($wards as $ward)
                    <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                @endforeach
            </select>
            @error('wardId') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror    
        </div>
    </div>

    {{-- custom address --}}
    <div class ="mt-4">
        <label for="{{ $addressType }}-custom-address" class="block text-sm font-medium text-gray-700 mb-1">Custom Address</label>
        <textarea wire:model.defer="customAddress" id="{{ $addressType }}-custom-address" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
        @error('customAddress') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    </div>
</div>