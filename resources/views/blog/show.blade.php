@extends('blog.layout')
@section('blog-content')

    <main class="col-span-10">
        <div class="">
            <ul role="list" class="space-y-4">
                <x-post-full :post="$post"></x-post-full>
            </ul>
        </div>
    </main>
@endsection

