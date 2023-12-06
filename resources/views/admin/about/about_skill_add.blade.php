
@extends('admin.admin_master')
@section('content')


<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">About</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Skills</a></li>
    </ol>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h2 class="card-title">Add Skills</h2>
                <form action="{{ route('store.skill') }}" method="post">
                @csrf

                    <div class="row mb-3">
                        <label for="skill_name" class="col-sm-2 col-form-label">Skill Name: </label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="skill_name" id="skill_name">

                            @error('skill_name')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="skill_percentage" class="col-sm-2 col-form-label">Skill Percentage: </label>
                        <div class="col-sm-10">
                            <input type="range" min="1" max="100" value="" class="slider" id="skill_percentage" style="width: 100%" name="skill_percentage">
                            <p>Value: <span id="demo"></span></p>

                            @error('skill_percentage')
                                <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>


                    <button type="submit" class="btn btn-info m-auto">Add Skill</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Skills</h4>
                <p class="card-title-desc">This skills is upload in about page skill section</p>

                <div class="table-responsive">
                    <table class="table mb-0">

                        <thead class="table-light">
                            <tr>
                                <th>Sl:</th>
                                <th>Skill Name</th>
                                <th>Skill Percentage</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skills as $key => $skill)
                                <tr>
                                    <td scope="row">{{$key+1}}</td>
                                    <td>{{$skill->skill_name}}</td>
                                    <td>{{$skill->skill_percentage}}</td>
                                    <td>
                                        <a href="{{ route('edit.skill', $skill->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-pen"></i></a>
                                        <a href="{{ route('delete.skill', $skill->id) }}" class="btn btn-info btn-sm" ></i><i class="fa fa-trash"></i></a>
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


<script>
    var slider = document.getElementById("skill_percentage");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value;

    slider.oninput = function() {
      output.innerHTML = this.value;
    }
</script>

@endsection
