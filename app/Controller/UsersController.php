<?php

class UsersController extends AppController {

	public $helpers = array('Html','Form','Js');

	public $name = 'Users';

	public $components = array('Session', 'Flash');

	public function isAuthorized($user){

		// Solo admin e Inventario pueden agregar y editar Autorizaciones

		if($user['role'] === 'ZOOLOGICO' OR $user['role'] === 'INVENTARIO'){

			if(in_array($this->action, array('add', 'edit'))){ 

				return false; 
			}

			else if(in_array($this->action, array('changepass'))){

				$userId = $this->params['pass'][0];

				//echo $userId."=".$this->Session->read('id');

				if($userId === $this->Session->read('id')){

					return true;
				
				}
				
				return false;
			}

			else { return true; }
		
		}

		else { return true; }
	}

	public function beforeFilter(){
		
		$this->Auth->allow(array('login','logout'));
	
	}

	public function add($id = null){

		if ($this->request->is('post')){
	
			if($this->User->save($this->request->data)){
		
				$this->Session->setFlash('

					<div class="alert alert-success">

						<button type="button" class="close" data-dismiss="alert">×</button>

						La información fué almacenada satisfactoriamente. 

					</div>'

				);

				$this->redirect(array('action' => 'add'));

			}

		}

		$users = $this->User->find('all');

		$this->set('users', $users);

	}

	public function edit($id = null){

	    if(!$id){ throw new NotFoundException(__('Solicitud de modificación invalida')); }

	    $user = $this->User->findById($id);

	    if(!$user){ throw new NotFoundException(__('Solicitud de modificación invalida')); }

	    $this->User->id = $id;

	    if($this->request->is('get')){

	        $this->request->data = $this->User->read();

	    }

	    else{

	        if($this->User->save($this->request->data)){

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

	    $this->set('user', $user);

	}

	public function login(){

		if($this->request->is('post')){

			if($this->Auth->login()){

				$id = AuthComponent::user('id');

                $nombre = AuthComponent::user('nombre');

                $this->Session->write('id', $id);

                $this->Session->write('nombre', $nombre);

				return $this->redirect($this->Auth->RedirectUrl());	
			
			}

			$this->Session->setFlash('

					<div class="alert alert-error">

						<button type="button" class="close" data-dismiss="alert">×</button>

						<h4>Error</h4>

						Nombre de usuario o contraseña incorrecta, favor volver a intentar. 

					</div>'

				);
		}

		$this->layout='ajax';

	}

	public function logout(){

		return $this->redirect($this->Auth->logout());
	
	}

	public function view($id = null){

		if(!$id){ throw new NotFoundException(__('Solicitud de modificación invalida')); }

		$this->set('user', $this->User->findById($id));

	}

	public function changepass($id = null){

	    if(!$id){ throw new NotFoundException(__('Solicitud de modificación invalida')); }

	    $user = $this->User->findById($id);

	    $this->User->id = $id;

	    if($this->request->is('get')){

	        $this->request->data = $this->User->read();

	    }

	    else{

	        if($this->User->save($this->request->data)){

	            $this->Session->setFlash('

					<div class="alert alert-success">

						<button type="button" class="close" data-dismiss="alert">×</button>

						<h4>Confirmación</h4>

						La información fué actualizada satisfactoriamente. 

					</div>'

				);

				return $this->redirect(array('action'=>'view', $id));

	        }

	    }

	    $this->set('user', $user);

	}

}

?>
