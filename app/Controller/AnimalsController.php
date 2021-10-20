<?php

class AnimalsController extends AppController {

	//public $helpers = array('Html','Form');

	Public $helpers = array('Html', 'Form', 'Csv'); 

	public $uses = ['Animal', 'Type', 'Documento', 'Bajatype', 'Recinto', 'Condition', 'Autorizacione'];

	public $name = 'Animals';
	
	public $components = array('Export.Export', 'Flash', 'RequestHandler', 'Session');

	public function view($id = null){

		if(!$id){ throw new NotFoundException(__('Solicitud invalida')); }

		$animal = $this->Animal->findById($id);

		if(!$animal){ throw new NotFoundException(__('Solicitud invalida')); }

		$documentos = $this->Documento->find('all', array( 'conditions' => array('Documento.animal_id' => $id)));

		$autorizaciones = $this->Autorizacione->find('all', array('conditions' => array('Autorizacione.animal_id' => $id )));

		$this->set('animal', $animal);

		$this->set('documentos', $documentos);

		$this->set('autorizaciones', $autorizaciones);

	}

	public function index(){

        $this->paginate = 

			array(

				'limit' => 25,

				'order' => array('id'=>'asc')

			);

		$animals = $this->paginate('Animal');

		$encontrados = count($animals);

		$this->set('animals', $animals);

		$this->set('encontrados', $encontrados);		
	
	}

	public function add($id = null){

		$this->set('id', $id); /* Pasa el parametro id a la vista */

		/* trae listado de especies */
		
		$types = $this->Type->find('list', array ( 'fields' => array ( 'Type.id', 'Type.nombre_comun' )));

		/* Pasa el parametro de especies o tipos */

        $this->set('types', $types);

        /* trae listado de conditions */

        $conditions = $this->Condition->find('list', array ( 'fields' => array ( 'Condition.id', 'Condition.nombre' )));

		/* Pasa el parametro de conditions */

        $this->set('conditions', $conditions);

        /* trae listado de recintos */

        $recintos = $this->Recinto->find('list', array ( 'fields' => array ( 'Recinto.id', 'Recinto.nombre' )));

		/* Pasa el parametro de conditions */

        $this->set('recintos', $recintos);

		if($this->request->is('post')){

			/* Se procede a invocar funciones para generar código y digito */

			$type_id = $this->data['Animal']['type_id'];

			$numero = $this->obtiene_digito($type_id);

			$abreviatura = $this->obtiene_abreviatura($type_id);

			$digito = $this->compara_largo($numero);

			$codigo = $abreviatura."-".$digito;

			$this->request->data['Animal']['codigo'] = $codigo;

			$this->request->data['Animal']['digito'] = $numero;

			$this->request->data['Animal']['estado'] = "ALTA";

			$this->request->data['Animal']['user_id'] = $this->Auth->user('id');

			/* Fin funciones */
    
            if($this->Animal->save($this->request->data)){

				$this->Session->setFlash('

					<div class="alert alert-success">

						<button type="button" class="close" data-dismiss="alert">×</button>

						<h4>Confirmación</h4>

						La información fué almacenada satisfactoriamente. 

					</div>'

				);

				//$this->Flash->success('Your especie has been saved.');
				
				$id = $this->Animal->id;
				
				$this->redirect(array('action'=>'view', $id));
			}
		}
	}

	public function obtiene_digito($type_id = null){

		$animals = $this->Animal->find('first',

			array(

				'conditions' => array('type_id' => $type_id), 
    
    			'fields' => array('MAX(digito) AS digito')

			)

		);

		foreach ($animals as $animal):

			$numero = $animal['digito'];
                                            
        endforeach;

		return $numero + 1;

	}

	public function obtiene_abreviatura($type_id = null){

		$types = $this->Type->find('all',

			array(

				'conditions' => array('id' => $type_id),

    			'fields' => array('Type.id','Type.abreviacion')

			)

		);

		foreach ($types as $type):

			$ab = $type['Type']['abreviacion'];
                                            
        endforeach;

		return $ab;

	}

	public function compara_largo($digito = null){

		$largo = strlen($digito);

		if($largo == 1){

			return "00".$digito;
		}

		else if($largo == 2){

			return "0".$digito;

		}

		else { return $digito; }		
	
	}

	public function search(){

		$conditions = $this->Condition->find('list', array('fields' => array('Condition.id', 'Condition.nombre')));

		/* Pasa el parametro de conditions*/

        $this->set('conditions', $conditions);

		$animals = "";

		$encontrados = "";

        if(!empty($this->request->query)){

            $this->paginate = array(
               
                'conditions' =>

                    array('AND' =>

                        array( 'Type.nombre_comun LIKE' => '%' . $this->params['url']['nombre_comun'] . '%' ),

                        array( 'Animal.estado LIKE' => '%' . $this->params['url']['estado'] . '%' ),

                        array( 'Condition.id LIKE' => '%' . $this->params['url']['condicion'] . '%' ),
                    
                    ),

                'fields' => array('Type.*', 'Animal.*'),

                'limit' => 15,

                'order' => array('id' => 'desc'),

            );

            $animals = $this->paginate('Animal');

            $encontrados = count($animals);

            if($encontrados==0){

	        $this->Session->setFlash('

				<div class="alert alert-info">

					<button type="button" class="close" data-dismiss="alert">×</button>

					<h4>Información</h4>

					La consulta no arrojó resultados, favor volver a intentar en caso de no existir el animál debe agregarlo.

				</div>'

			);

	    	}

        }

        $this->set('animals', $animals);

        $this->set('encontrados', $encontrados);

	}

	public function edit($id = null){

		    if(!$id){ throw new NotFoundException(__('Solicitud invalida')); }

		    $animal = $this->Animal->findById($id);

		    if(!$animal){ throw new NotFoundException(__('Solicitud invalida')); }

			/* trae listado de especies */
		
			$types = $this->Type->find('list', array ( 'fields' => array ( 'Type.id', 'Type.nombre_comun' )));

			/* Pasa el parametro de especies */

	        $this->set('types', $types);

	        /* trae listado de conditions */

	        $conditions = $this->Condition->find('list', array ( 'fields' => array ( 'Condition.id', 'Condition.nombre' )));

			/* Pasa el parametro de conditions */

	        $this->set('conditions', $conditions);

	        /* trae listado de recintos */

	        $recintos = $this->Recinto->find('list', array ( 'fields' => array ( 'Recinto.id', 'Recinto.nombre' )));

			/* Pasa el parametro de conditions */

	        $this->set('recintos', $recintos);

	        $this->Animal->id = $id;

	        if($this->request->is('get')){

	            $this->request->data = $this->Animal->read();

	        }

	        else{

	            if($this->Animal->save($this->request->data)){

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

	        $this->set('animal', $animal);

	       	$this->set('types', $types);

	       	$this->set('recintos', $recintos);

	}

	public function baja($id = null){

		if(!$id){ throw new NotFoundException(__('Solicitud invalida')); }

		$animal = $this->Animal->findById($id);

		if(!$animal){ throw new NotFoundException(__('Solicitud invalida')); }

		$this->set('animal', $animal);

		$bajatypes = $this->Bajatype->find( 'list', array ( 'fields' => array( 'Bajatype.id', 'Bajatype.nombre')));

		$this->set('bajatypes', $bajatypes);

		if($this->request->is(array('post', 'put'))){

			$this->Animal->id = $id;

			if($this->Animal->save($this->request->data)){

				$this->Session->setFlash('

					<div class="alert alert-success">

						<button type="button" class="close" data-dismiss="alert">×</button>

						<h4>Confirmación</h4>

						El registro fué dado de baja satisfactoriamente. 

					</div>'

				);

				return $this->redirect(array('action'=>'view', $id));

			}

			$this->Flash->error(__('No disponible para efectuar acción.'));
		
		}

		if(!$this->request->data){

			$this->request->data = $animal;

		}

	}

	public function search_altas(){

        /* trae listado de especies */
		
		$types = $this->Type->find('list', 

			array ( 'fields' => 

				array ( 'Type.nombre_comun', 'Type.nombre_comun' )

				)

			);

		/* Pasa el parametro de especies */

        $this->set('types', $types);

        /* trae listado de conditions */

        $conditions = $this->Condition->find('list', array ( 'fields' => array ( 'Condition.nombre', 'Condition.nombre' )));

		/* Pasa el parametro de conditions */

        $this->set('conditions', $conditions);

        /* trae listado de recintos */

        $recintos = $this->Recinto->find('list', array ( 'fields' => array ( 'Recinto.nombre', 'Recinto.nombre' )));

		/* Pasa el parametro de conditions */

        $this->set('recintos', $recintos);

		$animals = "";

		$alta_fecha_1 = "";

		$alta_fecha_2 = "";

		$encontrados = "";

        if(!empty($this->request->query)){

            $this->paginate = array(
               
                'conditions' =>

                    array('AND' =>

                    	array( 'date(Animal.fecha_alta) BETWEEN ? AND ?' => 

                    		array(

                    			$this->params['url']['alta_fecha_1'], 

                    			$this->params['url']['alta_fecha_2']

                    		)

                    	),

                        array( 'Type.nombre_comun LIKE' => '%' . $this->params['url']['type'] . '%' ),

                        array( 'Condition.nombre LIKE' => '%' . $this->params['url']['condicion'] . '%' ),

                        array( 'Animal.estado' => 'ALTA' ),
                    
                    ),

                'fields' => array('Type.*','Animal.*','Condition.*'),

                'limit' => 15,

                'order' => array('id' => 'desc'),

            );



            $animals = $this->paginate('Animal');

            $alta_fecha_1 = $this->params['url']['alta_fecha_1'];

        	$alta_fecha_2 = $this->params['url']['alta_fecha_2'];

        	$encontrados = count($animals);

        }


        $this->set('animals', $animals);

        $this->set('alta_fecha_1', $alta_fecha_1);

        $this->set('alta_fecha_2', $alta_fecha_2);

        $this->set('encontrados', $encontrados);

	}

	public function search_bajas(){

        /* trae listado de especies */
		
		$types = $this->Type->find('list', 

			array ( 'fields' => 

				array ( 'Type.nombre_comun', 'Type.nombre_comun' )

				)
			);

		/* Pasa el parametro de especies */

        $this->set('types', $types);

        /* trae listado de conditions */

        $conditions = $this->Condition->find('list', array ( 'fields' => array ( 'Condition.nombre', 'Condition.nombre' )));

		/* Pasa el parametro de conditions */

        $this->set('conditions', $conditions);

        /* trae listado de recintos */

        $recintos = $this->Recinto->find('list', array ( 'fields' => array ( 'Recinto.nombre', 'Recinto.nombre' )));

		/* Pasa el parametro de conditions */

        $this->set('recintos', $recintos);

		$animals = "";

		$baja_fecha_1 = "";

		$baja_fecha_2 = "";

		$encontrados = "";

        if(!empty($this->request->query)){

            $this->paginate = array(
               
                'conditions' =>

                    array('AND' =>

                    	array( 'date(Animal.fecha_baja) BETWEEN ? AND ?' => 

                    		array(

                    			$this->params['url']['baja_fecha_1'], 

                    			$this->params['url']['baja_fecha_2']

                    		)

                    	),

                        array( 'Type.nombre_comun LIKE' => '%' . $this->params['url']['type'] . '%' ),

                        array( 'Condition.nombre LIKE' => '%' . $this->params['url']['condicion'] . '%' ),

                        array( 'Animal.estado' => 'BAJA' ),
                    
                    ),

                'fields' => array('Type.*', 'Animal.*', 'Condition.*', 'Bajatype.*'),

                'limit' => 15,

                'order' => array('id' => 'desc'),

            );



            $animals = $this->paginate('Animal');

            $baja_fecha_1 = $this->params['url']['baja_fecha_1'];

        	$baja_fecha_2 = $this->params['url']['baja_fecha_2'];

        	$encontrados = count($animals);

        }


        $this->set('animals', $animals);

        $this->set('baja_fecha_1', $baja_fecha_1);

        $this->set('baja_fecha_2', $baja_fecha_2);

        $this->set('encontrados', $encontrados);

	}

	public function search_all(){

        /* trae listado de especies */
	
		$types = $this->Type->find('list', 

			array ( 'fields' => 

				array ( 'Type.nombre_comun', 'Type.nombre_comun' )

				)
			);

		/* Pasa el parametro de especies */

        $this->set('types', $types);

        /* trae listado de conditions */

        $conditions = $this->Condition->find('list', array ( 'fields' => array ( 'Condition.nombre', 'Condition.nombre' )));

		/* Pasa el parametro de conditions */

        $this->set('conditions', $conditions);

        /* trae listado de recintos */

        $recintos = $this->Recinto->find('list', array ( 'fields' => array ( 'Recinto.nombre', 'Recinto.nombre' )));

		/* Pasa el parametro de conditions */

        $this->set('recintos', $recintos);

		$altas = "";

		$bajas = "";

		$fecha_1 = "";

		$fecha_2 = "";

		$encontrados = "";

        if(!empty($this->request->query)){

        	$altas = $this->Animal->find('all',

            	array(
               
	                'conditions' =>

	                    array('AND' =>

	                    	array( 'date(Animal.fecha_alta) BETWEEN ? AND ?' => 

	                    		array(

	                    			$this->params['url']['fecha_1'], 

	                    			$this->params['url']['fecha_2']

	                    		)

	                    	)
	                    
	                    ),

	                'fields' => array('Type.*', 'Animal.*', 'Condition.*', 'Bajatype.*'),

            	)

            );

            $bajas = $this->Animal->find('all',

            	array(
               
	                'conditions' =>

	                    array('AND' =>

	                    	array( 'date(Animal.fecha_baja) BETWEEN ? AND ?' => 

	                    		array(

	                    			$this->params['url']['fecha_1'], 

	                    			$this->params['url']['fecha_2']

	                    		)

	                    	)
	                    
	                    ),

	                'fields' => array('Type.*', 'Animal.*', 'Condition.*', 'Bajatype.*'),

            	)

            );

            ////////////////////////////////////////////////////////////////////////////////////////////////////

            $fecha_1 = $this->params['url']['fecha_1'];

        	$fecha_2 = $this->params['url']['fecha_2'];

        	////////////////////////////////////////////////////////////////////////////////////////////////////

            $this->Session->write('fecha_1', $fecha_1);

            $this->Session->write('fecha_2', $fecha_2);

            ////////////////////////////////////////////////////////////////////////////////////////////////////

        	$encont1 = count($altas);

        	$encont2 = count($bajas);

        	$encontrados = $encont1 + $encont2; 

        }


        $this->set('altas', $altas);

        $this->set('bajas', $bajas);

        $this->set('fecha_1', $fecha_1);

        $this->set('fecha_2', $fecha_2);

        $this->set('encontrados', $encontrados);

	}

	/**/

	public function view_pdf(){

        ini_set('memory_limit', '512M');

        $fecha_1 = $this->Session->read('fecha_1');

        $fecha_2 = $this->Session->read('fecha_2');
        
        $altas = $this->Animal->find('all',

        	array(
           
                'conditions' =>

                    array('AND' =>

                    	array( 'date(Animal.fecha_alta) BETWEEN ? AND ?' => 

                    		array($fecha_1, $fecha_2)

                    	)
                    
                    ),

                'fields' => array('Type.*', 'Animal.*', 'Condition.*', 'Bajatype.*', 'Recinto.*'),

        	)

        );

        
        $bajas = $this->Animal->find('all',

        	array(
           
                'conditions' =>

                    array('AND' =>

                    	array( 'date(Animal.fecha_baja) BETWEEN ? AND ?' => 

                    		array($fecha_1, $fecha_2)

                    	)
                    
                    ),

                'fields' => array('Type.*', 'Animal.*', 'Condition.*', 'Bajatype.*', 'Recinto.*'),

        	)

        );

        $this->set('altas', $altas);

        $this->set('bajas', $bajas);

        $fecha_one = date("d/m/Y", strtotime($fecha_1));

        $fecha_two = date("d/m/Y", strtotime($fecha_2));

        $this->set('fecha_1', $fecha_one);

        $this->set('fecha_2', $fecha_two);
    
    }

	public function exportar(){	

	}

	// Eliminar 

	public function excel(){

	}

	//Agregar

	public function export_animals(){

		$this->Animal->recursive = 0;

		$fecha_1 = $this->request->data['Animal']['fecha_ingreso_inicio'];

		$fecha_2 = $this->request->data['Animal']['fecha_ingreso_termino'];

		ini_set('memory_limit', '1024M');
		
		$data = $this->Animal->find('all',

	    	array(

	    		'conditions' =>

	                    array('AND' =>

	                    	array( 'date(Animal.fecha_alta) BETWEEN ? AND ?' => array($fecha_1, $fecha_2))
	                    
	                    ),

	    		'fields' => 

		    		array(

						'Animal.id',

						'Animal.codigo',

	                    'Animal.nombre',

	                    'Animal.chip_id',    

						'Type.nombre_comun',

						'Type.subgenero',

						'Condition.nombre',

						'Animal.fecha_nacimiento',

						'Animal.fecha_alta',

						'Recinto.nombre',

						'Animal.sexo',

						'Animal.estado',

						'Animal.description_activo',

						'Bajatype.nombre',

						'Animal.fecha_baja',

						'Animal.glosa_baja',

						'Animal.valor_compra',

						'Animal.vida_util',

						'Animal.created',

						'Animal.modified'

					)
	    		)
			);
			
		$this->Export->exportCsv($data, 'report.csv');
	
	}

	//Agregar

	function delete($id){

		if($this->Animal->delete($id)){

			$this->Session->setFlash("

				<div class='alert alert-success'>

						<button type='button' class='close' data-dismiss='alert'>×</button>

						<h4>Confirmación</h4>

						El registro fué eliminado satisfactoriamente. 

				</div>

			");

			$this->redirect(array('action' => 'search'));          
        
        }

	}

	function massive($id = null){

		$this->set('id', $id); 

		/* Pasa el parametro id a la vista */

		$types = $this->Type->find('list', array ( 'fields' => array ( 'Type.id', 'Type.nombre_comun' )));

		/* Pasa el parametro de tipos de animales */

        $this->set('types', $types);

         /* trae listado de conditions */

        $conditions = $this->Condition->find('list', array ( 'fields' => array ( 'Condition.id', 'Condition.nombre' )));

		/* Pasa el parametro de conditions */

        $this->set('conditions', $conditions);

        /* trae listado de recintos */

        $recintos = $this->Recinto->find('list', array ( 'fields' => array ( 'Recinto.id', 'Recinto.nombre' )));

		/* Pasa el parametro de conditions */

        $this->set('recintos', $recintos);

        // aca debe ir rutina para arreglo


        if($this->request->is('post')){

			$cantidad = $this->data['Animal']['cantidad'];       

        	for($i=0; $i<$cantidad; $i++){

				/* Se procede a invocar funciones para generar código y digito */

				$type_id = $this->data['Animal']['type_id'];

				$numero = $this->obtiene_digito($type_id);

				$abreviatura = $this->obtiene_abreviatura($type_id);

				$digito = $this->compara_largo($numero);

				$codigo = $abreviatura."-".$digito;

				$this->request->data['Animal']['codigo'] = $codigo;

				$this->request->data['Animal']['digito'] = $numero;

				$this->request->data['Animal']['estado'] = "ALTA";

				$this->request->data['Animal']['user_id'] = $this->Auth->user('id');

				/* Fin funciones */

				/* Funcion para guardar */
    
	            if($this->Animal->saveAll($this->request->data)){

	            }

			}

			$this->Session->setFlash('

				<div class="alert alert-success">

					<button type="button" class="close" data-dismiss="alert">×</button>

					<h4>Confirmación</h4>

					La información fué almacenada satisfactoriamente. 

				</div>'

			);
			
			$this->redirect(array('controller'=>'Types', 'action'=>'view', $type_id));
		
		}

	}

	//Agregar

	public function deshacer($id = null){

		if(!$id){ throw new NotFoundException(__('Solicitud invalida')); }

		$animal = $this->Animal->findById($id);
		    
		if(!$animal){ throw new NotFoundException(__('Solicitud invalida')); }

	    $this->Animal->id = $id;

	    if($this->request->is('get')){

        	$this->Animal->query(                                             

				"UPDATE animals
                            
					SET
                           
	                    estado = 'ALTA',
	                    bajatype_id = '',
	                    fecha_baja = '',
	                    glosa_baja = ''


					WHERE id = $id"

			);	        

			$this->Session->setFlash('

				<div class="alert alert-success">

					<button type="button" class="close" data-dismiss="alert">×</button>

					<h4>Confirmación</h4>

					Registro nuevamente en alta. 

				</div>'

			);

			$this->redirect(array('action'=>'view', $id));

		}

	}

	//Agregar

	public function baja_simultanea(){

		$conditions = $this->Condition->find('list', array('fields' => array('Condition.id', 'Condition.nombre')));

        $this->set('conditions', $conditions);

        $bajatypes = $this->Bajatype->find( 'list', array ( 'fields' => array( 'Bajatype.id', 'Bajatype.nombre')));

		$this->set('bajatypes', $bajatypes);

		$animals = "";

        if(!empty($this->request->query)){

            $animals = $this->Animal->find('all', array(
               
                'conditions' => array (

                    'AND' => array(

                        'Type.nombre_comun LIKE' => '%' . $this->params['url']['nombre_comun'] . '%' ,

                        'Animal.estado' => 'ALTA',

                        'Condition.id LIKE' => '%' . $this->params['url']['condicion'] . '%' ,
                    
                    ),
            
            	)

            ));

        }

        $this->set('animals', $animals);

	}

	public function deshacer_multiple() {

		if ($this->request->is('post')){

			$bajatype_id = $this->request->data['Animal']['bajatype_id'];

			$fecha_baja = $this->request->data['Animal']['fecha_baja'];

			$glosa_baja = $this->request->data['Animal']['glosa_baja'];

			//pr($bajatype_id);

			$data = $this->data['case'];

			$largo_array = sizeof($data);

			$primer_id = $this->request->data['Animal']['animal_id'] = $this->data['case'][0]; // trae valor de primer check

			//debug($largo_array);

			for($i = 0; $i < $largo_array; $i++){

				$animal_id = $this->data['case'][$i]; //trae el valor de los siguientes check
				
				$this->Animal->query(

					"UPDATE animals

					SET

						estado = 'BAJA',

						bajatype_id = '$bajatype_id',

						fecha_baja = '$fecha_baja',

						glosa_baja = '$glosa_baja'

					WHERE id = '$animal_id'

				");

				//echo "$animal_id.'-'";

			}

			$this->Session->setFlash('

				<div class="alert alert-success">

				<button type="button" class="close" data-dismiss="alert">×</button>

				<h4>Confirmación</h4>

				La información fué almacenada satisfactoriamente. 

				</div>'

			);

		}

		//return $largo_array; 

		$this->redirect(array('controller'=>'Animals', 'action' => 'baja_simultanea'));

		

	}

	public function search_massive(){

		$conditions = $this->Condition->find('list', array('fields' => array('Condition.id', 'Condition.nombre')));

        $this->set('conditions', $conditions);

        $bajatypes = $this->Bajatype->find( 'list', array ( 'fields' => array( 'Bajatype.id', 'Bajatype.nombre')));

		$this->set('bajatypes', $bajatypes);

		$animals = "";

        if(!empty($this->request->query)){

            $animals = $this->Animal->find('all', array(
               
                'conditions' => array (

                    'AND' => array(

                        'Type.nombre_comun LIKE' => '%' . $this->params['url']['nombre_comun'] . '%' ,

                        //'Animal.estado LIKE' => '%' . $this->params['url']['estado'] . '%' ,

                        'Condition.id LIKE' => '%' . $this->params['url']['condicion'] . '%' ,
                    
                    ),
            
            	)

            ));

        }

        $this->set('animals', $animals);

	}

	
		
}
