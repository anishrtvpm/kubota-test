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
                    return '<a href="edit/' + data + '" id="' + data + '">' + data + '</a>';
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

});