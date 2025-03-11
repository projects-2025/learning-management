@extends('dashboard.layouts.master')

@push('css')
    <style>
        /* Flexbox for Stage Container */
        .stage-container {
            display: flex;
            align-items: center;
            gap: 10px;
            /* Space between select and button */
            margin-bottom: 10px;
        }

        /* Fix Select Input Width */
        .stage-select {
            width: 300px;
            /* Fixed width */
            max-width: 100%;
            /* Ensures it doesn’t exceed container width */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        /* Ensure dynamically added selects have the same size */
        #stages-container select {
            width: 300px !important;
            /* Ensures all select elements stay the same size */
        }

        /* Divider Styling */
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 30px 0;
            font-size: 18px;
            font-weight: bold;
            color: #444;
            position: relative;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 2px solid #ddd;
            margin: 0 10px;
        }

        /* Centered Divider Text */
        .divider span {
            background: #fff;
            padding: 0 15px;
        }

        /* Form Styling */
        fieldset {
            display: flex;
            flex-direction: column;
            gap: 6px;
            /* Adds spacing between label and input */
            margin-bottom: 15px;
        }

        fieldset label {
            font-weight: bold;
            color: #333;
            font-size: 14px;
        }

        fieldset input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            transition: 0.3s;
        }

        fieldset input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
            outline: none;
        }

        /* Improved Buttons */
        .tf-button.style-1 {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            text-align: center;
            font-weight: bold;
        }

        /* Save Button */
        button[type="submit"] {
            background: #007bff;
            color: white;
            width: 100%;
            max-width: 200px;
            margin: 20px auto;
            display: block;
        }

        button[type="submit"]:hover {
            background: #0056b3;
        }

        /* Add Stage Button */
        #add-stage {
            background: #28a745;
            color: white;
            display: block;
            margin: 10px auto;
            font-size: 14px;
        }

        #add-stage:hover {
            background: #218838;
        }

        /* Remove Button Styling */
        .remove-stage {
            background: #dc3545;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 14px;
            border: none;
            cursor: pointer;
            transition: 0.3s;
        }

        .remove-stage:hover {
            background: #c82333;
        }
    </style>
@endpush

@section('page-title')
    لوحة التحكم | اضافة معهد
@endsection

@section('content')
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="header-page">
                <div class="title-page">
                    <h3>اضافة معهد</h3>
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
                            <a href="{{ route('dashboard.institutions.index') }}">
                                <div class="text-tiny">ادارة المعاهد</div>
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
                            <div class="text-tiny">اضافة معهد</div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="wg-box">
                <form action="{{ route('dashboard.institutions.store') }}" method="POST" id="addInstitutionForm">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <fieldset>
                                <label>الاسم</label>
                                <input type="text" name="name" required>
                            </fieldset>
                        </div>
                        <div class="col-6">
                            <fieldset>
                                <label>العنوان</label>
                                <input type="text" name="address" required>
                            </fieldset>
                        </div>
                        <div class="col-6">
                            <fieldset>
                                <label>الجوال</label>
                                <input type="text" name="phone" required>
                            </fieldset>
                        </div>
                        <div class="col-6">
                            <fieldset>
                                <label>الايميل (اختياري)</label>
                                <input type="email" name="email">
                            </fieldset>
                        </div>
                        <div class="col-6">
                            <fieldset>
                                <label>الموقع الالكتروني (اختياري)</label>
                                <input type="url" name="website">
                            </fieldset>
                        </div>
                    </div>
                    <div class="divider"><span>المراحل الدراسية (<span id="stage-count">1</span>)</span></div>
                    <div id="stages-container">
                        <div class="stage-container">
                            <select name="stages[]" class="stage-select" required>
                                @isset($stages)
                                    @foreach ($stages as $stage)
                                        <option value="{{ $stage->id }}">{{ $stage->name }}</option>
                                    @endforeach
                                @endisset
                            </select>
                            <button type="button" class="remove-stage" disabled>−</button>
                        </div>
                    </div>
                    <button type="button" id="add-stage" class="tf-button add-stage">+</button>
                    <br>
                    <button type="submit" class="tf-button save-button">حفظ</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        document.getElementById('add-stage').addEventListener('click', function() {
            let container = document.getElementById('stages-container');
            let selectedStages = Array.from(document.querySelectorAll('select[name="stages[]"]'))
                .map(select => select.value);

            let availableStages = @json($stages).filter(stage => !selectedStages.includes(stage.id
                .toString()));

            if (availableStages.length === 0) {
                alert('لا توجد مراحل دراسية أخرى لإضافتها.');
                return;
            }

            let newDiv = document.createElement('div');
            newDiv.classList.add('stage-container');
            newDiv.innerHTML = `
        <select name="stages[]" required>
            ${availableStages.map(stage => `<option value="${stage.id}">${stage.name}</option>`).join('')}
        </select>
        <button type="button" class="remove-stage">-</button>`;
            container.appendChild(newDiv);
            updateStageCount();
            updateRemoveButtons();
        });

        document.getElementById('stages-container').addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-stage')) {
                e.target.parentElement.remove();
                updateStageCount();
                updateRemoveButtons();
            }
        });

        function updateStageCount() {
            document.getElementById('stage-count').textContent = document.querySelectorAll('select[name="stages[]"]')
            .length;
        }

        function updateRemoveButtons() {
            let buttons = document.querySelectorAll('.remove-stage');
            buttons.forEach(btn => btn.disabled = buttons.length === 1);
        }

        updateStageCount();
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#addInstitutionForm').on('submit', function(e) {
                const callback = {
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'تم بنجاح!',
                            text: 'تمت إضافة المعهد الجديد بنجاح.',
                            confirmButtonText: 'حسنًا'
                        }).then((result) => {
                            if (result.isConfirmed && response.redirect_url) {
                                window.location.href = response.redirect_url;
                            }
                        });
                    }
                };
                submitForm(this, e, callback);
            });

        });
    </script>
@endpush
