<div class="space-y-6">
    <h2 class="text-xl font-bold text-gray-600">Step 5: Commitment & Signature</h2>
    <p class="text-sm text-gray-500">Commitment and declaration are fixed. Please provide signatures below.</p>

    {{-- Student Commitment (Static) --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Student Commitment</label>
        <textarea readonly
                  rows="3"
                  class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 text-gray-700">
I hereby commit to abide by all rules and regulations of the institution and maintain discipline.
        </textarea>
    </div>

    {{-- Student Signature --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Student Signature</label>
        <input type="text" wire:model.defer="student_signature"
               class="mt-1 block w-full rounded-md border-gray-300"
               placeholder="Enter student signature">
        @error('student_signature')<span class="text-xs text-red-500">{{ $message }}</span>@enderror
    </div>

    {{-- Guardian Declaration (Static) --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Guardian Declaration</label>
        <textarea readonly
                  rows="3"
                  class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 text-gray-700">
I hereby declare that I will take responsibility for my child's conduct, fees, and compliance with institutional rules.
        </textarea>
    </div>

    {{-- Guardian Signature --}}
    <div>
        <label class="block text-sm font-medium text-gray-700">Guardian Signature</label>
        <input type="text" wire:model.defer="guardian_signature"
               class="mt-1 block w-full rounded-md border-gray-300"
               placeholder="Enter guardian signature">
        @error('guardian_signature')<span class="text-xs text-red-500">{{ $message }}</span>@enderror
    </div>
</div>