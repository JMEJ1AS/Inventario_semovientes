<div class="row-fluid">

    <!-- sidebar -->

    <div class="span3" id="sidebar">

        <?php echo $this->element('logo'); ?>
    
        <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
        
            <li class="active"><?php echo $this->Html->link("Ver perfil", "../Users/view/".$user['User']['id']);?></li>

            <li><?php echo $this->Html->link("cambiar contraseña", "../Users/changepass/".$user['User']['id']);?></li>
        
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
                            
                <!-- block -->

                <div class="block">

                    <div class="navbar navbar-inner block-header">
        
                        <div class="muted pull-left">Perfil </div>
              
                    </div>
    
                    <div class="block-content collapse in">

                        <legend> Usuario </legend>

                        <div class="span5">

                            <label> Nombre : <b><?php echo $user['User']['nombre']; ?></b></label>

                        </div>
                                
                        <div class="span5">

                            <label> Nombre de usuario: <b><?php echo $user['User']['username']; ?></b></label>

                        </div>

                        <div class="span5">
                                
                            <label> Mail : <b><?php echo $user['User']['mail']; ?></b></label>
                                                          
                        </div>

                        <div class="span5">
                                
                            <label> Password : <b>**********</b></label>
                                                          
                        </div>

                        <div class="span5">
                                
                            <label> Perfil : <b><?php echo $user['User']['role']; ?></b></label>
                                                          
                        </div>

                        <div class="span5">
                                
                            <label> Fecha de ingreso : <b><?php echo $user['User']['created']; ?></b></label>
                                                          
                        </div>

                        <div class="span5">
                                
                            <label> Fecha de modificación : <b><?php echo $user['User']['modified']; ?></b></label>
                                                          
                        </div>
                    
                    </div>

                </div>
                                                       
                <!-- /block -->
            
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
            
</div>