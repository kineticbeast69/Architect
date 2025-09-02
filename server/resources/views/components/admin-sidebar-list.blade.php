<ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link text-white {{ request()->routeIs('home') ? 'active' : '' }}"
            aria-current="page">
            <i class="fa-solid fa-house"></i> Home
        </a>
    </li>
    <li>
        <a href="{{ route('services') }}"
            class="nav-link text-white {{ request()->routeIs('services') ? 'active' : '' }}">
            <i class="fa-sharp fa-solid fa-rectangle-list"></i> Services
        </a>
    </li>
    <li>
        <a href="{{ route('blogs') }}" class="nav-link text-white {{ request()->routeIs('blogs') ? 'active' : '' }}">
            <i class="fa-sharp fa-solid fa-blog me-1"></i> Blogs
        </a>
    </li>
    <li>
        <a href="{{ route('products') }}"
            class="nav-link text-white {{ request()->routeIs('products') ? 'active' : '' }}">
            <i class="fa-sharp fa-solid fa-diagram-project"></i> Products
        </a>
    </li>
    <li>
        <a href="{{ route('team') }}" class="nav-link text-white {{ request()->routeIs('team') ? 'active' : '' }}">
            <i class="fa-sharp fa-solid fa-people-group"></i> Team member
        </a>
    </li>
    <li>
        <a href="{{ route('contacts') }}"
            class="nav-link text-white {{ request()->routeIs('contacts') ? 'active' : '' }}">
            <i class="fa-sharp fa-solid fa-address-card"></i> Contacts
        </a>
    </li>
</ul>