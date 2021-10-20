<html xmlns="http://www.w3.org/1999/xhtml">

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<title>Informe de Semovientes</title>

		<style type="text/css">

			body {
						
				height: 100%;
				width: 1200px;
				background-color:#FFFFFF;
				font-family:Verdana, Arial, Helvetica, sans-serif;
				font-size: 12px;
				margin: 0;
				padding: 0;
			}


			h2 { 		

				margin-top: 5px;
				margin-bottom: 5px;
			}
				
			#div {   

				width: 710px;
				margin-top: 10px;
				margin-bottom: 10px;
				
				/*border: 1px solid #CCC;
  				padding:10px;
				border-top-right-radius: 2px;
				border-top-left-radius: 2px;
				border-bottom-right-radius: 2px;
				border-bottom-left-radius: 2px;*/
			}

			.wp-table tr:nth-child(odd) {
			    background-color: #fff;
			}

			.wp-table tr:nth-child(even) {
			    background-color: #f1f1f1;
			}

			.wp-table tr {
			    border-bottom: 1px solid #ddd;
			}

			.wp-table th:first-child, 
			.wp-table td:first-child {
			    padding-left: 16px;
			}

			.wp-table td, 
			.wp-table th {
			    padding: 5px 5px;
			    display: table-cell;
			    text-align: left;
			    vertical-align: top;
			}

			.wp-table th {
			    font-weight: bold;
			}
			 
			.wp-table {
			    font-size: 10px!important;
			    border: 1px solid #ccc;
			    border-collapse: collapse;
			    border-spacing: 0;
			   	width: 1200px;
			    display: table;
			}

		</style>

	</head>

	<body>

		<div style="text-align:center;">
			<table width="1200px" style="margin: 0 auto;">
				<tr>
					
					<td align="left" width="400px"><img src='../webroot/img/LogoMinvu.png' alt='' height="100"></td>

					<td align="center" width="400px">
						
						<h1>INFORME DE SEMOVIENTES </h1>

						<h2>Período: <?php echo $fecha_1." - ".$fecha_2; ?></h2>

					</td>
					
					<td align="right" width="400px"><img src='../webroot/img/logoParquemet.png' alt='' height="100">

					</td>
				</tr>
			</table>
		</div>
	
		<div id='div'>
		
			<br></br>
						
			<table class="wp-table">

				<thead>
				
					<tr>

						<th>FECHA</th>

						<th>NOMBRE COMÚN</th>

						<th>NOMBRE CIENTÍFICO</th>

						<th>MOVIMIENTO</th>

						<th>ID Z00</th>

						<th>ID INV.</th>

						<th>INGRESO/EGRESO</th>

						<th>PROT.ACT.</th>

						<th>UBICACIÓN</th>

						<th>VALOR UNIT.($)</th>

						<th>CONDICIÓN</th>

						<th>LONG.</th>

					</tr>

				</thead>

				<tbody>
				
					<?php foreach ($altas as $alta) :?>

                        <tr>

                            <td><?php echo $alta['Animal']['fecha_alta']; ?></td>

                            <td><?php echo $alta['Type']['nombre_comun']; ?></td>

                            <td><?php echo $alta['Type']['nombre_cientifico']; ?></td>

                            <td>ALTA</td>

                            <td><?php echo $alta['Animal']['chip_id']; ?></td>

                            <td><?php echo $alta['Animal']['codigo']; ?></td>

                            <td><?php echo $alta['Animal']['tipo_alta']; ?></td>

                            <td><?php echo $alta['Animal']['description_activo']; ?></td>

                            <td><?php echo $alta['Recinto']['nombre']; ?></td>

                            <td><?php echo $alta['Animal']['valor_compra']; ?></td>

                            <td><?php echo $alta['Condition']['nombre']; ?></td>

                            <td><?php echo $alta['Animal']['vida_util']; ?></td>			

						</tr>

					 <?php endforeach; ?>

					 <?php foreach ($bajas as $baja) :?>

                        <tr>

                            <td><?php echo $baja['Animal']['fecha_baja']; ?></td>

                            <td><?php echo $baja['Type']['nombre_comun']; ?></td>

                            <td><?php echo $baja['Type']['nombre_cientifico']; ?></td>

                            <td>BAJA</td>

                            <td><?php echo $baja['Animal']['chip_id']; ?></td>

                            <td><?php echo $baja['Animal']['codigo']; ?></td>

                            <td><?php echo $baja['Bajatype']['nombre']; ?></td>

                            <td><?php echo $baja['Animal']['glosa_baja']; ?></td>

                            <td><?php echo $baja['Recinto']['nombre']; ?></td>

                            <td><?php echo $baja['Animal']['valor_compra']; ?></td>

                            <td><?php echo $baja['Condition']['nombre']; ?></td>

                            <td><?php echo $baja['Animal']['vida_util']; ?></td>			

						</tr>

					 <?php endforeach; ?>
					
				</tbody>						

			</table>
				
		</div>
			
	</body>

</html>
