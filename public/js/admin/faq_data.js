$('#top_category_name').change(function () {
    $.ajax({
        url: '/faq_data/get-category',
        data: { name: $('#top_category_name').val() },
        success: function (response) {
            let selectElement = document.getElementById('category_id');
            selectElement.innerHTML = '';
            
            for (let i = 0; i < response.length; i++) {
                let option = document.createElement('option');
                option.value = response[i].category_id;
                option.text = response[i].name;
                selectElement.appendChild(option);
            }
        }
    });
});

$('#q_message').summernote({
    tabsize: 2,
    height: 300,
    lang: 'ja-JP',
    tabindex: 5
});

$('#a_message').summernote({
    tabsize: 2,
    height: 300,
    tabindex: 6
});