<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeAbout;
use File;
use Image;
use Illuminate\Http\Request;

class HomeAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allData = HomeAbout::all()->first();
        $id = $allData->id;
        $aboutData = HomeAbout::find($id);
        return view('admin.home.home_about', compact('aboutData'));
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
        $allData = HomeAbout::all()->first();
        $id = $allData->id;
        $homeAboutData = HomeAbout::find($id);
        $homeAboutData->title = $request->title;
        $homeAboutData->short_title = $request->short_title;
        $homeAboutData->short_description = $request->short_description;
        $homeAboutData->long_description = $request->long_description;

        if($request->about_image){
            if(File::exists(public_path('backend/assets/images/home/'.$homeAboutData->about_image))){
                File::delete(public_path('backend/assets/images/home/'.$homeAboutData->about_image));
            }
            $image = $request->file('about_image');
            $customeName = $id.".".$image->getClientOriginalExtension();
            $path = public_path('backend/assets/images/home/'.$customeName);
            Image::make($image)->resize(636,852)->save($path);

            $homeAboutData->about_image = $customeName;
        }
        $homeAboutData->update();

        $notification = array(
            'message' => "Home About Section Updated Successfully",
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
