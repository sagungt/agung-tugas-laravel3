@extends('template')

@section('title', 'Add New Product')

@section('content')
  <h1 class="text-center text-4xl font-sans my-10 font-bold">Add New Products</h1>
  <div class="w-full flex">
    <a href="{{ route('product.list') }}" class="h-10 px-6 font-semibold rounded-full bg-violet-600 text-white my-2 flex items-center" type="button">
      Home
    </a>
  </div>
  @if (session('message'))
    <div class="relative py-3 pl-4 pr-10 leading-normal text-blue-700 bg-blue-100 rounded-lg my-2" role="alert">
      <p>{{ session('message') }}</p>
    </div>
  @endif
  <div class="flex flex-row gap-8">
    <div class="w-full md:w-1/2 lg:w-1/2">
      <form method="POST" action="{{ route('product.create') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
          <label for="name" class="block mb-2 text-sm font-medium">Name</label>
          <input name="name" type="text" id="name" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Product Name" required>
        </div>
        <div class="mb-2">
          <label for="price" class="block mb-2 text-sm font-medium">Price</label>
          <input name="price" type="number" id="price" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="100000" required>
        </div>
        <div class="mb-2">
          <label for="quantity" class="block mb-2 text-sm font-medium">Quantity</label>
          <input name="quantity" type="number" id="quantity" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="10" required>
        </div>
        <div class="mb-2">
          <label for="description" class="block mb-2 text-sm font-medium">Description</label>
          <textarea name="description" id="description" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>
        </div>
        <div class="mb-2">
          <label for="photo" class="block mb-2 text-sm font-medium">Photo</label>
          <input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" id="photo" name="photo">
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
      </form>
    </div>
    <div class="w-full md:w-1/2 lg:w-1/2 flex justify-center items-center">
      <img src="#" alt="" id="preview" class="object-cover">
    </div>
  </div>
  
@endsection

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const input = document.querySelector("#photo");
    const preview = document.querySelector("#preview");
  
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