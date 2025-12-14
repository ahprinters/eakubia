<flux:sidebar.group
    expandable
    :expanded="false"
    :heading="__('Students')"
    icon="users"
    class="grid"
>
    {{-- Student List --}}
    <flux:sidebar.item 
        :href="route('students.index')" 
        :current="request()->routeIs('students.index')" 
        wire:navigate
    >
        {{ __('Student List') }}
    </flux:sidebar.item>

    {{-- Add Student (multi-step create form) --}}
    <flux:sidebar.item
        :href="route('students.create')" 
        :current="request()->routeIs('students.create') || request()->routeIs('students.forward')" 
        {{-- wire:navigate --}}
    >
        {{ __('Add Student') }}
    </flux:sidebar.item>
</flux:sidebar.group>