$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // DataTable
    $('#systemLinksTable').DataTable({
        processing: true,
        serverSide: true,
        serverMethod: 'post',
        responsive: true,
        bLengthChange: false,
        searching: false,
        iDisplayLength: config.data_table_per_page,
        language: {
            paginate: {
                previous: "前へ",
                next: "次へ"
            },
            lengthMenu: "表示 _MENU_ 件",
            info: "全_TOTAL_件中_START_から_END_件を表示",
            zeroRecords: "データがありません",
            sInfoEmpty: "全_TOTAL_件中_START_から_END_件を表示",
        },
        order: [
            [config.data_table_starting_column_index, config.data_table_starting_column_index_order]
        ],
        ajax: {
            url: '/system_link/get',
        },
        columns: [
            {
                data: 'system_id',
                "mRender": function (data, type, full) {
                    return '<a class="systemLinkBtn" href="javascript:void(0)"  id="' + data + '">' + data + '</a>';
                }
            },
            { data: 'category_id' },
            { data: 'sort' },
            { data: 'ja_system_name' },
            { data: 'en_system_name' },
            { data: 'ja_url' },
            { data: 'en_url' },
        ]
    });

    $('body').on('click', '.systemLinkBtn', function () {
        let id = $(this).attr('id');
        $.ajax({
            url: '/system_link/edit', // URL to which the request will be sent
            method: 'POST',
            data: { id: id },      // HTTP request method (GET, POST, PUT, DELETE, etc.)
            success: function (response) {
                $('#systemLinkModal').html(response);
                $('#systemLinkModal').modal('show'); // Show the modal
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    })

});
$.validator.addMethod("urlCheck", function (value) {
    return isValidUrl(value);
});

$('#systeLinkForm').validate({
    rules: {
        category: {
            required: true,
        },
        sort: {
            required: true,
            maxlength: 3,
        },
        ja_system_name: {
            required: true,
            maxlength: 100,
        },
        en_system_name: {
            required: true,
            maxlength: 100,
        },
        ja_url: {
            urlCheck: true,
            maxlength: 8000,
        },
        en_url: {
            urlCheck: true,
            maxlength: 8000,
        },
    },
    messages: {
        category: {
            required: translations.category_required,
        },
        sort: {
            required: translations.sort_required,
            maxlength: translations.sort_max_length,
        },
        ja_system_name: {
            required: translations.jp_system_name_required,
            maxlength: translations.jp_system_name_max_length,
        },
        en_system_name: {
            required: translations.en_system_name_required,
            maxlength: translations.en_system_name_max_length,
        },
        ja_url: {
            urlCheck: translations.url_invalid,
            maxlength: translations.url_jp_max_length,
        },
        en_url: {
            urlCheck: translations.url_invalid,
            maxlength: translations.url_en_max_length,
        },
    },

    submitHandler: function (form) {
        $('#submitBtn').attr('disabled', 'disabled');
        form.submit();
    },
});