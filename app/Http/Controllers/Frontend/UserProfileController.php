<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserProfileController extends Controller
{
    use ImageUploadTrait;

    public function index()
    {
        return view('frontend.dashboard.profile');
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . auth()->user()->id,
                'phone' => 'nullable|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $user = auth()->user();

            if ($request->hasFile('image')) {
                $user->deleteUserImage();
                $image = $request->file('image');
                $timestamp = time();
                $imageName = "avatar_{$user->id}_{$timestamp}.{$image->getClientOriginalExtension()}";
                $user->image = $this->uploadImage($image, $imageName, 'supabase', 'profiles');
            }

            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->save();

            return redirect()->route('user.profile')->with('success', 'Profile updated successfully');
        } catch (\Illuminate\Validation\ValidationException $th) {
            Log::error($th->getMessage());
            return redirect()->back()->with("error", "Validation failed!")->withErrors($th->errors());
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->back()->with("error", $th->getMessage());
        }
    }

    public function updatePassword(Request $request)
    {
        try {
            $request->validate([
                'current_password' => 'required|current_password|max:255',
                'password' => 'required|string|max:255|confirmed',
            ]);

            $user = auth()->user();
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with("success", "Password updated successful.");
        } catch (\Illuminate\Validation\ValidationException $th) {
            Log::error($th->getMessage());
            return redirect()->back()->with("error", "Validation failed!")->withErrors($th->errors());
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->back()->with("error", "Password update failed.");
        }
    }
}
