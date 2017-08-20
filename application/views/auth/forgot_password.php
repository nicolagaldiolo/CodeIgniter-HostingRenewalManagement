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
        <h1><?php echo lang('forgot_password_heading');?></h1>
        <div class="form-login">
          <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label);?></p>
          <?php echo form_open("auth/forgot_password", array('id' => 'myform', 'novalidate' => '', 'class' => 'form-horizontal form-label-left'));?>

            <div class="item form-group">
              <?php echo form_input($identity);?>
            </div>

            <button id="send" type="submit" class="btn btn-success btn-block btn-lg"><?php echo lang('forgot_password_submit_btn'); ?></button>
          <?php echo form_close();?>
        </div>
        
      </div>
    </div>

		<?php $this->load->view('templates/scripts'); ?>
  </body>
</html>