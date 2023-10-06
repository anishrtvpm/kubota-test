$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // DataTable
    slTable = $('#systemLinksTable').DataTable({
        processing: true,
        serverSide: true,
        serverMethod: 'get',
        bLengthChange: false,
        searching: false,
        iDisplayLength: config.data_table_per_page,
        columnDefs: [
            {
                targets: 0, // Index of the column you want to center-align
                className: 'dt-center' // Apply center alignment class
            }
            // Add more columnDefs as needed for other columns
        ],
        language: {
            paginate: {
                previous: "前へ",
                next: "次へ"
            },
            lengthMenu: "表示 _MENU_ 件",
            info: "全_TOTAL_件中_START_から_END_件を表示",
            zeroRecords: "データがありません",
            sInfoEmpty: "全_TOTAL_件中_START_から_END_件を表示",
            sInfoFiltered: "",
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
            {
                data: 'ja_url',
                "mRender": function (data, type, row) {
                    data = data ? '<a  target="_blank" href="' + data + '" >' + data + '</a>' : '';
                    return data;
                }
            },
            {
                data: 'en_url',
                "mRender": function (data, type, full) {
                    data = data ? '<a  target="_blank" href="' + data + '" >' + data + '</a>' : '';
                    return data;
                }
            },
        ]
    });


    // prevent esc key
    $('#systemLinkModal').modal({
        keyboard: false
    })

    //fetch data for form edit
    $('body').on('click', '.systemLinkBtn', function () {
        let id = $(this).attr('id');
        $.ajax({
            url: '/system_link/edit', // URL to which the request will be sent
            method: 'POST',
            data: { id: id },      // HTTP request method (GET, POST, PUT, DELETE, etc.)
            success: function (response) {
                $('#systemLinkModal').html(response);
                $('#systemLinkModal').modal('show'); // Show the modal
                $('#systemLinkModal').on('shown.bs.modal', function () {
                    $('#category').focus();
                });
            },
        });
    })

});
