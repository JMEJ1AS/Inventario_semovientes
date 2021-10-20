<html lang="es">
	<head>
		<title>prueba de datetimepicker</title>
		<link rel="stylesheet" type="text/css" href="../datetimepicker-master/jquery.datetimepicker.css"/>
		
		<script src="../datetimepicker-master/jquery.js"></script>
		<script src="../datetimepicker-master/jquery.datetimepicker.full.js"></script>
	</head>
	<body>
		<input type="text" value="" id="datetimepicker"/>
	</body>
	<script>
		$('#datetimepicker').datetimepicker({
			dayOfWeekStart : 1,
			lang:'en',
			disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
			startDate:	'1986/01/05'
		});
		$('#datetimepicker').datetimepicker({value:'2015/04/15 05:03',step:10});
	</script>
</html>