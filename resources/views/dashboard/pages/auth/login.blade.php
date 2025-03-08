@extends('dashboard.layouts.auth')

@push('css')
    <style>
        /* u can write more styles here */
    </style>
@endpush

@section('page-tile')
    لوحة التحكم | تسجيل الدخول
@endsection


@section('content')
    <div class="bg-cars">

        <img class="img-2 w-100"
            src="{{ asset('assets/dashboard/images/logo/logo2.png') }}"
            alt="">
    </div>

    <div class="wrap-login-page">
        <div class="flex-grow flex flex-column gap30">
            <a class="logo-login" href="javascript:;">
                <img src="{{ asset('assets/dashboard/images/logo/logo.png') }}" alt="logo">
            </a>

            <div class="login-box">
                <div class="text-center">
                    <h3>تسجيل الدخول</h3>
                    <div class="body-text">مرحبا بك , برجاء تسجيل الدخول لإدارة اعلانات السيارات</div>
                </div>



            @if (Session::has('success'))
                <li><span class="text text-success">{{ Session::get('success') }}</span></li>
            @endif


                <form class="form-login flex flex-column gap24" method="POST" action="{{ route('dashboard.login_submit') }}">

                    @csrf

                    <fieldset class="email mb-1">
                        <div class="body-title mb-5">البريد الالكتروني </div>
                        <input class="flex-grow @error('email') is-invalid @enderror" type="email"  placeholder="اكتب البريد الالكتروني هنا ..." name="email"
                             value="{{ old('email')}}">
                             @error('email')
                             <li><span class="text text-danger">{{ $message }}</span></li>
                         @enderror
                    </fieldset>

                    <fieldset class="password">
                        <div class="body-title mb-5">كلمة المرور </div>
                        <div class="password-box mb-1 mt-2">
                            <input class="password-input @error('password') is-invalid @enderror" type="password"  placeholder="اكتب كلمة المرور هنا ..."
                                name="password" >
                                @error('password')
                                <li><span class="text text-danger">{{ $message }}</span></li>
                            @enderror

                            <span class="show-pass">
                                <svg class="view" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                    height="24" color="#ffffff" fill="none">
                                    <path d="M2 8C2 8 6.47715 3 12 3C17.5228 3 22 8 22 8" stroke="currentColor"
                                        stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        d="M21.544 13.045C21.848 13.4713 22 13.6845 22 14C22 14.3155 21.848 14.5287 21.544 14.955C20.1779 16.8706 16.6892 21 12 21C7.31078 21 3.8221 16.8706 2.45604 14.955C2.15201 14.5287 2 14.3155 2 14C2 13.6845 2.15201 13.4713 2.45604 13.045C3.8221 11.1294 7.31078 7 12 7C16.6892 7 20.1779 11.1294 21.544 13.045Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                    <path
                                        d="M15 14C15 12.3431 13.6569 11 12 11C10.3431 11 9 12.3431 9 14C9 15.6569 10.3431 17 12 17C13.6569 17 15 15.6569 15 14Z"
                                        stroke="currentColor" stroke-width="1.5" />
                                </svg>
                                <svg class="hide" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                    height="24" color="#ffffff" fill="none">
                                    <path
                                        d="M19.439 15.439C20.3636 14.5212 21.0775 13.6091 21.544 12.955C21.848 12.5287 22 12.3155 22 12C22 11.6845 21.848 11.4713 21.544 11.045C20.1779 9.12944 16.6892 5 12 5C11.0922 5 10.2294 5.15476 9.41827 5.41827M6.74742 6.74742C4.73118 8.1072 3.24215 9.94266 2.45604 11.045C2.15201 11.4713 2 11.6845 2 12C2 12.3155 2.15201 12.5287 2.45604 12.955C3.8221 14.8706 7.31078 19 12 19C13.9908 19 15.7651 18.2557 17.2526 17.2526"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M9.85786 10C9.32783 10.53 9 11.2623 9 12.0711C9 13.6887 10.3113 15 11.9289 15C12.7377 15 13.47 14.6722 14 14.1421"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                    <path d="M3 3L21 21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </span>

                        </div>
                    </fieldset>
                    @if (Session::has('error'))
                    <li><span class="text text-danger">{{ Session::get('error') }}</span></li>
                @endif
                    <button type="submit" class="tf-button w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                            color="#ffffff" fill="none">
                            <path d="M12 16.5V14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path
                                d="M4.26781 18.8447C4.49269 20.515 5.87613 21.8235 7.55966 21.9009C8.97627 21.966 10.4153 22 12 22C13.5847 22 15.0237 21.966 16.4403 21.9009C18.1239 21.8235 19.5073 20.515 19.7322 18.8447C19.879 17.7547 20 16.6376 20 15.5C20 14.3624 19.879 13.2453 19.7322 12.1553C19.5073 10.485 18.1239 9.17649 16.4403 9.09909C15.0237 9.03397 13.5847 9 12 9C10.4153 9 8.97627 9.03397 7.55966 9.09909C5.87613 9.17649 4.49269 10.485 4.26781 12.1553C4.12104 13.2453 4 14.3624 4 15.5C4 16.6376 4.12104 17.7547 4.26781 18.8447Z"
                                stroke="currentColor" stroke-width="1.5" />
                            <path d="M7.5 9V6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5V9"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        تسجيل الدخول
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                            color="#ffffff" fill="none">
                            <path d="M15 6C15 6 9.00001 10.4189 9 12C8.99999 13.5812 15 18 15 18" stroke="currentColor"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </form>
            </div>

        </div>

    </div>
@endsection


@push('js')
    <script>
        // u can write more scripts here
    </script>
@endpush
