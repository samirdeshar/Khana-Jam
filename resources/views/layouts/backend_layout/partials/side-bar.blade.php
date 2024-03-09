<?php
// use App\Models\Admin\Setting\Setting;

// $setting=new Setting();

// $setting=$setting->first();
?>
<style>
    /* ul li a {
        color : yellow !important;
    } */
</style>
<aside id="sidebar" class="sidebar" style="width: 200px;">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin') ? '' : 'collapsed' }}" href="{{ route('admin') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">MENU</li>

        {{-- ----------------------------Setting----------------------------------- --}}
        @if (Auth::user()->can('create-setting') || Auth::user()->can('edit-setting'))
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('setting*') ? '' : 'collapsed' }}"
                    data-bs-target="#components-setting" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-gear-fill"></i><span>Setting</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>

                <ul id="components-setting" class="nav-content collapse {{ request()->routeIs('setting*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('setting.index') }}"
                            class="{{ request()->routeIs('setting.edit') ? 'active' : '' }} small-link">
                            <i class="bi bi-circle"></i><span>Site Setting</span>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        {{-- ----------------------------/Setting----------------------------------- --}}


        {{-- -------------------------All Users------------------------------------------ --}}
        @if (Auth::user()->can('view-user') ||
                Auth::user()->can('create-user') ||
                Auth::user()->can('edit-user') ||
                Auth::user()->can('remove-user'))
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user*') ? '' : 'collapsed' }}" data-bs-target="#components-user"
                    data-bs-toggle="collapse" href="#">
                    <i class="nav-icon fas fa-user"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-user" class="nav-content collapse {{ request()->routeIs('user*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    @if (Auth::user()->can('view-user'))
                        <li>
                            <a href="{{ route('user.index') }}"
                                class="{{ request()->routeIs('user.index') ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>View All Users</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->can('create-user'))
                        <li>
                            <a href="{{ route('user.create') }}"
                                class="{{ request()->routeIs('user.create') ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Create New User</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif






        {{-- -------- ---------------Permission-------------------------------------------------------- --}}
        @if (Auth::user()->can('view-permission') ||
                Auth::user()->can('create-permission') ||
                Auth::user()->can('edit-permission') ||
                Auth::user()->can('remove-permission'))
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('permission*') ? '' : 'collapsed' }}"
                    data-bs-target="#components-permission" data-bs-toggle="collapse" href="#">
                    <i class="nav-icon fas fa-shield-alt"></i><span>Permission</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-permission"
                    class="nav-content collapse {{ request()->routeIs('permission*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    @if (Auth::user()->can('view-permission'))
                        <li>
                            <a href="{{ route('permission.index') }}"
                                class="{{ request()->routeIs('permission.index') ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>All Permision</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->can('create-permission'))
                        <li>
                            <a href="{{ route('permission.create') }}"
                                class="{{ request()->routeIs('permission.create') ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Add Permission</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif


        {{-- ---------------------------------Roles-------------------------------------------- --}}
        <li class="nav-item">
            @if (Auth::user()->can('view-roles') ||
                    Auth::user()->can('create-roles') ||
                    Auth::user()->can('edit-role') ||
                    Auth::user()->can('remove-role'))
                <a class="nav-link {{ request()->routeIs('roles*') ? '' : 'collapsed' }}"
                    data-bs-target="#components-roles" data-bs-toggle="collapse" href="#">
                    <i class="nav-icon fas fa-user-tag"></i><span>Roles</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-roles" class="nav-content collapse {{ request()->routeIs('roles*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    @if (Auth::user()->can('view-role'))
                        <li>
                            <a href="{{ route('roles.index') }}"
                                class="{{ request()->routeIs('roles.index') ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>All Roles</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->can('create-role'))
                        <li>
                            <a href="{{ route('roles.create') }}"
                                class="{{ request()->routeIs('roles.create') ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Add Roles</span>
                            </a>
                        </li>
                    @endif
                </ul>
        </li>
        @endif
        <br>
        __________________________________________________________________

        ___________________________________________________________________
        <br><br>

        {{-- ----------------------------Menu----------------------------------- --}}
        @if (Auth::user()->can('view-menu') ||
                Auth::user()->can('create-menu') ||
                Auth::user()->can('edit-menu') ||
                Auth::user()->can('remove-menu'))
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('menu*') ? '' : 'collapsed' }}" data-bs-target="#components-menu"
                    data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button"></i></i><span>Menu</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-menu" class="nav-content collapse {{ request()->routeIs('menu*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    @if (Auth::user()->can('view-menu'))
                        <li>
                            <a href="{{ route('menu.index') }}"
                                class="{{ request()->routeIs('menu.index') ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>View Menu</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->Can('create-menu'))
                        <li>
                            <a href="{{ route('menu.create') }}"
                                class="{{ request()->routeIs('menu.create') ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Create Menu</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        {{-- ----------------------------Slider----------------------------------- --}}
        @if (Auth::user()->can('view-menu') ||
                Auth::user()->can('create-menu') ||
                Auth::user()->can('edit-menu') ||
                Auth::user()->can('remove-menu'))
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('slider*') ? '' : 'collapsed' }}"
                    data-bs-target="#components-slider" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-sliders"></i><span>Slider</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-slider" class="nav-content collapse {{ request()->routeIs('slider*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    @if (Auth::user()->can('view-menu'))
                        <li>
                            <a href="{{ route('slider.index') }}"
                                class="{{ request()->routeIs('slider.index') ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>View Slider</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->Can('create-menu'))
                        <li>
                            <a href="{{ route('slider.create') }}"
                                class="{{ request()->routeIs('slider.create') ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Create Slider</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        {{-- ----------------------------/Menu----------------------------------- --}}
        {{-- ----------------------------MapsData----------------------------------- --}}
        @if (Auth::user()->can('view-menu') ||
                Auth::user()->can('create-menu') ||
                Auth::user()->can('edit-menu') ||
                Auth::user()->can('remove-menu'))
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('mapsdata*') ? '' : 'collapsed' }}"
                    data-bs-target="#components-mapsdata" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-geo-fill"></i><span>Maps Data</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-mapsdata"
                    class="nav-content collapse {{ request()->routeIs('mapsdata*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    @if (Auth::user()->can('view-menu'))
                        <li>
                            <a href="{{ route('mapsdata.index') }}"
                                class="{{ request()->routeIs('mapsdata.index') ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>View Maps</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->Can('create-menu'))
                        <li>
                            <a href="{{ route('mapsdata.create') }}"
                                class="{{ request()->routeIs('mapsdata.create') ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Create MapsData</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        {{-- ----------------------------/Menu----------------------------------- --}}



        <br><br>










        <br><br>
        {{-- ------------------------------------------General Faqs------------------------------------- --}}
        @if (Auth::user()->can('view-generalfaq') ||
                Auth::user()->can('create-generalfaq') ||
                Auth::user()->can('edit-generalfaq') ||
                Auth::user()->can('remove-general'))
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('generalFaq*') ? '' : 'collapsed' }}"
                    data-bs-target="#components-generalFaq" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-patch-question"></i><span>General FAQs</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-generalFaq"
                    class="nav-content collapse {{ request()->routeIs('generalFaq*') ? 'show' : '' }}"
                    data-bs-parent="#sidebar-nav">
                    @if (Auth::user()->can('view-generalfaq'))
                        <li>
                            <a href="{{ route('generalFaq.index') }}"
                                class="{{ request()->routeIs('generalFaq.index') ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>All Items</span>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->can('create-generalfaq'))
                        <li>
                            <a href="{{ route('generalFaq.create') }}"
                                class="{{ request()->routeIs('generalFaq.create') ? 'active' : '' }}">
                                <i class="bi bi-circle"></i><span>Add New</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>
        @endif
        {{-- ---------------------------Out Partners------------------------------ --}}

        @if (Auth::user()->can('create-about') || Auth::user()->can('edit-about'))
            <li class="nav-item ">
                <a class="nav-link  {{ request()->routeIs('all-messages.index') || request()->routeIs('all-messages.edit') ? '' : 'collapsed' }}"
                    href="{{ route('all-messages.index') }}">
                    <i class="bi bi-chat"></i>
                    <span>All Messages</span>
                </a>
            </li>
        @endif
        @if (Auth::user()->can('create-about') || Auth::user()->can('edit-about'))
            <li class="nav-item ">
                <a class="nav-link  {{ request()->routeIs('contact_view') || request()->routeIs('contact_view') ? '' : 'collapsed' }}"
                    href="{{ route('contact_view') }}">
                    <i class="bi bi-person-lines-fill"></i>
                    <span>All Contacts Us </span>
                </a>
            </li>
        @endif

        {{-- ----------------------------About Us----------------------------------- --}}
        {{-- @if (Auth::user()->can('create-about') || Auth::user()->can('edit-about'))
            <li class="nav-item ">
                <a class="nav-link  {{ request()->routeIs('about.index') || request()->routeIs('about.edit') ? '' : 'collapsed' }}"
                    href="{{ route('about.index') }}">
                    <i class="bi bi-file-earmark-person"></i>
                    <span>About Us</span>
                </a>
            </li>
        @endif --}}
        {{-- ----------------------------/About Us----------------------------------- --}}
</aside>
