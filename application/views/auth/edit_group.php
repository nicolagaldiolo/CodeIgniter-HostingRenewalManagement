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
        <h1><?php echo lang('edit_group_heading');?></h1>
        <div class="form-login">
          <p><?php echo lang('edit_group_subheading');?></p>
          <?php echo form_open(current_url(), array('id' => 'myform', 'novalidate' => '', 'class' => 'form-horizontal form-label-left'));?>

            <div class="item form-group">
              <?php echo lang('edit_group_name_label', 'group_name');?> <br />
              <?php echo form_input($group_name);?>
            </div>

            <div class="item form-group">
              <?php echo lang('edit_group_desc_label', 'description');?> <br />
              <?php echo form_input($group_description);?>
            </div>

            <button id="send" type="submit" class="btn btn-success btn-block btn-lg"><?php echo lang('edit_group_submit_btn'); ?></button>
          <?php echo form_close();?>
        </div>
        
      </div>
    </div>

		<?php $this->load->view('templates/scripts'); ?>
  </body>
</html>