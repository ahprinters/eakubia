<x-layouts.app :title="__('Add Student')">

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">

        {{-- Step Navigation (Horizontal) --}}
        <div class="flex justify-between mb-6 border-b pb-2 text-sm font-medium text-gray-600">
            <a href="{{ route('students.create', ['step' => 1]) }}" class="{{ $step==1 ? 'text-indigo-600 font-bold' : '' }}">ব্যক্তিগত তথ্য</a>
            <a href="{{ route('students.create', ['step' => 2]) }}" class="{{ $step==2 ? 'text-indigo-600 font-bold' : '' }}">অভিভাবকের তথ্য</a>
            <a href="{{ route('students.create', ['step' => 3]) }}" class="{{ $step==3 ? 'text-indigo-600 font-bold' : '' }}">একাডেমিক ও ক্যাটাগরি</a>
            <a href="{{ route('students.create', ['step' => 4]) }}" class="{{ $step==4 ? 'text-indigo-600 font-bold' : '' }}">পূর্ব প্রতিষ্ঠানের তথ্য</a>
            <a href="{{ route('students.create', ['step' => 5]) }}" class="{{ $step==5 ? 'text-indigo-600 font-bold' : '' }}">অঙ্গীকার নামা</a>
            <a href="{{ route('students.create', ['step' => 6]) }}" class="{{ $step==6 ? 'text-indigo-600 font-bold' : '' }}">অফিস কর্তৃক পূরণীয়</a>
            <a href="{{ route('students.create', ['step' => 7]) }}" class="{{ $step==7 ? 'text-indigo-600 font-bold' : '' }}">ডকুমেন্ট আপলোড</a>
        </div>

        {{-- Form --}}
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            {{-- Step Content --}}
            @if($step == 1)
                @include('students.partials.personal')
            @elseif($step == 2)
                @include('students.partials.guardian')
            @elseif($step == 3)
                @include('students.partials.academic')
            @elseif($step == 4)
                @include('students.partials.previous_institution')
            @elseif($step == 5)
                @include('students.partials.commitment')
            @elseif($step == 6)
                @include('students.partials.office_use')
            @elseif($step == 7)
                @include('students.partials.documents')
            @endif

            {{-- Navigation Buttons --}}
            <div class="flex justify-between mt-6">
                @if($step > 1)
                    <a href="{{ route('students.create', ['step' => $step-1]) }}" 
                       class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                        পেছনে
                    </a>
                @endif

                @if($step < 7)
                    <button type="submit" formaction="{{ route('students.forward', ['step' => $step+1]) }}" 
                            class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                        Save & Forward
                    </button>
                @else
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Final Submit
                    </button>
                @endif
            </div>
        </form>
    </div>
</x-layouts.app>