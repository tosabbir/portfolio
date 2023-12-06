<?php

namespace App\Http\Controllers\MultiImage;
use Image;
use File;
use App\Http\Controllers\Controller;
use App\Models\PartnerMultiImage;
use Illuminate\Http\Request;

class PartnerMultiImageController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.partner.partner_multi_image');
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
            $path = public_path('frontend/assets/img/partner/multiImage/'.$customeName);
            Image::make($singleImage)->resize(220,220)->save($path);

            partnerMultiImage::insert([
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
        $singleImage = PartnerMultiImage::find($id);
        return view('admin.partner.partner_multi_image_edit',compact('singleImage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $image = PartnerMultiImage::find($id);

        $requestImage = $request->file('image');

        File::delete(public_path('frontend/assets/img/partner/multiImage/'.$image->images));

        $customeName = rand().".".$requestImage->getClientOriginalExtension();
        $path = public_path('frontend/assets/img/partner/multiImage/'.$customeName);
        Image::make($requestImage)->resize(220,220)->save($path);

        $image->images = $customeName;
        $image->update();
        $notification = array(
            'message' => 'Image Update Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('partner.multi.image')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $image = PartnerMultiImage::find($id);

        File::delete(public_path('frontend/assets/img/partner/multiImage/'.$image->images));

        partnerMultiImage::find($id)->delete();
        $notification = array(
            'message' => 'Image Delete Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('partner.multi.image')->with($notification);

    }
}
