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
                                <form method="POST" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex justify-content-center">
                                        <div class="wsus__dash_pro_img">
                                            <img src="{{ auth()->user()->image_url ?? asset('frontend/images/ts-2.jpg') }}"
                                                alt="img" class="img-fluid w-100">
                                            <input type="file" name="image">
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fas fa-user-tie"></i>
                                                <input type="text" placeholder="Full Name" name="name"
                                                    value="{{ auth()->user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="wsus__dash_pro_single">
                                                <i class="far fa-phone-alt"></i>
                                                <input type="text" placeholder="Phone" name="phone"
                                                    value="{{ auth()->user()->phone }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fal fa-envelope-open"></i>
                                                <input type="email" placeholder="Email" name="email"
                                                    value="{{ auth()->user()->email }}">
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="col-xl-12">
                                <button class="common_btn mb-4 mt-2" type="submit">update</button>
                            </div>
                            </form>
                            <div class="wsus__dash_pass_change mt-2">
                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="wsus__dash_pro_single">
                                            <i class="fas fa-unlock-alt"></i>
                                            <input type="password" placeholder="Current Password">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="wsus__dash_pro_single">
                                            <i class="fas fa-lock-alt"></i>
                                            <input type="password" placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="wsus__dash_pro_single">
                                            <i class="fas fa-lock-alt"></i>
                                            <input type="password" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <button class="common_btn" type="submit">upload</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
