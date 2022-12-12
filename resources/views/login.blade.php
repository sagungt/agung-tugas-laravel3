@extends('template')

@section('title', 'Login')

@section('content')
  <h1 class="text-center text-4xl font-sans my-10 font-bold">Login</h1>
  <div class="flex flex-row gap-8 font-sans">
    <div class="w-1/2 mx-auto">
      <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-2">
          <label for="email" class="block mb-2 text-sm font-medium">Email</label>
          <input name="email" type="text" id="email" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Email" required>
          <label for="password" class="block mb-2 text-sm font-medium">Password</label>
          <input name="password" type="password" id="password" class="border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Password" required>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
      </form>
    </div>
  </div>
@endsection