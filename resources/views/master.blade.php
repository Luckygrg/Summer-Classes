<!DOCTYPE html>
<html lang="en">

 @include('header.header')

<body>
  <!-- HEADER -->
 @include('header.nav')
  

  <!-- BODY -->
   @yield('content')

  <!-- FOOTER -->
   @include('footer.footer')
</body>
</html>
