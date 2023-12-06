@php

    use App\Models\User;
    use Illuminate\Support\Facades\Auth;

    $id = Auth::user()->id;
    $adminData = User::find($id);

@endphp

<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ (empty($adminData->adminPic))? asset('/backend/assets/images/admin/avatar-1.jpg') : asset('/backend/assets/images/admin/'.$adminData->adminPic)}}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">Julia Hudda</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="index-2.html" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="calendar.html" class=" waves-effect">
                        <i class="ri-calendar-2-line"></i>
                        <span>Calendar</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Email</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="email-inbox.html">Inbox</a></li>
                        <li><a href="email-read.html">Read Email</a></li>
                    </ul>
                </li>

                <li class="menu-title">Pages</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Home Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('home.slide') }}">Home Slide</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('home.partner') }}">Home Partner </a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('partner.multi.image') }}">Partner MulltiImages </a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('client.multi.image') }}">Client MulltiImages </a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('home.testimonial') }}">Testimonial</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>About Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('home.about') }}">Home About Section</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('about.multi.image') }}">About Multi Image</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('add.skill') }}">All Skills</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('add.award') }}">All Award</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('add.education') }}">All Education</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Portfolio Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('portfolio.category') }}">Portfolio Category</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('add.portfolio') }}"> Add Portfolio</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.portfolio') }}"> All Portfolio</a></li>
                    </ul>

                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Blog Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.blog.category') }}">All Blog Category</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.blog') }}">All Blog</a></li>
                    </ul>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('add.blog') }}">Add Blog</a></li>
                    </ul>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.comment') }}">All Comments</a></li>
                    </ul>

                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>All Comment & Question</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.comment') }}">All Comments</a></li>
                    </ul>

                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-account-circle-line"></i>
                        <span>Service Page Setup</span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('all.service') }}">All Service</a></li>
                    </ul>

                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>

