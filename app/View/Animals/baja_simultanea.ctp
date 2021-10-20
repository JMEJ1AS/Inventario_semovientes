<div class="row-fluid">

    <div class="span3" id="sidebar">

        <?php echo $this->element('logo'); ?>
    
        <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
        
            <li><?php echo $this->Html->link("Listar animales", "../Animals");?></li>

            <li><?php echo $this->Html->link("Ingresar animal", "../Animals/add");?></li>

            <li><?php echo $this->Html->link("Ingresar animales", "../Animals/massive");?></li>

            <li><?php echo $this->Html->link("Buscar animal", "../Animals/search");?></li>

            <li class="active"><?php echo $this->Html->link("Bajas simultáneas", "../Animals/baja_simultanea");?></li>
    
	        <li><?php echo $this->Html->link("Carga masiva de documentos", "../Animals/search_massive");?></li>

        </ul>
                
    </div>

    <div class="span9" id="content">
                    
        <div class="row-fluid">

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
                            
                        <li class="active">Bajas simultaneas </li>
                            
                    </ul>
                            
                </div>
                        
            </div>              

        </div>

        <div class="row-fluid">
                        
            <div class="span12">

                <?php echo $this->Form->create('Animal', array('type' => 'get', 'url' => 'baja_simultanea')); ?>

                <div class="block">

                    <div class="navbar navbar-inner block-header">
        
                        <div class="muted pull-left"><i class='icon-search'></i> Búsqueda de especie animal </div>
              
                    </div>
    
                    <div class="block-content collapse in">
                                
                        <div class="span4">
                                      
                            <fieldset>
                
                                <div class="control-group">
                                      
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('nombre_comun', 

                                                array(

                                                    'type'=>'text',

                                                    'placeholder'=>'Ingrese nombre común',

                                                    'label'=>false,

                                                    'class'=>'span12',

                                                )
                                
                                            ); 
                                
                                        ?>   
                                      
                                    </div>

                                </div>
            
                            </fieldset>

                        </div>

                        <div class="span4">
                                      
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

                                                    //'selected'=>$id,

                                                    'class'=>'span12'

                                                )
                                
                                            ); 
                                
                                        ?>   
                                      
                                    </div>

                                </div>
            
                            </fieldset>

                        </div> 

                        <div class="span4">
                                      
                            <fieldset>
                
                                <div class="control-group">
                                      
                                    <div class="controls">

                                        <?php

                                            echo $this->Form->button("<i class='icon-search icon-white'></i> Buscar", 

                                                array(

                                                    'class' => 'btn btn-success'

                                                )
                            
                                            );

                                        ?>

                                        <button type="reset" class="btn">Cancel</button>

                                    <?php echo $this->Form->end(); ?>
                                      
                                    </div>

                                </div>
            
                            </fieldset>

                        </div>               
                    
                    </div>

                </div>

                <?php if($animals){ ?>

                    <div class="block">
                                    
                        <div class="navbar navbar-inner block-header">
                                        
                            <div class="muted pull-left">Encontrados</div>
                            
                        </div>
                                    
                        <div class="block-content collapse in">
                                        
                            <table class="table table-striped">
                                            
                                <thead>
                                        
                                    <tr>

                                        <th> Selecciona todos: <br><input type="checkbox" id="selectall"/> </th>
                                            
                                        <th> Código </th>

                                        <th> Chip </th>
                                        
                                        <th> Nombre Común </th>
                                        
                                        <th> Estado </th>
                                        
                                    </tr>
                                    
                                </thead>
                                            
                                <tbody>

                                    <?php 
                                    
                                        echo $this->Form->create('Animal', 
                                    
                                            array(
                                                
                                                'url' => array(
                                                    
                                                    'controller' => 'Animals', 
                                                    
                                                    'action' => 'deshacer_multiple'
                                                    
                                                )
                                                
                                            )
                                            
                                        ); 
                                        
                                    ?>

                                    <?php $i = 1; ?>

                                    <?php foreach ($animals as $animal): ?>
                                                
                                    <tr>

                                        <td>
                                            
                                            <input 
                                            
                                                type = "checkbox"

                                                class="case"

                                                name="case[]"

                                                value = "<?php echo $animal['Animal']['id'];?>"

                                            />

                                            <input 
                                                
                                                type = "hidden"

                                                class="case"

                                                name="data[Animal][id_<?=$i?>]"

                                                value = "<?php echo $animal['Animal']['id'];?>"

                                            />

                                            <?php 

                                                echo $this->Form->input('id', 

                                                    array(

                                                        'type'=>'hidden',

                                                        'value'=> $animal['Animal']['id']

                                                    )
                                    
                                                ); 

                                                echo $animal['Animal']['id'];
                                    
                                            ?>


                                        </td>
                                                    
                                        <td>

                                            <?php 

                                                echo $this->Html->link($animal['Animal']['codigo'], 

                                                    array(

                                                        'controller'=>'Animals', 

                                                        'action'=>'view', $animal['Animal']['id']
                                                    )
                                                ); 

                                            ?>
                                                
                                        </td>

                                        <td><?php echo $animal['Animal']['chip_id']; ?></td>
                                        
                                        <td><?php echo $animal['Type']['nombre_comun']; ?></td>
                                        
                                        <td><?php echo $animal['Animal']['estado']; ?></td>
                                        
                                    </tr>

                                    <?php $i = $i + 1; ?>

                                    <?php endforeach; ?>
                                    
                                </tbody>
                                
                            </table>
                            
                        </div>
                        
                    </div>

                    <div class="row-fluid">
                                            
                        <div class="span12">

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

                                                                'class'=>'span6'

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

                                                                'id'=>'datetimepicker'

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
                        
                                        </fieldset>

                                    </div>
                                
                                </div>

                            </div>

                        </div>
                                        
                    </div>

                <?php } ?>
            
            </div>
                    
        </div>
            
    </div>
            
</div>

<script>

    $.datetimepicker.setLocale('es');
        
    $('#datetimepicker').datetimepicker({
               
        timepicker:false,
    
        format:'Y-m-d',
    
        formatDate:'Y-m-d',
                
    });
   
</script>

<script>
    
    $("#selectall").on("click", function(){

        $(".case").prop("checked", this.checked);        
    
    });

    $(".case").on("click", function(){

        if ($(".case").length == $(".case:checked").length) {

            $("#selectall").prop("checked", true);
            // alert('La politica de privacidad ha sido aceptada');

        }else{

            $("#selectall").prop("checked", false);


        }

    });

</script>
