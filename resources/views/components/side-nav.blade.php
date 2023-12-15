<div class="menu">
    <div class="main-menu">
        <div class="scroll">
            <ul class="list-unstyled">
                <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="iconsminds-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @can('slider')
                    <li class="{{ request()->routeIs('admin.slider*') ? 'active' : '' }}">
                        <a href="{{ route('admin.slider.index') }}">
                            <i class="iconsminds-photo"></i> Slider
                        </a>
                    </li>
                @endcan
              
                @can('services')
                    <li class="{{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                        <a href="{{ route('admin.services.index') }}">
                            <i class="simple-icon-star"></i> Services
                        </a>
                    </li>
                @endcan
                @can('serviceslist')
                    <li class="{{ request()->routeIs('admin.serviceslist*') ? 'active' : '' }}">
                        <a href="{{ route('admin.serviceslist.index') }}">
                            <i class="iconsminds-photo"></i> Services List
                        </a>
                    </li>
                @endcan
                @can('contactdetails')
                    <li class="{{ request()->routeIs('admin.contactdetails*') ? 'active' : '' }}">
                        <a href="{{ route('admin.contactdetails.index') }}">
                            <i class="iconsminds-newspaper"></i> Contact Address
                        </a>
                    </li>
                @endcan
                @can('dynamiccontents')
                    <li class="{{ request()->routeIs('admin.dynamiccontents*') ? 'active' : '' }}">
                        <a href="{{ route('admin.dynamiccontents.index') }}">
                            <i class="iconsminds-diamond"></i> Dynamic Contents
                        </a>
                    </li>
                @endcan
                @can('banner')
                    <li class="{{ request()->routeIs('admin.banners*') ? 'active' : '' }}">
                        <a href="{{ route('admin.banners.index') }}">
                            <i class="iconsminds-computer"></i> Banners
                        </a>
                    </li>
                @endcan
                @can('blogs')
                    <li class="{{ request()->routeIs('admin.blogs*') ? 'active' : '' }}">
                        <a href="{{ route('admin.blogs.index') }}">
                            <i class="simple-icon-lock-open"></i> Blogs
                        </a>
                    </li>
                @endcan
                @can('coursecategory')
                    <li class="{{ request()->routeIs('admin.coursecategory*') ? 'active' : '' }}">
                        <a href="{{ route('admin.coursecategory.index') }}">
                            <i class="simple-icon-lock-open"></i> Coursecategory
                        </a>
                    </li>
                @endcan
                @can('course')
                    <li class="{{ request()->routeIs('admin.course*') ? 'active' : '' }}">
                        <a href="{{ route('admin.course.index') }}">
                            <i class="simple-icon-doc"></i> Courses
                        </a>
                    </li>
                @endcan
                @can('faq')
                    <li class="{{ request()->routeIs('admin.faq*') ? 'active' : '' }}">
                        <a href="{{ route('admin.faq.index') }}">
                            <i class="simple-icon-question"></i> Faq
                        </a>
                    </li>
                @endcan
                @can('career')
                    <li class="{{ request()->routeIs('admin.careers*') ? 'active' : '' }}">
                        <a href="{{ route('admin.careers.index') }}">
                            <i class="simple-icon-wrench"></i> Careers
                        </a>
                    </li>
                @endcan
                @can('careerapplication')
                    <li class="{{ request()->routeIs('admin.careerapplication*') ? 'active' : '' }}">
                        <a href="{{ route('admin.careersapplication') }}">
                            <i class="simple-icon-people"></i> Careerapplication
                        </a>
                    </li>
                @endcan
             <!--   @can('user')
                    <li class="{{ request()->routeIs('admin.user*') ? 'active' : '' }}">
                        <a href="#">
                            <i class="simple-icon-people"></i> Users
                        </a>
                    </li>
                @endcan-->
                @can('usercourses')
                    <li class="{{ request()->routeIs('admin.usercourses*') ? 'active' : '' }}">
                        <a href="{{ route('admin.usercourses') }}">
                            <i class="simple-icon-people"></i> Usercourses
                        </a>
                    </li>
                @endcan
               <!-- @can('generalsettings')
                    <li class="{{ request()->routeIs('admin.generalsettings*') ? 'active' : '' }}">
                    <a href="{{ route('admin.generalsettings.index') }}">
                            <i class="simple-icon-settings"></i> Page Settings
                        </a>
                    </li>
                @endcan-->
                @can('enquiries')
                    <li class="{{ request()->routeIs('admin.enquiries*') ? 'active' : '' }}">
                        <a href="{{ route('admin.enquiries') }}">
                            <i class="simple-icon-bubbles"></i>Enquiries
                        </a>
                    </li>
                @endcan
<!-- 
                @can('general_settings')
                    <li class="{{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                        <a href="{{ route('admin.settings') }}">
                            <i class="simple-icon-wrench"></i> General Settings
                        </a>
                    </li>
                @endcan
                
                @can('roles')
                    <li class="{{ request()->routeIs('admin.roles*') ? 'active' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="simple-icon-lock-open"></i>User Roles
                        </a>
                    </li>
                @endcan

                @can('users')
                    <li class="{{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="simple-icon-user"></i> Users
                        </a>
                    </li>
                @endcan
               -->
            </ul>
        </div>
    </div>

    <div class="sub-menu">
        <div class="scroll">
           
            <ul class="list-unstyled" data-link="pages">
                <li class="{{ (request()->routeIs('admin.page.about') ) ? 'active' : '' }}">
                    <a href="#">
                        <i class="simple-icon-doc"></i> <span class="d-inline-block">About Us</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
