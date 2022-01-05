<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{route('admin.home')}}"><img src="{{asset('backend/images/logo/logo.png')}}" alt="Logo" style="width: 150px; height: 60px;"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item active ">
                    <a href="{{route('admin.home')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                @role('super-admin')
                    <li class="sidebar-item ">
                        <a href="{{route('admin.users.index')}}" class='sidebar-link'>
                            <i class="bi bi-people-fill"></i>
                            <span>Admin Users</span>
                        </a>
                    </li>
                @endrole

                @role(['super-admin','blog-manager'])
                    <li class="sidebar-item has-sub">
                        <a href="{{route('admin.posts.index')}}" class='sidebar-link'>
                            <i class="bi bi-file-earmark-text-fill"></i>
                            <span>Blogs</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('admin.posts.index')}}">All Blogs</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('admin.posts.create')}}">Create Blog</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item ">
                        <a href="{{route('admin.categories.index')}}" class='sidebar-link'>
                            <i class="bi bi-bookmark-star-fill"></i>
                            <span>Categories</span>
                        </a>
                    </li>
                @endrole

                @role(['super-admin','event-manager'])
                    <li class="sidebar-item has-sub">
                        <a href="{{route('admin.events.index')}}" class='sidebar-link'>
                            <i class="bi bi-calendar-event-fill"></i>
                            <span>Events</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('admin.events.index')}}">All Events</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('admin.events.create')}}">Create Event</a>
                            </li>
                        </ul>
                    </li>
                @endrole

                @role(['super-admin','member-manager'])
                    <li class="sidebar-item has-sub">
                        <a href="{{route('admin.members.index')}}" class='sidebar-link'>
                            <i class="bi bi-people-fill"></i>
                            <span>Members</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('admin.members.index')}}">All Members</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('admin.members.create')}}">Add Member</a>
                            </li>
                        </ul>
                    </li>
                @endrole

                <li class="sidebar-item">
                    <a href="{{route('admin.profile.edit')}}" class="sidebar-link">
                        <i class="bi bi-person-circle"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{route('admin.logout')}}" class="sidebar-link">
                        <i class="bi bi-box-arrow-left"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
