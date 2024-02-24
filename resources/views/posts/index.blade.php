<x-layout>
    <main class="lg:col-span-9 xl:col-span-7">
        @include('components.sort-by')
        <div class="mt-4 mb-4">
            <ul role="list" class="space-y-4">
                @foreach ($posts as $post)
                    <x-post-small :post="$post"></x-post-small>
                @endforeach
            </ul>

        </div>

        {{ $posts->links() }}
    </main>
    @include('components.aside')
</x-layout>
