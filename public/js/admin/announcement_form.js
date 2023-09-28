$("#announcement_form").validate({
    ignore: false,
});
$('[id^=ja_message]').each(function(e) {
    $(this).rules('add', {
        required : true,
        maxlength : 120, 
        messages:{
            required: translations.JP_message_required,
            maxlength:translations.JP_message_length
        }         
    });          
});
$('[id^=en_message]').each(function(e) {
    $(this).rules('add', {
        required : true,
        maxlength : 120, 
        messages:{
            required: translations.EN_message_required,
            maxlength:translations.EN_message_length
        }       
    });          
});
$('[id^=daterange]').each(function(e) {
    $(this).rules('add', {
        required : true,
        messages:{
            required: translations.delivery_period_required,
        }       
    });          
});
