function submitForm(that, event, callback = {}) {
    event.preventDefault();

    let form = $(that);
    let formData = new FormData(that);
    let submitButton = form.find('[type="submit"]');
    let defaultButtonText = submitButton.text();

    submitButton.prop('disabled', true).text('جاري المعالجة...');

    let defaultCallbacks = {
        beforeSend: function () {
            Swal.fire({
                title: 'جارٍ المعالجة...',
                text: 'يرجى الانتظار حتى يتم تنفيذ الطلب.',
                showConfirmButton: false,
                allowOutsideClick: false,
                willOpen: () => {
                    Swal.showLoading();
                }
            });
        },
        success: function (response) {
            Swal.fire({
                icon: 'success',
                title: 'تم بنجاح!',
                text: 'تم تنفيذ طلبك بنجاح.',
                confirmButtonText: 'حسنًا'
            }).then(() => {
                if (response.redirect_url) {
                    window.location.href = response.redirect_url;
                }
            });

            submitButton.prop('disabled', false).text(defaultButtonText);
        },
        error: function (xhr) {
            submitButton.prop('disabled', false).text(defaultButtonText);

            Swal.close();

            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;
                let errorMessage = '';

                if (errors) {
                    $('.error-message').remove();

                    $.each(errors, function (key, value) {
                        errorMessage += value[0] + '<br>';
                        $('.error-' + key).text(value[0]);
                        let inputField = $('[name="' + key + '"]');
                        inputField.after('<span class="error-message" style="color: red;">' + value[0] + '</span>');
                    });
                }

                Swal.fire({
                    icon: 'error',
                    title: 'خطأ في الإدخال!',
                    html: errorMessage,
                    confirmButtonText: 'حسنًا'
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'خطأ!',
                    text: 'حدث خطأ أثناء تنفيذ الطلب.',
                    confirmButtonText: 'حاول مرة أخرى'
                });
            }
        }
    };

    let finalCallbacks = {
        beforeSend: callback.beforeSend || defaultCallbacks.beforeSend,
        success: callback.success || defaultCallbacks.success,
        error: callback.error || defaultCallbacks.error
    };

    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        beforeSend: finalCallbacks.beforeSend,
        success: finalCallbacks.success,
        error: finalCallbacks.error
    });
}

function deleteItem(url, tableId, successMessage) {
    Swal.fire({
        title: 'هل أنت متأكد؟',
        text: "لن تتمكن من التراجع عن هذا!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'نعم، احذفه!',
        cancelButtonText: 'إلغاء'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    _method: 'DELETE'
                },
                success: function (response) {
                    console.log('Response:', response);

                    if (response.success) {
                        Swal.fire({
                            title: 'تم الحذف!',
                            text: successMessage,
                            icon: 'success',
                            confirmButtonText: 'موافق'
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: 'خطأ!',
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'موافق'
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.log('Error:', xhr.responseText);

                    Swal.fire({
                        title: 'خطأ!',
                        text: 'حدث خطأ أثناء الحذف. يرجى المحاولة مرة أخرى.',
                        icon: 'error',
                        confirmButtonText: 'موافق'
                    });
                }
            });
        }
    });
}

function toggleStatus(toggleClass, url) {
    $(document).on('change', `${toggleClass}`, function () {
        let itemId = $(this).data('id');
        let newStatus = $(this).prop('checked') ? 'active' : 'inactive';

        $.ajax({
            url: url,
            type: "POST",
            data: {
                id: itemId,
                status: newStatus,
                _token: $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
}
