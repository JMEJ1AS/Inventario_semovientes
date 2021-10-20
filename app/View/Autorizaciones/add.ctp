<div class="row-fluid">

    <!-- sidebar -->

    <div class="span3" id="sidebar">

        <?php echo $this->element('logo'); ?>
    
        <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
        
            <li><?php echo $this->Html->link("Listar animales", "../Animals");?></li>

            <li><?php echo $this->Html->link("Ingresar animal", "../Animals/add");?></li>

            <li><?php echo $this->Html->link("Buscar animal", "../Animals/search");?></li>

            <li><?php echo $this->Html->link("Ver detalle", "../Animals/view/".$animal['Animal']['id']);?></li>

            <li><?php echo $this->Html->link("Administrar documentos", "../Documentos/add/".$animal['Animal']['id']);?></li>

            <li><?php echo $this->Html->link("Editar registro", "../Animals/edit/".$animal['Animal']['id']);?></li>

            <li><?php echo $this->Html->link("Registrar baja", "../Animals/baja/".$animal['Animal']['id']);?></li>

            <li class="active"><?php echo $this->Html->link("Autorizar acción", "../Autorizaciones/add/".$animal['Animal']['id']);?></li>

	    <li><?php echo $this->Html->link("Bajas simultáneas", "../Animals/baja_simultanea");?></li>

	    <li><?php echo $this->Html->link("Carga masiva de documentos", "../Animals/search_massive");?></li>
    
        </ul>
                
    </div>

    <!-- fin sidebar -->
                
    <!--/span -->
                
    <div class="span9" id="content">
                    
        <div class="row-fluid">
                        
            <!-- muestra mensaje de confirmación -->

            <?php echo $this->Session->flash(); ?>

            <!-- Barra de navegación -->
                        
            <div class="navbar">
                            
                <div class="navbar-inner">
                            
                    <ul class="breadcrumb">
                            
                        <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
                            
                        <i class="icon-chevron-right show-sidebar" style="display:none;">

                            <a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a>

                        </i>
                            
                        <li class="active">Animales <span class="divider">/</span></li>

                        <li class="active">Detalle <span class="divider">/</span></li>

                        <li class="active">Autorizaciones <span class="divider">/</span></li>

                        <li class="active">Agregar <span class="divider">/</span></li>
                            
                        <li class="active"><?php echo $animal['Animal']['codigo']; ?></li>
                            
                    </ul>
                            
                </div>
                        
            </div> 

            <!-- Fin barra de navegación -->                

        </div>

        <div class="row-fluid">
                        
            <div class="span12">
                            
                <!-- block -->

                <div class="block">

                    <div class="navbar navbar-inner block-header">
        
                        <div class="muted pull-left">Autorizar acción </div>
              
                    </div>
    
                    <div class="block-content collapse in">
                                
                        <div class="span12">

                            <!-- Form -->

                            <?php echo $this->Form->create('Autorizacione', array('class'=>'form-horizontal')); ?>

                            <!--<form class="form-horizontal">-->
                                      
                                <fieldset>

                                    <legend>Autorizar acción</legend>
                    
                                    <div class="control-group">
                                                          
                                        <div class="controls">

                                            <?php echo $this->Form->input('animal_id',

                                                array(

                                                    'type'=>'hidden',

                                                    'value'=> $animal['Animal']['id'],
                                                    
                                                ));

                                            ?>

                                            <?php echo $this->Form->input('user_id',

                                                array(

                                                    'type'=>'hidden',

                                                    'value'=> $this->Session->read('id'),
                                                    
                                                ));

                                            ?>
                                                                                                      
                                        </div>
                                                        
                                    </div>

                                    <div class="control-group">
                                                          
                                        <label class="control-label" > Tipo de movimiento </label>
                                                          
                                        <div class="controls">

                                            <?php

                                                $options = array('Alta' => 'Alta', 'Baja' => 'Baja', 'Otro' => 'Otro'); 

                                                echo $this->Form->input('tipo_movimiento', 

                                                    array(

                                                        'type'=>'select',

                                                        'options'=>$options,

                                                        'empty'=>true,

                                                        'label'=>false,

                                                        'class'=>'span6',

                                                    )
                                    
                                                ); 
                                    
                                            ?>
                                                                                                        
                                        </div>
                                                        
                                    </div>

                                    <div class="control-group">
                                                          
                                        <label class="control-label" > Acción </label>
                                                          
                                        <div class="controls">

                                            <?php

                                                $options = array(

                                                    'Autoriza' => 'Autoriza', 

                                                    'Rechaza' => 'Rechaza',

                                                    'Pendiente' => 'Pendiente', 

                                                    'Mantiene pendiente' => 'Mantiene pendiente'

                                                ); 

                                                echo $this->Form->input('accion', 

                                                    array(

                                                        'type'=>'select',

                                                        'options'=>$options,

                                                        'empty'=>true,

                                                        'label'=>false,

                                                        'class'=>'span6',

                                                    )
                                    
                                                ); 
                                    
                                            ?>
                                                                                                        
                                        </div>
                                                        
                                    </div>

                                    <div class="control-group">
                                                          
                                        <label class="control-label" > Comentario </label>
                                                          
                                        <div class="controls">

                                            <?php echo $this->Form->input('comentario',

                                                array(

                                                    'type'=>'text',

                                                    'class' => 'span12',

                                                    'rows' => '3',

                                                    'label' => false,
                                                    
                                                ));

                                            ?>            
                                                                                                        
                                        </div>
                                                        
                                    </div>
                                        
                                    <div class="form-actions">

                                        <?php

                                            echo $this->Form->button('Grabar', 

                                                array(

                                                    'class' => 'btn btn-success'

                                                )
                            
                                            );

                                        ?>
                                                          
                                        <button type="reset" class="btn">Cancel</button>
                                                        
                                    </div>
                
                                </fieldset>
                                                    
                            <?php echo $this->Form->end(); ?>

                        </div>

                        <table class="table table-bordered table-striped">

                            <thead>

                                <tr>

                                    <th>Fecha</th>

                                    <th>Realizado por</th>

                                    <th>Tipo de movimiento</th>

                                    <th>Acción</th>

                                    <th>Comentario</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php foreach ($autorizaciones as $autorizacione) :?>

                                    <tr>

                                        <td><?php echo $autorizacione['Autorizacione']['created']; ?></td>

                                        <td><?php echo $autorizacione['User']['username']; ?></td>

                                        <td><?php echo $autorizacione['Autorizacione']['tipo_movimiento']; ?></td>

                                        <td><?php echo $autorizacione['Autorizacione']['accion']; ?></td>

                                        <td><?php echo $autorizacione['Autorizacione']['comentario']; ?></td>

                                    </tr>

                                <?php endforeach; ?>

                            </tbody>

                        </table>
                    
                    </div>

                </div>
                                                       
                <!-- /block -->
            
            </div>
                    
        </div>
            
    </div>
            
</div>
