<?php

class Documento extends AppModel {

	public $name = 'Documento';

	var $belongsTo = array('Animal'); // un documento tiene sola una solicitud

    public $validate = array(

        //'documento' => array('required' => true)

        'documento' => array(
            
            'rule' => array(
            
                'extension', array('pdf','doc','docx','jpeg','jpg','png','xls','xlsx','bmp','gif','tiff','zip','rar')),
            
                'required' => true,
            
                'allowEmpty' => false,
            
                'message' => '(Archivos permitidos : pdf, doc, docx, jpeg, jpg, png, xls, xlsx, bmp, gif, tiff, zip, rar).',
            
                'last' => 'on'
        )
    );

	public $actsAs = array(

        'Upload.Upload' => array(

            'documento' => array(

                'fields' => array(

                    'dir' => 'dir'

                ),

                'thumbnailMethod' => 'php',

                'deleteOnUpdate' => true,

                'deleteFolderOnDelete' => true

            )

        )

    );

}

?>