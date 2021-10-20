<div class="row-fluid">

    <!-- sidebar -->

    <div class="span3" id="sidebar">

        <?php echo $this->element('logo'); ?>
    
        <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
        
            <li><?php echo $this->Html->link("Listar especies","../Types");?></li>
        
            <li><?php echo $this->Html->link("Agregar especie","../Types/add");?></li>

            <li><?php echo $this->Html->link("Buscar especies","../Types/search");?></li>

            <li><?php echo $this->Html->link("Ver detalle", "../Types/view/".$type['Type']['id']);?></li>

            <li class="active"><?php echo $this->Html->link("Editar", "../Types/edit/".$type['Type']['id']);?></li>
        
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
                            
                        <li class="active">Especies <span class="divider">/</span></li>
                            
                        <li class="active">Ingresar</li>
                            
                    </ul>
                            
                </div>
                        
            </div> 

            <!-- Fin barra de navegación -->                

        </div>

        <div class="row-fluid">
                        
            <div class="span12">

                <!--<form class="form-horizontal">-->

                <?php echo $this->Form->create('Type', array('class'=>'form-horizontal')); ?>

                <!-- block -->

                <div class="block">

                    <div class="navbar navbar-inner block-header">
        
                        <div class="muted pull-left">Agregar especie animál </div>
              
                    </div>
    
                    <div class="block-content collapse in">
                                
                        <div class="span12">
                                      
                            <fieldset>

                                <legend>Formulario de ingreso especie animál</legend>
                
                                <div class="control-group">
                                      
                                    <label class="control-label"> Nombre común </label>
                                      
                                    <div class="controls">
                                        
                                        <!--<input type="text" class="span6" id="typeahead" data-provide="typeahead" data-items="4">-->

                                        <?php 

                                            echo $this->Form->input('nombre_comun', 

                                                array(

                                                    'type'=>'text',

                                                    'label'=>false,

                                                    'class'=>'span6',

                                                )
                                
                                            ); 
                                
                                        ?>
                                        
                                        <!--<p class="help-block">Start typing to activate auto complete!</p>-->
                                      
                                    </div>
                
                                </div>
                                    
                                <div class="control-group">
                                                      
                                    <label class="control-label" > Nombre científico </label>
                                                      
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('nombre_cientifico', 

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
                                                      
                                    <label class="control-label" > Nombre abreviado </label>
                                                      
                                    <div class="controls">

                                        <?php 

                                            echo $this->Form->input('abreviacion', 

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
                                                      
                                    <label class="control-label" > Subgenero </label>
                                                      
                                    <div class="controls">

                                        <?php

                                            $options = array(

                                                'ANFIBIOS' => 'ANFIBIOS', 

                                                'ARTROPODOS' => 'ARTROPODOS', 

                                                'AVES'=>'AVES',
                                                
                                                'MAMIFEROS' => 'MAMIFEROS', 

                                                'REPTILES'=>'REPTILES'

                                            ); 

                                            echo $this->Form->input('subgenero', 

                                                array(

                                                    'type'=>'select',

                                                    'options'=>$options,

                                                    'selected'=>$type['Type']['subgenero'],

                                                    'empty'=>true,

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
                                                       
                <!-- /block -->

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
            
            </div>
                    
        </div>
            
    </div>
            
</div>