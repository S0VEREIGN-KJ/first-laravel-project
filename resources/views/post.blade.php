@extends('layouts.blog')

@section('content')
    <main class="container mx-auto mt-6 flex justify-center">
        <section class="w-3/5 bg-white p-6 shadow-md rounded-lg">
            @if($post)
                <h1 class="text-2xl font-bold mb-4">{{ $post->title }}</h1>
                <p class="mt-4 text-lg text-gray-600">{{ $post->text }}</p>
            @else
                <p class="text-red-500">Post not found.</p>
            @endif
        </section>
    </main>
@endsection
