<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use File;
use Image;

class HometesTimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonial.home_testimonial', compact('testimonials'));
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
            'client_name' => 'required',
            'testimonial' => 'required',
            'client_image' => 'required',
        ]);

        $image = $request->File('client_image');
        $custome_name = rand().".".$image->getClientOriginalExtension();
        $path = public_path('frontend/assets/img/client/'.$custome_name);
        Image::make($image)->resize(200,200)->save($path);

        Testimonial::insert([
            'client_name' => $request->client_name,
            'testimonial' => $request->testimonial,
            'client_image' => $custome_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => "Testimonial Added Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('home.testimonial')->with($notification);
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
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit_testimonial',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        $testimonial = Testimonial::find($id);

        if($request->File('client_image')){

            File::delete(public_path('frontend/assets/img/client/'.$testimonial->client_image));

            $image = $request->File('client_image');
            $custome_name = rand().".".$image->getClientOriginalExtension();
            $path = public_path('frontend/assets/img/client/'.$custome_name);
            Image::make($image)->resize(200,200)->save($path);

            $testimonial->client_image = $custome_name;

        };

        $testimonial->client_name = $request->client_name;
        $testimonial->testimonial = $request->testimonial;
        $testimonial->updated_at = Carbon::now();

        $testimonial->update();

        $notification = array(
            'message' => "Testimonial Updated Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('home.testimonial')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonial::find($id);

        File::delete(public_path('frontend/assets/img/client/'.$testimonial->client_image));

        $testimonial->delete();

        $notification = array(
            'message' => "Testimonial Deleted Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('home.testimonial')->with($notification);
    }
}
