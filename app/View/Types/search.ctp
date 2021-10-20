<div class="row-fluid">

    <!-- sidebar -->

    <div class="span3" id="sidebar">

        <?php echo $this->element('logo'); ?>
    
        <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
        
            <li><?php echo $this->Html->link("Listar especies","../Types");?></li>
        
            <li><?php echo $this->Html->link("Agregar especie","../Types/add");?></li>

            <li class="active"><?php echo $this->Html->link("Buscar especies","../Types/search");?></li>
        
        </ul>
                
    </div>

    <!-- fin sidebar -->
                
    <!--/span -->
                
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
                            
                        <li class="active">Especies <span class="divider">/</span></li>
                            
                        <li class="active">Buscar </li>
                            
                    </ul>
                            
                </div>
                        
            </div> 

            <!-- Fin barra de navegación -->                

        </div>

        <div class="row-fluid">
                        
            <div class="span12">

                <!--<form class="form-horizontal">-->

                <?php echo $this->Form->create('Type', array('type' => 'get', 'url' => 'search')); ?>
                            
                <!-- block -->

                <div class="block">

                    <div class="navbar navbar-inner block-header">
        
                        <div class="muted pull-left">Búsqueda de especie animal </div>
              
                    </div>
    
                    <div class="block-content collapse in">
                                
                        <div class="span12">
                                      
                            <fieldset>
                
                                <div class="control-group">
                                      
                                    <!--<label class="control-label"> Nombre común </label>-->
                                      
                                    <div class="controls">
                                        
                                        <!--<input type="text" class="span6" id="typeahead" data-provide="typeahead" data-items="4">-->

                                        <?php 

                                            echo $this->Form->input('nombre_comun', 

                                                array(

                                                    'type'=>'text',

                                                    //'label'=>'Ingrese nombre común',

                                                    'placeholder'=>'Ingrese nombre común',

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

                        echo $this->Form->button('Buscar', 

                            array(

                                'class' => 'btn btn-success'

                            )
        
                        );

                    ?>
                                              
                    <button type="reset" class="btn">Cancel</button>
                                                                  
                    <?php echo $this->Form->end(); ?>

                </div>

                <?php if($types){ ?>

                <div class="block">
                                
                    <div class="navbar navbar-inner block-header">
                                    
                        <div class="muted pull-left">Encontrados</div>
                                    
                        <div class="pull-right"><span class="badge badge-info"><?php echo $encontrados; ?></span></div>
                        
                    </div>
                                
                    <div class="block-content collapse in">
                                    
                        <table class="table table-striped">
                                        
                            <thead>
                                    
                                <tr>
                                        
                                    <th>#</th>
                                    <th>Nombre Común</th>
                                    <th>Nombre cientifico</th>
                                    <th>Abreviatura</th>
                                    <th>Acciones</th>
                                    
                                </tr>
                                
                            </thead>
                                        
                            <tbody>

                                <?php foreach ($types as $type): ?>
                                            
                                <tr>
                                                
                                    <td><?php echo $type['Type']['id']; ?></td>
                                    
                                    <td>
                                        
                                        <?php 

                                            echo $this->Html->link($type['Type']['nombre_comun'], 

                                                array(

                                                    'controller'=>'Types', 

                                                    'action'=>'view', $type['Type']['id']

                                                )
                                            ); 
                                        ?>
                                    
                                    </td>
                                    
                                    <td><?php echo $type['Type']['nombre_cientifico']; ?></td>
                                    
                                    <td><?php echo $type['Type']['abreviacion']; ?></td>
                                    
                                    <td>
                                        <?php
                                            
                                            echo $this->Html->link("<i class='icon-ok'></i>",

                                            array('controller' => 'animals', 'action' => 'add' , $type['Type']['id']),

                                                array(

                                                    'escape' => false,

                                                    'rel'=>'tooltip',

                                                    'data-placement'=>'left',

                                                    'class'=>'btn',

                                                    'title'=>'Ingreso individual'

                                            ));

                                        ?>

                                        <?php
                                            
                                            echo $this->Html->link("<i class='icon-tasks'></i>",

                                            array('controller' => 'animals', 'action' => 'massive' , $type['Type']['id']),

                                                array(

                                                    'escape' => false,

                                                    'rel'=>'tooltip',

                                                    'data-placement'=>'left',

                                                    'class'=>'btn',

                                                    'title'=>'Ingresar grupo de animales'

                                            ));

                                        ?>
                                    
                                    </td>
                                    
                                </tr>

                                <?php endforeach; ?>
                                
                            </tbody>
                            
                        </table>
                        
                    </div>

                    <?php echo $this->element('paginador'); ?>
                    
                </div>

                <?php } ?>
                                                    
                <!-- /block -->
            
            </div>
                    
        </div>
            
    </div>
            
</div>