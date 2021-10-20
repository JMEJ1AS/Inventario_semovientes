<?php

class DocumentosController extends AppController {

	public $helpers = array('Html','Form');

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

}

?>