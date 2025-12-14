<x-filament::page>
    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <x-filament::input name="email" type="email" label="Email" required />
        <x-filament::input name="password" type="password" label="Password" required />
        <x-filament::button type="submit">Login</x-filament::button>
    </form>
</x-filament::page>
