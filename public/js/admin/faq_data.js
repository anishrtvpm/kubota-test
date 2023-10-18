$('#top_category_name').change(function () {
    let selectElement = document.getElementById('category_id');
    selectElement.innerHTML = '';
    if($('#top_category_name').val()){
        $.ajax({
            url: '/faq_data/get-category',
            data: { name: $('#top_category_name').val() },
            success: function (response) {   
                for (let i = 0; i < response.length; i++) {
                    let option = document.createElement('option');
                    option.value = response[i].category_id;
                    option.text = response[i].name;
    
                    if (selectedCategoryId && response[i].category_id === selectedCategoryId) {
                        option.selected = true;
                    }
                    selectElement.appendChild(option);
                }
            }
        });
    }else{
        let option = document.createElement('option');
        option.value = '';
        option.text = 'カテゴリ選択';
        selectElement.appendChild(option);
    }   
});

if($('#faq_id').val() > 0){
    $('#top_category_name').change();
}

$('#q_message').summernote({
    height: 300,
    lang: 'ja-JP',
    callbacks: {
        onKeydown: function(e) {
            if (e.keyCode === 5) { // Tab key
                e.preventDefault();
                // Add your custom tab order logic here
            }
        }
    }
});

$('#a_message').summernote({
    height: 300,
    lang: 'ja-JP',
    callbacks: {
        onKeydown: function(e) {
            if (e.keyCode === 6) { // Tab key
                e.preventDefault();
                // Add your custom tab order logic here
            }
        }
    }
});

// Full width validation
$.validator.addMethod("fullwidth", function (value, element) {
    return fullWidthValidation(value);
});

$.validator.addMethod("checkboxEmpty", function (value, element) {
    return $('input[name="display_group[]"]:checked').length > 0;
});

// Answer date validation based on question date
$.validator.addMethod("minDate", function (value, element, params) {
    let questionDate = new Date($(params).val());
    let answerDate = new Date(value);
    return questionDate <= answerDate;
});

$.validator.addMethod("summernoteRequired", function(value, element) {
    console.log("Validation method called.");
    return value.replace(/<\/p>|<p>|&nbsp;|<br>/gi, '').trim() !== '';
}, "This field is required.");

// Check url validity
$.validator.addMethod("validUrls", function (value, element) {
    if (value) {
        return /^(https?:\/\/(?:www\.|(?!www))[^\s\.]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,})/.test(value)
    }
    return true;
});

// Maximum number of files allowed
$.validator.addMethod("fileNumberCheck", function(value, element) {
    let maxFiles = config.max_number_of_files;
    return element.files.length <= maxFiles;
});

// Allowed file extensions check
$.validator.addMethod("fileFormatCheck", function(value, element) {
    let allowedExtensions = /(\.gif|\.tif|\.png|\.jpg|\.mov|\.mpg|\.wma|\.pdf|\.doc|\.docx|\.xls|\.xlsx|\.ppt|\.pptx|\.txt|\.csv|\.zip)$/i;
    let files = element.files;
    for (let i = 0; i < files.length; i++) {
        let file = files[i];
        if (!allowedExtensions.test(file.name)) {
            return false;
        }
    }
    return true;
});

// Allowed maximum size check
$.validator.addMethod("fileSizeCheck", function(value, element) {
    let videoExtensions = /(\.mov|\.mpg|\.wma)$/i;
    let maxVideoSize = config.video_upload_max_size_in_mb * 1024 * 1024;
    let maxOtherSize = config.files_max_size_in_mb * 1024 * 1024;

    let files = element.files;    
    for (let i = 0; i < files.length; i++) {
        let file = files[i];

        if (videoExtensions.test(file.name) && file.size > maxVideoSize) {
            return false;
        }
        if (!videoExtensions.test(file.name) && file.size > maxOtherSize) {
            return false;
        }
    }
    return true;
});


$('#faq_data_form').validate({
    ignore: ".summernote-custom *",
    errorLabelContainer: "#errorMessages",
    rules: {
        top_category_name: {
            required: true,
        },
        category_id: {
            required: true,
        },
        sort: {
            required: true,
            maxlength: 8,
            number: true,
            fullwidth: true,
            remote: {
                url: '/faq_data/sort-order-exist',
                type: 'GET',
                data: {
                    faq_id: function () {
                        return $("#faq_id").val();
                    },
                    category_id: function () {
                        return $('#category_id').val();
                    },
                    sort: function () {
                        return $('#sort').val();
                    },
                },
                dataFilter: function (responseData) {
                    if (responseData) {
                        return JSON.stringify(false);
                    } else {
                        return JSON.stringify(true);
                    }
                },
            },
        },
        title: {
            maxlength: 100,
            required: true,
        },
        q_message: {
            required: true,
        },
        a_message: {
            required: true,
        },
        files: {
            fileNumberCheck: true,
            fileFormatCheck: true,
            fileSizeCheck: true
        },
        reference_url: {
            maxlength: 8000,
            validUrls: true,
            fullwidth: true,
        },
        question_date: {
            required: true,
        },
        answer_date: {
            required: true,
            minDate: '#question_date'
        },
        responder: {
            required: true,
            maxlength: 100,
        },
        status: {
            required: true,
        },
        language: {
            required: true,
        },
        'display_group[]': {
            checkboxEmpty: true
        }
    },
    messages: {
        top_category_name: {
            required: 'システムは必須項目です。'
        },
        category_id: {
            required: 'カテゴリは必須項目です。'
        },
        sort: {
            required: '表示順は必須項目です。',
            maxlength: '表示順は 8文字以内で設定してください。',
            number: "表示順は半角数値で入力してください。",
            remote: '表示順序はすでに存在します。',
            fullwidth: '半角のみで入力してください。',
        },
        title: {
            required: 'タイトルは必須項目です。',
            maxlength: 'タイトルは 100文字以内で設定してください。',
        },
        q_message: {
            required: '質問内容は必須項目です。',
        },
        a_message: {
            required: '回答内容は必須項目です。',
        },
        files: {
            fileNumberCheck: '3つのファイルのみアップロードしてください。',
            fileFormatCheck: 'ファイル形式をご確認ください。',
            fileSizeCheck: 'ファイルサイズをご確認ください。'
        },
        reference_url: {
            maxlength: '参加URLは 8000文字以内で設定してください。',
            validUrls: '入力されたURLの値を確認してください。',
            fullwidth: '半角のみで入力してください。',
        },
        question_date: {
            required: '質問日は必須項目です。',
        },
        answer_date: {
            required: '回答日は必須項目です。',
            minDate: "回答日は質問日と同じかそれ以上でなければなりません。"
        },
        responder: {
            required: '回答者は必須項目です。',
            maxlength: '回答者は 100文字以内で設定してください。',
        },
        status: {
            required: '状態は必須項目です。',
        },
        language: {
            required: '言語は必須項目です。',
        },
        'display_group[]': {
            checkboxEmpty: '配信先は必須項目です。'
        }
    },

    submitHandler: function (form) {
        $('#submitBtn').attr('disabled', 'disabled');
        form.submit();
    },

    errorPlacement: function(error, element) {
        if (element.attr("name") === "display_group[]") {
            error.insertAfter($(".display_group:last"));
        }else if (element.attr("name") === "q_message") { 
            error.insertAfter($('#q_message').next(".note-editor"));
            let errorClass = $("div.note-editor");
            errorClass.css("border", "1px solid red");
        }else if (element.attr("name") === "a_message") { 
            error.insertAfter($('#a_message').next(".note-editor"));
            let errorClass = $("div.note-editor");
            errorClass.css("border", "1px solid red");
        } else {            
            error.insertAfter(element);            
        }
    }
});


$('#deleteBtn').click(function () {
    Swal.fire({
        title: '削除の確認',
        text: '本当にこのレコードを削除しますか？',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: '<span data-toggle="tooltip" title="はい">はい</span>',
        cancelButtonText: '<span data-toggle="tooltip" title="キャンセル">キャンセル</span>',
        customClass: {
            confirmButton: 'btn-lg'
        },
    }).then((result) => {
        if (result.isConfirmed) {
            // User confirmed, send the AJAX request to delete the record
            $.ajax({
                type: 'DELETE',
                url: '/faq_data/delete/',
                data: { id: recordId, _token: $('meta[name="csrf-token"]').attr('content')},
                success: function (response) {
                    window.location.href = "{{ route('faq_data') }}";
                },
                error: function (xhr, textStatus, errorThrown) {
                    toastr.error(response.message);
                }
            });
        }
    });
});
