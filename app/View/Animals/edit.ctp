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

            <li class="active"><?php echo $this->Html->link("Editar registro", "../Animals/edit/".$animal['Animal']['id']);?></li>

            <li><?php echo $this->Html->link("Registrar baja", "../Animals/baja/".$animal['Animal']['id']);?></li>

            <li><?php echo $this->Html->link("Autorizar acción", "../Autorizaciones/add/".$animal['Animal']['id']);?></li>

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
                            
                        <li class="active">Editar <span class="divider">/</span></li>

                        <li class="active"><?php echo $animal['Animal']['codigo']; ?></b></li>
                            
                    </ul>
                            
                </div>
                        
            </div> 

            <!-- Fin barra de navegación -->                

        </div>

        <div class="row-fluid">
                        
            <div class="span12">
                            
                <!--<form class="form-horizontal">-->

                <?php echo $this->Form->create('Animal', array('class'=>'form-horizontal')); ?>

                <!-- block -->

                <div class="block">

                    <div class="navbar navbar-inner block-header">
        
                        <div class="muted pull-left">Editar registro </div>
              
                    </div>
    
                    <div class="block-content collapse in">
                                
                        <div class="span12">
                                      
                            <fieldset>

                                <legend>Formulario de edición de animal</legend>

                                <div class="control-group">
                                                      
                                    <label class="control-label" > Nombre animal </label>
                                                      
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('nombre', 

                                                array(

                                                    'type'=>'text',

                                                    'empty'=>"",    

                                                    'label'=>false,

                                                    'class'=>'span6'

                                                )
                                
                                            ); 
                                
                                        ?>
                                                                                                    
                                    </div>
                                                    
                                </div>

                                <div class="control-group">
                                                      
                                    <label class="control-label" > Chip/id </label>
                                                      
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('chip_id', 

                                                array(

                                                    'type'=>'text',

                                                    'empty'=>"",    

                                                    'label'=>false,

                                                    'class'=>'span6'

                                                )
                                
                                            ); 
                                
                                        ?>
                                                                                                    
                                    </div>
                                                    
                                </div>
                
                                <div class="control-group">
                                                      
                                    <label class="control-label" > Especie animal </label>
                                                      
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('type_id', 

                                                array(

                                                    'type'=>'select',

                                                    'empty'=>"",

                                                    'options'=>$types,

                                                    'label'=>false,

                                                    'selected'=>$animal['Animal']['type_id'],

                                                    'class'=>'span6'

                                                )
                                
                                            ); 
                                
                                        ?>
                                                                                                    
                                    </div>
                                                    
                                </div>

                                <div class="control-group">
                                                      
                                    <label class="control-label" > Condición </label>
                                                      
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('condition_id', 
                                                
                                                array(

                                                    'type'=>'select',

                                                    'empty'=>"Favor seleccionar condición",

                                                    'options'=>$conditions,

                                                    'label'=>false,

                                                    //'selected'=>$id,

                                                    'class'=>'span6'

                                                )
                                
                                            ); 
                            
                                        ?>
                                                                                                    
                                    </div>
                                                    
                                </div>

                                <div class="control-group">
                                                      
                                    <label class="control-label" > Sexo </label>
                                                      
                                    <div class="controls">

                                        <?php

                                            $options = array('Macho' => 'Macho', 'Hembra' => 'Hembra', 'Indeterminado' => 'Indeterminado'); 

                                            echo $this->Form->input('sexo', 

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
                                                      
                                    <label class="control-label" > Tipo de alta </label>
                                                      
                                    <div class="controls">

                                        <?php 

                                            $options = array(
                                        
                                                'NACIMIENTO' => 'NACIMIENTO',
                                        
                                                'COMPRA' => 'COMPRA',
                                                
                                                'PERMUTA' => 'PERMUTA',
                                                
                                                'DONACIÓN' => 'DONACIÓN',
                                                
                                                'OTRO' => 'OTRO'
                                        
                                            );

                                            echo $this->Form->input('tipo_alta', 

                                                array(

                                                    'type'=>'select',

                                                    'label'=>false,

                                                    'class'=>'span6',

                                                    'options' => $options,
                
                                                    'empty'=>"Favor seleccionar tipo de alta",

                                                )
                                
                                            ); 
                                
                                        ?>
                                                                                                    
                                    </div>
                                                    
                                </div>

                                <div class="control-group">
                                                      
                                    <label class="control-label" > Fecha de nacimiento </label>
                                                      
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('fecha_nacimiento', 

                                                array(

                                                    'type'=>'text',

                                                    'label'=>false,

                                                    'class'=>'span6',

                                                    'id'=>'datetimepicker_A'

                                                )
                                
                                            ); 
                                
                                        ?>
                                                                                                    
                                    </div>
                                                    
                                </div>

                                <div class="control-group">
                                                      
                                    <label class="control-label" > Fecha de alta </label>
                                                      
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('fecha_alta', 

                                                array(

                                                    'type'=>'text',

                                                    'label'=>false,

                                                    'class'=>'span6',

                                                    'id'=>'datetimepicker_B'

                                                )
                                
                                            ); 
                                
                                        ?>
                                                                                                    
                                    </div>
                                                    
                                </div>

                                <div class="control-group">
                                                      
                                    <label class="control-label" > Valor </label>
                                                      
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('valor_compra', 

                                                array(

                                                    'type'=>'text',

                                                    'label'=>false,

                                                    'class'=>'span6',

                                                )
                                
                                            ); 
                                
                                        ?>
                                                                                                    
                                    </div>
                                                    
                                </div>

                                <div class="control-group">
                                                      
                                    <label class="control-label" > Recinto asignado </label>
                                                      
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('recinto_id', 

                                                array(

                                                    'type'=>'select',

                                                    'empty'=>"",

                                                    'options'=>$recintos,

                                                    'label'=>false,

                                                    'selected'=>$animal['Animal']['recinto_id'],

                                                    'class'=>'span6'

                                                )
                                
                                            ); 
                                
                                        ?>
                                                                                                    
                                    </div>
                                                    
                                </div>

                                <div class="control-group">
                                                      
                                    <label class="control-label" > Longevidad (meses) </label>
                                                      
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('vida_util', 

                                                array(

                                                    'type'=>'text',

                                                    'label'=>false,

                                                    'class'=>'span6',

                                                )
                                
                                            ); 
                                
                                        ?>
                                                                                                    
                                    </div>
                                                    
                                </div>
            
                            </fieldset>

                        </div>
                    
                    </div>

                </div>

                <div class="form-actions">

                    <?php

                        echo $this->Form->button('Grabar', 

                            array(

                                'class' => 'btn-large btn-success'

                            )
        
                        );

                    ?>
                                              
                    <button type="reset" class="btn-large">Cancel</button>
                                                                  
                    <?php echo $this->Form->end(); ?>

                </div>
                                                       
                <!-- /block -->
            
            </div>
                    
        </div>
            
    </div>
            
</div>

<script>

    $.datetimepicker.setLocale('es');
        
    $('#datetimepicker_A').datetimepicker({
               
        timepicker:false,
    
        format:'Y-m-d',
    
        formatDate:'Y-m-d',
                
    });

    $('#datetimepicker_B').datetimepicker({
               
        timepicker:false,
    
        format:'Y-m-d',
    
        formatDate:'Y-m-d',
                
    });
   
</script>
