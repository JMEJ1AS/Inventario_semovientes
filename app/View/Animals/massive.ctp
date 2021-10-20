<div class="row-fluid">

    <!-- sidebar -->

    <div class="span3" id="sidebar">

        <?php echo $this->element('logo'); ?>
    
         <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
        
            <li><?php echo $this->Html->link("Listar animales", "../Animals");?></li>

            <li><?php echo $this->Html->link("Ingresar animal", "../Animals/add");?></li>

            <li class="active"><?php echo $this->Html->link("Ingresar animales", "../Animals/massive");?></li>

            <li><?php echo $this->Html->link("Buscar animal", "../Animals/search");?></li>
    
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
                            
                        <li class="active">Ingresar</li>
                            
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
        
                        <div class="muted pull-left"><i class="icon-pencil"></i> Agregar animales </div>
              
                    </div>
    
                    <div class="block-content collapse in">
                                
                        <div class="span12">
                                      
                            <fieldset>

                                <legend>Formulario de ingreso de animales</legend>

                                <div class="control-group">
                                                      
                                    <label class="control-label" > Número de animales </label>
                                                      
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('cantidad', 

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

                                                    'selected'=>$id,

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

                                            $options = array(

                                                'Macho' => 'Macho', 

                                                'Hembra' => 'Hembra', 

                                                'Indeterminado'=>'Indeterminado'

                                            ); 

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
                                                      
                                    <label class="control-label" > Descripción activo </label>
                                                      
                                    <div class="controls">

                                        <?php

                                            echo $this->Form->input('description_activo', 

                                                array(

                                                    'type'=>'text',

                                                    'rows'=>3,

                                                    'empty'=>true,

                                                    'label'=>false,

                                                    'class'=>'span6',

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

                                                    'id'=>'datetimepicker_A',

                                                    'autocomplete' => 'off'

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

                                                    'id'=>'datetimepicker_B',

                                                    'autocomplete' => 'off'

                                                )
                                
                                            ); 
                                
                                        ?>
                                                                                                    
                                    </div>
                                                    
                                </div>

                                <div class="control-group">
                                                      
                                    <label class="control-label" > Recinto </label>
                                                      
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('recinto_id', 
                                                
                                                array(

                                                    'type'=>'select',

                                                    'empty'=>"Favor seleccionar recinto",

                                                    'options'=>$recintos,

                                                    'label'=>false,

                                                    //'selected'=>$id,

                                                    'class'=>'span6'

                                                )
                                
                                            ); 
                            
                                        ?>
                                                                                                    
                                    </div>
                                                    
                                </div>

                                <div class="control-group">
                                                      
                                    <label class="control-label" > Valor de compra </label>
                                                      
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
                                                      
                                    <label class="control-label" > Longevidad </label>
                                                      
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

                        echo $this->Form->button("<i class='icon-hdd icon-white'></i> Grabar", 

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
