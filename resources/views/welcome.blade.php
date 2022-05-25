@extends('layout')
@section('header')
<header class="header" style ="background-image: url({{ asset('images/vietnamtv.jpeg') }});">
  <div class="header-text">
    <h1>Travel Blog</h1>
    <h4>Dashboard of verified news...</h4>
  </div>
  <div class="overlay"></div>
</header>
@endsection
@section('main')
<main class="container">
  <h2 class="header-title">Latest Blog Posts</h2>
  <section class="cards-blog latest-blog">
    {{-- Nơi để đăng bài lên trang chủ --}}
    @foreach ($posts as $post)
    <div class="card-blog-content">
      <img src="{{ asset($post->imagePath) }}" style="width: 508px;height: 286px;">
      <p>
        {{ $post->created_at->diffForHumans() }}
        <span>Tác giả : {{ $post->user->name }}</span>
      </p>
      <h4><a href="{{ route('blog.show',$post) }}">{{ $post->title }}</a></h4>
    </div>
        
    @endforeach
   

  </section>
</main>
@endsection