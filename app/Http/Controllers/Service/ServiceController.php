<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use File;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function service()
    {
        $services = Service::all();
        return view('service',compact('services'));
    }

    public function index()
    {
        $services = Service::all();
        return view('admin.service.all_service',compact('services'));
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

        $request->validate([
            'service_category' => 'required',
            'service_title' => 'required',
            'service_short_details' => 'required',
            'service_details' => 'required',
            'service_icon' => 'required',
            'service_image' => 'required',
        ]);

        $icon = $request->File('service_icon');
        $image = $request->File('service_image');


        $icon_custome_name = rand().".".$icon->getClientOriginalExtension();
        $image_custome_name = rand().".".$image->getClientOriginalExtension();

        $icon_path = public_path('frontend/assets/img/service/icon/'.$icon_custome_name);
        $image_path = public_path('frontend/assets/img/service/'.$image_custome_name);

        Image::make($icon)->resize(200,200)->save($icon_path);
        Image::make($image)->resize(323,240)->save($image_path);

        Service::insert([
            'service_category' => $request->service_category,
            'service_title' => $request->service_title,
            'service_short_details' => $request->service_short_details,
            'service_details' => $request->service_details,
            'service_icon' => $icon_custome_name,
            'service_image' => $image_custome_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => "Service Added Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('all.service')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $service =  Service::find($id);
        return view('service_details', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::find($id);

        return view('admin.service.edit_service', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = service::find($id);

        if($request->File('service_icon')){

            File::delete(public_path('frontend/assets/img/service/icon/'.$service->service_icon));

            $icon = $request->File('service_icon');

            $icon_custome_name = rand().".".$icon->getClientOriginalExtension();

            $icon_path = public_path('frontend/assets/img/service/icon/'.$icon_custome_name);

            Image::make($icon)->resize(200,200)->save($icon_path);

            $service->service_icon =  $icon_custome_name;


            if($request->File('service_image')){

                File::delete(public_path('frontend/assets/img/service/'.$service->service_image));

                $image = $request->File('service_image');

                $image_custome_name = rand().".".$image->getClientOriginalExtension();

                $image_path = public_path('frontend/assets/img/service/'.$image_custome_name);

                Image::make($image)->resize(323,240)->save($image_path);

                $service->service_image =  $image_custome_name;

            }
        }

        $service->service_category = $request->service_category;
        $service->service_title = $request->service_title;
        $service->service_short_details = $request->service_short_details;
        $service->service_details = $request->service_details;
        $service->updated_at = Carbon::now();

        $service->update();

        $notification = array(
            'message' => "service Updated Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('all.service')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
