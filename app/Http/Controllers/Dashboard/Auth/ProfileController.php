<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Traits\UploadFilesTrait;
use App\Http\Controllers\Controller;
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
        $id =  Auth::guard('admin')->id();
        $profileData = Admin::find($id);

        return view('dashboard.pages.auth.profile', compact('profileData'));
    }

    public function profileUpdate(Request $request)
    {

        $id =  Auth::guard('admin')->id();
        $data = Admin::find($id);

        $data->name = $request->name;
        $data->email = $request->email;


        if ($request->hasFile('image')) {
            $oldPhotoPath = $data->image;
            if (!empty($oldPhotoPath)) {
                $this->deleteFile($oldPhotoPath);
            }

            $filePath = $this->uploadImage($request->image, Admin::$STORAGE_DIR);
            $data->image = $filePath;
        }

        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'تم تحديث الملف الشخصي بنجاح',
            'image_url' => storage_public_url($data->image),
            'name' => $data->name,
            'email' => $data->email,
        ]);
    }

    public function changePassword()
    {
        $profileData = Auth::guard('admin')->user();

        return  view('dashboard.pages.auth.change-password', compact('profileData'));
    }

    public function updatePassword(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $messages = [
            'old_password.required' => 'حقل كلمة المرور القديمة مطلوب.',
            'new_password.required' => 'حقل كلمة المرور الجديدة مطلوب.',
            'password_confirmation.required' => 'يرجى تأكيد كلمة المرور الجديدة.',
            'password_confirmation.same' => 'كلمة المرور الجديدة غير متطابقة.',
        ];

        // Validate request with custom messages
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'password_confirmation' => 'required|same:new_password',
        ], $messages);

        if (!Hash::check($request->old_password, $admin->password)) {

            return back()->withErrors(['old_password' => 'كلمة المرور القديمة غير صحيحة'])->withInput();
        }

        Admin::whereId($admin->id)->update([
            'password' => Hash::make($request->new_password)
        ]);


        return back()->with('success', 'تم تحديث كلمة المرور بنجاح');
    }
}
