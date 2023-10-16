let search_keyword = "";
let top_category = "";
let sub_category = "";

$(document).ready(function () {
    // Initial AJAX request to load the first page of posts
    loadPosts();
    // Function to load posts via AJAX
    function loadPosts(page = 1) {
        $.ajax({
            url: '/faq/get?page=' + page,
            type: 'GET',
            data: { search_keyword: search_keyword ,top_category:top_category,sub_category:sub_category},
            success: function (response) {
                $('.faq_list_wrapper').html(response);
            }
        });
    }

    // Handle pagination links clicks
    $(document).on('click', '.keyword_btn', function (e) {
        search_keyword = $('#search_keyword').val();
        top_category = $('.top_category').val();
        sub_category = $('.sub_category').val();
        loadPosts();
    });
    
    $(document).on('click', '.searchBtn', function (e) {
        search_keyword = $('#search_keyword').val();
        top_category = $('.top_category').val();
        sub_category = $('.sub_category').val();
        loadPosts();
    });



    $(document).on('click', '.clear_btn', function (e) {
        search_keyword="";
        top_category = "";
        sub_category = "";
        $('#search_keyword').val('');
        $('.top_category').val('');
        $('.sub_category').val('');
        loadPosts();
    });

    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        loadPosts(page);
    });

    $(document).on('change','.top_category',function(){
        let top_category_id=$(this).val();
        $.ajax({
            url: '/faq/get_sub_categories?top_category_id=' + top_category_id,
            type: 'GET',
            success: function (response) {
                console.log(response);
                $('.sub_category').html(response);
            }
        });
    })

});