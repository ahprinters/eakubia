<x-layouts.app :title="__('Add Student')">

    {{-- Success Message --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow">

        {{-- Step Navigation --}}
        @php
            $steps = [
                1 => 'ব্যক্তিগত তথ্য',
                2 => 'অভিভাবকের তথ্য',
                3 => 'একাডেমিক ও ক্যাটাগরি',
                4 => 'পূর্ব প্রতিষ্ঠানের তথ্য',
                5 => 'অঙ্গীকার নামা',
                6 => 'অফিস কর্তৃক পূরণীয়',
                7 => 'ডকুমেন্ট আপলোড',
            ];
        @endphp

        <div class="flex justify-between mb-6 border-b pb-2 text-sm font-medium text-gray-600">
            @foreach($steps as $num => $label)
                <a href="{{ route('students.create', ['step' => $num]) }}"
                   class="{{ $step == $num ? 'text-indigo-600 font-bold' : '' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        {{-- Form --}}
        <form method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            {{-- Step Content --}}
            @switch($step)
                @case(1)
                    @include('students.partials.personal')
                    @break
                @case(2)
                    @include('students.partials.guardian')
                    @break
                @case(3)
                    @include('students.partials.academic')
                    @break
                @case(4)
                    @include('students.partials.previous_institution')
                    @break
                @case(5)
                    @include('students.partials.commitment')
                    @break
                @case(6)
                    @include('students.partials.office_use')
                    @break
                @case(7)
                    @include('students.partials.documents')
                    @break
            @endswitch

            {{-- Navigation Buttons --}}
            <div class="flex justify-between mt-6">
                {{-- Back Button --}}
                @if($step > 1)
                    <a href="{{ route('students.create', ['step' => $step-1]) }}"
                       class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
                        পেছনে
                    </a>
                @endif

                {{-- Forward / Final Submit --}}
                @if($step < count($steps))
                    <button type="submit"
                            formaction="{{ route('students.forward', ['step' => $step+1]) }}"
                            class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                        Save & Forward
                    </button>
                @else
                    <button type="submit"
                            formaction="{{ route('students.store') }}"
                            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        Final Submit
                    </button>
                @endif
            </div>
        </form>
    </div>
</x-layouts.app>