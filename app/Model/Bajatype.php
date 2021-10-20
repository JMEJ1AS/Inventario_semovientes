<?php

class Bajatype extends AppModel{

	public $name = 'Bajatype';

	public $hasMany = array('Animal'); // Un tipo de baja puede estar en varios animales

	public $validate = array(

        'nombre' => array('rule' => 'notBlank')

    );

}

?>