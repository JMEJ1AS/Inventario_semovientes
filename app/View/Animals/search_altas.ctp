<div class="row-fluid">
                
    <!--/span -->
                
    <div class="span12" id="content">
                    
        <div class="row-fluid">

            <?php echo $this->Session->flash(); ?>

            <!-- Barra de navegación -->
                        
            <div class="navbar">
                            
                <div class="navbar-inner">
                            
                    <ul class="breadcrumb">

                        <i class="icon-search"></i>
                            
                        <li class="active">Busquedas <span class="divider">/</span></li>
                            
                        <li class="active">Buscar registros de alta </li>
                            
                    </ul>
                            
                </div>
                        
            </div> 

            <!-- Fin barra de navegación -->                

        </div>

        <div class="row-fluid">
                        
            <div class="span12">

                <!-- Form -->

                <?php echo $this->Form->create('Animal', array('type' => 'get', 'url' => 'search_altas')); ?>
                            
                <!-- block -->

                <div class="block">

                    <div class="navbar navbar-inner block-header">
        
                        <div class="muted pull-left">Campos de fecha son obligatorios </div>
              
                    </div>
    
                    <div class="block-content collapse in">
                                
                        <div class="span2">
                                      
                            <fieldset>

                                <div class="control-group">

                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('alta_fecha_1', 

                                                array(

                                                    'placeholder'=>'Fecha alta de inicio',

                                                    'value'=>$alta_fecha_1,

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

                        <div class="span2">
                                      
                            <fieldset>

                                <div class="control-group">
                                                      
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('alta_fecha_2', 

                                                array(

                                                    'placeholder'=>'Fecha alta de término',

                                                    'value'=> $alta_fecha_2,

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

                        <div class="span3">
                                      
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

                        <div class="span2">
                                      
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

                        </div>

                    </div>

                </div>

                <div class="form-actions">

                    <?php

                        echo $this->Form->button('Buscar', 

                            array(

                                'class' => 'btn btn-success'

                            )
        
                        );

                    ?>

                    <button type="reset" class="btn">Cancel</button>

                    <?php echo $this->Form->end(); ?>

                </div>

                <?php if($animals){ ?>

                <div class="block">
                                
                    <div class="navbar navbar-inner block-header">
                                    
                        <div class="muted pull-left">Encontrados</div>
                                    
                        <div class="pull-right"><span class="badge badge-info"><?php echo $encontrados; ?></span></div>
                        
                    </div>
                                
                    <div class="block-content collapse in">
                                    
                        <!--<table class="table table-striped">-->

                        <table class="table table-bordered table-striped">
                                        
                            <thead>
                                    
                                <tr>
                                        
                                    <th>Código</th>
                                    <th>Nombre especie</th>
                                    <th>Condición</th>
                                    <th>Fecha ingreso/alta</th>
                                    <th>Descripción activo</th>
                                    <th>Estado</th>
                                    <th>Vida util (meses)</th>
                                    
                                </tr>
                                
                            </thead>
                                        
                            <tbody>

                                <?php foreach ($animals as $animal): ?>
                                            
                                <tr>
                                                
                                    <td><?php echo $this->Html->link($animal['Animal']['codigo'], array('controller'=>'Animals', 'action'=>'view', $animal['Animal']['id'])); ?></td>
                                    <td><?php echo $animal['Type']['nombre_comun']; ?></td>
                                    <td><?php echo $animal['Condition']['descripcion']; ?></td>
                                    <td><?php echo $animal['Animal']['fecha_alta']; ?></td>
                                    <td><?php echo $animal['Animal']['description_activo']; ?></td>
                                    <td><?php echo $animal['Animal']['estado']; ?></td>
                                    <td><?php echo $animal['Animal']['vida_util']; ?></td>
                                    
                                </tr>

                                <?php endforeach; ?>
                                
                            </tbody>
                            
                        </table>
                        
                    </div>

                    <?php echo $this->element('paginador'); ?>
                    
                </div>

                <button onclick="printHTML()" class="btn btn-large"><i class="icon-print"></i> Imprimir</button>

                <script>

                    function printHTML(){

                         if(window.print){

                             window.print();

                         }

                    } 

                </script>

                <?php } ?>
                            
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
