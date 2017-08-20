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
				<h1><?php echo lang('reset_password_heading');?></h1>
        <div class="form-login">
          <?php echo form_open('auth/reset_password/' . $code, array('id' => 'myform', 'novalidate' => '', 'class' => 'form-horizontal form-label-left'));?>

            <div class="item form-group">
							<label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
							<?php echo form_input($new_password);?>
            </div>

            <div class="item form-group">
							<?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
							<?php echo form_input($new_password_confirm);?>
						</div>
						
						<?php echo form_input($user_id);?>
						<?php echo form_hidden($csrf); ?>

            <button id="send" type="submit" class="btn btn-success btn-block btn-lg"><?php echo lang('reset_password_submit_btn'); ?></button>
          <?php echo form_close();?>
        </div>
        
      </div>
    </div>

		<?php $this->load->view('templates/scripts'); ?>
  </body>
</html>