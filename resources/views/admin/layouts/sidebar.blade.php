<nav id="sidebar" class="sidebar">
    <div class="sidebar-header">
        <h3>Admin Panel</h3>
    </div>
    <ul class="list-unstyled components">
        <li class="{{ request()->is('admin/dashboard*') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                <i class="fas fa-home"></i> hello
            </a>
        </li>

        <li class="{{ request()->is('admin/users*') ? 'active' : '' }}">
            <a href="{{ route('admin.users.index') }}" class="nav-link">
                <i class="fas fa-users"></i> Users
            </a>
        </li>

        <li class="{{ request()->is('admin/services*') ? 'active' : '' }}">
            <a href="{{ route('admin.services') }}" class="nav-link">
                <i class="fas fa-cut"></i> Services
            </a>
        </li>

        <li class="{{ request()->is('admin/bookings*') ? 'active' : '' }}">
            <a href="{{ route('admin.bookings') }}" class="nav-link">
                <i class="fas fa-calendar"></i> Bookings
            </a>
        </li>

        <li class="{{ request()->is('admin/categories*') ? 'active' : '' }}">
            <a href="{{ route('admin.categories') }}" class="nav-link">
                <i class="fas fa-th-list"></i> Categories
            </a>
        </li>

        <li>
            <a href="{{ url('/') }}" class="nav-link" target="_blank">
                <i class="fas fa-globe"></i> Visit Website
            </a>
        </li>

        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="#" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </form>
        </li>
    </ul>
</nav>