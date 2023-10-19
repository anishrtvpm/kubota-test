$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const max_file_size = config.inquiry_from_upload_size_limit.replace('MB', '');

// Custom method for file size validation
$.validator.addMethod("filesize", function(value, element, param) {
    
    let fileInput = element;

    if (fileInput.files && fileInput.files[0]) {
        let fileSize = fileInput.files[0].size;
        return fileSize <= param;
    }

    return true;
});

// Custom method for phone number validation
$.validator.addMethod("phone", function(value, element) {
    // Regular expression pattern that allows only [ - + ( )] 0-9
    let pattern = /^[-+()[\]\d]+$/;
    return this.optional(element) || pattern.test(value);
});

let staticRules = {
    email: {
        required: true,
        email:true,
        maxlength: 320
    },
    phone: {
        required: false,
        maxlength: 15,
        minlength: 4,
        phone: true
    },
    system: {
        required: true,
        maxlength: 100,
    },
    category: {
        required: true,
        maxlength: 100,
    },
    subject: {
        required: true,
        maxlength: 200
    },
    attachment: {
        required: false,
        extension: config.inquiry_form_mime_types.replace(/,/g, '|'),
        filesize: max_file_size * 1048576
    }
};

let dynamicRules = {};

formItems.forEach(item => {
    let name = getNameSlug(item.en_item_name);
    dynamicRules[name] = {
        required: item.is_required == 1,
        maxlength: item.max_length
    }

    if(item.item_type == 'phone')
    {
        dynamicRules[name]['minlength'] = 4;
        dynamicRules[name]['phone'] = true;
    }

    if(item.item_type == 'email')
    {
        dynamicRules[name]['email'] = true;
    }
});

let rules = { ...staticRules, ...dynamicRules };

let variables = {
    'file_size' : config.inquiry_from_upload_size_limit,
    'file_types' : config.inquiry_form_mime_types,
};

let staticMessages = {
    email: {
        required: translations.email_required,
        email: translations.invalid_email,
        maxlength: translations.email_max_length,
    },
    phone: {
        maxlength: translations.phone_max_length,
        minength: translations.phone_min_length,
        phone: translations.invalid_phone
    },
    system: {
        required: translations.system_required,
        maxlength: translations.system_max_length,
    },
    category: {
        required: translations.category_required,
        maxlength: translations.category_max_length,
    },
    subject: {
        required: translations.subject_required,
        maxlength: translations.subject_max_length,
    },
    attachment: {
        extension: replaceVariables(translations.attachment_type_error, variables),
        filesize: replaceVariables(translations.attachment_max_size, variables),
    }
};

let dynamicMessages = {};

formItems.forEach(item => {
    let name = getNameSlug(item.en_item_name);
    let replacements = {
        field_name : locale == config.language_japanese ? item.ja_item_name : item.en_item_name, 
        length : item.max_length
    }

    dynamicMessages[name] = {
        required: replaceVariables(translations.dynamic_field_required, replacements),
        maxlength: replaceVariables(translations.dynamic_field_required, replacements)
    }

    if(item.item_type == 'phone')
    {
        dynamicMessages[name]['phone'] = translations.invalid_phone;
        dynamicMessages[name]['minlength'] = translations.phone_min_length;
    }

    if(item.item_type == 'email')
    {
        dynamicMessages[name]['email'] = translations.invalid_email;
    }
});

let messages = { ...staticMessages, ...dynamicMessages };

$('#faqInquiryForm').validate({
    rules: rules,
    messages: messages,
    submitHandler:function(form){
        let clickedButton = $("button[type='submit']:focus").val();
        if(clickedButton == 'save' || clickedButton == 'submit')
        {
            form.submit();
        }
        else if(clickedButton == 'confirm')
        {
            showPreview();
        }
    }
});

function showPreview()
{
    if ($("#affiliationDropdown").length > 0) {
        $('.affiliation-selection').text($("#affiliationDropdown").val());
    }
    $('.user-email').text($('#input-email').val());
    $('.user-phone').text($('#input-phone').val());

    formItems.forEach(item => {
        let name = getNameSlug(item.en_item_name);
        let value;
        if(item.item_type == 'single_line' || item.item_type == 'email' || item.item_type == 'phone')
        {
            value = $('input[name="' + name + '"]').val();
        }
        else if(item.item_type == 'multi_line'){
            value = $('[name="' + name + '"]').val();
        }
        else if(item.item_type == 'select'){
            value = $('select[name="' + name + '"]').val();console.log('test'+value)
        }

        $('.' + name).text(value);
    });

    $('.preview-hidden').hide();
    $('.preview-visible').show();
    
    let targetOffset = $("#faqInquiryForm").offset().top - 100;
    $("html, body").animate({ scrollTop: targetOffset }, 500);
    
}

$('.close-preview').on("click", function () {
    $('.preview-hidden').show();
    $('.preview-visible').hide();
});

function getNameSlug(name)
{
    return 'inq_' + name.toLowerCase().replace(/[^a-zA-Z0-9 ]/g, '').trim().replace(/\s+/g, '_');
}

// Function to replace variables in the string
function replaceVariables(input, vars) {
    return input.replace(/\{(\w+)}/g, function (match, variable) {
        if (vars.hasOwnProperty(variable)) {
            return vars[variable];
        }
        return match; 
    });
}