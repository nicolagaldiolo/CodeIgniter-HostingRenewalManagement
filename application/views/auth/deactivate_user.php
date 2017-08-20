<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
  <?php $this->load->view('templates/head'); ?>
    
  </head>

  <body class="auth">
    <div class="container text-center">
      <div class="main_container">
        <h1><?php echo lang('deactivate_heading');?></h1>
        <div class="form-login">
          <p><?php echo sprintf(lang('deactivate_subheading'), $user->username);?></p>
          <?php echo form_open("auth/deactivate/".$user->id, array('id' => 'myform', 'novalidate' => '', 'class' => 'form-horizontal form-label-left'));?>

            <div class="item form-group">
              <?php echo lang('deactivate_confirm_y_label', 'confirm');?>
              <input type="radio" name="confirm" value="yes" checked="checked" />
              <?php echo lang('deactivate_confirm_n_label', 'confirm');?>
              <input type="radio" name="confirm" value="no" />
            </div>

            <?php echo form_hidden($csrf); ?>
            <?php echo form_hidden(array('id'=>$user->id)); ?>

            <button id="send" type="submit" class="btn btn-success btn-block btn-lg"><?php echo lang('deactivate_submit_btn'); ?></button>
          <?php echo form_close();?>
        </div>
        
      </div>
    </div>

		<?php $this->load->view('templates/scripts'); ?>
  </body>
</html>