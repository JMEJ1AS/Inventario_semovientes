<?php

class Animal extends AppModel {

    public $name = 'Animal';

    public $belongsTo = array('Type', 'Condition', 'Bajatype', 'Recinto'); 

    //muchos animales tienen una animalspecie, un propietario una tipo de baja y estan en un recinto.

    public $hasMany = array('Documento', 'Autorizacione');

    //Un animal puede tener muchos documentos y autorizaciones

    public $validate = array(

        //'nombre' => array('rule' => 'notBlank'),

        'type_id' => array('rule' => 'notBlank'),

        'condition' => array('rule' => 'notBlank'),

        //'fecha_nacimiento' => array('rule' => 'notBlank'),

        'fecha_ingreso' => array('rule' => 'notBlank'),

        'propietario_id' => array('rule' => 'notBlank'),

        'valor' => array('rule' => 'notBlank'),

        'longevidad' => array('rule' => 'notBlank'),

        'bajatype_id' => array('rule' => 'notBlank'),

        'cantidad' => array('rule' => 'notBlank'),

        'nombre_comun' => array('rule' => 'notBlank')

    );

}

?>
