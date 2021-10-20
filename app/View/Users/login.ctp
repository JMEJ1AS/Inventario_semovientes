<!DOCTYPE html>

<html>

  <head>
  
  <title>Admin Login</title>
  
    <?php echo $this->Html->css('/template/bootstrap/css/bootstrap.min.css'); ?> 

    <?php echo $this->Html->css('/template/bootstrap/css/bootstrap-responsive.min.css'); ?> 

    <?php echo $this->Html->css('/template/assets/styles.css'); ?>

    <?php echo $this->Html->script('/template/vendors/modernizr-2.6.2-respond-1.1.0.min.js'); ?>

  </head>

  <body id="login">

    <?php echo $this->Session->flash(); ?>

    <div class="container">

      <div class="form-signin">

        <?php echo $this->Session->flash('Auth'); ?>

        <?php echo $this->Form->create('User'); ?>

          <?php echo $this->element('logo'); ?>

          <br>

          <h4 class="form-signin-heading">Sistema Inventario de Semovientes</h4>

          <?php 

            echo $this->Form->input('username', 

              array(

                'type'=>'text',

                'class'=>'input-block-level',

                'placeholder'=>'Nombre de usuario',

                'label'=>false

              )

            ); 

          ?>

          <?php 

            echo $this->Form->input('password', 

              array(

                'class'=>'input-block-level',

                'placeholder'=>'password',

                'label'=>false

              )

            ); 

          ?>

        <?php

          echo $this->Form->submit('Ingresar', 

            array('class' => 'btn-large btn-success')
          
          );

          echo $this->Form->end();
        
        ?>

      
      </div>

    </div> <!-- /container -->

    <?php echo $this->Html->script('/template/vendors/jquery-1.9.1.min.js'); ?>

    <?php echo $this->Html->script('/template/bootstrap/js/bootstrap.min.js'); ?>

  </body>

</html>