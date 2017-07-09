<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials._head')
  </head>

<body>
	<h1> Kiia </h1>
    @include('partials._nav')

    @include('partials._messages')
    @yield('content')

    @include('partials._footer')

    @include('partials._scripts')
    
</body>

</html>
