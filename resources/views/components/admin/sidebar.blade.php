<!-- component -->
<div
    class="fixed flex flex-col top-0 left-0 w-64 bg-white h-full border-r z-50 border-gray-300 dark:bg-background dark:border-gray-500">
    <div class="bg-gray-300 dark:bg-gray-500 h-[1px] w-64 absolute top-[84px]"></div>
    <div class="flex items-center justify-between p-7 border-gray-300 dark:border-gray-500">
        <x-admin.application-mark class="font-medium text-xl text-gray-800 dark:text-gray-200 leading-tight" />
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
                <x-admin.nav-link href="{{ route('admin.projects.index') }}" class="" :icon="'projects'">
                    <span class="ml-2 text-sm tracking-wide truncate">Projects</span>
                    {{-- <span
                        class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">1.2k</span> --}}
                </x-admin.nav-link>
            </li>
            <li>
                <x-admin.nav-link href="{{ route('admin.blog.index') }}" class="" :icon="'blog'">
                    <span class="ml-2 text-sm tracking-wide truncate">Blog</span>
                </x-admin.nav-link>
            </li>
            <li>
                <x-admin.nav-link href="{{ route('admin.tags.index') }}" class="" :icon="'tags'">
                    <span class="ml-2 text-sm tracking-wide truncate">Tags</span>
                </x-admin.nav-link>
            </li>

            <li>
                <x-admin.nav-link href="{{ route('admin.photography.index') }}" class="" :icon="'photography'">
                    <span class="ml-2 text-sm tracking-wide truncate">Photography</span>
                </x-admin.nav-link>
            </li>

            <li class="px-5">
                <div class="flex flex-row items-center h-8">
                    <div class="text-sm font-light tracking-wide text-gray-500 dark:text-gray-300">Settings</div>
                </div>
            </li>
            <li>
                <x-admin.nav-link href="{{ route('profile.show') }}" class="" :icon="'profile'" :active="request()->routeIs('profile.show')">
                    <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
                </x-admin.nav-link>
            </li>
            <li>
                <x-admin.nav-link href="{{ route('admin.settings') }}" class="" :icon="'settings'">
                    <span class="ml-2 text-sm tracking-wide truncate">Settings</span>
                </x-admin.nav-link>
            </li>
            <li>
                <x-admin.nav-link href="{{ route('logout') }}" class="" :icon="'logout'"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="ml-2 text-sm tracking-wide truncate">Logout</span>

                </x-admin.nav-link>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
