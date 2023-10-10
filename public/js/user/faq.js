$(document).ready(function () {
    // Initial AJAX request to load the first page of posts
    loadPosts();

    // Function to load posts via AJAX
    function loadPosts(page = 1) {
        $.ajax({
            url: '/faq/get?page=' + page,
            type: 'GET',
            success: function (response) {
                $('.faq_list_wrapper').html(response);
            }
        });
    }

    // Handle pagination links clicks
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        let page = $(this).attr('href').split('page=')[1];
        loadPosts(page);
    });
});