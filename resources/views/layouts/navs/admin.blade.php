
<ul class="navbar-nav mr-auto">
    <li class="nav-item active ml-4 ">
      <a class="nav-link" href="{{ route("auction.home") }}">Auctions <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route("lot.home") }}">Lots</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route("user.home") }}">Users</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Catalogue</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Categories</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Services
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Evaluations</a>
          <a class="dropdown-item" href="#">Appointments</a>
        </div>
      </li>
  </ul>

  <ul class="navbar-nav mr-2">
    @guest
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Login @include('icons.login')</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Register @include('icons.register')</a>
      </li>
    @endguest

    @auth
    <li class="nav-item">
        <a class="nav-link" href="{{ route('general.construction') }}">{{ auth()->user()->name }} @include('icons.settings')</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">Logout @include('icons.logout')</a>
    </li>
    @endauth
  </ul>
  <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2 " type="search" placeholder="Search auctions here.." aria-label="Search">
    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">
        <span class="glyphicon glyphicon-search"></span>@include('icons.search')
    </button>
  </form>
