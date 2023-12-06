
@php
    use App\Models\HomeAbout;
    use App\Models\MultiImage\AboutMultiImage;

    use App\Models\User;
    use Illuminate\Support\Facades\Auth;


    $allAbouteMultiIMage = AboutMultiImage::all();

    $allData = User::all()->first();
    $id = $allData->id;
    $adminData = HomeAbout::find($id);

    $tags = $blog->blog_tag;
    $tagsArray = explode(',', $tags);

@endphp


@extends('master')
@section('content')


    <!-- breadcrumb-area -->
    <section class="breadcrumb__wrap">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="breadcrumb__wrap__content">
                        <h2 class="title">Blog Details</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
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


<!-- blog-details-area -->
<section class="standard__blog blog__details">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="standard__blog__post">
                    <div class="standard__blog__thumb">
                        <img src="{{ asset('frontend/assets/img/blog/'.$blog->blog_image) }}" alt="blog image">
                    </div>
                    <div class="blog__details__content services__details__content">

                        <ul class="blog__post__meta">
                            <li><i class="fal fa-calendar-alt"></i> {{$blog->created_at}}</li>
                            <li><i class="fal fa-comments-alt"></i> <a href="#">Comment ({{ $blog->blog_comment }})</a></li>
                            <li class="post-share"><a href="#"><i class="fal fa-share-all"></i> ({{ $blog->blog_share }})</a></li>
                        </ul>
                        <div class="blog__post__avatar">
                            <div class="thumb"><img src="{{ (empty($adminData->adminPic))? asset('/backend/assets/images/admin/avatar-1.jpg') : asset('/backend/assets/images/admin/'.$adminData->adminPic)}}" alt=""></div>
                            <span class="post__by">By : <a href="#">{{$adminData->name}}</a></span>
                        </div>
                        <h2 class="title">{{$blog->blog_title}}</h2>
                        <p>{!! $blog->blog_description !!}</p>
                    </div>
                    <div class="blog__details__bottom">
                        <ul class="blog__details__tag">
                            <li class="title">Tag:</li>
                            <li class="tags-list">

                                @foreach ($tagsArray as $tag)

                                    <a href="#">{{$tag}}</a>

                                @endforeach

                            </li>
                        </ul>
                        <ul class="blog__details__social">
                            <li class="title">Share :</li>
                            <li class="social-icons">
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-twitter-square"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                    {{-- <div class="blog__next__prev">
                        <div class="row justify-content-between">
                            <div class="col-xl-5 col-md-6">
                                <div class="blog__next__prev__item">
                                    <h4 class="title">Previous Post</h4>
                                    <div class="blog__next__prev__post">
                                        <div class="blog__next__prev__thumb">
                                            <a href="blog-details.html"><img src="assets/img/blog/blog_prev.jpg" alt=""></a>
                                        </div>
                                        <div class="blog__next__prev__content">
                                            <h5 class="title"><a href="blog-details.html">Digital Marketing Agency Pricing Guide.</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-md-6">
                                <div class="blog__next__prev__item next_post text-end">
                                    <h4 class="title">Next Post</h4>
                                    <div class="blog__next__prev__post">
                                        <div class="blog__next__prev__thumb">
                                            <a href="blog-details.html"><img src="assets/img/blog/blog_next.jpg" alt=""></a>
                                        </div>
                                        <div class="blog__next__prev__content">
                                            <h5 class="title"><a href="blog-details.html">App Prototyping
                                            Types, Example & Usages.</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="comment comment__wrap">
                        <div class="comment__title">
                            <h4 class="title">({{ $blog->blog_comment }}) Comment</h4>
                        </div>
                        <ul class="comment__list">

                            @foreach ($comments as $comment)

                            <li class="comment__item">
                                <div class="comment__thumb">
                                    <img src="{{ !empty($comment->user_img)? asset('frontend/assets/img/user/'.$comment->user_img) : asset('backend/assets/images/home/banner_img.png')}}" alt="">
                                </div>
                                <div class="comment__content">
                                    <div class="comment__avatar__info">
                                        <div class="info">
                                            <h4 class="title">{{$comment->user_name}}</h4>
                                            <span class="date">{{$comment->created_at}}</span>
                                        </div>

                                    </div>
                                    <p>{{$comment->message}}</p>
                                </div>
                            </li>

                            @endforeach


                        </ul>
                    </div>


                    <div class="comment__form">
                        <div class="comment__title">
                            <h4 class="title">Write your comment</h4>
                        </div>

                        <form action="{{ route('store.comment',$blog->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" placeholder="Enter your name*" name="user_name" value="{{ old('user_name') }}" required>
                                    @error('user_name')
                                        <span>{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="email" placeholder="Enter your mail*" name="user_email" value="{{ old('user_email') }}" required>
                                    @error('user_email')
                                        <span>{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="phone" placeholder="Enter your number*" name="user_phone" value="{{ old('user_phone') }}" required>
                                    @error('user_phone')
                                        <span>{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="file" placeholder="Choose Your Image ( Optional )*" id="user_img" name="user_img" value="{{ old('user_img') }}">
                                    @error('user_img')
                                        <span>{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <img id="imageView" src="" alt="" style="width: 15%">
                                    </div>
                                </div>
                            </div>
                            <textarea name="message" id="message" placeholder="Enter your Massage*">{{ old('message') }}</textarea>
                            @error('message')
                                <span>{{$message}}</span>
                            @enderror

                            <div class="form-grp checkbox-grp">
                                <input type="checkbox" id="checkbox">
                                <label for="checkbox">Save my name, email, and website in this browser for the next time I comment.</label>
                            </div>
                            <button type="submit" class="btn">post a comment</button>
                        </form>
                    </div>
                </div>
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
                        <ul class="sidebar__cat"></ul>

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
<br><br><br><br><br><br>
<!-- blog-details-area-end -->

<script>
    $(document).ready(function () {
        $('#user_img').change(function (e) {
            e.preventDefault();
            var reader = new FileReader;
            reader.onload = function(){
                $('#imageView').attr('src', reader.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>


@endsection
