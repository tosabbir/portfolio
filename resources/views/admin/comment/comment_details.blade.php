@extends('admin.admin_master')
@section('content')

<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Comment Details</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Comment Detials</h2>

                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">User Name: </label>
                        <div class="col-sm-10">
                            <td>{{$comment->user_name}}</td>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="short_title" class="col-sm-2 col-form-label">User Phone: </label>
                        <div class="col-sm-10">
                            <td>{{$comment->user_phone}}</td>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="short_title" class="col-sm-2 col-form-label">User Email: </label>
                        <div class="col-sm-10">
                            <td>{{$comment->user_email}}</td>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="short_title" class="col-sm-2 col-form-label">Comment Section: </label>
                        <div class="col-sm-10">
                            <td>{{$comment->comment_section}}</td>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="long_description" class="col-sm-2 col-form-label">Message: </label>
                        <div class="col-sm-10">
                            <textarea id="default" name="long_description">{{ $comment->message }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="about_image" class="col-sm-2 col-form-label">About Image: </label>
                        <div class="col-sm-10">
                            <img id="imageView" src="{{ !empty($comment->user_img)? asset('frontend/assets/img/user/'.$comment->user_img) : asset('backend/assets/images/home/banner_img.png')}}" alt="" style="width: 15%">
                        </div>
                    </div>
                    <br><br>

                    @php
                        use App\Models\Comments;
                        $comment = Comments::find($comment->id);
                        $comment->status = 'read';

                        $comment->update();

                    @endphp

                    <a href="{{ route('all.comment') }}" type="submit" class="btn btn-info m-auto">Back</a>

            </div>
        </div>
    </div> <!-- end col -->
</div>

@endsection
