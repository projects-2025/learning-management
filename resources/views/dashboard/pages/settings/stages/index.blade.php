@extends('dashboard.layouts.master')

@push('css')
    <!-- Custom Styling -->
    <style>
        .dataTables_wrapper {
            direction: rtl;
            text-align: center;
        }

        .table {
            border-radius: 10px;
            overflow: hidden;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table thead th {
            background-color: #007bff !important;
            color: white !important;
            text-align: center;
            padding: 12px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }

        .table-hover tbody tr:hover {
            background-color: #d4e3fc;
        }

        .dataTables_paginate {
            margin-top: 10px;
        }

        .dataTables_filter {
            text-align: left !important;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 14px;
        }

        .dt-buttons {
            margin-bottom: 10px;
        }
    </style>
@endpush

@section('page-title')
    لوحة التحكم | ادارة المراحل الدراسية
@endsection

@section('content')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="header-page">
                <div class="title-page">
                    <h3>إدارة المراحل الدراسية</h3>
                    <ul class="breadcrumbs flex items-center flex-wrap justify-start gap6">
                        <li>
                            <a href="{{ route('dashboard.home') }}">
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
                            <div class="text-tiny">إدارة المراحل الدراسية</div>
                        </li>
                    </ul>
                </div>
                <a href="{{ route('dashboard.admins.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> إضافة مشرف
                </a>
            </div>

            <div class="card shadow mt-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">قائمة المراحل الدراسية</h5>
                </div>
                <div class="card-body">
                    <table id="data-table" class="table table-striped table-bordered text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>م</th>
                                <th>اسم المرحلة</th>
                                <th>الحالة</th>
                                <th>الخيارات</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            var ajax = "{{ route('dashboard.stages.index') }}";
            var columns = [{
                    data: 'id',
                    name: 'id',
                    className: 'text-center'
                },
                {
                    data: 'name',
                    name: 'name',
                    className: 'text-end'
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false,
                    className: 'text-center'
                },
                {
                    data: 'options',
                    name: 'options',
                    orderable: false,
                    searchable: false,
                    className: 'text-center'
                }
            ];
            var hiddenPrintColumns = [3,4];

            initDataTable('#data-table', ajax, columns, hiddenPrintColumns);
        });
    </script>

    <script>
        $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            var adminId = $(this).data('id');
            var deleteUrl = "{{ route('dashboard.admins.destroy', ':id') }}".replace(':id', adminId);

            deleteItem(deleteUrl, adminId, 'data-table', 'تم حذف المرحلة بنجاح');
        });
    </script>

    <script>
        $(document).ready(function() {
            toggleStatus('.toggle-status', "{{ route('dashboard.admins.changeStatus') }}");
        });
    </script>
@endpush
