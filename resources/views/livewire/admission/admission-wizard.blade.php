<div>

   <div class="max-w-5xl mx-auto p-6 bg-white shadow-xl rounded-lg my-12">
        <h1 class="text-3xl font-extrabold text-indigo-700 mb-8 border-b pb-3">Student Admission Wizard</h1>
        {{-- Progress Bar --}}
        <div class="mb-8">
            <div class="flex justify-between items-center text-sm font-medium">
                @php $totalSteps = 8; @end php
                @for ($i=1; $i<=$totalSteps; $i++)
                <span class = "{{ $currentStep>=$i? 'text-indigo-600 font-bold': 'text-gray-400' }}">
                    Step{{ $i }}
                </span>
                @end for                
            </div>
            <div class = "w-full bg-gray-200 rounded-full h-2.5 mt-2">
                <div class = "bg-indigo-600 h-2.5 rounded-full" style="width:{{ ($currentStep/$totalSteps)*100 }}%">
                </div>
            </div>
        </div>
        <form wire:submit.prevent="{{ $currentStep ==6 ? 'submitForm':'nextStep'}}">

            {{-- Step wise Content --}}

            @if($currentStep==1)
                @include('livewire.admission.steps.step-1-personal')
            @elseif ($currentStep == 2)
                @include('livewire.admission.steps.step-2-parent')
            @elseif ($currentStep == 3)
                @include('livewire.admission.steps.step-3-quota')
            @elseif ('$currentStep == 4')
                @include('livewire.admission.steps.step-4-academic')
            @elseif ('$currentStep == 5')
                @include('livewire.admission.steps.step-5-signature')
            @elseif ('$currentStep == 6')
                @include('livewire.admission.steps.step-6-pdf')
            @elseif ('$currentStep == 7')
               @include('livewire.admission.steps.step-7-pdf')
            @elseif ($currentStep == 8)
                @include('livewire.admission.steps.step-8-documents')
            @endif                 

            {{-- navigation button --}}
            <div class=" mt-10 flex justify-between border-1 pt-5">
                @if($currentStep ==1)
                <button type= "button" wire:click="previousStep" class = "px-6 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300"
                    &larr;previous
                </button>
                @else
                <div></div>
                @endif


                <button type= "submit" class = "px-6 py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 disabled: opacity-50"
                   @if($currentStep <8) 
                   Nex Step &rarr;
                   @else
                   Submit Application
                   @endif
                </button>
            </div>
        </form>
   </div>