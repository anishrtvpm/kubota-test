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


function textFormat(input) {
    let isFullWidthJapanese = checkFullWidthJapanese(input);
    if (isFullWidthJapanese) {
        return input.length > config.full_width_text_display_max_length ? input.substring(0, config.full_width_text_display_max_length) + '..' : input;
    } else {
        return input.length > config.text_display_max_length ? input.substring(0, config.text_display_max_length) + '..' : input;
    }
}

function checkFullWidthJapanese(text) {
    for (let i = 0; i < text.length; i++) {
        let charCode = text.charCodeAt(i);
        if (charCode >= 0xFF01 && charCode <= 0xFF5E) {
            return true;
        }
    }
    return false;
}