<?php

class Recinto extends AppModel{

	public $name = 'Recinto';

	public $hasMany = array('Animal'); // Un tipo de baja puede estar en varios animales

	public $validate = array(

        'nombre' => array('rule' => 'notBlank')

    );

}

?>