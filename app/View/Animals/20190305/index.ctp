<div class="row-fluid">

    <!-- sidebar -->

    <div class="span3" id="sidebar">

        <?php echo $this->element('logo'); ?>
    
        <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
        
            <li class="active"><?php echo $this->Html->link("Listar animales", "../Animals");?></li>

            <li><?php echo $this->Html->link("Ingresar animal", "../Animals/add");?></li>

            <li><?php echo $this->Html->link("Buscar animal", "../Animals/search");?></li>
    
        </ul>
                
    </div>

    <!-- fin sidebar -->
                
    <!--/span -->
                
    <div class="span9" id="content">
                    
        <div class="row-fluid">

            <?php //echo $this->Session->flash(); ?>

            <!-- Barra de navegación -->
                        
            <div class="navbar">
                            
                <div class="navbar-inner">
                            
                    <ul class="breadcrumb">
                            
                        <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
                            
                        <i class="icon-chevron-right show-sidebar" style="display:none;">

                            <a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a>

                        </i>
                            
                        <li class="active">Animales <span class="divider">/</span></li>
                            
                        <li class="active">Listar </li>
                            
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
                                    
                        <div class="muted pull-left">Encontrados</div>
                                    
                        <div class="pull-right"><span class="badge badge-info"><?php echo $encontrados; ?></span></div>
                        
                    </div>
                                
                    <div class="block-content collapse in">
                                    
                        <table class="table table-striped">
                                        
                            <thead>
                                    
                                <tr>
                                        
                                    <th>#</th>
                                    
                                    <th>codigo</th>
                                    
                                    <th>especie</th>
                                    
                                    <th>sexo</th>
                                    
                                    <th>Estado</th>
                                    
                                    <th>fecha_ingreso</th>
                                    
                                </tr>
                                
                            </thead>
                                        
                            <tbody>

                                <?php foreach ($animals as $animal): ?>
                                            
                                <tr>
                                                
                                    <td><?php echo $animal['Animal']['id']; ?></td>
                                    
                                    <td><?php 

                                            echo $this->Html->link($animal['Animal']['codigo'], 

                                                array(

                                                    'controller'=>'Animals', 

                                                    'action'=>'view', $animal['Animal']['id']

                                                )
                                            ); 
                                        ?>
                                        
                                    </td>
                                    
                                    <td><?php echo $animal['Type']['nombre_comun']; ?></td>
                                    
                                    <td><?php echo $animal['Animal']['sexo']; ?></td>
                                    
                                    <td><?php echo $animal['Animal']['estado']; ?></td>
                                    
                                    <td><?php echo $animal['Animal']['fecha_ingreso']; ?></td>
                                    
                                </tr>

                                <?php endforeach; ?>
                                
                            </tbody>
                            
                        </table>
                        
                    </div>

                    <?php echo $this->element('paginador'); ?>
                    
                </div>
                            
                <!-- /block -->
            
            </div>
                    
        </div>
            
    </div>
            
</div>