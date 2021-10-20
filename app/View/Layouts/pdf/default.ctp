<?php 
require_once(APP . 'Vendor' . DS . 'dompdf' . DS . 'dompdf_config.inc.php');
spl_autoload_register('DOMPDF_autoload');
$dompdf = new DOMPDF();
$dompdf->set_paper('legal','landscape');
$dompdf->set_option('enable_html5_parser', TRUE);

//$dompdf->load_html(utf8_encode($this->fetch('content')), Configure::read('App.encoding'));
$dompdf->load_html($this->fetch('content'), Configure::read('App.encoding'));

$dompdf->render();
echo $dompdf->output();
//$dompdf->stream('Exportado.pdf');  

/*
	$html= utf8_encode($html); 
   $mipdf ->load_html($html);
# Renderizamos el documento PDF.
   $mipdf ->render();
# Enviamos el fichero PDF al navegador.
   $mipdf ->stream('Exportado.pdf');  
*/
?>