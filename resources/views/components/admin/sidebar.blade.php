<!-- component -->
<div class="fixed flex flex-col top-0 left-0 w-64 bg-white h-full border-r z-50 shadow border-gray dark:bg-background">
    <div class="flex items-center justify-between p-5">
        <x-admin.application-mark class="h-8 w-auto " />
    </div>
    <div class="overflow-y-auto overflow-x-hidden flex-grow">
        <ul class="flex flex-col py-4 space-y-1">
            <li class="px-5">
                <div class="flex flex-row items-center h-8">
                    <div class="text-sm font-light tracking-wide text-gray-500 dark:text-gray-300">Menu</div>
                </div>
            </li>
            <li>
                <x-admin.nav-link href="{{ route('admin.dashboard') }}" class="" :icon="'dashboard'">
                    <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                </x-admin.nav-link>
            </li>
            <li>
                <x-admin.nav-link href="#" class="" :icon="'inbox'">
                    <span class="ml-2 text-sm tracking-wide truncate">Inbox</span>
                    <span
                        class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-indigo-500 bg-indigo-50 rounded-full">New</span>
                </x-admin.nav-link>
            </li>
            <li>
                <x-admin.nav-link href="#" class="" :icon="'messages'">
                    <span class="ml-2 text-sm tracking-wide truncate">Messages</span>
                </x-admin.nav-link>
            </li>
            <li>
                <x-admin.nav-link href="#" class="" :icon="'notifications'">
                    <span class="ml-2 text-sm tracking-wide truncate">Notifications</span>
                    <span
                        class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span>
                </x-admin.nav-link>
            </li>
            <li class="px-5">
                <div class="flex flex-row items-center h-8">
                    <div class="text-sm font-light tracking-wide text-gray-500 dark:text-gray-300">Tasks</div>
                </div>
            </li>
            <li>
                <x-admin.nav-link href="#" class="" :icon="'tasks'">
                    <span class="ml-2 text-sm tracking-wide truncate">Available Tasks</span>
                </x-admin.nav-link>
            </li>
            <li>
                <x-admin.nav-link href="#" class="" :icon="'clients'">
                    <span class="ml-2 text-sm tracking-wide truncate">Clients</span>
                    <span
                        class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-green-500 bg-green-50 rounded-full">15</span>
                </x-admin.nav-link>
            </li>
            <li class="px-5">
                <div class="flex flex-row items-center h-8">
                    <div class="text-sm font-light tracking-wide text-gray-500">Settings</div>
                </div>
            </li>
            <li>
                <x-admin.nav-link href="{{ route('profile.show') }}" class="" :icon="'profile'" :active="request()->routeIs('profile.show')">
                    <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
                </x-admin.nav-link>
            </li>
            <li>
                <x-admin.nav-link href="#" class="" :icon="'settings'">
                    <span class="ml-2 text-sm tracking-wide truncate">Settings</span>
                </x-admin.nav-link>
            </li>
            <li>
                <x-admin.nav-link href="#" class="" :icon="'logout'">
                    <span class="ml-2 text-sm tracking-wide truncate">Logout</span>
                </x-admin.nav-link>
            </li>
        </ul>
    </div>
</div>
