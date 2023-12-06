<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use File;
use Image;
use Illuminate\Http\Request;

class HomeSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allData = HomeSlide::all()->first();
        $id = $allData->id;
        $homeSlideData = HomeSlide::find($id);
        return view('admin.home.home',compact('homeSlideData'));

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
    public function update(Request $request)
    {

        $allData = HomeSlide::all()->first();
        $id = $allData->id;
        $homeSlideData = HomeSlide::find($id);
        $homeSlideData->title = $request->title;
        $homeSlideData->short_title = $request->short_title;
        $homeSlideData->home_slide = $request->home_slide;
        $homeSlideData->video_url = $request->video_url;
        if($request->home_slide){
            if(File::exists(public_path('backend/assets/images/home/'.$homeSlideData->home_slide))){
                File::delete(public_path('backend/assets/images/home/'.$homeSlideData->home_slide));
            }
            $image = $request->file('home_slide');
            $customeName = $id.".".$image->getClientOriginalExtension();
            $path = public_path('backend/assets/images/home/'.$customeName);
            Image::make($image)->resize(636,852)->save($path);

            $homeSlideData->home_slide = $customeName;
        }
        $homeSlideData->update();

        $notification = array(
            'message' => "Home Slide Updated Successfully",
            'alert-type' => "success",
        );
        return back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
