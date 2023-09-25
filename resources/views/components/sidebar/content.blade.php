<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-4 px-3"
>

    <x-sidebar.link
        title="Dashboard"
        href="{{ route('dashboard') }}"
        :isActive="request()->routeIs('dashboard')"
    >
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
    
    <x-sidebar.link
        title="Users"
        href="{{ route('users.index') }}"
        :isActive="request()->routeIs('users.index')"
    >
        <x-slot name="icon">
            <x-icons.users class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link
        title="Owners"
        href="{{ route('owners.index') }}"
        :isActive="request()->routeIs('owners.index')"
    >
        <x-slot name="icon">
            <x-icons.owners class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link
        title="Animals"
        href="{{ route('animals.index') }}"
        :isActive="request()->routeIs('animals.index')"
    >
        <x-slot name="icon">
            <x-icons.animals class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

</x-perfect-scrollbar>
