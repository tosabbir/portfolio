<?php

namespace App\Http\Controllers\Admin;
// namespace App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\Support\Facades\Hash;
use Image;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);

        return view('admin.adminProfile', compact('adminData'));
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
    public function edit()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.editProfile', compact('adminData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $admin = User::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;

        if($request->image){
            if(File::exists(public_path('backend/assets/images/admin/'.$admin->adminPic))){
                File::delete(public_path('backend/assets/images/admin/'.$admin->adminPic));
            }
            $image = $request->file('image');
            $customeName = $id.".".$image->getClientOriginalExtension();
            $path = public_path('backend/assets/images/admin/'.$customeName);
            Image::make($image)->resize(250,250)->save($path);

            $admin->adminPic = $customeName;
        }
        $admin->update();

        $notification = array(
            'message' => "Profile Updated Successfully",
            'alert-type' => "success",
        );
        return redirect()->route('admin.profile')->with($notification);

    }

    // admin logout method
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    // admin log in view page
    public function login()
    {
        return view('admin.login');
    }

    // admin password change view page
    public function changePassword()
    {
        return view('admin.changePassword');
    }

    // admin update psssword store
    public function updatePassword(Request $request)
    {
        $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword',
        ]);

        $oldPassword = $request->oldPassword;
        $adminOldpassword = Auth::user()->password;

        if(Hash::check($oldPassword,$adminOldpassword)){
            $admin = User::find(Auth::user()->id);
            $admin->password = bcrypt($request->newPassword);
            $admin->update();
            return redirect()->route('admin.profile')->with('message', 'Password Update Successfully');
        }else{
            return back()->with('message','Somethings Is Wrong');
        }

    }
}
