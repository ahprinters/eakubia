@props([
    'title' => '',
    'icon' => null,
])

<div {{ $attributes->merge(['class' => 'rounded-xl border border-neutral-200 dark:border-neutral-700 bg-white p-4 shadow-sm']) }}>
    @if($title)
        <h2 class="text-lg font-semibold mb-4 flex items-center gap-2">
            @if($icon)
                <x-icon :name="$icon" class="w-5 h-5 text-gray-500" />
            @endif
            {{ $title }}
        </h2>
    @endif

    {{ $slot }}
</div>