<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        @auth
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">{{$user->name}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">{{$user->email}}</a>
        </li>
      </ul>
      @endauth
    </div>
  </div>
</nav>