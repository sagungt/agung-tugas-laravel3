@extends('template')

@section('title', 'All Posts')

@section('content')
  <h1 class="text-center text-4xl my-10 font-bold">All Posts</h1>
  <div class="w-full flex px-0 md:px-40 xl:px-40">
    <a href="{{ route('post.store') }}" class="h-10 px-6 font-semibold rounded-full bg-gray-900 text-white my-2 flex items-center" type="button">
      Add Post
    </a>
  </div>
  <div class="px-0 md:px-40 xl:px-40 flex flex-col gap-10">
    @forelse ($posts as $post)
      @includeIf('posts.post', ['post' => $post])
    @empty
      <h2 class="text-center text-2xl">No Post Yet</h2>
    @endforelse
  </div>
@endsection