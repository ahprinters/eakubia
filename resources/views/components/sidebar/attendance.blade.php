{{-- Attendance এর মূল সাইডবার গ্রুপ --}}
<flux:sidebar.group
    expandable
    icon="clipboard-document-check"
    heading="Attendance" 
    :expanded="false"
    class="grid"
  
>

    

    {{-- মৌলিক Attendance লিঙ্ক --}}
    <flux:sidebar.item 
        :href="route('attendance.index')"
        :current="request()->routeIs('attendance.index')"
        wire:navigate>
        {{ __('Attendance List') }}
    </flux:sidebar.item>

    <flux:sidebar.item 
        :href="route('attendance.create')"
        :current="request()->routeIs('attendance.create')"
        wire:navigate>
        {{ __('Add Attendance') }}
    </flux:sidebar.item>

    <flux:sidebar.item 
        :href="route('attendance.report')"
        :current="request()->routeIs('attendance.report')"
        wire:navigate>
        {{ __('Attendance Report') }}
    </flux:sidebar.item>

    {{-- Exports Sub-Group --}}
    <flux:sidebar.group
        heading="Exports"
        class="grid"
        expandable
        :collapsed="true"
    >
        <flux:sidebar.item 
            :href="route('attendance.export.excel')"
            :current="request()->routeIs('attendance.export.excel')"
            wire:navigate>
            {{ __('Export to Excel') }}
        </flux:sidebar.item>
        <flux:sidebar.item 
            :href="route('attendance.export.pdf')"
            :current="request()->routeIs('attendance.export.pdf')"
            wire:navigate>
            {{ __('Export to PDF') }}
        </flux:sidebar.item>
    </flux:sidebar.group>

</flux:sidebar.group>