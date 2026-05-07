@extends('layouts.app')

@section('title', 'Login')

@push('styles')
<style>
    /* تنسيقات مخصصة لضمان ظهور الصفحة بشكل مثالي */
    .login-wrapper {
        min-height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f8f9fa; /* لون خلفية هادئ */
        padding: 50px 0;
    }
    .login-form-area {
        max-width: 450px;
        width: 100%;
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    .login-form-area:hover {
        transform: translateY(-5px);
    }
    .btn-show-pass {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #999;
        z-index: 10;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-list li {
        display: inline-block;
        margin: 0 10px;
        font-size: 14px;
    }
    .form-list {
        padding-left: 0;
        margin-top: 30px;
    }
</style>
@endpush

@section('content')
<div class="login-wrapper">
    <div class="container">
        <div class="login-form-area shadow-lg py-40 px-30 lg-px-15 bg-white mx-auto position-relative">
            
            {{-- عرض رسائل النجاح --}}
            @if(session('success'))
                <div class="alert alert-success text-center mb-20">
                    {{ session('success') }}
                </div>
            @endif

            {{-- عرض أخطاء الدخول --}}
            @if($errors->any())
                <div class="alert alert-danger text-center mb-20">
                    {{ $errors->first() }}
                </div>
            @endif

            <form class="position-relative md-mb-50" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-logo text-center pb-30">
                    <img src="{{ asset('assets/images/S.png') }}" alt="logo-image" style="width: 80px;">
                    <h4 class="mt-15 color-secondery font-weight-bold">Connexion</h4>
                </div>

                <div class="form-group validate-input w-100 position-relative">
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">
                </div>

                <div class="form-group validate-input w-100 position-relative">
                    <span class="btn-show-pass" onclick="togglePassword()">
                        <i class="fa fa-eye" id="toggleIcon"></i>
                    </span>
                    <input class="form-control" id="password" type="password" name="password" required placeholder="Password">
                </div>

                <div class="d-flex justify-content-between align-items-center mb-30">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <a class="color-primary" href="#">Forgot?</a>
                </div>

                <button type="submit" class="btn btn-primary d-table mx-auto w-100 py-10 font-weight-bold">Sign In</button>

                <div class="text-center mt-30">
                    <span class="mr-10">Don’t have an account?</span>
                    <a class="color-primary font-weight-bold" href="{{ route('register') }}">Sign Up!</a>
                </div>
            </form>

            <div class="login-form-footer color-gray text-center mt-40">
                <ul class="form-list d-table mx-auto hover-primary list-unstyled">
                    <li>© 2025 Soul</li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                    <li><a href="{{ route('home') }}">Home</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // وظيفة إظهار وإخفاء كلمة المرور
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const icon = document.getElementById('toggleIcon');
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
@endpush