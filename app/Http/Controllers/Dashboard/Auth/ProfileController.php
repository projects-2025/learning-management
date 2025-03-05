<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Traits\UploadFilesTrait;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\UpdatePasswordRequest;
use App\Http\Requests\Dashboard\Auth\UpdateProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    use UploadFilesTrait;


    public function profile()
    {
        $profileData =  Auth::guard('admin')->user();

        return view('dashboard.pages.auth.profile', compact('profileData'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $data = Auth::guard('admin')->user() ?? abort(404, 'المستخدم غير موجود.');

        if ($request->hasFile('image')) {
            $oldPhotoPath = $data->image;
            if (!empty($oldPhotoPath)) {
                $this->deleteFile($oldPhotoPath);
            }

            $filePath = $this->uploadImage($request->file('image'), Admin::$STORAGE_DIR);
            $data->image = $filePath;
        }

        $updatedData = [
            'name' => $request->name,
            'email' => $request->email,
            'image' => $data->image
        ];
            $data->update($updatedData);

            return response()->json(['success' => true, 'message' => 'تم تحديث الملف الشخصي بنجاح!']);
    }

    public function changePassword()
    {
        $profileData = Auth::guard('admin')->user();

        return  view('dashboard.pages.auth.change-password', compact('profileData'));
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $admin = Auth::guard('admin')->user();

        if (!Hash::check($request->old_password, $admin->password)) {

            return back()->withErrors(['old_password' => 'كلمة المرور القديمة غير صحيحة'])->withInput();
        }

        Admin::whereId($admin->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', 'تم تحديث كلمة المرور بنجاح');
    }
}
