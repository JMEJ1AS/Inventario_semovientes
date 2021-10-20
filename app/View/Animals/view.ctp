
<div class="row-fluid">

    <!-- sidebar -->

    <div class="span3" id="sidebar">

        <?php echo $this->element('logo'); ?>
    
        <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
        
            <li><?php echo $this->Html->link("Listar animales", "../Animals");?></li>

            <li><?php echo $this->Html->link("Ingresar animal", "../Animals/add");?></li>

            <li><?php echo $this->Html->link("Buscar animal", "../Animals/search");?></li>

            <li class="active"><?php echo $this->Html->link("Ver detalle", "../Animals/view/".$animal['Animal']['id']);?></li>

            <li><?php echo $this->Html->link("Administrar documentos", "../Documentos/add/".$animal['Animal']['id']);?></li>

            <li><?php echo $this->Html->link("Editar registro", "../Animals/edit/".$animal['Animal']['id']);?></li>

            <li><?php echo $this->Html->link("Registrar baja", "../Animals/baja/".$animal['Animal']['id']);?></li>

            <li><?php echo $this->Html->link("Autorizar acción", "../Autorizaciones/add/".$animal['Animal']['id']);?></li>

            <li>

            <?php if($animal['Animal']['estado']=="BAJA"){ ?>

                <li>
            
                    <?php 

                        echo $this->Html->link(

                                "Deshacer baja", "../Animals/deshacer/".$animal['Animal']['id'], 

                                ['onclick' => 'return confirmation(this, "confirmation")']

                        ); 
                    ?>
            
                </li>
            
            <?php } ?>

            </li>

	    <li><?php echo $this->Html->link("Bajas simultáneas", "../Animals/baja_simultanea");?></li>

	    <li><?php echo $this->Html->link("Carga masiva de documentos", "../Animals/search_massive");?></li>
    
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
                            
                        <li class="active">Animales <span class="divider">/</span></li>
                            
                        <li class="active">Detalle <span class="divider">/</span></li>

                        <li class="active"><?php echo $animal['Animal']['codigo']; ?></b></li>
                            
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
        
                        <div class="muted pull-left"><i class='icon-file'></i> Detalle </div>
              
                    </div>
    
                    <div class="block-content collapse in">

                        <legend> Ficha del animal </legend>

                        <div class="span5">

                            <label> Nombre : <b><?php echo $animal['Animal']['nombre']; ?></b></label>

                        </div>

                        <div class="span5">

                            <label> Chip/id : <b><?php echo $animal['Animal']['chip_id']; ?></b></label>

                        </div>
                                
                        <div class="span5">

                            <label> Especie animal : <b><?php echo $animal['Type']['nombre_comun']; ?></b></label>

                        </div>

                        <div class="span5">
                                
                            <label> Sexo : <b><?php echo $animal['Animal']['sexo']; ?></b></label>
                                                          
                        </div>

                        <div class="span5">
                                
                            <label> Código : <b><?php echo $animal['Animal']['codigo']; ?></b></label>

                        </div>

                        <div class="span5">
                                
                            <label> Condición : <b><?php echo $animal['Condition']['nombre']; ?></b></label>
                        
                        </div>

                        <div class="span5">
                                
                            <label> Fecha de nacimiento : <b><?php echo $animal['Animal']['fecha_nacimiento']; ?></b> </label>
                        
                        </div>

                        <div class="span5">
                                
                            <label> Fecha de ingreso : <b><?php echo $animal['Animal']['fecha_alta']; ?></b> </label>
                        
                        </div>


                        <div class="span5">
                                
                            <label> Estado : <b><?php echo $animal['Animal']['estado']; ?></b> </label>
                        
                        </div>

                        <div class="span5">
                                
                            <label> Valorización : <b><?php echo $animal['Animal']['valor_compra']; ?></b> </label>
                        
                        </div>

                        <div class="span5">
                                
                            <label> Longevidad en meses : <b><?php echo $animal['Animal']['vida_util']; ?></b> </label>
                        
                        </div>

                        <div class="span5">
                                
                            <label> Ubicación : <b><?php echo $animal['Recinto']['nombre']; ?></b> </label>
                        
                        </div>               

                        <div class="span11">

                            <label> Descripción activo : <b><?php echo $animal['Animal']['description_activo']; ?></b></label>
                        
                        </div>

                        <!--Agregar-->

                        <?php if($animal['Animal']['estado']=="BAJA"){ ?>

                            <div class="span11">

                                <hr></hr>
                                
                                    <h4> Información de la baja </h4>

                                <hr></hr>

                                <div class="span5">

                                    <label> Tipo de baja : <b><?php echo $animal['Bajatype']['nombre']; ?></b></label>

                                </div>

                                <div class="span5">

                                    <label> Fecha de baja : <b><?php echo $animal['Animal']['fecha_baja']; ?></b></label>

                                </div>

                                <div class="span11">

                                    <label> Glosa baja : <b><?php echo $animal['Animal']['glosa_baja']; ?></b></label>

                                </div>
                            
                            </div>

                        <?php } ?>

			<?php if($animal['Animal']['estado']=="ALTA"){ ?>

                            <?php if($documentos){ ?>

                                <div class="span11">

                                    <hr></hr>
                                    
                                    <h4> Documentos : </h4>

                                    <table class="table table-bordered table-striped">

                                        <thead>

                                            <tr>

                                                <th>Nombre del documento</th>

                                                <th>Tipo</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                        <?php foreach ($documentos as $documento) :?>

                                            <tr>

                                                <td>
                                                    
                                                    <?php

                                                        echo $this->Html->link(

                                                            $documento['Documento']['documento'], '../files/documento/documento/' . 
                                                            $documento['Documento']['dir'] . 

                                                            '/' .$documento['Documento']['documento'],
                                                            
                                                            array('target' => '_blank')

                                                    );
                                                                                                    
                                                    ?>

                                                </td>

                                                <td><?php echo $documento['Documento']['tipo_documento']; ?></td>

                                            </tr>

                                        <?php endforeach; ?>

                                        </tbody>

                                    </table>

                                </div>

                            <?php } ?>

                        <?php } ?>

                        <?php if($animal['Animal']['estado']=="BAJA"){ ?>

                            <?php if($documentos){ ?>

                                <div class="span11">

                                    <hr></hr>
                                    
                                    <h4> Documentos : </h4>

                                    <table class="table table-bordered table-striped">

                                        <thead>

                                            <tr>

                                                <th>Nombre del documento</th>

                                                <th>Tipo</th>

                                            </tr>

                                        </thead>

                                        <tbody>

                                        <?php foreach ($documentos as $documento) :?>

                                            <tr>

                                                <td>
                                                    
                                                    <?php

                                                        echo $this->Html->link(

                                                            $documento['Documento']['documento'], '../files/documento/documento/' . 
                                                            $documento['Documento']['dir'] . 

                                                            '/' .$documento['Documento']['documento'],
                                                            
                                                            array('target' => '_blank')

                                                    );
                                                                                                    
                                                    ?>

                                                </td>

                                                <td><?php echo $documento['Documento']['tipo_documento']; ?></td>

                                            </tr>

                                        <?php endforeach; ?>

                                        </tbody>

                                    </table>

                                </div>

                            <?php } ?>

                        <?php } ?>

                        <!--Agregar-->

                        <?php if($autorizaciones){ ?>

                            <div class="span11">

                                <hr></hr>
                                
                                <h4> Acciones : </h4>

                                <table class="table table-bordered table-striped">

                                    <thead>

                                        <tr>

                                            <th>Fecha</th>

                                            <th>Realizado por</th>

                                            <th>Tipo de movimiento</th>

                                            <th>Acción</th>

                                            <th>Comentario</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php foreach ($autorizaciones as $autorizacione) :?>

                                            <tr>

                                                <td><?php echo $autorizacione['Autorizacione']['created']; ?></td>

                                                <td><?php echo $autorizacione['User']['username']; ?></td>

                                                <td><?php echo $autorizacione['Autorizacione']['tipo_movimiento']; ?></td>

                                                <td><?php echo $autorizacione['Autorizacione']['accion']; ?></td>

                                                <td><?php echo $autorizacione['Autorizacione']['comentario']; ?></td>

                                            </tr>

                                        <?php endforeach; ?>

                                    </tbody>

                                </table>

                            </div>

                        <?php } ?>
                    
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

    <script type="text/javascript">

	    function confirmation() {
		if(confirm("Realmente desea deshacer la baja?"))
		{
		    return true;
		}
		return false;
	    }

    </script>
            
</div>
