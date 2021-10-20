<?php

class RecintosController extends AppController {

	public $helpers = array('Html','Form');

	public $name = 'Recintos';

	public $components = array('Flash');

	public function add($id = null){

		if ($this->request->is('post')){
	
			if($this->Recinto->save($this->request->data)){
		
				$this->Session->setFlash('

					<div class="alert alert-success">

						<button type="button" class="close" data-dismiss="alert">×</button>

						<h4>Confirmación</h4>

						La información fué almacenada satisfactoriamente. 

					</div>'

				);

				$this->redirect(array('action' => 'add'));

			}

		}

		$recintos = $this->Recinto->find('all');

		$this->set('recintos', $recintos);

	}

	public function edit($id = null){

	    if(!$id){ throw new NotFoundException(__('Solicitud de modificación invalida')); }

	    $recinto = $this->Recinto->findById($id);

	    $this->Recinto->id = $id;

	    if($this->request->is('get')){

	        $this->request->data = $this->Recinto->read();

	    }

	    else{

	        if($this->Recinto->save($this->request->data)){

	            $this->Session->setFlash('

					<div class="alert alert-success">

						<button type="button" class="close" data-dismiss="alert">×</button>

						<h4>Confirmación</h4>

						La información fué actualizada satisfactoriamente. 

					</div>'

				);

				return $this->redirect(array('action'=>'add'));

	        }

	    }

	    $this->set('recinto', $recinto);

	}

}

?>