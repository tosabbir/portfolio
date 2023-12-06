<?php

namespace App\Http\Controllers\Portfolio;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use Image;
class PortfolioController extends Controller
{


    /**
     * Display Portfolio Category.
     */
    public function portfolioCategory()
    {
        $portfolio_categories = PortfolioCategory::all();
        return view('admin.portfolio.portfolio_category',compact('portfolio_categories'));
    }
    /**
     * store Portfolio Category.
     */
    public function portfolioCategoryStore(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:portfolio_categories,category_name',
        ]);

        $category_name = $request->category_name;
        $category_slug = Str::slug($category_name);
        PortfolioCategory::insert([
            'category_name' => $category_name,
            'category_slug' => $category_slug,

        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('portfolio.category')->with($notification);
    }
    /**
     * Edit From Show Portfolio Category.
     */
    public function portfolioCategoryEdit(string $id)
    {
       $portfolio_categories = PortfolioCategory::find($id);
       return view('admin.portfolio.portfolio_category_edit',compact('portfolio_categories'));
    }
    /**
     * Update Portfolio Category.
     */
    public function portfolioCategoryUpdate(Request $request, string $id)
    {
        $request->validate([
            'category_name' => 'required|unique:portfolio_categories,category_name',
        ]);

        $portfolio_category = PortfolioCategory::find($id);

        $portfolio_category->category_name = $request->category_name;
        $portfolio_category->category_slug = Str::slug($request->category_name);
        $portfolio_category->update();

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('portfolio.category')->with($notification);
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolio_categories = PortfolioCategory::all();
        $portfolios = Portfolio::latest()->get();
        return view('portfolio',compact('portfolios', 'portfolio_categories'));

    }
    /**
     * Display a listing of the resource.
     */
    public function allPortfolio()
    {

        $portfolios = Portfolio::all();
        return view('admin.portfolio.all_portfolio',compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $portfolio_categories = PortfolioCategory::all();
        return view('admin.portfolio.add_portfolio',compact('portfolio_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_short_description' => 'required',
            'portfolio_description' => 'required',
            'portfolio_date' => 'required',
            'portfolio_location' => 'required',
            'portfolio_client' => 'required',
            'portfolio_link' => 'required',
            'portfolio_video_url' => 'required',
            'portfolio_category' => 'required',
            'portfolio_image' => 'required',

        ]);

        $portfolio_category = PortfolioCategory::find($request->portfolio_category);
        $portfolio_category_name = $portfolio_category->category_name;
        $category_slug = $portfolio_category->category_slug;


        $image = $request->File('portfolio_image');
        $custome_name = rand().".".$image->getClientOriginalExtension();
        $path = public_path('frontend/assets/img/portfolio/'.$custome_name);
        Image::make($image)->resize(1020,519)->save($path);

        Portfolio::insert([
            'portfolio_name' => $request->portfolio_name,
            'portfolio_title' => $request->portfolio_title,
            'portfolio_short_description' => $request->portfolio_short_description,
            'portfolio_description' => $request->portfolio_description,
            'portfolio_date' => $request->portfolio_date,
            'portfolio_location' => $request->portfolio_location,
            'portfolio_client' => $request->portfolio_client,
            'portfolio_link' => $request->portfolio_link,
            'portfolio_video_url' => $request->portfolio_video_url,
            'portfolio_category' => $portfolio_category_name,
            'portfolio_slug' => $category_slug,
            'portfolio_image' => $custome_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => "Portfolio Added Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('all.portfolio')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $portfolio = Portfolio::find($id);
        return view('portfolio_details',compact('portfolio'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $portfolio_categories = PortfolioCategory::all();

        $portfolio = Portfolio::find($id);
        return view('admin.portfolio.edit_portfolio',compact('portfolio','portfolio_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'portfolio_name' => 'required',
            'portfolio_title' => 'required',
            'portfolio_short_description' => 'required',
            'portfolio_description' => 'required',
            'portfolio_date' => 'required',
            'portfolio_location' => 'required',
            'portfolio_client' => 'required',
            'portfolio_link' => 'required',
            'portfolio_video_url' => 'required',
            'portfolio_category' => 'required',

        ]);

        $portfolio_category = PortfolioCategory::find($request->portfolio_category);
        $portfolio_category_name = $portfolio_category->category_name;
        $category_slug = $portfolio_category->category_slug;

        $portfolio = Portfolio::find($id);

        if($request->File('portfolio_image')){

            File::delete(public_path('frontend/assets/img/portfolio/'.$portfolio->portfolio_image));

            $image = $request->File('portfolio_image');
            $custome_name = rand().".".$image->getClientOriginalExtension();
            $path = public_path('frontend/assets/img/portfolio/'.$custome_name);
            Image::make($image)->resize(1020,519)->save($path);

            $portfolio->portfolio_image = $custome_name;

        };


        $portfolio->portfolio_name = $request->portfolio_name;
        $portfolio->portfolio_title = $request->portfolio_title;
        $portfolio->portfolio_short_description = $request->portfolio_short_description;
        $portfolio->portfolio_description = $request->portfolio_description;
        $portfolio->portfolio_date = $request->portfolio_date;
        $portfolio->portfolio_location = $request->portfolio_location;
        $portfolio->portfolio_client = $request->portfolio_client;
        $portfolio->portfolio_link = $request->portfolio_link;
        $portfolio->portfolio_video_url = $request->portfolio_video_url;
        $portfolio->portfolio_category = $portfolio_category_name;
        $portfolio->portfolio_slug = $category_slug;

        $portfolio->update();

        $notification = array(
            'message' => "Portfolio Updated Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('all.portfolio')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $portfolio = Portfolio::find($id);

        File::delete(public_path('frontend/assets/img/portfolio/'.$portfolio->portfolio_image));

        $portfolio->delete();

        $notification = array(
            'message' => "Portfolio deleted Successfully",
            'alert-type' => "success",
        );

        return redirect()->route('all.portfolio')->with($notification);
    }
}
