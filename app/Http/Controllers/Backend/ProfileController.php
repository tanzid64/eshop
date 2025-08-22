<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use function Illuminate\Log\log;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request)
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
                $userId = $user->id;
                $timestamp = time();
                $extension = $image->getClientOriginalExtension();
                $imageName = "avatar_{$userId}_{$timestamp}.{$extension}";
                $path = Storage::disk('supabase')->putFileAs('profiles', $image, $imageName, 'public');
                $user->image = $path;
            }
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->save();

            return redirect()->route('admin.profile')->with('success', 'Profile updated successfully');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->route('admin.profile')->with('error', 'Profile update failed');
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

            return redirect()->route('admin.profile')->with('success', 'Password updated successfully');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return redirect()->route('admin.profile')->with('error', 'Password update failed');
        }
    }
}
