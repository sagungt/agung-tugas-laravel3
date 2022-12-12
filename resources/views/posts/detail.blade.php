@extends('template')

@section('title', $post->title)

@section('content')
  <div class="w-full h-72 overflow-hidden">
    <img src="{{ $post->poster }}" alt="{{ $post->title }}" class="object-cover object-center h-full w-full">
  </div>
  <h1 class="text-center text-4xl my-10 font-bold">{{ $post->title }}</h1>
  <div class="px-0 md:px-40 xl:px-40 flex flex-col gap-10 mb-20">
    <div class="flex flex-row">
      {!! $post->content !!}
    </div>
  </div>
@endsection