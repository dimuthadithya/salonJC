<nav id="sidebar" class="sidebar">
    <div class="sidebar-header">
        <h3>Admin Panel</h3>
    </div>
    <ul class="list-unstyled components">
        <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
            <a href="{{ route('admin.services') }}">
                <i class="fas fa-spa"></i> Services
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
            <a href="{{ route('admin.categories') }}">
                <i class="fas fa-list"></i> Categories
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.bookings.*') ? 'active' : '' }}">
            <a href="{{ route('admin.bookings') }}">
                <i class="fas fa-calendar-alt"></i> Bookings
            </a>
        </li>
        <li class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
            <a href="{{ route('admin.users.index') }}">
                <i class="fas fa-users"></i> Users
            </a>
        </li>
    </ul>
</nav>