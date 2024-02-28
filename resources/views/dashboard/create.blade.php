@extends('dashboard.layout')
@section('dashboard-content')
    <main class="lg:col-span-10 xl:col-span-10">
        <div class="mt-0 mb-4">
            <ul role="list" class="space-y-4">
                @php
                    $method = "POST"
                @endphp
                <x-post-form :route="route('profile.posts.store')" :method="$method"></x-post-form>
            </ul>
        </div>
    </main>

@endsection
