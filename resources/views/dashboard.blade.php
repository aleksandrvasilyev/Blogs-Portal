<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <main class="lg:col-span-10 xl:col-span-10">
        <p>You have {{ $posts->total() ?? '0' }} posts </p>
        <div class="mt-4 mb-4">
            <ul role="list" class="space-y-4">
                @foreach ($posts as $post)
                    <x-post-admin :post="$post"></x-post-admin>
                @endforeach
            </ul>
        </div>

        {{ $posts->links() }}
    </main>
</x-layout>
