<flux:sidebar.group
    expandable
    :expanded="false"
    :heading="__('Teachers')"
    icon="academic-cap"
    class="grid"
>
    <flux:sidebar.item :href="route('teachers.index')" :current="request()->routeIs('teachers.index')" wire:navigate>
        {{ __('Teacher List') }}
    </flux:sidebar.item>
    <flux:sidebar.item :href="route('teachers.create')" :current="request()->routeIs('teachers.create')" wire:navigate>
        {{ __('Add Teacher') }}
    </flux:sidebar.item>
</flux:sidebar.group>