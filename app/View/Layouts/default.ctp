<!DOCTYPE html>

<html class="no-js">
    
    <head>
        <title>Inventario de semovientes</title>
        
        <!-- Bootstrap -->
        
        <?php echo $this->Html->css('/template/bootstrap/css/bootstrap.min.css'); ?> 

        <?php echo $this->Html->css('/template/bootstrap/css/bootstrap-responsive.min.css'); ?> 
        
        <?php echo $this->Html->css('/template/vendors/easypiechart/jquery.easy-pie-chart.css'); ?>

        <?php echo $this->Html->css('/template/assets/styles.css'); ?>

        <?php // LIBRERIAS CALENDARIO 
    
                echo $this->Html->css('/template/calendar/jquery.datetimepicker.css');
                
                echo $this->Html->script('/template/calendar/jquery.js');
                
                echo $this->Html->script('/template/calendar/jquery.datetimepicker.full.js');

        // FIN LIBRERIAS ?>

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <?php echo $this->Html->script('/template/vendors/modernizr-2.6.2-respond-1.1.0.min.js'); ?>

    </head>
    
    <body>

        <?php echo $this->element('navbar'); ?>
        
        <div class="container-fluid">

            <?php //echo $this->element('navbar'); ?>

            <?php echo $this->fetch('content'); ?> 
            
            <hr>
            
            <footer>
                
                <p><a href="http://www.parquemet.gob.cl">&copy; Parquemet 2018</a></p>
            
            </footer>
        
        </div>
        
        <!--/.fluid-container-->
        
        <?php echo $this->Html->script('/template/vendors/jquery-1.9.1.min.js'); ?>
        
        <?php echo $this->Html->script('/template/bootstrap/js/bootstrap.min.js'); ?>
        
        <?php echo $this->Html->script('/template/vendors/easypiechart/jquery.easy-pie-chart.js'); ?>
        
        <?php echo $this->Html->script('/template/assets/scripts.js'); ?>
        
        <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
        </script>

        <?php //echo $this->element('sql_dump'); ?>
    
    </body>

</html>
