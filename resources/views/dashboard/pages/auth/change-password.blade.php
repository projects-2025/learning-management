@extends('dashboard.layouts.master')

@push('css')
    <style>
        /* here write more styles */
    </style>
@endpush

@section('page-tile')
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
                            <div class="text-tiny">تغيير كلمة المرور</div>
                        </li>
                    </ul>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="wg-box">
                <form action="{{ route('dashboard.update.password') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <fieldset class="password mb-24">
                                <div class="body-title mb-5">كلمة المرور القديمة <span class="tf-color-1"></span></div>
                                <div class="password-box">
                                    <input class="password-input" type="password" placeholder="اكتب كلمة المرور هنا ..."
                                        name="old_password" required="">
                                    <span class="show-pass">
                                        <svg class="view" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            width="24" height="24" color="#ffffff" fill="none">
                                            <path d="M2 8C2 8 6.47715 3 12 3C17.5228 3 22 8 22 8" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round"></path>
                                            <path
                                                d="M21.544 13.045C21.848 13.4713 22 13.6845 22 14C22 14.3155 21.848 14.5287 21.544 14.955C20.1779 16.8706 16.6892 21 12 21C7.31078 21 3.8221 16.8706 2.45604 14.955C2.15201 14.5287 2 14.3155 2 14C2 13.6845 2.15201 13.4713 2.45604 13.045C3.8221 11.1294 7.31078 7 12 7C16.6892 7 20.1779 11.1294 21.544 13.045Z"
                                                stroke="currentColor" stroke-width="1.5"></path>
                                            <path
                                                d="M15 14C15 12.3431 13.6569 11 12 11C10.3431 11 9 12.3431 9 14C9 15.6569 10.3431 17 12 17C13.6569 17 15 15.6569 15 14Z"
                                                stroke="currentColor" stroke-width="1.5"></path>
                                        </svg>
                                        <svg class="hide" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            width="24" height="24" color="#ffffff" fill="none">
                                            <path
                                                d="M19.439 15.439C20.3636 14.5212 21.0775 13.6091 21.544 12.955C21.848 12.5287 22 12.3155 22 12C22 11.6845 21.848 11.4713 21.544 11.045C20.1779 9.12944 16.6892 5 12 5C11.0922 5 10.2294 5.15476 9.41827 5.41827M6.74742 6.74742C4.73118 8.1072 3.24215 9.94266 2.45604 11.045C2.15201 11.4713 2 11.6845 2 12C2 12.3155 2.15201 12.5287 2.45604 12.955C3.8221 14.8706 7.31078 19 12 19C13.9908 19 15.7651 18.2557 17.2526 17.2526"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M9.85786 10C9.32783 10.53 9 11.2623 9 12.0711C9 13.6887 10.3113 15 11.9289 15C12.7377 15 13.47 14.6722 14 14.1421"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M3 3L21 21" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </div>
                                @error('old_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <fieldset class="password mb-24">
                                <div class="body-title mb-5">كلمة المرور الجديدة <span class="tf-color-1"></span></div>
                                <div class="password-box">
                                    <input class="password-input" type="password" placeholder="اكتب كلمة المرور هنا ..."
                                        name="new_password" required="">
                                    <span class="show-pass">
                                        <svg class="view" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            width="24" height="24" color="#ffffff" fill="none">
                                            <path d="M2 8C2 8 6.47715 3 12 3C17.5228 3 22 8 22 8" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round"></path>
                                            <path
                                                d="M21.544 13.045C21.848 13.4713 22 13.6845 22 14C22 14.3155 21.848 14.5287 21.544 14.955C20.1779 16.8706 16.6892 21 12 21C7.31078 21 3.8221 16.8706 2.45604 14.955C2.15201 14.5287 2 14.3155 2 14C2 13.6845 2.15201 13.4713 2.45604 13.045C3.8221 11.1294 7.31078 7 12 7C16.6892 7 20.1779 11.1294 21.544 13.045Z"
                                                stroke="currentColor" stroke-width="1.5"></path>
                                            <path
                                                d="M15 14C15 12.3431 13.6569 11 12 11C10.3431 11 9 12.3431 9 14C9 15.6569 10.3431 17 12 17C13.6569 17 15 15.6569 15 14Z"
                                                stroke="currentColor" stroke-width="1.5"></path>
                                        </svg>
                                        <svg class="hide" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            width="24" height="24" color="#ffffff" fill="none">
                                            <path
                                                d="M19.439 15.439C20.3636 14.5212 21.0775 13.6091 21.544 12.955C21.848 12.5287 22 12.3155 22 12C22 11.6845 21.848 11.4713 21.544 11.045C20.1779 9.12944 16.6892 5 12 5C11.0922 5 10.2294 5.15476 9.41827 5.41827M6.74742 6.74742C4.73118 8.1072 3.24215 9.94266 2.45604 11.045C2.15201 11.4713 2 11.6845 2 12C2 12.3155 2.15201 12.5287 2.45604 12.955C3.8221 14.8706 7.31078 19 12 19C13.9908 19 15.7651 18.2557 17.2526 17.2526"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M9.85786 10C9.32783 10.53 9 11.2623 9 12.0711C9 13.6887 10.3113 15 11.9289 15C12.7377 15 13.47 14.6722 14 14.1421"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M3 3L21 21" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </div>
                                @error('new_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <fieldset class="password mb-24">
                                <div class="body-title mb-5">تأكيد كلمة المرور <span class="tf-color-1"></span></div>
                                <div class="password-box">
                                    <input class="password-input" type="password" placeholder="اكتب كلمة المرور هنا ..."
                                        name="password_confirmation" required="">
                                    <span class="show-pass">
                                        <svg class="view" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            width="24" height="24" color="#ffffff" fill="none">
                                            <path d="M2 8C2 8 6.47715 3 12 3C17.5228 3 22 8 22 8" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round"></path>
                                            <path
                                                d="M21.544 13.045C21.848 13.4713 22 13.6845 22 14C22 14.3155 21.848 14.5287 21.544 14.955C20.1779 16.8706 16.6892 21 12 21C7.31078 21 3.8221 16.8706 2.45604 14.955C2.15201 14.5287 2 14.3155 2 14C2 13.6845 2.15201 13.4713 2.45604 13.045C3.8221 11.1294 7.31078 7 12 7C16.6892 7 20.1779 11.1294 21.544 13.045Z"
                                                stroke="currentColor" stroke-width="1.5"></path>
                                            <path
                                                d="M15 14C15 12.3431 13.6569 11 12 11C10.3431 11 9 12.3431 9 14C9 15.6569 10.3431 17 12 17C13.6569 17 15 15.6569 15 14Z"
                                                stroke="currentColor" stroke-width="1.5"></path>
                                        </svg>
                                        <svg class="hide" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            width="24" height="24" color="#ffffff" fill="none">
                                            <path
                                                d="M19.439 15.439C20.3636 14.5212 21.0775 13.6091 21.544 12.955C21.848 12.5287 22 12.3155 22 12C22 11.6845 21.848 11.4713 21.544 11.045C20.1779 9.12944 16.6892 5 12 5C11.0922 5 10.2294 5.15476 9.41827 5.41827M6.74742 6.74742C4.73118 8.1072 3.24215 9.94266 2.45604 11.045C2.15201 11.4713 2 11.6845 2 12C2 12.3155 2.15201 12.5287 2.45604 12.955C3.8221 14.8706 7.31078 19 12 19C13.9908 19 15.7651 18.2557 17.2526 17.2526"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round"></path>
                                            <path
                                                d="M9.85786 10C9.32783 10.53 9 11.2623 9 12.0711C9 13.6887 10.3113 15 11.9289 15C12.7377 15 13.47 14.6722 14 14.1421"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M3 3L21 21" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </div>
                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>
                        </div>
                    </div>

                    <div class="btm">
                        <button type="submit" class="tf-button style-1">
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
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>
@endpush
