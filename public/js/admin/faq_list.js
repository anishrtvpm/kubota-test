
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let inlineFormSelectLanguage = '';
    let inputkeyword = '';
    let inlineFormSelectCatParent = '';
    let inlineFormSelectCatChild = '';
    let inlineFormStatus = '';
    

    // DataTable
    faqAdminList =$('#faqListTable').DataTable({
        processing: true,
        serverSide: true,
        serverMethod: 'get',
        responsive: true,
        bLengthChange: false,
        searching: false,
        //iDisplayLength: 2,        
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
            infoFiltered: ""
        },
        order: [
            [config.data_table_starting_column_index, config.data_table_starting_column_index_order]
        ],
        ajax: {
            url: '/faq_data/get',
            data: function (data) {
                data.inlineFormSelectLanguage = inlineFormSelectLanguage;
                data.inputkeyword = inputkeyword;
                data.inlineFormSelectCatParent = inlineFormSelectCatParent;
                data.inlineFormSelectCatChild = inlineFormSelectCatChild;
                data.inlineFormStatus = inlineFormStatus;
                
            }
            
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
            { data: 'sub_category_ja_name' },
            { data: 'sort' },
            { data: 'title' },
            {
                data: 'status',
                "mRender": function (data, type, full) {
                    return data == 1 ? '公開 ' : '非公開';
                }
            },
            { data: 'question_date' },
            { data: 'answer_date' },
            { data: 'responder' }
        ]
    });  
    $('#faqListTable_info').detach().appendTo('#targetInfo');
    $('#faqListTable_paginate').detach().appendTo('#targetPagination');  

    // Loading sub category based on the top category in filters
    $(document).on('change','.top_category',function(){
        let top_category_id=$(this).val();
        $.ajax({
            url: '/faq/get_sub_categories?lang='+config.language_japanese+'&top_category_id=' + top_category_id,
            type: 'GET',
            success: function (response) {               
                $('.sub_category').html(response);
            }
        });
    });

    // Filters
    $('#searchInput').bind("click", function () {       
        inputkeyword = $('#input-keyword').val().toLowerCase();
        inlineFormSelectCatParent = $('#inlineFormSelectCatParent option:selected').val();
        inlineFormSelectCatChild = $('#inlineFormSelectCatChild option:selected').val();
        inlineFormSelectLanguage = $('#inlineFormSelectLanguage option:selected').val();
        inlineFormStatus = $('#inlineFormStatus option:selected').val();        
        faqAdminList.draw();
    });

    $(document).find('a').on('click', function () {
        faqAdminList.state.clear();
    });

    $('#clearFilters').bind("click", function () {
        inputkeyword = '';
        inlineFormSelectCatParent = '';
        inlineFormSelectCatChild = '';
        inlineFormSelectLanguage = '';
        inlineFormStatus = '';
       $('#input-keyword').val('');
       $('#inlineFormSelectCatParent').val('');
       $('#inlineFormSelectCatChild').val('');
       $('#inlineFormSelectLanguage').val('');
       $('#inlineFormStatus').val('');
       faqAdminList.draw();

   });


});