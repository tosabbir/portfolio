<?php

namespace App\Http\Controllers\MultiImage;

use App\Http\Controllers\Controller;
use App\Models\MultiImage\AboutMultiImage;
use Illuminate\Http\Request;
use Image;
use File;
class AboutMultiImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.about.about_multi_image');
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
        $request->validate([
            'images' => 'required',
        ]);

        $images = $request->file('images');
        foreach ($images as $singleImage) {

            $customeName = rand().".".$singleImage->getClientOriginalExtension();
            $path = public_path('frontend/assets/img/images/about/multiImage/'.$customeName);
            Image::make($singleImage)->resize(220,220)->save($path);

            AboutMultiImage::insert([
                'images' => $customeName,
            ]);

        }
        $notification = array(
            'message' => 'Multiple Image Uploaded Successfully',
            'alert-type' => 'success',
        );

        return back()->with($notification);
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
        $singleImage = AboutMultiImage::find($id);
        return view('admin.about.about_multi_image_edit',compact('singleImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $image = AboutMultiImage::find($id);

        $requestImage = $request->file('image');

        File::delete(public_path('frontend/assets/img/images/about/multiImage/'.$image->images));

        $customeName = rand().".".$requestImage->getClientOriginalExtension();
        $path = public_path('frontend/assets/img/images/about/multiImage/'.$customeName);
        Image::make($requestImage)->resize(220,220)->save($path);

        $image->images = $customeName;
        $image->update();
        $notification = array(
            'message' => 'Image Update Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('about.multi.image')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $image = AboutMultiImage::find($id);

        File::delete(public_path('frontend/assets/img/images/about/multiImage/'.$image->images));

        AboutMultiImage::find($id)->delete();
        $notification = array(
            'message' => 'Image Delete Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('about.multi.image')->with($notification);

    }
}
