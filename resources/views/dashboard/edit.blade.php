@extends('dashboard.layout')
@section('dashboard-content')
    <main class="lg:col-span-10 xl:col-span-10">
        <div class="mt-0 mb-4">
            <ul role="list" class="space-y-4">
                @php $method = "PATCH" @endphp
                <x-post-form :post="$post" :route="route('profile.posts.update', $post)"
                             :method="$method"></x-post-form>

            </ul>
        </div>
    </main>

@endsection
