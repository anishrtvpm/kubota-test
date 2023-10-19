(function () {
    "use strict";
    
    /* To choose date */
    flatpickr(".datepicker", {
        dateFormat: config.date_format_ymd,
        minDate: 'today',
    });

    /* To choose question date */
    flatpickr(".faq_datepicker", {
        dateFormat: config.date_format_ymd,
    });

    /* To choose date and time */
    flatpickr("#datetime", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });

    /* For Human Friendly dates */
    flatpickr("#humanfrienndlydate", {
        altInput: true,
        altFormat: "F j, Y",
        dateFormat: "Y-m-d",
    });

     /* Use in date range picker input fields */
     flatpickr(".daterange", {
        mode: "range",
        dateFormat: config.date_format_ymd,
        minDate: "today",
        locale: locale
    });

    /* For Time Picker */
    flatpickr("#timepikcr", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
    });

    /* For Time Picker With 24hr Format */
    flatpickr("#timepickr1", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true
    });

    /* For Time Picker With Limits */
    flatpickr("#limittime", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        minTime: "16:00",
        maxTime: "22:30",
    });

    /* For DateTimePicker with Limited Time Range */
    flatpickr("#limitdatetime", {
        enableTime: true,
        minTime: "16:00",
        maxTime: "22:00"
    });

    /* For Inline Calendar */
    flatpickr("#inlinecalendar", {
        inline: true
    });

    /* For Date Pickr With Week Numbers */
    flatpickr("#weeknum", {
        weekNumbers: true,
    });

    /* For Inline Time */
    flatpickr("#inlinetime", {
        inline: true,
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
    });

    /* For Preloading Time */
    flatpickr("#pretime", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        defaultDate: "13:45"
    });

})();