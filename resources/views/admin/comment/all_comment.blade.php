
@extends('admin.admin_master')
@section('content')


<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Comments</a></li>
    </ol>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Comments</h4>
                <p class="card-title-desc">This Comments come from blog section where user are commented</p>

                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>Sl:</th>
                                <th>User Namme</th>
                                <th>User Phone</th>
                                <th>User Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $key => $comment)
                                <tr class=" @if ($comment->status === 'unread')
                                    bg-info text-white
                                @endif ">
                                    <td scope="row">{{$key+1}}</td>
                                    <td>{{$comment->user_name}}</td>
                                    <td>{{$comment->user_phone}}</td>
                                    <td>{{$comment->user_email}}</td>
                                    <td><a href="{{route('details.comment',$comment->id)}}" class="
                                        @if ($comment->status === 'unread')
                                        btn btn-dark btn-sm
                                        @endif
                                        btn btn-info btn-sm
                                        ">
                                        Read
                                    </a></td>
                                    <td>
                                        <a href="{{ route('details.comment', $comment->id) }}" class=" @if ($comment->status === 'unread')
                                            btn btn-dark btn-sm
                                            @endif
                                            btn btn-info btn-sm
                                            "" ><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('delete.comment', $comment->id) }}" class="btn btn-danger btn-sm" ></i><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
