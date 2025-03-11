function initDataTable(selector, ajax, columns, hiddenPrintColumns = []) {

    return $(selector).DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        lengthMenu: [10, 25, 50, 100],
        dom: '<"row mb-3"<"col-md-6"l><"col-md-6"f>>' +
            '<"row"<"col-12"tr>>' +
            '<"row mt-3"<"col-md-5"i><"col-md-7 text-end"B>>' +
            '<"row"<"col-12"p>>',
        buttons: [
            {
                extend: 'excel',
                text: 'تصدير Excel',
                className: 'btn btn-success btn-sm'
            },
            {
                extend: 'pdf',
                text: 'تصدير PDF',
                className: 'btn btn-danger btn-sm'
            },
            {
                extend: 'print',
                text: 'طباعة',
                className: 'btn btn-primary btn-sm',
                customize: function (win) {
                    hiddenPrintColumns.forEach(index => {
                        $(win.document.body).find(
                            `table thead tr th:nth-child(${index}),
                             table tbody tr td:nth-child(${index})`
                        ).hide();
                    });
                }
            }
        ],
        ajax: ajax,
        columns: columns,
        language: {
            url: $('meta[name="datatable-laguage-url"]').attr('content')
        }
    });

}
