$(document).ready(function() {
    $('input[name="locale"]').on('change', function() {
        const selectedLocale = $(this).val();
        const formData = { locale: selectedLocale, _token: $('input[name="_token"]').val() };
        
        $.ajax({
            type: 'POST',
            url: '/language/edit',
            data: formData,
            success: function(response) {
                location.reload(); // Refresh the page to apply the new language
            },
        });
    });
});