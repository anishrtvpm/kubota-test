$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // DataTable
    faqCatTable =$('#faqListTable').DataTable({
        processing: true,
        serverSide: true,
        serverMethod: 'get',
        responsive: true,
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
        },
        order: [
            [config.data_table_starting_column_index, config.data_table_starting_column_index_order]
        ],
        ajax: {
            url: '/faq_list/get',
        },
        columns: [
            {
                data: 'faq_id',
                "mRender": function (data, type, full) {
                    return '<a class="" href=""  id="' + data + '">' + data + '</a>';
                }
            },
            { data: 'category_id' },
            { data: 'top_category_ja_name' },
            { data: 'top_categosub_category_ja_namery_en_name' },
            { data: 'sub_category_en_name' },
            { data: 'sort' },
            { data: 'title' },
            {
                data: 'status',
                "mRender": function (data, type, full) {
                    return data == 1 ? '公開 ' : '非公開';
                }
            }
        ]
    });    

});