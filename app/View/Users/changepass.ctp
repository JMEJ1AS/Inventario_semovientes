<div class="row-fluid">

    <!-- sidebar -->

    <div class="span3" id="sidebar">

        <?php echo $this->element('logo'); ?>
    
        <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
        
            <li><?php echo $this->Html->link("Ver perfil", "../Users/view/".$user['User']['id']);?></li>

            <li class="active"><?php echo $this->Html->link("cambiar contraseña", "../Users/changepass/".$user['User']['id']);?></li>
        
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
                            
                        <li class="active">Usuarios <span class="divider">/</span></li>
                            
                        <li class="active">Perfil <span class="divider">/</span></li>

                        <li class="active"><?php echo $user['User']['nombre']; ?></b></li>
                            
                    </ul>
                            
                </div>
                        
            </div>

            <!-- Fin barra de navegación -->                

        </div>

        <div class="row-fluid">
                        
            <div class="span12">

                <!--<form class="form-horizontal">-->

                <?php echo $this->Form->create('User', array('class'=>'form-horizontal')); ?>
                            
                <div class="block">

                    <div class="navbar navbar-inner block-header">
        
                        <div class="muted pull-left">Cambiar password </div>
              
                    </div>
    
                    <div class="block-content collapse in">
                                
                        <div class="span12">
                                      
                            <fieldset>

                                <legend>Formulario de cambio de contraseña</legend>

                                <div class="control-group">
                                                      
                                    <label class="control-label" > Password </label>
                                                      
                                    <div class="controls">

                                        <?php echo $this->Form->input('password',

                                            array(

                                                'type'=>'password',

                                                'class' => 'span6',

                                                'label' => false,
                                                
                                            ));

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