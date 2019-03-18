$(document).ready(function(){
    $('#datepicker').datepicker({changeYear: true, changeMonth: true, yearRange: '1960:2020'});
    $('#datepicker').tooltip({show:{effect:'bounce', duration: 900}});
});