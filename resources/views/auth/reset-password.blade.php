@extends('frontend.layouts.master')
@section('content')
    <!-- Breadcrumb Start -->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>change password</h4>
                        <ul>
                            <li><a href="{{ route('login') }}">login</a></li>
                            <li><a href="#">Reset password</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb End -->

    <!-- Reset Password Start -->
    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-md-10 col-lg-7 m-auto">
                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="wsus__change_password">
                            <h4>Reset password</h4>
                            <div class="wsus__single_pass">
                                <label>Email</label>
                                <input type="email" placeholder="Email" name="email" required
                                    value="{{ old('email', $request->email) }}">
                            </div>
                            <div class="wsus__single_pass">
                                <label>Password</label>
                                <input type="password" placeholder="Password" name="password" required
                                    value="{{ old('password') }}">
                            </div>
                            <div class="wsus__single_pass">
                                <label>confirm password</label>
                                <input type="password" placeholder="Confirm Password" name="password_confirmation" required
                                    value="{{ old('password_confirmation') }}">
                            </div>
                            <button class="common_btn" type="submit">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Reset Password End -->
@endsection
