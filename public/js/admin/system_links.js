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
        ajax: {
            url: '/system_link/get',
        },
        columns: [
            {
                data: 'system_id',
                "mRender": function (data, type, full) {
                    return '<a class="systemLinkEdit" href="javascript:void(0)"  id="' + data + '">' + data + '</a>';
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

    $('body').on('click', '.systemLinkEdit', function () {
        let id = $(this).attr('id');
        $.ajax({
            url: '/system_link/edit', // URL to which the request will be sent
            method: 'POST',     
            data: { id: id },      // HTTP request method (GET, POST, PUT, DELETE, etc.)
            success: function(response) {
                $('#systemLinkModal').html(response);
                $('#systemLinkModal').modal('show'); // Show the modal
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    })

});
$.validator.addMethod("urlCheck", function (value) {
    return isValidUrl(value);
});

$('#systeLinkForm').validate({
    // errorLabelContainer: "#errorMessages",
    rules: {
        category: {
            required: true,
        },
        sort: {
            required: true,
        },
        ja_system_name: {
            required: true,
        },
        en_system_name: {
            required: true,
        },
        ja_url: {
            urlCheck: true,
        },
        en_url: {
            urlCheck: true,
        },
    },
    messages: {
        url: {
            urlCheck: 'invalid url',
        },
    },

    submitHandler: function (form) {
        $('#submitBtn').attr('disabled', 'disabled');
        form.submit();
    },
});