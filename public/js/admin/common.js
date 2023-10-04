function isValidUrl(value) {
    if (value) {
        return /^(https?:\/\/(?:www\.|(?!www))[^\s\.]+\.[^\s]{2,}|www\.[^\s]+\.[^\s]{2,})/.test(value)
    }
    return true;
}
function isValidCharacterJapanese(value) {
    if (value) {
        return /^[\p{Script=Hiragana}\p{Script=Katakana}\p{Script=Han}!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?0-9０-９]*$/u.test(value);
    }
    return true;
}
function isValidCharacterEnglish(value) {
    if (value) {
        return /^[a-zA-Z!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?0-9]*$/u.test(value);
    }
    return true;
}
$('.alert-success').delay(config.toastr_time_out).fadeOut(config.toastr_time_out);
$('.alert-danger').delay(config.toastr_time_out).fadeOut(config.toastr_time_out);
