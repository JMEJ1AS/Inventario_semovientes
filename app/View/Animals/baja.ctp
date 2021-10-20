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

            <li class="active"><?php echo $this->Html->link("Registrar baja", "../Animals/baja/".$animal['Animal']['id']);?></li>

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
                            
                        <li class="active">Baja <span class="divider">/</span></li>

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
        
                        <div class="muted pull-left">Registrar baja </div>
              
                    </div>
    
                    <div class="block-content collapse in">
                                
                        <div class="span12">
                                      
                            <fieldset>

                                <legend>Formulario de registro de baja</legend>
                
                                <div class="control-group">
                                                      
                                    <label class="control-label" > Tipo de baja </label>
                                                      
                                    <div class="controls">

                                        <?php 


                                            echo $this->Form->input('estado',

                                                array(

                                                    'type'=>'hidden',

                                                    'value'=>'BAJA',
                                                    
                                                ));
             

                                            echo $this->Form->input('bajatype_id', 

                                                array(

                                                    'type'=>'select',

                                                    'empty'=>'',

                                                    'options'=>$bajatypes,

                                                    'label'=>false,

                                                    'selected'=>$animal['Animal']['bajatype_id'],

                                                    'class'=>'span6'

                                                )
                                
                                            ); 
                                
                                        ?>
                                                                                                    
                                    </div>
                                                    
                                </div>

                                    <div class="control-group">
                                                      
                                    <label class="control-label" > Fecha del evento </label>
                                                      
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('fecha_evento', 

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
                                                      
                                    <label class="control-label" > Fecha de baja </label>
                                                      
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('fecha_baja', 

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

                                <div class="control-group">
                                                      
                                    <label class="control-label" > Glosa de la baja </label>
                                                      
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('glosa_baja', 

                                                array(

                                                    'type'=>'text',

                                                    'label'=>false,

                                                    'class'=>'span6',

                                                    'rows'=> 3

                                                )
                                
                                            ); 
                                
                                        ?>
                                                                                                    
                                    </div>
                                                    
                                </div>
            
                            </fieldset>

                        </div>
                    
                    </div>

                </div>

                <!-- /block -->

                <div class="form-actions">

                    <?php

                        echo $this->Form->button('Grabar', 

                            array(

                                'class' => 'btn btn-success'

                            )
        
                        );

                    ?>
                                      
                    <button type="reset" class="btn">Cancel</button>

                    <?php echo $this->Form->end(); ?>
                                    
                </div>
            
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
