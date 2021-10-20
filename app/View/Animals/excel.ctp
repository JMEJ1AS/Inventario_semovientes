<?php

// Importamos la clase PHPExcel
App::import('Vendor', 'Classes/PHPExcel');

$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()->setCreator("Jorge Mejías Fuenzalida")
	->setLastModifiedBy("Jorge Mejías Fuenzalida")
	->setTitle("Office 2007 XLSX Test Document")
	->setSubject("Office 2007 XLSX Test Document")
	->setDescription("Ejemplo de integracion cakephp 2.x y phpExcel.")
	->setKeywords("office 2007 openxml php")
	->setCategory("Test result file");


//agregamos los datos

//$i=2;

foreach ($animals as $animal){

	$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', 'NOMBRE')
		->setCellValue('B1', 'RUT')
		->setCellValue('C1', 'NUMERO NINOS')
		->setCellValue('D1', 'NUMERO ADULTOS')
		->setCellValue('E1', 'RESULTADO 1')
		->setCellValue('F1', 'NUMERO HOMBRES')
		->setCellValue('G1', 'NUMERO MUJERES')
		->setCellValue('H1', 'RESULTADO 2')
		->setCellValue('I1', 'NUMERO NINOS FINAL')
		->setCellValue('J1', 'NUMERO ADULTOS FINAL')
		->setCellValue('K1', 'RESULTADO 1 FINAL')
		->setCellValue('L1', 'NUMERO HOMBRES FINAL')
		->setCellValue('M1', 'NUMERO MUJERES FINAL')
		->setCellValue('N1', 'RESULTADO 2 FINAL')
		->setCellValue('O1', 'CREADO')
		->setCellValue('P1', 'MODIFICADO')
		->setCellValue('Q1', 'INSTITUCION')
		->setCellValue('R1', 'FECHA VISITA')
		->setCellValue('S1', 'TURNO VISITA')
		->setCellValue('T1', 'CONTENIDO')
		->setCellValue('U1', 'ESTADO')
		->setCellValue('V1', 'OBSERVACIONES');

		//$i = $i + 1;
}

$objPHPExcel->getActiveSheet()->setTitle('Exportar excel');

$objPHPExcel->setActiveSheetIndex(0);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

header("Content-Disposition: attachment; filename=Report_". date('dmY_His') . ".xlsx");

header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

$objWriter->save('php://output');

exit;

?>