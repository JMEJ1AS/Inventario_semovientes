<?php

class Familia extends AppModel{

	public $name = 'Familia';

	public $hasMany = array('Animal');

	/*public $hasMany = array(
        
        'Animal' => array(
            
            'className' => 'Animal',
            
            'foreignKey' => 'specy_id',
          
        )
    
    );*/

    public $validate = array(

        'nombre_comun' => array('rule' => 'notBlank'),

        'nombre_cientifico' => array('rule' => 'notBlank'),

        'abreviacion' => array('rule' => 'notBlank'),

    );

}