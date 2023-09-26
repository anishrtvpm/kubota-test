$("#announcement_form").validate({
    ignore: false,
});
$('[id^=ja_message]').each(function(e) {
    $(this).rules('add', {
        required : true,
        maxlength : 120,        
    });          
});
$('[id^=en_message]').each(function(e) {
    $(this).rules('add', {
        required : true,
        maxlength : 120,        
    });          
});
$('.alert-success').fadeIn().delay(2000).fadeOut();
$('.alert-danger').fadeIn().delay(2000).fadeOut();
