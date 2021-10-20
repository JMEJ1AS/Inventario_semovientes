<?php

App::uses('AppModel','Model');

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel{

	public $name = 'User';

    public $hasMany = array('Autorizacione');

	public $validate = array(

        'nombre' => array('rule' => 'notBlank'),

        'username' => array('rule' => 'notBlank'),

        'mail' => array('rule' => 'notBlank'),

        'password' => array('rule' => 'notBlank'),

        'role' => array(

            'valid'=>array(

                'rule' => array('inList', array('ADMIN','ZOOLOGICO','INVENTARIO')),

                'message' => 'Favor ingresar un rol o perfil valido',

                'allowEmpty' => false
            )
        
        )
    
    );

    public function beforeSave($options = array()){

        if(isset($this->data[$this->alias]['password'])) {

            $passwordHasher = new BlowfishPasswordHasher();

            $this->data[$this->alias]['password'] = $passwordHasher->hash(

                $this->data[$this->alias]['password']

            );

        }

        return true;
    }

}