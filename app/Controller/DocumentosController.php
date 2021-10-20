<?php

class DocumentosController extends AppController {

	public $helpers = array('Html','Form');

	public $uses = ['Animal', 'Type', 'Documento', 'Bajatype', 'Recinto', 'Condition', 'Autorizacione'];

	public $name = 'Documentos';

	public $components = array('Flash');

	public function index(){

		$this->set('documentos', $this->Documento->find('all'));

	}

	public function view($id){

		$this->Documento->id = $id;

		$this->set('documento', $this->Documento->read());

	}

	public function add($id = null){

		if(!$id){ throw new NotFoundException(__('Solicitud invalida')); }

		$animal = $this->Documento->Animal->findById($id);

		if(!$animal){ throw new NotFoundException(__('Solicitud invalida')); }

		$this->set('animal', $animal);

		if ($this->request->is('post')){			
	
			if($this->Documento->save($this->request->data)){
		
				$this->Session->setFlash('

					<div class="alert alert-success">

						<button type="button" class="close" data-dismiss="alert">×</button>

						<h4>Confirmación</h4>

						La información fué almacenada satisfactoriamente. 

					</div>'

				);

				$this->redirect(array('action' => 'add', $id));

			}
			
		}

		$documentos = $this->Documento->find('all', 

			array(

				'conditions' => array(

					'Documento.animal_id' => $id

				)
			)
		);

		$this->set('documentos', $documentos);

	}

	function delete($id){

		if(!$id){ throw new NotFoundException(__('Solicitud invalida')); }

		if($this->Documento->delete($id)){

			$this->redirect(array('action' => 'add', $id));

			function afterDelete($id){
        	
        	$file = new File(WWW_ROOT .'/files/documento/documento/'. $documento['Documento']['dir'],false, 0777);
        
        		if($file->delete()){ $this->Session->setFlash("archivo borrado"); }             
        
        	}
		
		}

	}

	public function save_massive(){

		//$this->loadModel('Documento');

		if ($this->request->is('post')){

			//$documento = $this->request->data['Animal']['documento'];

			$documento = $this->request->data['Documento']['documento']['name'];

			$tipo_documento = $this->request->data['Documento']['tipo_documento'];

			$descripcion = $this->request->data['Documento']['descripcion'];

			$data = $this->data['case'];

			$largo_array = sizeof($data);

			$this->request->data['Documento']['animal_id'] = $this->data['case'][0]; // trae valor de primer check

			// graba en base de datos crea directorio y graba archivo físico

			// al grabar obtiene valor del id para replicar en los siguientes registros
			 
			if($this->Documento->save($this->request->data)){

				$dir = $this->Documento->getLastInsertId();

			}

			// fin rutina

			for($i = 1; $i < $largo_array; $i++){

				$animal_id = $this->data['case'][$i]; //trae el valor de los siguientes check

				$this->Documento->query(

					"INSERT INTO documentos (documento, dir, animal_id, tipo_documento, descripcion)

					VALUES ('$documento', '$dir', '$animal_id', '$tipo_documento', '$descripcion')

				");

			} 

		}

		$this->Session->setFlash('

			<div class="alert alert-success">

			<button type="button" class="close" data-dismiss="alert">×</button>

			<h4>Confirmación</h4>

			<!--muestrame el largo del array: '.$largo_array.'-->

			La información fué almacenada satisfactoriamente. 


			</div>'

		);

		$this->redirect(array('controller'=>'Animals', 'action' => 'search_massive'));
		 
		}

	}

?>