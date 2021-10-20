<?php

class Type extends AppModel {

    public $name = 'Type';

    public $hasMany = array('Animal');

    public $validate = array(

        'nombre_comun' => array('rule' => 'notBlank'),

        //'nombre_cientifico' => array('rule' => 'notBlank'),

        'abreviacion' => array('rule' => 'notBlank'),

    );

}

?>