<?php

class BajatypesController extends AppController {

	public $helpers = array('Html','Form');

	public $name = 'Bajatypes';

	public $components = array('Flash');

	public function add($id = null){

		if ($this->request->is('post')){
	
			if($this->Bajatype->save($this->request->data)){
		
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

		$bajatypes = $this->Bajatype->find('all');

		$this->set('bajatypes', $bajatypes);

	}

	public function edit($id = null){

	    if(!$id){ throw new NotFoundException(__('Solicitud de modificación invalida')); }

	    $bajatype = $this->Bajatype->findById($id);

	    $this->Bajatype->id = $id;

	    if($this->request->is('get')){

	        $this->request->data = $this->Bajatype->read();

	    }

	    else{

	        if($this->Bajatype->save($this->request->data)){

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

	    $this->set('bajatype', $bajatype);

	}

}

?>