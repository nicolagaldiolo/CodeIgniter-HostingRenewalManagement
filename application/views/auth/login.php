<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
  <?php $this->load->view('templates/head'); ?>
    
  </head>

  <body class="auth">
    <div id="infoMessage"><?php echo $message;?></div>
    <div class="container text-center">
      <div class="main_container">
        <h1><?php echo lang('login_heading');?></h1>
        <div class="form-login">
          <p><?php echo lang('login_subheading');?></p>
          <?php echo form_open("auth/login", array('id' => 'myform', 'novalidate' => '', 'class' => 'form-horizontal form-label-left'));?>

            <div class="item form-group">
              <?php echo form_input($identity);?>
            </div>

            <div class="item form-group">
              <?php echo form_input($password);?>
            </div>
            <div class="item form-group">
              <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>  
              <?php echo lang('login_remember_label', 'remember');?>
            </div>
            <button id="send" type="submit" class="btn btn-success btn-block btn-lg"><?php echo lang('login_submit_btn'); ?></button>
          <?php echo form_close();?>
          <div class="text-center">
            <a href="forgot_password"><?php echo lang('login_forgot_password');?></a>
          </div>
        </div>
        <p>Non hai ancora un account? <a href="<?php echo site_url("auth/create_user"); ?>">Registrati</a></p>

      </div>
    </div>

		<?php $this->load->view('templates/scripts'); ?>
  </body>
</html>