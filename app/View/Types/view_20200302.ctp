<div class="row-fluid">

    <!-- sidebar -->

    <div class="span3" id="sidebar">

        <?php echo $this->element('logo'); ?>
    
        <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
        
            <li><?php echo $this->Html->link("Listar especies","../Types");?></li>
        
            <li><?php echo $this->Html->link("Agregar especie","../Types/add");?></li>

            <li><?php echo $this->Html->link("Buscar especies","../Types/search");?></li>

            <li class="active"><?php echo $this->Html->link("Ver detalle", "../Types/view/".$type['Type']['id']);?></li>

            <li><?php echo $this->Html->link("Editar", "../Types/edit/".$type['Type']['id']);?></li>
        
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
                            
                        <li class="active">Detalle <span class="divider">/</span></li>

                        <li class="active"><?php echo $type['Type']['nombre_comun']; ?></b></li>
                            
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
        
                        <div class="muted pull-left">Detalle </div>
              
                    </div>
    
                    <div class="block-content collapse in">

                        <legend> Ficha de especie animal </legend>

                        <div class="span5">

                            <label> Nombre común : <b><?php echo $type['Type']['nombre_comun']; ?></b></label>

                        </div>
                                
                        <div class="span5">

                            <label> Nombre cientifico: <b><?php echo $type['Type']['nombre_cientifico']; ?></b></label>

                        </div>

                        <div class="span5">
                                
                            <label> Nombre abreviado : <b><?php echo $type['Type']['abreviacion']; ?></b></label>
                                                          
                        </div>

                        <div class="span5">
                                
                            <label> Subgenero : <b><?php echo $type['Type']['subgenero']; ?></b></label>
                                                          
                        </div>

                        <div class="span5">
                                
                            <label> Fecha de ingreso : <b><?php echo $type['Type']['created']; ?></b></label>
                                                          
                        </div>

                        <div class="span5">
                                
                            <label> Fecha de modificación : <b><?php echo $type['Type']['modified']; ?></b></label>
                                                          
                        </div>

                        <?php if($animals){ ?>

                            <div class="span11">

                                <hr></hr>
                                
                                <h4> Animales de la especie: </h4>

                                <table class="table table-bordered table-striped">

                                    <thead>

                                        <tr>

                                            <th>Código</th>

                                            <th>Condición</th>

                                            <th>Estado</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                    <?php foreach ($animals as $animal) :?>

                                        <tr>

                                            <td><?php 

                                                    echo $this->Html->link($animal['Animal']['codigo'], 

                                                        array(

                                                            'controller'=>'Animals', 

                                                            'action'=>'view', $animal['Animal']['id']

                                                        )
                                                    ); 
                                                ?>
                                            
                                            </td>

                                            <td><?php echo $animal['Condition']['nombre']; ?></td>

                                            <td><?php echo $animal['Animal']['estado']; ?></td>

                                        </tr>

                                    <?php endforeach; ?>

                                    </tbody>

                                </table>

                            </div>

                        <?php } ?>
                    
                    </div>

                    <?php echo $this->element('paginador'); ?>

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