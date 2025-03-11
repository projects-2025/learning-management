@extends('dashboard.layouts.master')

@push('css')
    <style>
        /* here write more styles */
    </style>
@endpush

@section('page-title')
    لوحة التحكم | حسابي
@endsection

@section('content')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="header-page">
                <div class="title-page">
                    <h3>حسابي</h3>
                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap6">
                        <li>
                            <a href="index.html">
                                <div class="text-tiny">الرئيسية</div>
                            </a>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                color="#ffffff" fill="none">
                                <path d="M15 6C15 6 9.00001 10.4189 9 12C8.99999 13.5812 15 18 15 18" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </li>
                        <li>
                            <div class="text-tiny">حسابي</div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="wg-box">
                <form id="profileUpdateForm" action="{{ route('dashboard.update.profile') }}" method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <fieldset class="mb-24">
                                <div class="body-title mb-5">اسم المستخدم <span class="tf-color-1"></span></div>
                                <input class="flex-grow" type="text" placeholder="اكتب هنا .." name="name"
                                    id="name" value="{{ $profileData->name }}">
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <fieldset class="mb-24">
                                <div class="body-title mb-5">البريد الإلكتروني <span class="tf-color-1"></span></div>
                                <input class="flex-grow" type="text" placeholder="اكتب هنا .." name="email"
                                    id="email" value="{{ $profileData->email }}">
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <fieldset class="mb-24">
                                <div class="body-title mb-5"> الصورة الشخصية <span class="tf-color-1"></span></div>
                                <input class="form-control" type="file" name="image" id="image" accept="image/*">
                            </fieldset>
                            <fieldset class="mb-3">

                                <img id="showImage" src="{{ storage_public_url($profileData->image) }}" alt=""
                                    class="rounded-circle p-1 bg-primary" width="110">
                            </fieldset>
                        </div>
                    </div>

                    <div class="btm">
                        <button type="submit" class="tf-button style-1" id="saveProfileBtn">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                color="#ffffff" fill="none">
                                <path
                                    d="M8 22V19C8 17.1144 8 16.1716 8.58579 15.5858C9.17157 15 10.1144 15 12 15C13.8856 15 14.8284 15 15.4142 15.5858C16 16.1716 16 17.1144 16 19V22"
                                    stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                                <path d="M10 7H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M3 11.8584C3 7.28199 3 4.99376 4.38674 3.54394C4.43797 3.49038 4.49038 3.43797 4.54394 3.38674C5.99376 2 8.28199 2 12.8584 2C13.943 2 14.4655 2.00376 14.9628 2.18936C15.4417 2.3681 15.8429 2.70239 16.6452 3.37099L18.8411 5.20092C19.9027 6.08561 20.4335 6.52795 20.7168 7.13266C21 7.73737 21 8.42833 21 9.81025V13C21 16.7497 21 18.6246 20.0451 19.9389C19.7367 20.3634 19.3634 20.7367 18.9389 21.0451C17.6246 22 15.7497 22 12 22C8.25027 22 6.3754 22 5.06107 21.0451C4.6366 20.7367 4.26331 20.3634 3.95491 19.9389C3 18.6246 3 16.7497 3 13V11.8584Z"
                                    stroke="currentColor" stroke-width="1.5" />
                            </svg>
                            حفظ
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {

            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                };
                reader.readAsDataURL(e.target.files[0]);
            });

            $('#profileUpdateForm').on('submit', function(e) {
                const callback = {
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'تم تحديث الملف الشخصي!',
                            text: 'تم تحديث معلومات ملفك الشخصي بنجاح.',
                            confirmButtonText: 'موافق'
                        });
                    }
                };
                submitForm(this, e, callback);
            });
        });
    </script>


@endpush
