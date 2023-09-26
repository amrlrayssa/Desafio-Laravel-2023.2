<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-4 px-3"
>

    <x-sidebar.dropdown
        title="Dashboard"
        href="{{ route('dashboard') }}"
        :active="Str::startsWith(request()->route()->uri(), 'dashboard')"
    >
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="PDF - Invoice"
            href="/pdf"
        ></x-sidebar.sublink>

        <x-sidebar.sublink
            title="Send an Email"
            href="/email"
        ></x-sidebar.sublink>
    </x-sidebar.dropdown>
    
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

    <x-sidebar.link
        title="Consultations"
        href="{{ route('consultations.index') }}"
        :isActive="request()->routeIs('consultations.index')"
    >
        <x-slot name="icon">
            <x-icons.consultations class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

</x-perfect-scrollbar>
