<div class="row-fluid">

    <!-- sidebar -->

    <div class="span3" id="sidebar">

        <?php echo $this->element('logo'); ?>
    
        <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
        
            <li><?php echo $this->Html->link("Listar animales", "../Animals");?></li>

            <li><?php echo $this->Html->link("Ingresar animal", "../Animals/add");?></li>

            <li><?php echo $this->Html->link("Buscar animal", "../Animals/search");?></li>
    
        </ul>
                
    </div>

    <!-- fin sidebar -->
                
    <!--/span -->
                
    <div class="span9" id="content">
                    
        <div class="row-fluid">

            <div class="alert alert-success">

                <button type="button" class="close" data-dismiss="alert">×</button>

                <h4>Bienvenido al Sistema de Inventario Semovientes</h4>                
 
            </div>            
                    
        </div>
            
    </div>
            
</div>
