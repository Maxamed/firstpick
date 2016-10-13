$(document).foundation();
	$('#dp1').fdatepicker({
		format: 'mm-dd-yyyy hh:ii',
		disableDblClickSelection: true,
		language: 'vi',
		pickTime: true
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
