<?php

class TypesController extends AppController {

	Public $helpers = array('Html', 'Form', 'Csv');

	public $uses = ['Type','Animal'];

	public $name = 'Types';
	
	public $components = array('Export.Export','Flash');

public function view($id = null){

	$this->set('type', $this->Type->findById($id));

	//$animals = $this->Animal->find('all', array('conditions' => array('Animal.type_id' => $id)));

	$this->paginate = 

		array(

			'limit' => 10,

			'order' => array('digito'=>'asc'),

			'conditions' => array('Animal.type_id' => $id)

		);

	$animals = $this->paginate('Animal');

	$this->set('animals', $animals);

}

public function index(){

    $this->paginate = 

		array(

			'limit' => 15,

			'order' => array('id'=>'asc')

		);

	$types = $this->paginate('Type');

	$encontrados = count($types);

	$this->set('types', $types);

	$this->set('encontrados', $encontrados);		

}

public function add(){

	if ($this->request->is('post')){

        if($this->Type->save($this->request->data)){
			
			$this->Session->setFlash('

				<div class="alert alert-success">

					<button type="button" class="close" data-dismiss="alert">×</button>

					<h4>Confirmación</h4>

					La información fué almacenada satisfactoriamente. 

				</div>'

			);
			
			$this->redirect(array('action'=>'add'));
		}
	}
}

	public function edit($id = null){

		    if(!$id){ throw new NotFoundException(__('Solicitud de modificación invalida')); }

		    $type = $this->Type->findById($id);

	        $this->Type->id = $id;

	        if($this->request->is('get')){

	            $this->request->data = $this->Type->read();

	        }

	        else{

	            if($this->Type->save($this->request->data)){

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

	       	$this->set('type', $type);

	}


public function search(){

	$types = "";

	$encontrados = "";

	    if(!empty($this->request->query)){

	        $this->paginate = array(
	           
	            'conditions' =>

	                array('AND' =>

	                    array( 'Type.nombre_comun LIKE' => '%' . $this->params['url']['nombre_comun'] . '%' )
	                
	                ),

	            'fields' => array('Type.*'),

	            'limit' => 15,

	            'order' => array('id' => 'desc'),

	        );

	        $types = $this->paginate('Type');

	        $encontrados = count($types);

	        if($encontrados==0){

	        $this->Session->setFlash('

				<div class="alert alert-info">

					<button type="button" class="close" data-dismiss="alert">×</button>

					<h4>Información</h4>

					La consulta no arrojó resultados, favor volver a intentar en caso de no existir la especie debe agregarla.

				</div>'

			);

	    	}

	    }


    $this->set('types', $types);

    $this->set('encontrados', $encontrados);

	}

}
