<?php

class AutorizacionesController extends AppController {

	public $helpers = array('Html','Form','Js');

	public $uses = ['Autorizacione', 'Animal'];

	public $name = 'Autorizaciones';

	public $components = array('Session', 'Flash');

	public function isAuthorized($user){

		// Solo admin e Inventario pueden agregar y editar Autorizaciones

		if($user['role'] === 'ADMIN' OR $user['role'] === 'INVENTARIO'){

			if($this->action === 'add') 

				{ return true; }

			else if ($this->action === 'edit') 

				{ return true; }

			else 

				{ return false; }

		}
	
	}

	public function add($id = null){

		$this->set('animal', $this->Autorizacione->Animal->findById($id));

		if ($this->request->is('post')){
	
			if($this->Autorizacione->save($this->request->data)){
		
				$this->Session->setFlash('

					<div class="alert alert-success">

						<button type="button" class="close" data-dismiss="alert">×</button>

						La información fué almacenada satisfactoriamente. 

					</div>'

				);

				$this->redirect(array('action' => 'add', $id));

			}

		}

		$autorizaciones = $this->Autorizacione->find('all', 

			array(

				'conditions' => array(

					'Autorizacione.animal_id' => $id

				)
			
			)
		
		);

		$this->set('autorizaciones', $autorizaciones);

	}

}