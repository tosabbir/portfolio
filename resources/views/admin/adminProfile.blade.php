@extends('admin.admin_master')

@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
        </ol>
    </div>
    <!-- row -->

    <div class="row justify-content-center align-items-center g-2">
        <div class="card mb-3 fullcard">
            {{-- profile cover photo --}}
            <img src="{{ asset('backend/assets/images/admin/Code with sabbir (6).png') }}" class="card-img-top" alt="Sabbir">

            {{-- profile picture  --}}
            <img src="{{ !empty($adminData->adminPic)? asset('backend/assets/images/admin/'.$adminData->adminPic) : asset('backend/assets/images/admin/avatar-1.jpg')}}" id="adminProfilePic" alt="Sabbir">

            <div class="card-body">

                <br><br>
              <h3 class="mb-0">{{ $adminData->name }}</h3>
              <span>{{ $adminData->email }}</span>
            <br><br>
              <h5 class="card-title">Full Stack Developer</h5>
              <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid, fugit.</p>
              <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>

            <a href="{{ route('admin.edit.profile') }}" class="btn btn-info">Edit Profile</a>
          </div>

    </div>


@endsection
