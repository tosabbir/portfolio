@php
    use App\Models\HomeAbout;
    use App\Models\MultiImage\AboutMultiImage;

    use App\Models\User;
    use Illuminate\Support\Facades\Auth;


    $allAbouteMultiIMage = AboutMultiImage::all();

    $allData = User::all()->first();
    $id = $allData->id;
    $adminData = HomeAbout::find($id);



@endphp


@extends('master')
@section('content')


    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">Recent Blogs</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__wrap__icon">
            <ul>
                @foreach ($allAbouteMultiIMage as $singleImage)
                    <li><img src="{{ ('frontend/assets/img/images/about/multiImage/'.$singleImage->images) }}" alt=""></li>
                @endforeach
            </ul>
        </div>
    </section>
    <!-- breadcrumb-area-end -->


    <!-- blog-area -->
    <section class="standard__blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    @foreach ($blogs as $blog)

                    <div class="standard__blog__post">
                        <div class="standard__blog__thumb">
                            <a href="{{ route('details.blog',$blog->id) }}"><img src="{{ asset('frontend/assets/img/blog/'.$blog->blog_image) }}" alt=""></a>
                            <a href="{{ route('details.blog',$blog->id) }}" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                        </div>
                        <div class="standard__blog__content">
                            <div class="blog__post__avatar">
                                <div class="thumb"><img src="{{ (empty($adminData->adminPic))? asset('/backend/assets/images/admin/avatar-1.jpg') : asset('/backend/assets/images/admin/'.$adminData->adminPic)}}" alt=""></div>
                                <span class="post__by">By : <a href="#">{{$adminData->name}}</a></span>
                            </div>

                            <h2 class="title"><a href="{{ route('details.blog',$blog->id) }}">{{$blog->blog_title}}</a></h2>

                            <p>{!! $blog->blog_short_description !!}</p>

                            <ul class="blog__post__meta">
                                <li><i class="fal fa-calendar-alt"></i> {{ $blog->created_at }}</li>
                                <li><i class="fal fa-comments-alt"></i> <a href="#">Comment ({{ $blog->blog_comment }})</a></li>
                                <li class="post-share"><a href="#"><i class="fal fa-share-all"></i> ({{ $blog->blog_share }})</a></li>
                            </ul>
                        </div>
                    </div>

                    @endforeach
                    <br><br><br><br><br>
                </div>
                <div class="col-lg-4">
                    <aside class="blog__sidebar">
                        <div class="widget">
                            <form action="#" class="search-form">
                                <input type="text" placeholder="Search">
                                <button type="submit"><i class="fal fa-search"></i></button>
                            </form>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Recent Blog</h4>
                            <ul class="rc__post">

                                @foreach ($blogs as $blog)

                                <li class="rc__post__item">
                                    <div class="rc__post__thumb">
                                        <a href="blog-details.html"><img src="{{ asset('frontend/assets/img/blog/'.$blog->blog_image) }}" alt=""></a>
                                    </div>
                                    <div class="rc__post__content">
                                        <h5 class="title"><a href="blog-details.html">{{ $blog->blog_title }}</a></h5>
                                        <span class="post-date"><i class="fal fa-calendar-alt"></i>{{ $blog->created_at }}</span>
                                    </div>
                                </li>

                                @endforeach


                            </ul>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Categories</h4>
                            <ul class="sidebar__cat">

                                @foreach ($blog_categories as $blog_category)

                                @php
                                    $countPost = App\Models\Blog::where('blog_category',$blog_category->category_name)->count();
                                @endphp



                                <li class="sidebar__cat__item"><a href="blog.html">{{ $blog_category->category_name }} ( {{$countPost}} )</a></li>

                                @endforeach

                            </ul>
                        </div>
                        <div class="widget">
                            <h4 class="widget-title">Recent Comment</h4>
                            <ul class="sidebar__comment">

                                @foreach ($comments as $comment)

                                <li class="sidebar__comment__item">
                                    <a href="blog-details.html">{{$comment->user_name}}</a>
                                    <p>{{$comment->message}}</p>
                                </li>

                                @endforeach

                            </ul>
                        </div>

                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->


@endsection
