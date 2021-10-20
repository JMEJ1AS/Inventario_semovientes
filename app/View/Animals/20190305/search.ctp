<div class="row-fluid">

    <!-- sidebar -->

    <div class="span3" id="sidebar">

        <?php echo $this->element('logo'); ?>
    
        <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
        
            <li><?php echo $this->Html->link("Listar animales", "../Animals");?></li>

            <li><?php echo $this->Html->link("Ingresar animal", "../Animals/add");?></li>

            <li class="active"><?php echo $this->Html->link("Buscar animal", "../Animals/search");?></li>
    
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
                            
                        <li class="active">Animales <span class="divider">/</span></li>
                            
                        <li class="active">Buscar </li>
                            
                    </ul>
                            
                </div>
                        
            </div> 

            <!-- Fin barra de navegación -->                

        </div>

        <div class="row-fluid">
                        
            <div class="span12">

                <!-- Form -->

                <?php echo $this->Form->create('Animal', array('type' => 'get', 'url' => 'search')); ?>
                            
                <!-- block -->

                <div class="block">

                    <div class="navbar navbar-inner block-header">
        
                        <div class="muted pull-left">Búsqueda de especie animal </div>
              
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

                                            $options = array(

                                                'ALTA' => 'ALTA', 

                                                'BAJA' => 'BAJA'

                                            );

                                            echo $this->Form->input('estado', 

                                                array(

                                                    'empty'=>'Favor seleccione un estado',

                                                    'type'=>'select',

                                                    'options'=>$options,

                                                    'label'=>false,

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
                                    
                        <table class="table table-striped">
                                        
                            <thead>
                                    
                                <tr>
                                        
                                    <th>Código</th>
                                    
                                    <th>Nombre Común</th>
                                    
                                    <th>Estado</th>
                                    
                                    <th>Vida util (meses)</th>
                                    
                                </tr>
                                
                            </thead>
                                        
                            <tbody>

                                <?php foreach ($animals as $animal): ?>
                                            
                                <tr>
                                                
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
                                    
                                    <td><?php echo $animal['Type']['nombre_comun']; ?></td>
                                    
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
