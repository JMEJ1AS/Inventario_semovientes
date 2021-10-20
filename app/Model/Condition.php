<?php

class Condition extends AppModel{

	public $name = 'Condition';

	public $hasMany = array('Animal'); // Un propietario esta en varios animales

    public $validate = array(

        'nombre' => array('rule' => 'notBlank'),

        'descripcion' => array('rule' => 'notBlank')

    );

}

?>