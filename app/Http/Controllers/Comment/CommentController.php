<?php

namespace App\Http\Controllers\Comment;

use Str;
use Image;
use File;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Comments;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comments::where('comment_type', 'user-comment')->get();
        return view('admin.comment.all_comment',compact('comments'));
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
    public function store(Request $request, String $id)
    {

        $request->validate([
            'user_name'=>'string|required',
            'user_email'=>'email|required',
            'user_phone'=>'required',
            'message'=>'string|required',
        ]);
        $comment_blog = Blog::find($id);
        $comment_section = Str::slug('Blogs Comments');
        $coment_section_id = $id;
        $comment_type = Str::slug('User Comment');

        if($request->File('user_img')){

            $image = $request->File('user_img');
            $custome_name = rand().".".$image->getClientOriginalExtension();
            $path = public_path('frontend/assets/img/user/'.$custome_name);
            Image::make($image)->resize(100,100)->save($path);

            Comments::insert([
                'user_name' => $request->user_name,
                'user_email' => $request->user_email,
                'user_phone' => $request->user_phone,
                'message' => $request->message,
                'comment_section' => $comment_section,
                'coment_section_id' => $coment_section_id,
                'comment_type' => $comment_type,
                'user_img' => $custome_name,
                'created_at' => Carbon::now(),
            ]);
            $comment_blog->blog_comment = $comment_blog->blog_comment + 1;
            $comment_blog->update();

        }else{

            Comments::insert([
                'user_name' => $request->user_name,
                'user_email' => $request->user_email,
                'user_phone' => $request->user_phone,
                'message' => $request->message,
                'comment_section' => $comment_section,
                'coment_section_id' => $coment_section_id,
                'comment_type' => $comment_type,
                'created_at' => Carbon::now(),
            ]);

            $comment_blog->blog_comment = $comment_blog->blog_comment + 1;
            $comment_blog->update();

        }

        $notification = array(
            'message' => "Thanks for your comment, We will contact with you as soon ",
            'alert-type' => "success",
        );
        return back()->with('notification');

    }
    /**
     * Store a newly created resource in storage.
     */
    public function storeCommentService(Request $request, String $id)
    {

        $request->validate([
            'user_name'=>'string|required',
            'user_email'=>'email|required',
            'user_phone'=>'required',
            'message'=>'string|required',
        ]);

        $comment_section = Str::slug('Service Comment');
        $coment_section_id = $id;
        $comment_type = Str::slug('User Service Comment');


        Comments::insert([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'user_phone' => $request->user_phone,
            'message' => $request->message,
            'comment_section' => $comment_section,
            'coment_section_id' => $coment_section_id,
            'comment_type' => $comment_type,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => "Thanks for your comment, We will contact with you as soon ",
            'alert-type' => "success",
        );
        return back()->with('notifications');

    }
    /**
     * Store a newly created resource in storage.
     */
    public function storeQuestion(Request $request)
    {

        $request->validate([
            'user_name'=>'string|required',
            'user_email'=>'email|required',
            'user_phone'=>'required',
            'message'=>'string|required',
        ]);

        $comment_section = Str::slug('Ask Question');

        $comment_type = Str::slug('User Question');

        Comments::insert([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'user_phone' => $request->user_phone,
            'message' => $request->message,
            'comment_section' => $comment_section,
            'comment_type' => $comment_type,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => "Thanks for your question, We will contact with you as soon ",
            'alert-type' => "success",
        );
        return back()->with('notifications');

    }
    /**
     * Store a newly created resource in storage.
     */
    public function StoreContactInfo(Request $request)
    {
        return "asdfa";
        $request->validate([
            'user_name'=>'string|required',
            'user_email'=>'email|required',
            'contact_subject'=>'required',
            'contact_budget'=>'required',
            'message'=>'string|required',
        ]);

        $comment_section = Str::slug('Ask Question');

        $comment_type = Str::slug('User Contact');
        return $comment_type;
        Comments::insert([
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'contact_subject' => $request->contact_subject,
            'contact_budget' => $request->contact_budget,
            'message' => $request->message,
            'comment_section' => $comment_section,
            'comment_type' => $comment_type,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => "Thanks for your Contact, We will contact with you as soon ",
            'alert-type' => "success",
        );
        return back()->with('notifications');

    }


    /**
     * view contact form
     */
    public function Contact(Request $request)
    {
        return view('contact');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comments::find($id);
        return view('admin.comment.comment_details', compact('comment'));
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
        $comment = Comments::find($id);

        $comment_blog = Blog::find($comment->coment_section_id);

        if($comment->user_img){

            File::delete(public_path('frontend/assets/img/user/'.$comment->user_img));

        }


        $comment_blog->blog_comment = $comment_blog->blog_comment - 1;
        $comment_blog->update();

        $comment->delete();


        $notification = array(
            'message' => "Thanks for your comment, We will contact with you as soon ",
            'alert-type' => "success",
        );
        return back()->with('notification');

    }
}
