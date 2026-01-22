    <!-- ===== Navigation Bar ===== -->

    <nav class="navbar navbar-expand-lg navbar-dark px-4">
    <a class="navbar-brand" href="#">🎬 MovieZone</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link @if(request()->is('/')) active @endif" href="{{route('home')}}">Home</a></li>
        <li class="nav-item"><a class="nav-link @if(request()->is('trending')) active @endif" href="{{route('trending')}}">Trending</a></li>
        <li class="nav-item"><a class="nav-link @if(request()->is('celebrities')) active @endif" href="{{route('celebrities')}}">Celebrities</a></li>
        <li class="nav-item"><a class="nav-link @if(request()->is('login')) active @endif" href="{{route('login')}}">Login</a></li>
      </ul>
    </div>
  </nav>