@extends('dashboard.layouts.master')

@push('css')
    <style>
        /* here write more styles */
    </style>
@endpush

@section('page-tile')
لوحة التحكم | الرئيسية
@endsection

@section('content')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="tf-section-4 mb-30">
                <div class="wg-chart-default">
                    <div class="flex items-center gap14">
                        <div class="image">
                            <svg class="shape" xmlns="http://www.w3.org/2000/svg" width="48" height="52"
                                viewBox="0 0 48 52" fill="none">
                                <path
                                    d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                    fill="#22C55E" />
                            </svg>
                            <svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                height="24" color="#ffffff" fill="none">
                                <path d="M2.5 12L4.5 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M21.5 12.5L19.5 13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M8 17.5L8.24567 16.8858C8.61101 15.9725 8.79368 15.5158 9.17461 15.2579C9.55553 15 10.0474 15 11.0311 15H12.9689C13.9526 15 14.4445 15 14.8254 15.2579C15.2063 15.5158 15.389 15.9725 15.7543 16.8858L16 17.5"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path
                                    d="M2 17V19.882C2 20.2607 2.24075 20.607 2.62188 20.7764C2.86918 20.8863 3.10538 21 3.39058 21H5.10942C5.39462 21 5.63082 20.8863 5.87812 20.7764C6.25925 20.607 6.5 20.2607 6.5 19.882V18"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path
                                    d="M17.5 18V19.882C17.5 20.2607 17.7408 20.607 18.1219 20.7764C18.3692 20.8863 18.6054 21 18.8906 21H20.6094C20.8946 21 21.1308 20.8863 21.3781 20.7764C21.7592 20.607 22 20.2607 22 19.882V17"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <path d="M20 8.5L21 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path d="M4 8.5L3 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M4.5 9L5.5883 5.73509C6.02832 4.41505 6.24832 3.75503 6.7721 3.37752C7.29587 3 7.99159 3 9.38304 3H14.617C16.0084 3 16.7041 3 17.2279 3.37752C17.7517 3.75503 17.9717 4.41505 18.4117 5.73509L19.5 9"
                                    stroke="currentColor" stroke-width="1.5" stroke-linejoin="round">
                                </path>
                                <path
                                    d="M4.5 9H19.5C20.4572 10.0135 22 11.4249 22 12.9996V16.4702C22 17.0407 21.6205 17.5208 21.1168 17.5875L18 18H6L2.88316 17.5875C2.37955 17.5208 2 17.0407 2 16.4702V12.9996C2 11.4249 3.54279 10.0135 4.5 9Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linejoin="round">
                                </path>
                            </svg>
                        </div>
                        <div class="w-100">
                            <div class="body-text mb-6">اعلانات السيارات</div>
                            <div class="flex items-center gap16">
                                <h4>54</h4>
                                <div class="box-icon-trending up">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                        height="24" color="#ffffff" fill="none">
                                        <path d="M20 13V8H15" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M20 8L15 13C14.1174 13.8826 13.6762 14.3238 13.1346 14.3726C13.045 14.3807 12.955 14.3807 12.8654 14.3726C12.3238 14.3238 11.8826 13.8826 11 13C10.1174 12.1174 9.67615 11.6762 9.13457 11.6274C9.04504 11.6193 8.95496 11.6193 8.86543 11.6274C8.32385 11.6762 7.88256 12.1174 7 13L4 16"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <div class="body-title number">1.56%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wg-chart-default">
                    <div class="flex items-center gap14">
                        <div class="image">
                            <svg class="shape" xmlns="http://www.w3.org/2000/svg" width="48" height="52"
                                viewBox="0 0 48 52" fill="none">
                                <path
                                    d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                    fill="#22C55E" />
                            </svg>
                            <svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                height="24" color="#ffffff" fill="none">
                                <path
                                    d="M4 17.9808V9.70753C4 6.07416 4 4.25748 5.17157 3.12874C6.34315 2 8.22876 2 12 2C15.7712 2 17.6569 2 18.8284 3.12874C20 4.25748 20 6.07416 20 9.70753V17.9808C20 20.2867 20 21.4396 19.2272 21.8523C17.7305 22.6514 14.9232 19.9852 13.59 19.1824C12.8168 18.7168 12.4302 18.484 12 18.484C11.5698 18.484 11.1832 18.7168 10.41 19.1824C9.0768 19.9852 6.26947 22.6514 4.77285 21.8523C4 21.4396 4 20.2867 4 17.9808Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                        </div>
                        <div class="w-100">
                            <div class="body-text mb-6">اعلانات اللوحات المعدنية</div>
                            <div class="flex items-center gap16">
                                <h4>22</h4>
                                <div class="box-icon-trending down">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                        height="24" color="#ffffff" fill="none">
                                        <path d="M20 13V8H15" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M20 8L15 13C14.1174 13.8826 13.6762 14.3238 13.1346 14.3726C13.045 14.3807 12.955 14.3807 12.8654 14.3726C12.3238 14.3238 11.8826 13.8826 11 13C10.1174 12.1174 9.67615 11.6762 9.13457 11.6274C9.04504 11.6193 8.95496 11.6193 8.86543 11.6274C8.32385 11.6762 7.88256 12.1174 7 13L4 16"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <div class="body-title number">1.56%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wg-chart-default">
                    <div class="flex items-center gap14">
                        <div class="image">
                            <svg class="shape" xmlns="http://www.w3.org/2000/svg" width="48" height="52"
                                viewBox="0 0 48 52" fill="none">
                                <path
                                    d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                    fill="#22C55E" />
                            </svg>
                            <svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                height="24" color="#ffffff" fill="none">
                                <path
                                    d="M16 14C16 14.8284 16.6716 15.5 17.5 15.5C18.3284 15.5 19 14.8284 19 14C19 13.1716 18.3284 12.5 17.5 12.5C16.6716 12.5 16 13.1716 16 14Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                                <path
                                    d="M18.9 8C18.9656 7.67689 19 7.34247 19 7C19 4.23858 16.7614 2 14 2C11.2386 2 9 4.23858 9 7C9 7.34247 9.03443 7.67689 9.10002 8"
                                    stroke="currentColor" stroke-width="1.5"></path>
                                <path
                                    d="M7 7.99324H16C18.8284 7.99324 20.2426 7.99324 21.1213 8.87234C22 9.75145 22 11.1663 22 13.9961V15.9971C22 18.8269 22 20.2418 21.1213 21.1209C20.2426 22 18.8284 22 16 22H10C6.22876 22 4.34315 22 3.17157 20.8279C2 19.6557 2 17.7692 2 13.9961V11.9952C2 8.22211 2 6.33558 3.17157 5.16344C4.11466 4.2199 5.52043 4.03589 8 4H10"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                </path>
                            </svg>
                        </div>
                        <div class="w-100">
                            <div class="body-text mb-6">طلبات سيارات سعر محدد</div>
                            <div class="flex items-center gap16">
                                <h4>12</h4>
                                <div class="box-icon-trending">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                        height="24" color="#ffffff" fill="none">
                                        <path d="M20 13V8H15" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M20 8L15 13C14.1174 13.8826 13.6762 14.3238 13.1346 14.3726C13.045 14.3807 12.955 14.3807 12.8654 14.3726C12.3238 14.3238 11.8826 13.8826 11 13C10.1174 12.1174 9.67615 11.6762 9.13457 11.6274C9.04504 11.6193 8.95496 11.6193 8.86543 11.6274C8.32385 11.6762 7.88256 12.1174 7 13L4 16"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <div class="body-title number">0.00%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wg-chart-default">
                    <div class="flex items-center gap14">
                        <div class="image">
                            <svg class="shape" xmlns="http://www.w3.org/2000/svg" width="48" height="52"
                                viewBox="0 0 48 52" fill="none">
                                <path
                                    d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                    fill="#22C55E" />
                            </svg>
                            <svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                height="24" color="#ffffff" fill="none">
                                <path
                                    d="M12 14.0059L5.84373 21.2328C5.01764 22.2026 3.54001 22.2616 2.63922 21.3608C1.73843 20.46 1.79744 18.9824 2.7672 18.1563L9.99412 12"
                                    stroke="currentColor" stroke-width="1.5" stroke-linejoin="round">
                                </path>
                                <path
                                    d="M22 11.9048L15.9048 18M12.0952 2L6 8.09524M11.3334 2.76186L6.76195 7.33329C6.76195 7.33329 9.04766 10.3809 11.3334 12.6666C13.6191 14.9523 16.6667 17.2381 16.6667 17.2381L21.2381 12.6666C21.2381 12.6666 18.9524 9.61901 16.6667 7.33329C14.381 5.04758 11.3334 2.76186 11.3334 2.76186Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <div class="w-100">
                            <div class="body-text mb-6">طلبات سيارات بنظام السوم</div>
                            <div class="flex items-center gap16">
                                <h4>5</h4>
                                <div class="box-icon-trending up">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                        height="24" color="#ffffff" fill="none">
                                        <path d="M20 13V8H15" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M20 8L15 13C14.1174 13.8826 13.6762 14.3238 13.1346 14.3726C13.045 14.3807 12.955 14.3807 12.8654 14.3726C12.3238 14.3238 11.8826 13.8826 11 13C10.1174 12.1174 9.67615 11.6762 9.13457 11.6274C9.04504 11.6193 8.95496 11.6193 8.86543 11.6274C8.32385 11.6762 7.88256 12.1174 7 13L4 16"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <div class="body-title number">1.56%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wg-chart-default">
                    <div class="flex items-center gap14">
                        <div class="image">
                            <svg class="shape" xmlns="http://www.w3.org/2000/svg" width="48" height="52"
                                viewBox="0 0 48 52" fill="none">
                                <path
                                    d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                    fill="#22C55E" />
                            </svg>
                            <svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                height="24" color="#ffffff" fill="none">
                                <path
                                    d="M20.9427 16.8354C20.2864 12.8866 18.2432 9.94613 16.467 8.219C15.9501 7.71642 15.6917 7.46513 15.1208 7.23257C14.5499 7 14.0592 7 13.0778 7H10.9222C9.94081 7 9.4501 7 8.87922 7.23257C8.30834 7.46513 8.04991 7.71642 7.53304 8.219C5.75682 9.94613 3.71361 12.8866 3.05727 16.8354C2.56893 19.7734 5.27927 22 8.30832 22H15.6917C18.7207 22 21.4311 19.7734 20.9427 16.8354Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path
                                    d="M7.25662 4.44287C7.05031 4.14258 6.75128 3.73499 7.36899 3.64205C8.00392 3.54651 8.66321 3.98114 9.30855 3.97221C9.89237 3.96413 10.1898 3.70519 10.5089 3.33548C10.8449 2.94617 11.3652 2 12 2C12.6348 2 13.1551 2.94617 13.4911 3.33548C13.8102 3.70519 14.1076 3.96413 14.6914 3.97221C15.3368 3.98114 15.9961 3.54651 16.631 3.64205C17.2487 3.73499 16.9497 4.14258 16.7434 4.44287L15.8105 5.80064C15.4115 6.38146 15.212 6.67187 14.7944 6.83594C14.3769 7 13.8373 7 12.7582 7H11.2418C10.1627 7 9.6231 7 9.20556 6.83594C8.78802 6.67187 8.5885 6.38146 8.18945 5.80064L7.25662 4.44287Z"
                                    stroke="currentColor" stroke-width="1.5" />
                            </svg>
                        </div>
                        <div class="w-100">
                            <div class="body-text mb-6">طلبات لوحات بسعر محدد</div>
                            <div class="flex items-center gap16">
                                <h4>8</h4>
                                <div class="box-icon-trending down">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                        height="24" color="#ffffff" fill="none">
                                        <path d="M20 13V8H15" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M20 8L15 13C14.1174 13.8826 13.6762 14.3238 13.1346 14.3726C13.045 14.3807 12.955 14.3807 12.8654 14.3726C12.3238 14.3238 11.8826 13.8826 11 13C10.1174 12.1174 9.67615 11.6762 9.13457 11.6274C9.04504 11.6193 8.95496 11.6193 8.86543 11.6274C8.32385 11.6762 7.88256 12.1174 7 13L4 16"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <div class="body-title number">1.56%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wg-chart-default">
                    <div class="flex items-center gap14">
                        <div class="image">
                            <svg class="shape" xmlns="http://www.w3.org/2000/svg" width="48" height="52"
                                viewBox="0 0 48 52" fill="none">
                                <path
                                    d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                    fill="#22C55E" />
                            </svg>
                            <svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                height="24" color="#ffffff" fill="none">
                                <path
                                    d="M12 14.0059L5.84373 21.2328C5.01764 22.2026 3.54001 22.2616 2.63922 21.3608C1.73843 20.46 1.79744 18.9824 2.7672 18.1563L9.99412 12"
                                    stroke="currentColor" stroke-width="1.5" stroke-linejoin="round">
                                </path>
                                <path
                                    d="M22 11.9048L15.9048 18M12.0952 2L6 8.09524M11.3334 2.76186L6.76195 7.33329C6.76195 7.33329 9.04766 10.3809 11.3334 12.6666C13.6191 14.9523 16.6667 17.2381 16.6667 17.2381L21.2381 12.6666C21.2381 12.6666 18.9524 9.61901 16.6667 7.33329C14.381 5.04758 11.3334 2.76186 11.3334 2.76186Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <div class="w-100">
                            <div class="body-text mb-6">طلبات لوحات بنظام السوم</div>
                            <div class="flex items-center gap16">
                                <h4>4</h4>
                                <div class="box-icon-trending up">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                        height="24" color="#ffffff" fill="none">
                                        <path d="M20 13V8H15" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M20 8L15 13C14.1174 13.8826 13.6762 14.3238 13.1346 14.3726C13.045 14.3807 12.955 14.3807 12.8654 14.3726C12.3238 14.3238 11.8826 13.8826 11 13C10.1174 12.1174 9.67615 11.6762 9.13457 11.6274C9.04504 11.6193 8.95496 11.6193 8.86543 11.6274C8.32385 11.6762 7.88256 12.1174 7 13L4 16"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <div class="body-title number">1.56%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wg-chart-default">
                    <div class="flex items-center gap14">
                        <div class="image">
                            <svg class="shape" xmlns="http://www.w3.org/2000/svg" width="48" height="52"
                                viewBox="0 0 48 52" fill="none">
                                <path
                                    d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                    fill="#22C55E" />
                            </svg>
                            <svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                height="24" color="#ffffff" fill="none">
                                <path
                                    d="M22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                                <path
                                    d="M12.8638 7.72209L13.7437 9.49644C13.8637 9.74344 14.1837 9.98035 14.4536 10.0257L16.0485 10.2929C17.0684 10.4643 17.3083 11.2103 16.5734 11.9462L15.3335 13.1964C15.1236 13.4081 15.0086 13.8164 15.0736 14.1087L15.4285 15.6562C15.7085 16.8812 15.0636 17.355 13.9887 16.7148L12.4939 15.8226C12.2239 15.6613 11.7789 15.6613 11.504 15.8226L10.0091 16.7148C8.93925 17.355 8.28932 16.8761 8.56929 15.6562L8.92425 14.1087C8.98925 13.8164 8.87426 13.4081 8.66428 13.1964L7.42442 11.9462C6.6945 11.2103 6.92947 10.4643 7.94936 10.2929L9.54419 10.0257C9.80916 9.98035 10.1291 9.74344 10.2491 9.49644L11.129 7.72209C11.609 6.7593 12.3889 6.7593 12.8638 7.72209Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <div class="w-100">
                            <div class="body-text mb-6">عضوية مميزة</div>
                            <div class="flex items-center gap16">
                                <h4>32</h4>
                                <div class="box-icon-trending down">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                        height="24" color="#ffffff" fill="none">
                                        <path d="M20 13V8H15" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M20 8L15 13C14.1174 13.8826 13.6762 14.3238 13.1346 14.3726C13.045 14.3807 12.955 14.3807 12.8654 14.3726C12.3238 14.3238 11.8826 13.8826 11 13C10.1174 12.1174 9.67615 11.6762 9.13457 11.6274C9.04504 11.6193 8.95496 11.6193 8.86543 11.6274C8.32385 11.6762 7.88256 12.1174 7 13L4 16"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <div class="body-title number">0.00%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="wg-chart-default">
                    <div class="flex items-center gap14">
                        <div class="image">
                            <svg class="shape" xmlns="http://www.w3.org/2000/svg" width="48" height="52"
                                viewBox="0 0 48 52" fill="none">
                                <path
                                    d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                    fill="#22C55E" />
                            </svg>
                            <svg class="icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                height="24" color="#ffffff" fill="none">
                                <path
                                    d="M6.57757 15.4816C5.1628 16.324 1.45336 18.0441 3.71266 20.1966C4.81631 21.248 6.04549 22 7.59087 22H16.4091C17.9545 22 19.1837 21.248 20.2873 20.1966C22.5466 18.0441 18.8372 16.324 17.4224 15.4816C14.1048 13.5061 9.89519 13.5061 6.57757 15.4816Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z"
                                    stroke="currentColor" stroke-width="1.5" />
                            </svg>
                        </div>
                        <div class="w-100">
                            <div class="body-text mb-6">عضوية عادية</div>
                            <div class="flex items-center gap16">
                                <h4>103</h4>
                                <div class="box-icon-trending up">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                        height="24" color="#ffffff" fill="none">
                                        <path d="M20 13V8H15" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M20 8L15 13C14.1174 13.8826 13.6762 14.3238 13.1346 14.3726C13.045 14.3807 12.955 14.3807 12.8654 14.3726C12.3238 14.3238 11.8826 13.8826 11 13C10.1174 12.1174 9.67615 11.6762 9.13457 11.6274C9.04504 11.6193 8.95496 11.6193 8.86543 11.6274C8.32385 11.6762 7.88256 12.1174 7 13L4 16"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                    <div class="body-title number">1.56%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tf-section-2">
                <div class="wg-box m-0">
                    <h5 class="title-chart">المناطق الأكثر اضافة للإعلانات</h5>
                    <div id="chart1" class="chart"></div>
                </div>
                <div class="wg-box m-0">
                    <h5 class="title-chart">المستخدمين الأكثر نشاطا</h5>
                    <div id="chart2" class="chart"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        var chartDom = document.getElementById('chart1');
        var myChart = echarts.init(chartDom, null, {
            renderer: 'svg'
        });
        var option;
        option = {
            tooltip: {
                trigger: 'item',
                axisPointer: {
                    type: 'shadow'
                },
                textStyle: {
                    fontFamily: 'Baloo Bhaijaan 2',
                    fontSize: '16'
                }
            },
            grid: {
                top: "9%",
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: [{
                data: ['مكة', 'الرياض', 'الطائف', 'جدة', 'الدمام'],
                axisLabel: {
                    textStyle: {
                        fontFamily: 'Baloo Bhaijaan 2',
                        fontSize: '15'
                    }
                }
            }],
            yAxis: [{
                type: 'value'
            }],
            series: [{
                name: 'عدد الإعلانات',
                type: 'bar',
                itemStyle: {
                    borderRadius: [20, 20, 0, 0]
                },
                barWidth: '25%',
                data: [{
                        value: 19,
                        itemStyle: {
                            color: '#69F0AE'
                        }
                    },
                    {
                        value: 38,
                        itemStyle: {
                            color: '#FFAB40'
                        }
                    },
                    {
                        value: 25,
                        itemStyle: {
                            color: '#41C4FF'
                        }
                    },
                    {
                        value: 33,
                        itemStyle: {
                            color: '#536DFE'
                        }
                    },
                    {
                        value: 22,
                        itemStyle: {
                            color: '#FF4081'
                        }
                    },
                    {
                        value: 30,
                        itemStyle: {
                            color: '#26A69A'
                        }
                    }
                ]
            }]
        };
        option && myChart.setOption(option);
    </script>

    <script>
        var chartDom = document.getElementById('chart2');
        var myChart = echarts.init(chartDom, null, {
            renderer: 'svg'
        });
        var option;
        option = {
            grid: {
                top: "3%",
                left: '3%',
                right: '3%',
                bottom: '3%',
            },
            tooltip: {
                trigger: 'item',
                textStyle: {
                    fontFamily: 'Baloo Bhaijaan 2',
                    fontSize: '16'
                }
            },
            series: [{
                name: '',
                type: 'pie',
                radius: ['40%', '70%'],
                itemStyle: {
                    borderRadius: 8,
                    borderColor: '#fff',
                    borderWidth: 4,
                },
                label: {
                    show: false,
                },
                labelLine: {
                    show: false
                },
                data: [{
                        value: 10,
                        name: 'محمد احمد'
                    },
                    {
                        value: 12,
                        name: 'مصطفي النجار'
                    },
                    {
                        value: 14,
                        name: 'عبدالرحمن محمد'
                    },
                    {
                        value: 16,
                        name: 'صلاح هشام'
                    },
                    {
                        value: 18,
                        name: 'محمد الدرج'
                    }
                ]
            }]
        };

        option && myChart.setOption(option);
    </script>
@endpush
