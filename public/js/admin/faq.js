$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // DataTable
    $('#faqCategoryTable').DataTable({
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
            url: '/faq/get_all_categories',
        },
        columns: [
            {
                data: 'category_id',
                "mRender": function (data, type, full) {
                    return '<a href="edit/' + data + '" id="' + data + '">' + data + '</a>';
                }
            },
            { data: 'top_category_ja_name' },
            { data: 'sub_category_ja_name' },
            { data: 'top_category_en_name' },
            { data: 'sub_category_en_name' },
            { data: 'sort' },
            {
                data: 'status',
                "mRender": function (data, type, full) {
                    return data == 1 ? '公開 ' : '非公開';
                }
            },
            { data: 'mail_form_id' }
        ]
    });

});