<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class SliderController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::orderBy('order', 'asc')->get();
        return view('admin.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'type' => 'required|string',
                'title' => 'required|string',
                'starting_price' => 'required|string',
                'button_url' => 'required|string',
                'order' => 'required|integer',
                'status' => 'required|boolean',
            ]);

            // Handle Banner Upload
            $banner = $request->file('banner');
            $bannerName = time() . '.' . $banner->getClientOriginalExtension();
            $bannerPath = $this->uploadImage($banner, $bannerName, 'cloudinary', 'sliders');

            // Store Slider Data
            $slider = Slider::create([
                'banner_public_id' => $bannerPath,
                'type' => $request->type,
                'title' => $request->title,
                'starting_price' => $request->starting_price,
                'button_url' => $request->button_url,
                'order' => $request->order,
                'status' => $request->status,
            ]);
            toastr()->success('Slider created successfully');
            return redirect()->route('admin.slider.index');
        } catch (ValidationException $e) {
            if ($request->hasFile('banner')) {
                $this->removeImage($bannerPath, 'cloudinary');
            }
            toastr()->error("Validation Errors");
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Throwable $th) {
            Log::error($th);
            if ($request->hasFile('banner')) {
                $this->removeImage($bannerPath, 'cloudinary');
            }
            toastr()->error('Something went wrong');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
