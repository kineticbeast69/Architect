<ul class="nav nav-pills flex-column mb-auto">
    <li>
        <a href="{{ route('writer.dashboard') }}"
            class="nav-link text-white {{ request()->routeIs('writer.dashboard') ? 'active' : '' }}">
            <i class="fa-sharp fa-solid fa-table-list me-2"></i>
            All Blogs
        </a>
    </li>
    <li>
        <a href="{{ route('addblog') }}"
            class="nav-link text-white {{ request()->routeIs('addblog') ? 'active' : '' }}">
            <i class="fa-sharp fa-solid fa-blog me-2"></i>
            Add Blogs
        </a>
    </li>
</ul>