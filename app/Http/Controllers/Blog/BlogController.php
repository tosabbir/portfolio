<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Comments;
use Carbon\Carbon;
use Illuminate\Support\Str;
use File;
use Image;
class BlogController extends Controller
{


    /**
     * Display Blog Category.
     */
    public function BlogCategory()
    {
        $blog_categories = BlogCategory::all();
        return view('admin.blog.blog_category',compact('blog_categories'));
    }
    /**
     * store Blog Category.
     */
    public function BlogCategoryStore(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:blog_categories,category_name',
        ]);

        $category_name = $request->category_name;
        $category_slug = Str::slug($category_name);
        BlogCategory::insert([
            'category_name' => $category_name,
            'category_slug' => $category_slug,

        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('all.blog.category')->with($notification);
    }
    /**
     * Edit From Show Blog Category.
     */
    public function BlogCategoryEdit(string $id)
    {
       $blog_categories = BlogCategory::find($id);
       return view('admin.blog.blog_category_edit',compact('blog_categories'));
    }
    /**
     * Update Blog Category.
     */
    public function BlogCategoryUpdate(Request $request, string $id)
    {
        $request->validate([
            'category_name' => 'required|unique:blog_categories,category_name',
        ]);

        $blog_category = BlogCategory::find($id);

        $blog_category->category_name = $request->category_name;
        $blog_category->category_slug = Str::slug($request->category_name);
        $blog_category->update();

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.blog.category')->with($notification);
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $blog_categories = BlogCategory::all();
        $blogs = Blog::latest()->get();
        $comments = Comments::where('comment_section', 'blogs-comments')->where('comment_type','user-comment')->get();

        return view('blog',compact('blogs', 'blog_categories','comments'));

    }
    /**
     * Display a listing of the resource.
     */
    public function allBlog()
    {

        $blogs = Blog::latest()->get();
        return view('admin.blog.all_blog',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blog_categories = BlogCategory::all();
        return view('admin.blog.add_blog',compact('blog_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


         $request->validate([
            'blog_title' => 'required',
            'blog_short_description' => 'required',
            'blog_description' => 'required',
            'blog_tag' => 'required',
            'blog_category' => 'required|not_in:0',
            'blog_image' => 'required',

        ]);

        // if (!$request->blog_category >= 1) {
        //     return back()->with('message', "Please Select Blog Category");
        // }

        $blog_category = BlogCategory::find($request->blog_category);
        $blog_category_name = $blog_category->category_name;
        $category_slug = $blog_category->category_slug;


        $image = $request->File('blog_image');
        $custome_name = rand().".".$image->getClientOriginalExtension();
        $path = public_path('frontend/assets/img/blog/'.$custome_name);
        Image::make($image)->resize(850,430)->save($path);

        Blog::insert([
            'blog_title' => $request->blog_title,
            'blog_short_description' => $request->blog_short_description,
            'blog_description' => $request->blog_description,
            'blog_tag' => $request->blog_tag,
            'blog_category' => $blog_category_name,
            'blog_category_slug' => $category_slug,
            'blog_image' => $custome_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => "Blog Added Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('all.blog')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog_categories = BlogCategory::all();
        $blog = Blog::find($id);
        $blogs = Blog::latest()->get();
        $comments = Comments::where('comment_section', 'blogs-comments')->where('comment_type','user-comment')->where('coment_section_id', $id)->get();
        return view('blog_details',compact('blog', 'blog_categories', 'blogs', 'comments'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog_categories = BlogCategory::all();

        $blog = Blog::find($id);
        $blog_category_slug = $blog->blog_category_slug;
        $blog_category = BlogCategory::where('category_slug', $blog_category_slug)->first();
        $blog_category_id = $blog_category->id;

        return view('admin.blog.edit_blog',compact('blog','blog_categories','blog_category_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $blog_category = BlogCategory::find($request->blog_category);
        $blog_category_name = $blog_category->category_name;
        $category_slug = $blog_category->category_slug;

        $blog = Blog::find($id);

        if($request->File('blog_image')){

            File::delete(public_path('frontend/assets/img/blog/'.$blog->blog_image));

            $image = $request->File('blog_image');
            $custome_name = rand().".".$image->getClientOriginalExtension();
            $path = public_path('frontend/assets/img/blog/'.$custome_name);
            Image::make($image)->resize(850,430)->save($path);

            $blog->blog_image = $custome_name;

        };

        $blog->blog_title = $request->blog_title;
        $blog->blog_short_description = $request->blog_short_description;
        $blog->blog_description = $request->blog_description;
        $blog->blog_tag = $request->blog_tag;
        $blog->blog_category = $blog_category_name;
        $blog->blog_category_slug = $category_slug;
        $blog->updated_at = Carbon::now();

        $blog->update();

        $notification = array(
            'message' => "Blog Updated Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('all.blog')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blog = Blog::find($id);

        File::delete(public_path('frontend/assets/img/blog/'.$blog->blog_image));

        $blog->delete();

        $notification = array(
            'message' => "Blog deleted Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('all.blog')->with($notification);
    }
}

