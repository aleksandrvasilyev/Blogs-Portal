<div class="hidden lg:col-span-3 lg:block xl:col-span-2">
    <nav aria-label="Sidebar" class="sticky top-4 divide-y divide-gray-300">
        <div class="space-y-1 pb-8">

            <a href="{{ route('dashboard') }}"
               class="bg-gray-200 text-gray-900 group flex items-center px-3 py-2 text-sm font-medium rounded-md"
               aria-current="page">
                <span class="truncate">Dashboard</span>
            </a>

            <a href="{{ route('profile.posts.create') }}"
               class="text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                <span class="truncate">New Post</span>
            </a>

            <a href="{{ route('profile.edit') }}"
               class="text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                <span class="truncate">Your Profile</span>
            </a>

            <a href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()"
               class="text-gray-700 hover:bg-gray-50 group flex items-center px-3 py-2 text-sm font-medium rounded-md">
                <span class="truncate">Log Out</span>
            </a>

            <form id="logout-form" method="POST" action="/logout" class="hidden">
                @csrf
            </form>


        </div>
    </nav>
</div>
