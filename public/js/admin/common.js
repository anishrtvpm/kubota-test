function isValidUrl(value) {
    if (value) {
        return /^(https?:\/\/(?:www\.|(?!www))[^\s\.]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,})/.test(value)
    }
    return true;
}
$('.alert-success').delay(config.toastr_time_out).fadeOut(config.toastr_time_out);
$('.alert-danger').delay(config.toastr_time_out).fadeOut(config.toastr_time_out);
