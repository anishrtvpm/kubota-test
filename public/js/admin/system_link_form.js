$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.validator.addMethod("urlCheck", function (value) {
    return isValidUrl(value);
});


$(document).ready(function () {
    // Add an "on change" event listener to the dropdown to trigger validation
    $('#category').on('change', function () {
        if($("#ja_system_name").val() !== '' && $("#en_system_name").val() !== '') {
            $("#ja_system_name").removeData("previousValue"); //clear cache
            $("#systeLinkForm").data('validator').element('#ja_system_name'); //retrigger remote call
            $('#ja_system_name').blur()
           
            $("#en_system_name").removeData("previousValue"); //clear cache
            $("#systeLinkForm").data('validator').element('#en_system_name'); //retrigger remote call
            $('#en_system_name').blur()
        }
    });
});

$.validator.addMethod("fullwidth", function (value, element) {
    return fullWidthValidation(value);
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
            min: 0,
        },
        ja_system_name: {
            required: true,
            maxlength: 100,
            remote: {
                url: '/system_link/system-name-exists',
                type: 'POST',
                data: {
                    system_name: function () {
                        return $("#ja_system_name").val();
                    },
                    system_id: function () {
                        return $('#system_id').val();
                    },
                    category: function () {
                        return $('#category').val();
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
        en_system_name: {
            required: true,
            maxlength: 100,
            fullwidth:true,
            remote: {
                url: '/system_link/system-name-exists',
                type: 'POST',
                data: {
                    system_name: function () {
                        return $("#en_system_name").val();
                    },
                    system_id: function () {
                        return $('#system_id').val();
                    },
                    category: function () {
                        return $('#category').val();
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
        ja_url: {
            required: true,
            urlCheck: true,
            maxlength: 8000,
        },
        en_url: {
            required: true,
            urlCheck: true,
            maxlength: 8000,
        },
    },
    messages: {
        category: {
            required: "カテゴリは必須項目です。",
        },
        sort: {
            required: "表示順は必須項目です。",
            number: "表示順は半角数値で入力してください。",
            maxlength: "ソートの長さは3文字以内",
            min: "数値は0より大きくなければならない。"
        },
        ja_system_name: {
            required: "タイトル(JP)は必須項目です。",
            maxlength: "タイトル(JP)の長さは100文字を超えないこと",
            remote: 'タイトル(JP)はすでにこのカテゴリにあります。',
        },
        en_system_name: {
            required: "タイトル(EN)は必須項目です。",
            maxlength: "タイトル(EN)の長さは100文字を超えないこと",
            remote: 'タイトル(EN)はすでにこのカテゴリにあります。',
            fullwidth:"半角のみで入力してください。",
        },
        ja_url: {
            required: 'URL(JP)は必須項目です。',
            urlCheck: "有効なURLを入力してください",
            maxlength: "タイトル(JP)の長さは255文字を超えないこと",
        },
        en_url: {
            required: 'URL(EN)は必須項目です。',
            urlCheck: "有効なURLを入力してください",
            maxlength: "タイトル(EN)の長さは255文字を超えないこと",
        },
    },

    onfocusout: function(element) {
        this.element(element);
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
            error: function (xhr, status, error) {
                let response = JSON.parse(xhr.responseText);
                if (xhr.status === 422) {
                    $('#submitBtn').prop('disabled', false);
                    $.each(response.errors, function (field, messages) {
                        $('.' + field).siblings('.text-danger').remove();
                        $('.' + field).after('<span class="text-danger">' + messages[0] + '</span>');
                    });
                }

                if (response.error) {
                    $('.error-modal').show();
                    let message_error = '';
                    message_error += '<span class="text-danger">' + response.error + '</span><br>';
                    $('.error-modal').html('<span class="text-danger">' + message_error + '</span>');
                }
            }
        })
    },
});


$('#deleteBtn').click(function () {
    let recordId = $(this).data('id');
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
                success: function (response) {
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
