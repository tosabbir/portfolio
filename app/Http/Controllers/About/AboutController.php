<?php

namespace App\Http\Controllers\About;

use App\Http\Controllers\Controller;
use App\Models\Award;
use App\Models\Education;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use File;
use Image;


class AboutController extends Controller
{
    /**
     * add skill form .
     */
    public function addSkill()
    {
        $skills = Skill::all();
        return view('admin.about.about_skill_add', compact('skills'));
    }

    /**
     * store skill form .
     */
    public function storeSkill(Request $request)
    {

        $skill_name = $request->skill_name;
        $skill_percentage = $request->skill_percentage;

        Skill::insert([
            'skill_name' => $skill_name,
            'skill_percentage' => $skill_percentage,
        ]);

        $notification = array(
            'message' => "Skill Added Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('add.skill')->with($notification);
    }


    /**
     * Display Skill Edit from in backend
     */
    public function editSkill(String $id)
    {
        $skill = Skill::find($id);
        return view('admin.about.edit_skill',compact('skill'));

    }
    /**
     * Update Skill in backend
     */
    public function updateSkill(Request $request, String $id)
    {
        $skill = Skill::find($id);

        $skill->skill_name = $request->skill_name;
        $skill->skill_percentage = $request->skill_percentage;

        $skill->update();

        $notification = array(
            'message' => "Skill Updated Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('add.skill')->with($notification);
    }

    /**
     * Delete Skill  from  backend
     */
    public function deleteSkill(String $id)
    {

        $skill = Skill::find($id);

        $skill->delete();

        $notification = array(
            'message' => "Skill Deleted Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('add.skill')->with($notification);

    }

    /**
     * add award form
     */
    public function addAward()
    {
        $awards = Award::all();
        return view('admin.about.add_award',compact('awards'));
    }

    /**
     * edit award form
     */
    public function editAward(String $id)
    {
        $awards = Award::find($id);
        return view('admin.about.edit_award',compact('awards'));
    }

    /**
     * Update award form
     */
    public function updateAward(Request $request, string $id)
    {
        $request->validate([
            'award_title' => 'required',
            'your_designation' => 'required',
            'short_description' => 'required',
            'award_image' => 'required',

        ]);

        $award = Award::find($id);

        if($request->File('award_image')){

            File::delete(public_path('frontend/assets/img/images/about/award/'.$award->award_image));

            $image = $request->File('award_image');
            $custome_name = rand().".".$image->getClientOriginalExtension();
            $path = public_path('frontend/assets/img/images/about/award/'.$custome_name);
            Image::make($image)->resize(200,200)->save($path);

            $award->award_image = $custome_name;

        };


        $award->award_title = $request->award_title;
        $award->your_designation = $request->your_designation;
        $award->short_description = $request->short_description;

        $award->update();

        $notification = array(
            'message' => "Award Updated Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('add.award')->with($notification);
    }

    /**
     * store award form
     */
    public function storeAward(Request $request)
    {
        $request->validate([
            'award_title' => 'required',
            'your_designation' => 'required',
            'short_description' => 'required',
            'award_image' => 'required',

        ]);

        $image = $request->File('award_image');
        $custome_name = rand().".".$image->getClientOriginalExtension();
        $path = public_path('frontend/assets/img/images/about/award/'.$custome_name);
        Image::make($image)->resize(200,200)->save($path);

        Award::insert([
            'award_title' => $request->award_title,
            'your_designation' => $request->your_designation,
            'short_description' => $request->short_description,
            'award_image' => $custome_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => "Award Added Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('add.award')->with($notification);


    }

    /**
     * delete award from storage.
     */
    public function deleteAward(string $id)
    {
        $award = Award::find($id);

        File::delete(public_path('frontend/assets/img/images/about/award/'.$award->award_image));

        $award->delete();

        $notification = array(
            'message' => "Award Deleted Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('add.award')->with($notification);
    }



    /**
     * add education form
     */
    public function addEducation()
    {
        $educations = Education::all();
        return view('admin.about.add_education',compact('educations'));
    }

    /**
     * edit education form
     */
    public function editEducation(String $id)
    {
        $education = Education::find($id);
        return view('admin.about.edit_education',compact('education'));
    }

    /**
     * Update education form
     */
    public function updateEducation(Request $request, string $id)
    {
        $request->validate([
            'education_title' => 'required',
            'cgpa' => 'required',
            'out_of' => 'required',
            'year' => 'required',
            'short_description' => 'required',
        ]);

        $education = Education::find($id);

        $education->education_title = $request->education_title;
        $education->cgpa = $request->cgpa;
        $education->out_of = $request->out_of;
        $education->year = $request->year;
        $education->short_description = $request->short_description;

        $education->update();

        $notification = array(
            'message' => "education Updated Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('add.education')->with($notification);
    }

    /**
     * store education form
     */
    public function storeEducation(Request $request)
    {
        $request->validate([
            'education_title' => 'required',
            'cgpa' => 'required',
            'out_of' => 'required',
            'year' => 'required',
            'short_description' => 'required',
        ]);

        Education::insert([
            'education_title' => $request->education_title,
            'cgpa' => $request->cgpa,
            'out_of' => $request->out_of,
            'year' => $request->year,
            'short_description' => $request->short_description,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => "education Added Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('add.education')->with($notification);


    }

    /**
     * delete education from storage.
     */
    public function deleteEducation(string $id)
    {
        $education = Education::find($id);

        $education->delete();

        $notification = array(
            'message' => "education Deleted Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('add.education')->with($notification);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('about');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}



//     public function adminProfilePicUpdate(Request $request){

//         // fin all data
//         $id = Auth::user()->id;
//         $adminData = User::find($id)->photo;

//         // process photo here
        

//         // print_r($adminData);
//         // return view('admin.admin_profile', compact('adminData'));
//     }

//         Route::post('/admin/profile/pic/update', [AdminController::class, 'adminProfilePicUpdate'])->name('admin.profile.pic.update');

//          <div id="admin_img_block">
//                                         <img id="admin_img"
//                                             src="{{ !empty($adminData->photo) ? url('uploads/admin' . $adminData->photo) : url('uploads/no_image.jpg') }}"
//                                             alt="Admin" class="rounded-circle p-1 bg-primary" width="110">

//                                         <div id="admin_img_overlay" style="display: none">
//                                             <a href="" type="button" data-bs-toggle="modal"
//                                                 data-bs-target="#adminPhotoInput" id="admin_pic_edit_btn"><i
//                                                     class="fa fa-camera">Edit</i></a>
//                                         </div>
//                                     </div>


                                
//                                     <div class="modal fade" id="adminPhotoInput" data-bs-backdrop="static"
//                                         data-bs-keyboard="false" tabindex="-1" aria-labelledby="adminPhotoInputLabel"
//                                         aria-hidden="true">
//                                         <div class="modal-dialog">
//                                             <div class="modal-content">
//                                                 <div class="modal-header">
//                                                     <h1 class="modal-title fs-5" id="adminPhotoInputLabel">Choose Your Photo
//                                                     </h1>
//                                                     <button type="button" class="btn-close" data-bs-dismiss="modal"
//                                                         aria-label="Close"></button>
//                                                 </div>
//                                                 <form action="{{route('admin.profile.pic.update')}}" method="POST" enctype="multipart/form-data">
//                                                     @csrf
//                                                     <div class="modal-body">

//                                                         <input type="file" name="admin_photo" id="admin_photo">

//                                                     </div>
//                                                     <div class="modal-footer">
//                                                         <button type="button" class="btn btn-secondary"
//                                                             data-bs-dismiss="modal">Cancel</button>
//                                                         <button type="submit" class="btn btn-primary">Save</button>
//                                                     </div>
//                                                 </form>
//                                             </div>
//                                         </div>
//                                     </div>


// #admin_img_block{
//     position: relative;
// }
// #admin_img_overlay{
//     position: absolute;
//     top: 0;
//     left: 0;
//     right: 0;
//     bottom: 0;
//     background-color: rgb(218, 232, 238,0.5);
//     border-radius: 50%;

// }
// #admin_pic_edit_btn{
//     position: absolute;
//     left: 30%;
//     top: 40%;
//     font-size: large;
//     color: black;
// }




// let admin_img_block = document.getElementById('admin_img_block');
// let admin_img_overlay = document.getElementById('admin_img_overlay');

// admin_img_block.addEventListener('mouseover',  ()=> {
//     admin_img_overlay.style.display = 'block';
// })
// admin_img_block.addEventListener('mouseout',  ()=> {
//     admin_img_overlay.style.display = 'none';
// })
