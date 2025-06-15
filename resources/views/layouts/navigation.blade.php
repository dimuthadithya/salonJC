  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <div class="container">
          <a class="navbar-brand" href="{{ route('home') }}">Salon<span>JC</span></a>
          <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarNav">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto align-items-center">
                  <li class="nav-item">
                      <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}" href="{{ route('services') }}">Services</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                  </li>
                  @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">Login</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i></a>
                  </li>
                  @endguest
                  @auth
                  <!-- Show admin dashboard link for admin users -->
                  @if(Auth::user()->role === 'admin')
                  <li class="nav-item">
                      <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Admin Dashboard</a>
                  </li>
                  @else
                  <li class="nav-item">
                      <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
                  </li>
                  @endif
                  <li class="nav-item">
                      <form action="{{ route('logout') }}" method="post">
                          @csrf
                          <button type="submit" class="nav-link">Logout</button>
                      </form>
                  </li>
                  @endauth
                  <li class="nav-item ms-lg-2">
                      <a href="{{ route('services') }}" class="nav-link book-now-nav">Book Now</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>