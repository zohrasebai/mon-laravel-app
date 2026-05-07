@extends('layouts.app')

@section('title', 'Sign Up')

@section('content')
<div class="signup position-relative bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-12 offset-lg-1 offset-md-0">
                <div class="bg-white my-80 py-40 px-30 md-px-30 sm-px-15 sm-py-30 shadow-smooth-black-01">
                    
                    <div class="form-logo text-center pb-50">
                        <img src="{{ asset('assets/images/S.png') }}" alt="logo-image">
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-lg-5">
                            {{-- عرض أخطاء التحقق من البيانات إن وجدت --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="signup-form" action="{{ route('register.post') }}" method="POST">
                                @csrf
                                <h3 class="position-relative va-lb-line-w50-h2-primary pb-15 mb-30 color-secondery">Sign Up Now!</h3>
                                
                                <div class="row">
                                    {{-- ملاحظة: تم تغيير username إلى name ليتوافق مع قاعدة البيانات --}}
                                    <div class="form-group col-md-12 col-lg-12">
                                        <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}" required>
                                    </div>

                                    <div class="form-group col-md-12 col-lg-12">
                                        <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ old('email') }}" required>
                                    </div>

                                    <div class="form-group col-md-12 col-lg-12">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>

                                    <div class="form-group col-md-12 col-lg-12">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password" required>
                                    </div>

                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                                    </div>
                                </div>
                            </form>

                            <div class="text-center mt-30 lg-mb-30">
                                <span class="mr-15">Already registered?</span>
                                <a class="color-primary" href="{{ route('login') }}">Login!</a>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-2 line-center">
                            <div class="xy-middle shadow or">Or</div>
                        </div>

                        <div class="col-md-12 col-lg-5">
                            <div class="y-middle w-100 lg-mt-30 lg-mb-30">
                                <ul class="socal-signup mr-30 sm-mr-0">
                                    <li><a class="btn facebook w-100" href="#">Log in with Facebook</a></li>
                                    <li><a class="btn twitter mt-15 w-100" href="#">Log in with Twitter</a></li>
                                    <li><a class="btn google mt-15 w-100" href="#">Log in with Google</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12">
                            <div class="color-gray">
                                <ul class="form-list mt-50 d-table mx-auto hover-primary">
                                    <li>© 2025 Soul</li>
                                    <li>
                                        <a href="mailto:contact@soul-solo.com?subject=Contact%20Request&body=Hello,%20I%20would%20like%20to%20contact%20you.">
                                            Contact Us
                                        </a>
                                    </li>
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                </ul>
                            </div>
                        </div>
                    </div> </div> </div>
        </div>
    </div>
</div>
@endsection