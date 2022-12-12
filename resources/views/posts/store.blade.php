@extends('template')

@section('title', 'Add New Post')

@section('content')
  <h1 class="text-center text-4xl my-10 font-bold">
    @if ($type == 'edit')
      Edit Post
    @else
      Add New Post
    @endif
  </h1>
  @if (session('message'))
    <div class="relative py-3 pl-4 pr-10 leading-normal text-blue-700 bg-blue-100 rounded-lg my-2 px-0 md:px-40 xl:px-40" role="alert">
      <p>{{ session('message') }}</p>
    </div>
  @endif
  <div class="flex flex-row gap-8 px-4 md:px-40 xl:px-40">
    <div class="w-full">
      <form method="POST" action="@if ($type == 'edit') {{ route('post.update', ['slug' => $post->slug]) }} @else {{ route('post.create') }} @endif" enctype="multipart/form-data">
        @csrf
        @if ($type == 'edit')
          @method('PUT')
        @endif
        <div class="mb-2">
          <label for="title" class="block mb-2 text-sm font-medium sr-only">Title</label>
          <input name="title" type="text" id="title" class="text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Title" required value="@if ($type == 'edit') {{ $post->title }} @endif">
        </div>
        <div class="mb-2">
          <label for="poster" class="block mb-2 text-lg font-medium text-slate-500 sr-only">Poster</label>
          <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="poster" name="poster">
        </div>
        <div class="mb-2">
          <label for="content" class="block mb-2 text-sm font-medium sr-only">Content</label>
          <textarea name="content" id="content" class="ckeditor text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">@if ($type == 'edit') {{ $post->content }} @endif</textarea>
        </div>
        <div class="mb-2">
          <label for="is_published" class="block mb-2 text-lg text-slate-500 font-medium">Published</label>
          <select name="is_published" id="is_published" class="text-sm text-slate-500 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/4 p-2.5">
            <option @if($type == 'edit' && $post->is_published == true) selected @endif value="true">True</option>
            <option @if($type == 'edit' && $post->is_published == false) selected @endif value="false">False</option>
          </select>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
          @if ($type == 'edit')
            Edit
          @else  
            Create
          @endif
        </button>
      </form>
    </div>
  </div>
  
@endsection

<script src="//cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('.ckeditor').ckeditor();
  });
</script>