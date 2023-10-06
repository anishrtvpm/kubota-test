$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.validator.addMethod("urlCheck", function (value) {
    return isValidUrl(value);
});


$('#faqCategoryForm').validate({
    rules: {
        top_category_ja_name: {
            required: true,
            maxlength: 100,
        },
        top_category_en_name: {
            required: true,
            maxlength: 100,
        },
        sub_category_ja_name: {
            required: true,
            maxlength: 100,
        },
        sub_category_en_name: {
            required: true,
            maxlength: 100,
        },
        sort: {
            required: true,
            number: true,  // Ensure it's a valid number
            maxlength: 3,
            min: 0,
        },

        mail_form_id: {
            required: true,
            number: true,
            maxlength: 3,
            min: 0,
        },
    },
    messages: {
        top_category_ja_name: {
            required: 'システム(JP)は必須項目です。',
            maxlength: 'システム(JP)は 100文字以内で設定してください。',
        },
        top_category_en_name: {
            required: 'システム(EN)は必須項目です。',
            maxlength: 'システム(EN)は 100文字以内で設定してください。',
        },
        sub_category_ja_name: {
            required: 'カテゴリ名(JP)は必須項目です。',
            maxlength: 'カテゴリ名(JP)は 100文字以内で設定してください。',
        },
        sub_category_en_name: {
            required: 'カテゴリ名(EN)は必須項目です。',
            maxlength: 'カテゴリ名(EN)は 100文字以内で設定してください。',
        },
        sort: {
            required: '表示順は必須項目です。',
            number: '表示順は半角数値で入力してください。',
            maxlength: 'ソートの長さは3文字以内',
            min: "数値は0より大きくなければならない。" // Custom error message for min rule

        },
        mail_form_id: {
            required: 'フォームIDは必須項目です。',
            number: '有効な番号を入力してください。',
            maxlength: 'ソートの長さは3文字以内',
            min: "数値は0より大きくなければならない。" // Custom error message for min rule

        },
       
    },

    submitHandler: function (form) {
        $('#submitBtn').attr('disabled', 'disabled');
        let formData = $(form).serialize();
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData,
            dataType: 'json',
            success: function (response) {
                $('#faqCategoryModal').modal('hide');
                faqCatTable.draw();
                toastr.success(response.message);
            },
            error: function(xhr, status, error) {
                let response = JSON.parse(xhr.responseText);
                if (xhr.status === 422) {
                    $('#submitBtn').prop('disabled', false);
                    $.each(response.errors, function(field, messages) {
                        $('#' + field).siblings('.text-danger').remove();
                        $('#' + field).after('<span class="text-danger">' + messages[0] + '</span>');
                    });
                    if(response.error){
                        $('.error-modal').show();
                        let message_error='';
                        $.each(response.error, function(key, message) {
                            message_error += '<span class="text-danger">'  + message + '</span><br>';
                        });
                        $('.error-modal').html('<span class="text-danger">' + message_error + '</span>');
                    }
                } 
            }
        })
    },
});


$('#deleteBtn').click(function() {
    var recordId = $(this).data('id');
    Swal.fire({
        title: '削除の確認',
        text: '本当にこのレコードを削除しますか？',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'はい',
        cancelButtonText: 'キャンセル',
        customClass: {
            confirmButton: 'btn-lg'
        },
    }).then((result) => {
        if (result.isConfirmed) {
            // User confirmed, send the AJAX request to delete the record
            $.ajax({
                type: 'DELETE',
                url: 'system_link/delete/', // Replace with your delete route
                data: { id: recordId },
                success: function(response) {
                    $('#systemLinkModal').modal('hide');
                    slTable.draw();
                    toastr.success(response.message);
                },
                error: function (xhr, textStatus, errorThrown) {
                    toastr.error(response.message);
                }
            });
        }
    });
});
