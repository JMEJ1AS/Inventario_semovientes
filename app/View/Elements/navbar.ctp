<div class="navbar navbar-fixed-top">
    
    <div class="navbar-inner">
        
        <div class="container-fluid">
            
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
            
                <span class="icon-bar"></span>
                
                <span class="icon-bar"></span>
            
            </a>
            
            <a class="brand" href="#">

                <!--<i class="icon-home"></i>-->

                Inventario semovientes

            </a>
            
            <div class="nav-collapse collapse">
                
                <ul class="nav pull-right">
                    
                    <li class="dropdown">
                    
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">

                            <i class="icon-user"></i> 

                                <?php echo $this->Session->read('nombre'); ?>
                            
                            <i class="caret"></i>

                        </a>
                        
                        <ul class="dropdown-menu">
                            
                            <li>

                                <?php 

                                    echo $this->Html->link('Ver perfil', 

                                        array(

                                            'controller'=>'Users', 

                                            'action'=>'view', $this->Session->read('id')

                                        )
                                    ); 
                                ?>
                            
                            </li>
                            
                            <li class="divider"></li>
                            
                            <li>
                            
                                <!--<a tabindex="-1" href="../users/logout">Logout</a>-->

                                <?php echo $this->Html->link('Logout','../Users/logout');?>
                            
                            </li>
                        
                        </ul>
                    
                    </li>
                
                </ul>
                
                <ul class="nav">
                    
                    <!--<li class="active">-->
                    
                    <li><?php echo $this->Html->link('Especies animales','../Types/');?></li>

                    <li><?php echo $this->Html->link('Animales','../Animals/');?></li>

                    <li class="dropdown">
                        
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Configuración <i class="caret"></i>

                        </a>
                        
                        <ul class="dropdown-menu">
                        
                            <li><?php echo $this->Html->link('Condiciones','../Conditions/add');?></li>

                            <li><?php echo $this->Html->link('Tipos de baja','../Bajatypes/add');?></li>

                            <li><?php echo $this->Html->link('Recintos','../Recintos/add');?></li>
                        
                            <li><?php echo $this->Html->link('Usuarios','../Users/add');?></li>
                        
                        </ul>
                    
                    </li>

                    <li class="dropdown">
                        
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Busquedas <i class="caret"></i>

                        </a>
                        
                        <ul class="dropdown-menu">

                            <li><?php echo $this->Html->link('Buscar altas','../Animals/search_altas');?></li>
                        
                            <li><?php echo $this->Html->link('Buscar bajas','../Animals/search_bajas');?></li>

                            <li><?php echo $this->Html->link('Todos','../Animals/search_all');?></li>
                        
                        </ul>
                    
                    </li>

                    <li class="dropdown">
                        
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">

                            Exportar <i class="caret"></i>

                        </a>
                        
                        <ul class="dropdown-menu">

                            <li><?php echo $this->Html->link('Base de datos','../Animals/exportar');?></li>
                        
                        </ul>
                    
                    </li>                         
                                        
                </ul>
            
            </div>
            
            <!--/.nav-collapse -->
        
        </div>
    
    </div>

</div>
