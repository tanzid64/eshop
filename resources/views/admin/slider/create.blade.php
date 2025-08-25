@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Slider</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.slider.index') }}">Slider</a></div>
                <div class="breadcrumb-item">Create</div>
            </div>
        </div>

        <div class="section-body">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Slider</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.slider.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="banner">Banner</label>
                                    <input id="banner" type="file" name="banner"
                                        class="form-control @error('banner') is-invalid @enderror" accept="image/*">
                                    @error('banner')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="type">Types</label>
                                    <input type="text" class="form-control" id="type" name="type">
                                </div>
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="starting_price">Starting Price</label>
                                    <input type="text" class="form-control" id="starting_price" name="starting_price">
                                </div>
                                <div class="form-group">
                                    <label for="button_url">Button URL</label>
                                    <input type="text" class="form-control" id="button_url" name="button_url">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="order">Ordering</label>
                                        <input type="number" class="form-control" id="order" name="order">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Create Slider</button>
                            </form>
                        </div>
                        <div class="card-footer text-right">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
