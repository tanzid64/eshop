@extends('frontend.dashboard.layouts.master')
@section('content')
    <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
            <div class="dashboard_content mt-2 mt-md-0">
                <h3><i class="far fa-user"></i> profile</h3>
                <div class="wsus__dashboard_profile">
                    <div class="wsus__dash_pro_area">
                        <h4>basic information</h4>
                        <div class="row">
                            <div class="col-xl-12">
                                <form method="POST" action="{{ route('user.profile.update') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex justify-content-center">
                                        <div class="wsus__dash_pro_img">
                                            <img src="{{ auth()->user()->image_url ?? asset('frontend/images/ts-2.jpg') }}"
                                                width="200px" alt="img" class="img-fluid">
                                            <input type="file" name="image" accept="image/*">
                                        </div>
                                    </div>
                                    @error('image')
                                        <span class="text-danger d-block">{{ $message }}</span>
                                    @enderror

                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="wsus__dash_pro_single d-flex align-items-start">
                                                <i class="fas fa-user-tie"></i>
                                                <div class="ms-2 w-100">
                                                    <input type="text" placeholder="Full Name" name="name"
                                                        value="{{ old('name', auth()->user()->name) }}">
                                                    @error('name')
                                                        <span class="text-danger d-block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-xl-6 col-md-6">
                                            <div class="wsus__dash_pro_single d-flex align-items-start">
                                                <i class="far fa-phone-alt"></i>
                                                <div class="ms-2 w-100">
                                                    <input type="text" placeholder="Phone" name="phone"
                                                        value="{{ old('phone', auth()->user()->phone) }}">
                                                    @error('phone')
                                                        <span class="text-danger d-block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-xl-6 col-md-6">
                                            <div class="wsus__dash_pro_single d-flex align-items-start">
                                                <i class="fal fa-envelope-open"></i>
                                                <div class="ms-2 w-100">
                                                    <input type="email" placeholder="Email" name="email"
                                                        value="{{ old('email', auth()->user()->email) }}">
                                                    @error('email')
                                                        <span class="text-danger d-block">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-xl-12">
                                        <button class="common_btn mb-4 mt-2" type="submit">update</button>
                                    </div>
                                </form>
                                <div class="wsus__dash_pass_change mt-2">
                                    <form action="{{ route('user.profile.password.update') }}" method="POST">
                                        <div class="row">
                                            @csrf
                                            <div class="col-xl-4 col-md-6">
                                                <div class="wsus__dash_pro_single d-flex align-items-start">
                                                    <i class="fas fa-unlock-alt"></i>
                                                    <div class="ms-2 w-100">
                                                        <input type="password" placeholder="Current Password"
                                                            name="current_password">
                                                        @error('current_password')
                                                            <span class="text-danger d-block">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="wsus__dash_pro_single d-flex align-items-start">
                                                    <i class="fas fa-lock-alt"></i>
                                                    <div class="ms-2 w-100">
                                                        <input type="password" placeholder="New Password" name="password">
                                                        @error('password')
                                                            <span class="text-danger d-block">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="wsus__dash_pro_single d-flex align-items-start">
                                                    <i class="fas fa-lock-alt"></i>
                                                    <div class="ms-2 w-100">
                                                        <input type="password" placeholder="Confirm Password"
                                                            name="password_confirmation">
                                                        @error('password_confirmation')
                                                            <span class="text-danger d-block">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <button class="common_btn" type="submit">Change Password</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
