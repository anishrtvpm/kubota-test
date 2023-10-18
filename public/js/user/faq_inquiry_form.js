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

let staticMessages = {
    email: {
        required: locale == config.language_japanese ? 'メールアドレスは必須項目です。' : 'Email is required.',
        email: locale == config.language_japanese ? '有効なEメールアドレスを入力してください。' : 'Please enter a valid email address',
        maxlength: locale == config.language_japanese ? 'メールアドレスは 320文字以内で設定してください。' : 'The e-mail address must be 320 characters or less.',
    },
    phone: {
        maxlength: locale == config.language_japanese ? '電話番号は 15文字以内で設定してください。' : 'The phone number must be within 15 characters.',
        minength: locale == config.language_japanese ? '電話番号は 15文字以内で設定してください。' : 'The phone number must be atleast 4 characters long.',
        phone: locale == config.language_japanese ? '有効な電話番号を入力してください。' : 'Please enter a valid phone number'
    },
    system: {
        required: locale == config.language_japanese ? 'システムは必須項目です。' : 'System is a required field.',
        maxlength: locale == config.language_japanese ? 'システムは 100文字以内で設定してください。' : 'The system must be within 100 characters.',
    },
    category: {
        required: locale == config.language_japanese ? 'カテゴリは必須項目です。' : 'Category is a required field.',
        maxlength: locale == config.language_japanese ? 'カテゴリは 100文字以内で設定してください。' : 'The category must be within 100 characters.',
    },
    subject: {
        required: locale == config.language_japanese ? '件名は必須項目です。' : 'Subject is a required field',
        maxlength: locale == config.language_japanese ? '件名は 120文字以内で設定してください。' : 'The subject must be within 100 characters.',
    },
    attachment: {
        extension: config.language_japanese ? '無効なファイルタイプです。許可されるファイルタイプは、.gif、.tif、.png、.jpg、.pdf、.doc、.docx、.xls、.xlsx、.ppt、.pptx、.txt、.csvです。' : 'Invalid file type. Allowed file types are .gif, .tif, .png, .jpg, .pdf, .doc, .docx, .xls, .xlsx, .ppt, .pptx, .txt, .csv',
        filesize: config.language_japanese ? 'ファイルサイズの上限は' + max_file_size + 'メガバイトです。' :'The maximum allowable file size is '+ max_file_size + 'MB.'
    }
};

let dynamicMessages = {};

formItems.forEach(item => {
    let name = getNameSlug(item.en_item_name);
    dynamicMessages[name] = {
        required: locale == config.language_japanese ? item.ja_item_name + 'は必須項目です。' : item.en_item_name + ' is required.',
        maxlength: config.language_japanese ? item.ja_item_name + 'は' + item.max_length + '文字以内で設定してください。' : item.ja_item_name + ' must be within ' + item.max_length + ' characters.',
    }

    if(item.item_type == 'phone')
    {
        dynamicMessages[name]['phone'] = config.language_japanese ? '有効な電話番号を入力してください。' : 'Please enter a valid phone number';
        dynamicMessages[name]['minlength'] = config.language_japanese ? '電話番号は 15文字以内で設定してください。' : 'The phone number must be atleast 4 characters long.',;
    }

    if(item.item_type == 'email')
    {
        dynamicMessages[name]['email'] = config.language_japanese ? 'メールアドレスは 320文字以内で設定してください。' : 'The e-mail address must be 320 characters or less.';
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