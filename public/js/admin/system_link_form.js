$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.validator.addMethod("urlCheck", function (value) {
    return isValidUrl(value);
});

$.validator.addMethod("characterCheckJa", function (value) {
    return isValidCharacterJapanese(value);
});
$.validator.addMethod("characterCheckEn", function (value) {
    return isValidCharacterEnglish(value);
});

$('#systeLinkForm').validate({
    rules: {
        category: {
            required: true,
        },
        sort: {
            required: true,
            number: true,  // Ensure it's a valid number
            maxlength: 3,
            min:0,
        },
        ja_system_name: {
            required: true,
            maxlength: 100,
            characterCheckJa: true,
        },
        en_system_name: {
            required: true,
            maxlength: 100,
            characterCheckEn: true,
        },
        ja_url: {
            urlCheck: true,
            maxlength: 8000,
        },
        en_url: {
            urlCheck: true,
            maxlength: 8000,
        },
    },
    messages: {
        category: {
            required: "要カテゴリー",
        },
        sort: {
            required: "要ソート",
            number: "有効な番号を入力してください。",
            maxlength: "ソートの長さは3文字以内",
            min: "数値は0より大きくなければならない。" 
        },
        ja_system_name: {
            required: "タイトル(JP) 必須",
            maxlength: "タイトル(JP)の長さは100文字を超えないこと",
            characterCheckJa:"日本語のみを入力してください。"
        },
        en_system_name: {
            required: "タイトル(EN) 必須",
            maxlength: "タイトル(EN)の長さは100文字を超えないこと",
            characterCheckEn:"英字のみ入力してください。"
        },
        ja_url: {
            urlCheck: "有効なURLを入力してください",
            maxlength: "タイトル(JP)の長さは255文字を超えないこと",
        },
        en_url: {
            urlCheck: "有効なURLを入力してください",
            maxlength: "タイトル(EN)の長さは255文字を超えないこと",
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
                $('#systemLinkModal').modal('hide');
                slTable.draw();
                toastr.success(response.message);
            },
            error: function(xhr, status, error) {
                let response = JSON.parse(xhr.responseText);
                if (xhr.status === 422) {
                    $('#submitBtn').prop('disabled', false);
                    $.each(response.errors, function(field, messages) {
                        $('.' + field).siblings('.text-danger').remove();
                        $('.' + field).after('<span class="text-danger">' + messages[0] + '</span>');
                    });
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
