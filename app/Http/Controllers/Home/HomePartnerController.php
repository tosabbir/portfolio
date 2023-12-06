<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\HomePartner;
use Illuminate\Http\Request;

class HomePartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allData = HomePartner::all()->first();
        $id = $allData->id;
        $partnerData = HomePartner::find($id);
        return view('admin.partner.home_partner', compact('partnerData'));
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
        $allData = HomePartner::all()->first();
        $id = $allData->id;
        $HomePartnerData = HomePartner::find($id);
        $HomePartnerData->title = $request->title;
        $HomePartnerData->short_title = $request->short_title;
        $HomePartnerData->short_description = $request->short_description;

        $HomePartnerData->update();

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
