$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // DataTable
    faqCatTable =$('#faqCategoryTable').DataTable({
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
            url: '/faq_category/get',
        },
        columns: [
            {
                data: 'category_id',
                "mRender": function (data, type, full) {
                    return '<a class="faqCategoryBtn" href="javascript:void(0)"  id="' + data + '">' + data + '</a>';
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


        // prevent esc key
    $('#faqCategoryModal').modal({
        keyboard: false
    })

    //fetch data for form edit
    $('body').on('click', '.faqCategoryBtn', function () {
        let id = $(this).attr('id');
        $.ajax({
            url: '/faq_category/edit', // URL to which the request will be sent
            method: 'POST',
            data: { id: id },      // HTTP request method (GET, POST, PUT, DELETE, etc.)
            success: function (response) {
                $('#faqCategoryModal').html(response);
                $('#faqCategoryModal').modal('show'); // Show the modal
            },
        });
    })

});