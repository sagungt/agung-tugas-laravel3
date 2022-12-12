<div @class(['flex', 'font-sans', 'opacity-50' => $product->is_sold])>
  <div class="flex-none w-56 relative">
    <img src="{{ $product->photo }}" alt="" class="absolute inset-0 w-full h-full object-cover rounded-lg" loading="lazy" />
  </div>
  <form class="flex-auto p-6 bg-gradient-to-l from-slate-100 to-transparent rounded-2xl">
    <div class="flex flex-wrap">
      <h1 class="flex-auto font-medium text-slate-900">
        {{ $product->name }}
      </h1>
      <div class="w-full flex-none mt-2 order-1 text-3xl font-bold text-violet-600">
        Rp. {{ $product->price }},00-
      </div>
      <div class="text-sm font-medium text-slate-400">
        In stock : {{ $product->quantity }}
      </div>
    </div>
    <div class="flex items-baseline mt-4 mb-6 pb-6 border-b border-slate-200">
      <p class="text-sm text-slate-400">
        {{ $product->description }}
      </p>
    </div>
    <div class="flex space-x-4 mb-5 text-sm font-medium">
      <div class="flex-auto flex space-x-4">
        <a href="{{ route('product.detail', ['id' => $product->id]) }}" class="h-10 px-6 font-semibold rounded-full bg-violet-600 text-white flex items-center">
          View
        </a>
        {{-- <button class="h-10 px-6 font-semibold rounded-full border border-slate-200 text-slate-900" type="button">
          Buy
        </button> --}}
      </div>
      <a href="{{ route('product.destroy', ['id' => $product->id]) }}" class="flex-none flex items-center justify-center w-16 h-9 rounded-xl text-violet-600 bg-violet-50">
        Delete
      </a>
    </div>
    <p class="text-sm text-slate-500">
      Free shipping on all continental US orders.
    </p>
  </form>
</div>