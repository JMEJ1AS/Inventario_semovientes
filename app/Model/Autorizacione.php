<?php

class Autorizacione extends AppModel {

	public $name = 'Autorizacione';

	var $belongsTo = array('Animal','User'); // muchas autorizaciones tienen un solo animal y un solo usuario quien realiza acción

}