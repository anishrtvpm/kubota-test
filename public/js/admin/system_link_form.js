$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$.validator.addMethod("urlCheck", function (value) {
    return isValidUrl(value);
});

$('#systeLinkForm').validate({
    // errorLabelContainer: "#errorMessages",
    rules: {
        category: {
            required: true,
        },
        sort: {
            required: true,
            number: true,  // Ensure it's a valid number
            maxlength: 3,
        },
        ja_system_name: {
            required: true,
            maxlength: 100,
        },
        en_system_name: {
            required: true,
            maxlength: 100,
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
            required: translations.category_required,
        },
        sort: {
            required: translations.sort_required,
            number: translations.sort_number_validate,
            maxlength: translations.sort_max_length,
        },
        ja_system_name: {
            required: translations.jp_system_name_required,
            maxlength: translations.jp_system_name_max_length,
        },
        en_system_name: {
            required: translations.en_system_name_required,
            maxlength: translations.en_system_name_max_length,
        },
        ja_url: {
            urlCheck: translations.url_invalid,
            maxlength: translations.url_jp_max_length,
        },
        en_url: {
            urlCheck: translations.url_invalid,
            maxlength: translations.url_en_max_length,
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
