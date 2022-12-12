<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>@yield('title')</title>
  <style>
    ::-webkit-file-upload-button {
      /* background: #FF4B2B; */
      color: black;
      padding: 8px 25px;
      font-size: 10px;
      border-radius: 10px;
      border-color: #FF4B2B;
      transition: all 0.15s ease;
      letter-spacing: 1px;
      box-sizing: border-box;
      outline: none;
      cursor: pointer;
      line-height: 1.5;
      display: inline-block;
      font-weight: bold;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      user-select: none;
      border: 1px solid transparent;
    }
  </style>
</head>
<body class="font-serif">
  @include('navbar')
  <div class="container mx-auto">
    @if ($errors->any())
      <div class="relative py-3 pl-4 pr-10 leading-normal text-red-700 bg-red-100 rounded-lg my-2 px-0 md:px-40 xl:px-40" role="alert">
        <p>{{ $errors->first() }}</p>
      </div>
    @endif
    @yield('content')
  </div>
</body>
<script>
  const navbarMenu = document.querySelector('#navbar-menu');
  const navbarButton = document.querySelector('#navbar-button');

  navbarButton.addEventListener('click', () => {
    navbarMenu.classList.toggle('hidden');
    navbarButton.querySelector('.hamburger').classList.toggle('active')
  });
</script>
</html>