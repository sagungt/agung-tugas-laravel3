@extends('template')

@section('title', 'List Product')

@section('content')
  <h1 class="text-center text-4xl font-sans my-10 font-bold">List Products</h1>
  <div class="w-full flex">
    <a href="{{ route('product.store') }}" class="h-10 px-6 font-semibold rounded-full bg-violet-600 text-white my-2 flex items-center" type="button">
      Add Product
    </a>
  </div>
  @if (session('message'))
    <div class="relative py-3 pl-4 pr-10 leading-normal text-red-700 bg-red-100 rounded-lg my-2" role="alert">
      <p>{{ session('message') }}</p>
    </div>
  @endif
  <div class="grid grid-cols-1 lg:grid-cols-2 md:grid-cols-2 gap-4 px-2 md:mx-0 lg:px-0">
    @foreach ($products as $product)
      @includeIf('product.product', ['product' => $product])
    @endforeach
  </div>
@endsection