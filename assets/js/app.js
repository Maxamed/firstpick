$(document).foundation();

var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
$('#dp1').fdatepicker({
    format: 'mm-dd-yyyy hh:ii',
    disableDblClickSelection: true,
    pickTime: true,
    onRender: function (date) {
        console.log(date);
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
});


$('#dp10').fdatepicker({
    format: 'mm-dd-yyyy hh:ii',
    disableDblClickSelection: true,
    pickTime: true,
    onRender: function (date) {
        console.log(date);
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
});
$('#dp2').fdatepicker({
	format: 'mm-dd-yyyy',
	disableDblClickSelection: true,
	language: 'vi',
	pickTime: false
});
$('select[multiple]').multiselect({
  columns: 3
});
