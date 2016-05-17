@extends('layouts.admin-master')

@section('styles')

@endsection

@section('content')
    <div class="container">
        <section id="post-admin">
            <a href="#" class="btn">Edit Post</a>
            <a href="#" class="btn danger">Delete Post</a>
        </section>
        <section class="post">
            <h1>{{ $post->title }}</h1>
            <span class="info">{{ $post->author }} | {{ $post->created_at }}</span>
            <p>{{ $post->body }}</p>
        </section>
    </div>

@endsection