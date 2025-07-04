    <!-- ===== Navigation Bar ===== -->

    <nav class="topnav" aria-label="Main navigation">
      <a class = "nav-link @if(request()->is('/')) active @endif" href="{{route('home')}}">Home</a>
      <a class = "nav-link @if(request()->is('news')) active @endif" href="{{route('news')}}">News</a>
      <a class = "nav-link @if(request()->is('contact')) active @endif" href="{{route('contact')}}">Contact</a>
      <a class = "nav-link @if(request()->is('about')) active @endif" href="{{route('about')}}">About Us</a>
    </nav>
