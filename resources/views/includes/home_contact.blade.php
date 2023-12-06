<section class="homeContact">
    <div class="container">
        <div class="homeContact__wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title">
                        <span class="sub-title">07 - Say hello</span>
                        <h2 class="title">Any questions? Feel free <br> to contact</h2>
                    </div>
                    <div class="homeContact__content">
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                        <h2 class="mail"><a href="mailto:Info@webmail.com">Info@webmail.com</a></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form action="{{route('store.question')}}" method="post">
                            @csrf
                                <input type="text" placeholder="Enter your name*" name="user_name" value="{{ old('user_name') }}" required>
                                    @error('user_name')
                                        <span>{{$message}}</span>
                                    @enderror
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
                                    <textarea name="message" id="message" placeholder="Enter your Massage*">{{ old('message') }}</textarea>
                                    @error('message')
                                        <span>{{$message}}</span>
                                    @enderror
                                <button type="submit" class="btn">send massage</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
