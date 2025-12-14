<div class="space-y-6">
  <h2 class="text-xl font-bold text-gray-600">Previous Academic Information</h2>
  <p class="text-sm text-gray-500">Fill in details of your previous institution and academic record</p>

  <div class="grid grid-cols-2 gap-4">
    {{-- Previous Institution Name --}}
    <div>
      <label class="block text-sm font-medium text-gray-700">Previous Institution Name</label>
      <input type="text" wire:model.defer="prev_inst_name" class="mt-1 block w-full rounded-md border-gray-300" placeholder="Enter previous institution name" />
      @error('prev_inst_name')<span class="text-xs text-red-500">{{ $message }}</span>@enderror
    </div>

    {{-- Previous Class --}}
    <div>
      <label class="block text-sm font-medium text-gray-700">Previous Class</label>
      <input type="text" wire:model.defer="prev_class" class="mt-1 block w-full rounded-md border-gray-300" placeholder="Enter class passed" />
      @error('prev_class')<span class="text-xs text-red-500">{{ $message }}</span>@enderror
    </div>
  </div>

  <div class="grid grid-cols-2 gap-4">
    {{-- Passing Year --}}
    <div>
      <label class="block text-sm font-medium text-gray-700">Passing Year</label>
      <input type="number" wire:model.defer="pass_year" class="mt-1 block w-full rounded-md border-gray-300" placeholder="Enter passing year" />
      @error('pass_year')<span class="text-xs text-red-500">{{ $message }}</span>@enderror
    </div>

    {{-- GPA --}}
    <div>
      <label class="block text-sm font-medium text-gray-700">GPA</label>
      <input type="text" wire:model.defer="gpa" class="mt-1 block w-full rounded-md border-gray-300" placeholder="Enter GPA" />
      @error('gpa')<span class="text-xs text-red-500">{{ $message }}</span>@enderror
    </div>
  </div>

  <div class="grid grid-cols-2 gap-4">
    {{-- Release No --}}
    <div>
      <label class="block text-sm font-medium text-gray-700">Release No</label>
      <input type="text" wire:model.defer="release_no" class="mt-1 block w-full rounded-md border-gray-300" placeholder="Enter release number" />
      @error('release_no')<span class="text-xs text-red-500">{{ $message }}</span>@enderror
    </div>

    {{-- Release Date --}}
    <div>
      <label class="block text-sm font-medium text-gray-700">Release Date</label>
      <input type="date" wire:model.defer="releas_date" class="mt-1 block w-full rounded-md border-gray-300" />
      @error('releas_date')<span class="text-xs text-red-500">{{ $message }}</span>@enderror
    </div>
  </div>
</div>
