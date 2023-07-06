$('#checkbox_check').change(function() {
    if ($('#checkbox_check').is(':checked')) {
        $('#div_not_time').show();
        $('#div_with_time').hide();
    } else {
        $('#div_with_time').show();
        $('#div_not_time').hide();
    }
})