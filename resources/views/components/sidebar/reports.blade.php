<flux:sidebar.group
    expandable
    :expanded="false"
    :heading="__('Reports')"
    icon="chart-bar"
    class="grid"
>
    <flux:sidebar.item :href="route('reports.index')" :current="request()->routeIs('reports.index')" wire:navigate>
        {{ __('View Reports') }}
    </flux:sidebar.item>
</flux:sidebar.group>