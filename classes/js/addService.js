"use strict";
$('#tariff').on('change', function() {
    alert('Here!');
    if ($(this).val() == 'TariffHourly' || $(this).val() == 'TariffDaily') {
        $('#addGps').attr('hidden', false);
        $('#addDriver').attr('hidden', false);
    } else {
        $('#addGps').attr('hidden', true);
        $('#addDriver').attr('hidden', true);
    }
});
$('#btn').on('click', function() {
    alert('Here2');
});