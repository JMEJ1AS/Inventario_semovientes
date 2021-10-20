<?php

class ConditionsController extends AppController {

	public $helpers = array('Html','Form');

	public $name = 'Conditions';

	public $components = array('Flash');

	public function add($id = null){

		if ($this->request->is('post')){
	
			if($this->Condition->save($this->request->data)){
		
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

		$conditions = $this->Condition->find('all');

		$this->set('conditions', $conditions);

	}

	public function edit($id = null){

	    if(!$id){ throw new NotFoundException(__('Solicitud de modificación invalida')); }

	    $condition = $this->Condition->findById($id);

	    $this->Condition->id = $id;

	    if($this->request->is('get')){

	        $this->request->data = $this->Condition->read();

	    }

	    else{

	        if($this->Condition->save($this->request->data)){

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

	    $this->set('condition', $condition);

	}

}

?>