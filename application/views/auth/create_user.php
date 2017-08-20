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
        <h1><?php echo lang('create_user_heading');?></h1>
        <div class="form-login">
          <p><?php echo lang('create_user_subheading');?></p>
          <?php echo form_open("auth/create_user", array('id' => 'myform', 'novalidate' => '', 'class' => 'form-horizontal form-label-left'));?>

            <div class="item form-group">
              <?php echo lang('create_user_fname_label', 'first_name');?> <br />
              <?php echo form_input($first_name);?>
            </div>

            <div class="item form-group">
              <?php echo lang('create_user_lname_label', 'last_name');?> <br />
              <?php echo form_input($last_name);?>
            </div>

            <?php
            if($identity_column!=='email') {
                echo '<div class="item form-group">';
                echo lang('create_user_identity_label', 'identity');
                echo '<br />';
                echo form_error('identity');
                echo form_input($identity);
                echo '</div>';
            }
            ?>

            <div class="item form-group">
              <?php echo lang('create_user_company_label', 'company');?> <br />
              <?php echo form_input($company);?>
            </div>

            <div class="item form-group">
              <?php echo lang('create_user_email_label', 'email');?> <br />
              <?php echo form_input($email);?>
            </div>

            <div class="item form-group">
              <?php echo lang('create_user_phone_label', 'phone');?> <br />
              <?php echo form_input($phone);?>
            </div>

            <div class="item form-group">
              <?php echo lang('create_user_password_label', 'password');?> <br />
              <?php echo form_input($password);?>
            </div>

            <div class="item form-group">
              <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
              <?php echo form_input($password_confirm);?>
            </div>
            
            <button id="send" type="submit" class="btn btn-success btn-block btn-lg"><?php echo lang('create_user_submit_btn'); ?></button>
          <?php echo form_close();?>
        </div>
        
      </div>
    </div>

		<?php $this->load->view('templates/scripts'); ?>
  </body>
</html>
