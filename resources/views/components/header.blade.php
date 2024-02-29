<header class="bg-white shadow-sm lg:static lg:overflow-y-visible">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="relative flex justify-between lg:gap-8 xl:grid xl:grid-cols-12">
            <div class="flex md:absolute md:inset-y-0 md:left-0 lg:static xl:col-span-2">
                <div class="flex flex-shrink-0 items-center">
                    <a href="{{ route('posts.index') }}">
                        <img class="block h-8 w-auto"
                             src="https://tailwindui.com/img/logos/mark.svg?color=rose&amp;shade=500"
                             alt="Your Company">
                    </a>
                </div>
            </div>
            <div class="min-w-0 flex-1 md:px-8 lg:px-0 xl:col-span-6">
                <div class="flex items-center px-6 py-4 md:mx-auto md:max-w-3xl lg:mx-0 lg:max-w-none xl:px-0">
                    <div class="w-full">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-gray-400"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input id="search" name="search"
                                   class="block w-full rounded-md border border-gray-300 bg-white py-2 pl-10 pr-3 text-sm placeholder-gray-500 focus:border-rose-500 focus:text-gray-900 focus:placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-rose-500 sm:text-sm"
                                   placeholder="Search" type="search">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center md:absolute md:inset-y-0 md:right-0 lg:hidden">
                <!-- Mobile menu button -->
                <button type="button"
                        class="-mx-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-rose-500">
                    <span class="sr-only">Open menu</span>
                    <svg class="block h-6 w-6"
                         :class="{ 'hidden': open, 'block': !(open) }" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                    </svg>
                    <svg x-description="Icon when menu is open.

Heroicon name: outline/x-mark" x-state:on="Menu open" x-state:off="Menu closed" class="hidden h-6 w-6"
                         :class="{ 'block': open, 'hidden': !(open) }" xmlns="http://www.w3.org/2000/svg"
                         fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:items-center lg:justify-end xl:col-span-4">
                <a href="javascript:void(0)" class="text-sm font-medium text-gray-900 hover:underline">
                    Go Premium</a>
                <a href="javascript:void(0)"
                   class="ml-5 flex-shrink-0 rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" x-description="Heroicon name: outline/bell"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"></path>
                    </svg>
                </a>

                <!-- Profile dropdown -->
                <!-- user -->

                <div x-data="{ open: false }"
                     class="relative ml-5 flex-shrink-0">

                    @if(auth()->user())
                        <div>
                            <a type="button"
                               class="flex rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2"
                               id="user-menu-button"
                               href="javascript:void(0)"
                               @click="open = !open">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                     src="{{ auth()->user()->photo ?? '' }}"
                                     alt="">
                            </a>
                        </div>
                    @else
                        <a href="/login">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg>
                        </a>

                    @endif


                    <div
                        class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                        x-show="open"
                        @click.away="open = false"
                        role="menu" aria-orientation="vertical"
                        aria-labelledby="user-menu-button" tabindex="-1">

                        <a href="{{ route('dashboard') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100"
                           role="menuitem" tabindex="-1"
                           id="user-menu-item-0">Dashboard</a>

                        <a href="{{ route('profile.edit') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100"
                           role="menuitem" tabindex="-1"
                           id="user-menu-item-0">Your Profile</a>

                        <a href="{{ route('logout') }}"
                           class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100"
                           role="menuitem" tabindex="-1"
                           id="user-menu-item-0"
                           x-data="{}"
                           @click.prevent="document.querySelector('#logout-form').submit()"
                        >Log Out</a>

                        <form id="logout-form" method="POST" action="/logout" class="hidden">
                            @csrf
                        </form>

                    </div>

                </div>

                <a href="{{ route('profile.posts.create') }}"
                   class="ml-6 inline-flex items-center rounded-md border border-transparent bg-rose-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">
                    New Post</a>
            </div>
        </div>
    </div>

    <nav x-description="Mobile menu, show/hide based on menu state." class="lg:hidden" aria-label="Global"
         x-ref="panel" x-show="open" @click.away="open = false">
        <div class="mx-auto max-w-3xl space-y-1 px-2 pt-2 pb-3 sm:px-4">

            <a href="javascript:void(0)" aria-current="page"
               class="bg-gray-100 text-gray-900 block rounded-md py-2 px-3 text-base font-medium"
               x-state:on="Current" x-state:off="Default"
               x-state-description="Current: &quot;bg-gray-100 text-gray-900&quot;, Default: &quot;hover:bg-gray-50&quot;">Home</a>

            <a href="javascript:void(0)" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium"
               x-state-description="undefined: &quot;bg-gray-100 text-gray-900&quot;, undefined: &quot;hover:bg-gray-50&quot;">Popular</a>

            <a href="javascript:void(0)" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium"
               x-state-description="undefined: &quot;bg-gray-100 text-gray-900&quot;, undefined: &quot;hover:bg-gray-50&quot;">Communities</a>

            <a href="javascript:void(0)" class="hover:bg-gray-50 block rounded-md py-2 px-3 text-base font-medium"
               x-state-description="undefined: &quot;bg-gray-100 text-gray-900&quot;, undefined: &quot;hover:bg-gray-50&quot;">Trending</a>

        </div>

        <div class="border-t border-gray-200 pt-4">
            <div class="mx-auto flex max-w-3xl items-center px-4 sm:px-6">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full"
                         src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80"
                         alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium text-gray-800">Chelsea Hagon</div>
                    <div class="text-sm font-medium text-gray-500">chelsea.hagon@example.com</div>
                </div>
                <button type="button"
                        class="ml-auto flex-shrink-0 rounded-full bg-white p-1 text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2">
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" x-description="Heroicon name: outline/bell"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0"></path>
                    </svg>
                </button>
            </div>
            <div class="mx-auto mt-3 max-w-3xl space-y-1 px-2 sm:px-4">

                <a href="javascript:void(0)"
                   class="block rounded-md py-2 px-3 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">Your
                    Profile</a>

                <a href="javascript:void(0)"
                   class="block rounded-md py-2 px-3 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">Settings</a>

                <a href="javascript:void(0)"
                   class="block rounded-md py-2 px-3 text-base font-medium text-gray-500 hover:bg-gray-50 hover:text-gray-900">Sign
                    out</a>

            </div>
        </div>

        <div class="mx-auto mt-6 max-w-3xl px-4 sm:px-6">
            <a href="{{ route('profile.posts.create') }}"
               class="flex w-full items-center justify-center rounded-md border border-transparent bg-rose-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-rose-700">
                New Post</a>

            <div class="mt-6 flex justify-center">
                <a href="javascript:void(0)" class="text-base font-medium text-gray-900 hover:underline">Go
                    s {{ route('profile.posts.create') }}</a>
            </div>
        </div>
    </nav>
</header>
