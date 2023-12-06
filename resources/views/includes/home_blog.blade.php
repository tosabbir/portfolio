@php
    use App\Models\Blog;

    $blogs = Blog::latest()->limit(3)->get();

@endphp


<section class="blog">
    <div class="container">
        <div class="row gx-0 justify-content-center">

            @foreach ($blogs as $blog)

            <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="{{route('details.blog',$blog->id)}}"><img src="{{ asset('frontend/assets/img/blog/'.$blog->blog_image) }}" alt=""></a>
                        <div class="blog__post__tags">
                            <a href="blog.html">{{$blog->blog_category}}</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">13 january 2021</span>
                        <h3 class="title"><a href="{{route('details.blog',$blog->id)}}">{{$blog->blog_title}}</a></h3>
                        <a href="{{route('details.blog',$blog->id)}}" class="read__more">Read More</a>
                    </div>
                </div>
            </div>

            @endforeach


        </div>
        <div class="blog__button text-center">
            <a href="{{route('blog.page')}}" class="btn">More Blog</a>
        </div>
    </div>
</section>
