<x-slot name="header">
    <div class="hidden sm:block sm:ml-6">
        <div class="flex space-x-4">
            <x-subnav-link :href="route('app.website.config')" :active="request()->routeIs('app.website.config')">
                {{ __('Configuration') }}
            </x-subnav-link>
            <x-subnav-link :href="route('app.website.indexPage')" :active="request()->routeIs('app.website.indexPage')">
                {{ __('Index page') }}
            </x-subnav-link>
            <x-subnav-link :href="route('app.website.contactPage')" :active="request()->routeIs('app.website.contactPage')">
                {{ __('Contact page') }}
            </x-subnav-link>
            <x-subnav-link :href="route('app.website.custompage.list')" :active="request()->routeIs('app.website.custompage.list')" >
                {{ __('Custom pages') }}
            </x-subnav-link>
            <x-subnav-link :href="route('app.website.template')" :active="request()->routeIs('app.website.template')" >
                {{ __('Templates') }}
            </x-subnav-link>
        </div>
    </div>
</x-slot>
