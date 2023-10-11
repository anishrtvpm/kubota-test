$("#announcement_form").validate({
    ignore: false,
});
$('[id^=ja_message]').each(function(e) {
    $(this).rules('add', {
        required : true,
        maxlength : 120, 
        messages:{
            required: 'JPメッセージは必須項目です。',
            maxlength: 'JPメッセージは 120文字以内で設定してください。'
        }         
    });          
});
$('[id^=en_message]').each(function(e) {
    $(this).rules('add', {
        required : true,
        maxlength : 120, 
        messages:{
            required: 'EN メッセージは必須項目です。',
            maxlength: 'ENメッセージは 120文字以内で設定してください。'
        }       
    });          
});
$('[id^=daterange]').each(function(e) {
    $(this).rules('add', {
        required : true,
        messages:{
            required: '配信期間は必須項目です。'
        }       
    });          
});
