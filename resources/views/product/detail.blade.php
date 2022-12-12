@extends('template')

@section('title', 'Detail Product')

@section('content')
{{-- @dd(request()->getSchemeAndHttpHost()) --}}
  <h1 class="text-center text-4xl font-sans my-10 font-bold">Detail Products</h1>
  <div class="w-full flex">
    <a href="{{ route('product.list') }}" class="h-10 px-6 font-semibold rounded-full bg-violet-600 text-white my-2 flex items-center" type="button">
      Home
    </a>
  </div>
  @if (session('message'))
    <div class="relative py-3 pl-4 pr-10 leading-normal text-green-700 bg-green-100 rounded-lg my-2" role="alert">
      <p>{{ session('message') }}</p>
    </div>
  @endif
  <div class="flex flex-row gap-8">
    <div class="w-full md:w-1/2 lg:w-1/2">
      <form method="POST" action="{{ route('product.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-2">
          <label for="name" class="block mb-2 text-sm font-medium">Name</label>
          <input name="name" type="text" id="name" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Product Name" required value="{{ $product->name }}">
        </div>
        <div class="mb-2">
          <label for="price" class="block mb-2 text-sm font-medium">Price</label>
          <input name="price" type="number" id="price" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="100000" required value="{{ $product->price }}">
        </div>
        <div class="mb-2">
          <label for="quantity" class="block mb-2 text-sm font-medium">Quantity</label>
          <input name="quantity" type="number" id="quantity" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="10" required value="{{ $product->quantity }}">
        </div>
        <div class="mb-2">
          <label for="description" class="block mb-2 text-sm font-medium">Description</label>
          <textarea name="description" id="description" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">{{ $product->description }}</textarea>
        </div>
        <div class="mb-2">
          <label for="photo" class="block mb-2 text-sm font-medium">Photo</label>
          <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="photo" name="photo">
        </div>
        <div class="mb-2">
          <label for="is_sold" class="block mb-2 text-sm font-medium">Is Sold ?</label>
          <select name="is_sold" id="is_sold" class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option @if($product->is_sold == true) selected @endif value="true">True</option>
            <option @if($product->is_sold == false) selected @endif value="false">False</option>
          </select>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
        <a href="{{ route('product.destroy', ['id' => $product->id]) }}" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Delete</a>
      </form>
    </div>
    <div class="w-full md:w-1/2 lg:w-1/2 flex justify-center items-center">
      <img src="{{ $product->photo }}" alt="" id="preview" class="object-cover">
    </div>
  </div>
@endsection

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const input = document.querySelector("#product-photo");
    const preview = document.querySelector("#preview-image");
  
    function readURL(input) {
      if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
          preview.setAttribute('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    };
  
    input.addEventListener('change', function() {
      readURL(input);
    });
  })

</script>