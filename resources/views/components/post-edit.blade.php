<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <main class="lg:col-span-10 xl:col-span-10">
        <div class="mt-0 mb-4">
            <ul role="list" class="space-y-4">
                    <x-post-form :post="$post"></x-post-form>
            </ul>
        </div>

    </main>
</x-layout>
