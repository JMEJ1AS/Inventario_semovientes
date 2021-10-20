<div class="row-fluid">

    <!-- sidebar -->

    <div class="span3" id="sidebar">

        <?php echo $this->element('logo'); ?>
    
        <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
        
            <li class="active">
            
                <a href="http://localhost/~jorge/semovientes/Conditions/add">

                    <i class="icon-chevron-right"></i> Ingresar / listar condición

                </a>
        
            </li>

            <!--<li>
            
                <a href="http://localhost/~jorge/semovientes/Conditions/adit">

                    <i class="icon-chevron-right"></i> Editar

                </a>
        
            </li>-->
    
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
                            
                        <li class="active">Condiciones <span class="divider">/</span></li>

                        <li class="active">Agregar <span class="divider">/</span></li>
                            
                    </ul>
                            
                </div>
                        
            </div> 

            <!-- Fin barra de navegación -->                

        </div>

        <div class="row-fluid">
                        
            <div class="span12">
                            
                <div class="block">

                    <div class="navbar navbar-inner block-header">
        
                        <div class="muted pull-left">Agregar condición </div>
              
                    </div>
    
                    <div class="block-content collapse in">
                                
                        <div class="span12">

                            <!--<form class="form-horizontal">-->

                            <?php echo $this->Form->create('Condition', array('type'=>'file', 'class'=>'form-horizontal')); ?>
                                      
                            <fieldset>

                                <legend>Formulario de ingreso de condiciones</legend>
                
                                <div class="control-group">
                                                      
                                    <label class="control-label" > Nombre </label>
                                                      
                                    <div class="controls">

                                        <?php echo $this->Form->input('nombre',

                                            array(

                                                'type'=>'text',

                                                'class' => 'span6',

                                                'label' => false,
                                                
                                            ));

                                        ?>            
                                                                                                    
                                    </div>
                                                    
                                </div>

                                <div class="control-group">
                                                      
                                    <label class="control-label" > Descripción </label>
                                                      
                                    <div class="controls">

                                        <?php echo $this->Form->input('descripcion',

                                            array(

                                                'type'=>'text',

                                                'class' => 'span6',

                                                'label' => false,
                                                
                                            ));

                                        ?>            
                                                                                                    
                                    </div>
                                                    
                                </div>
            
                            </fieldset>

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

                        <table class="table table-bordered table-striped">

                                <thead>

                                    <tr>

                                        <th>ID</th>
    
                                        <th>Nombre</th>

                                        <th>Descripción</th>

                                        <th>Editar</th>

                                    </tr>

                                </thead>

                                <tbody>

                                <?php foreach ($conditions as $condition) :?>

                                    <tr>

                                        <td><?php echo $condition['Condition']['id']; ?></td>

                                        <td><?php echo $condition['Condition']['nombre']; ?></td>

                                        <td><?php echo $condition['Condition']['descripcion']; ?></td>

                                        <td>
                                            
                                            <?php

                                                echo $this->Html->link("<i class='icon-edit'></i>", 

                                                    array( 

                                                        'action'=>'edit', $condition['Condition']['id']

                                                    ),

                                                    array(

                                                        'escape' => false,

                                                        'rel' => 'tooltip',

                                                        'data-placement' => 'left',

                                                        'class' => 'btn',

                                                        'title' => 'Borrar documento'
                                
                                                    )
                                                
                                                );
                            
                                            ?>
                                        
                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                                </tbody>

                        </table>
                    
                    </div>

                </div>
                                                       
                <!-- /block -->
            
            </div>
                    
        </div>

        <button onclick="printHTML()" class="btn btn-large"><i class="icon-print"></i> Imprimir</button>

        <script>

            function printHTML(){

                if(window.print){

                     window.print();

                }

            } 

        </script>
            
    </div>
            
</div>
