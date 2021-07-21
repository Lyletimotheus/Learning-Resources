@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div class="container-fluid">
                <h3 class="navbar-brand"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                <small> Written at: {{ $post->created_at }}</small>
            </div>
        @endforeach
        {{ $posts->links() }}
    @else
        <p>There are no posts!</p>
    @endif
@endsection