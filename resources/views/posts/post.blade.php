<div class="flex bg-gradient-to-l from-slate-200 to-transparent">
  <div class="flex-none w-64 relative">
    <img src="{{ $post->poster }}" alt="" class="absolute inset-0 w-full h-full object-cover" loading="lazy" />
  </div>
  <form class="flex-auto p-6">
    <div class="flex flex-wrap items-baseline">
      <h1 class="w-full flex-none mb-3 text-2xl leading-none text-slate-900">
        {{ $post->title }}
      </h1>
      <div class="text-xs leading-6 font-medium uppercase text-slate-500">
        View: {{ $post->view_count }}
      </div>
    </div>
    <div class="flex items-baseline mt-4 mb-6 pb-6 border-b border-slate-200">
      <div class="space-x-1 flex text-sm font-medium text-slate-500">
        {!! $post->summary !!}
      </div>
    </div>
    <div class="flex space-x-4 mb-5 text-sm font-medium">
      <div class="flex-auto flex space-x-4 pr-4">
        <a href="{{ route('post.detail', ['slug' => $post->slug]) }}" class="flex-none flex justify-center items-center w-1/2 h-12 uppercase font-medium tracking-wider bg-slate-900 text-white" type="submit">
          View Post
        </a>
      </div>
      <a href="{{ route('post.edit', ['slug' => $post->slug]) }}" class="flex-none flex items-center justify-center w-12 h-12 text-slate-900 border border-slate-200" type="button">
        Edit
      </a>
      <a href="{{ route('post.destroy', ['slug' => $post->slug]) }}" class="flex-none flex items-center justify-center w-12 h-12 text-slate-900 border border-slate-200" type="button">
        Delete
      </a>
    </div>
  </form>
</div>