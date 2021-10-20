<div class="row-fluid">
                
    <!--/span -->
                
    <div class="span12" id="content">
                    
        <div class="row-fluid">

            <!-- Barra de navegación -->
                        
            <div class="navbar">
                            
                <div class="navbar-inner">
                            
                    <ul class="breadcrumb">

                        <i class="icon-search"></i>
                            
                        <li class="active">Exportar <span class="divider">/</span></li>
                            
                        <li class="active">Base de datos </li>
                            
                    </ul>
                            
                </div>
                        
            </div> 

            <!-- Fin barra de navegación -->                

        </div>

        <div class="row-fluid">
                        
            <div class="span12">

                <!-- Form -->

                <?php //echo $this->Form->create('Excel'); ?>

                <?php 
                
                    echo $this->Form->create('Animal', 

                        array(

                            'type' => 'post',

                            'controller' => 'Animals',

                            'url' => 'export_animals'

                            //'url' => 'excel'

                        )

                    ); 


                ?>
                            
                <!-- block -->

                <div class="block">

                    <div class="navbar navbar-inner block-header">
        
                        <div class="muted pull-left">Campos de fecha son obligatorios </div>
              
                    </div>
    
                    <div class="block-content collapse in">
                                
                        <div class="span3">
                                      
                            <fieldset>

                                <div class="control-group">

                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('fecha_ingreso_inicio', 

                                                array(

                                                    'placeholder'=>'Fecha ingreso de inicio',

                                                    //'value'=>'',

                                                    'type'=>'text',

                                                    'label'=>false,

                                                    'class'=>'span12',

                                                    'id'=>'datetimepicker_A',

                                                    'autocomplete'=>'off'

                                                )
                                
                                            ); 
                                
                                        ?>
                                                                                                    
                                    </div>
                                                    
                                </div>
            
                            </fieldset>

                        </div>

                        <div class="span3">
                                      
                            <fieldset>

                                <div class="control-group">
                                                      
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('fecha_ingreso_termino', 

                                                array(

                                                    'placeholder'=>'Fecha ingreso de término',

                                                    //'value'=>'',

                                                    'type'=>'text',

                                                    'label'=>false,

                                                    'class'=>'span12',

                                                    'id'=>'datetimepicker_B',

                                                    'autocomplete'=>'off'

                                                )
                                
                                            ); 
                                
                                        ?>
                                                                                                    
                                    </div>
                                                    
                                </div>
            
                            </fieldset>

                        </div>

                        <!--Comentar-->

                        <!--<div class="span3">
                                      
                            <fieldset>

                                <div class="control-group">
                                              
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('type', 

                                                array(

                                                    'type'=>'select',

                                                    'empty'=>"Seleccione una especie animál",

                                                    'options'=>$types,

                                                    'label'=>false,

                                                    'class'=>'span12'

                                                )
                                
                                            ); 
                                
                                        ?>
                                                                                            
                                    </div>
                                            
                                </div>

                            </fieldset>

                        </div>

                        <div class="span3">
                                      
                            <fieldset>

                                <div class="control-group">
                                                              
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('condicion', 
                                                
                                                array(

                                                    'type'=>'select',

                                                    'empty'=>"Favor seleccionar condición",

                                                    'options'=>$conditions,

                                                    'label'=>false,

                                                    'class'=>'span12'

                                                )
                                
                                            ); 
                            
                                        ?>
                                                                                                    
                                    </div>
                                                    
                                </div>

                            </fieldset>

                        </div>-->

                        <!--Comentar-->

                    </div>

                </div>

                <div class="form-actions">

                    <?php

                        echo $this->Form->button('Exportar', 

                            array(

                                'class' => 'btn btn-success'

                            )
        
                        );

                    ?>

                    <button type="reset" class="btn">Cancel</button>

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