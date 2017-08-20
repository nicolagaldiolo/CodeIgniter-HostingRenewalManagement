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
        <h1><?php echo lang('edit_user_heading');?></h1>
        <div class="form-login">
          <p><?php echo lang('edit_user_subheading');?></p>
          <?php echo form_open(uri_string(), array('id' => 'myform', 'novalidate' => '', 'class' => 'form-horizontal form-label-left'));?>

            <div class="item form-group">
              <?php echo lang('edit_user_fname_label', 'first_name');?> <br />
              <?php echo form_input($first_name);?>
            </div>

            <div class="item form-group"> 
              <?php echo lang('edit_user_lname_label', 'last_name');?> <br />
              <?php echo form_input($last_name);?>             
            </div>
            <div class="item form-group">   
            <?php echo lang('edit_user_validation_email_label', 'last_name');?> <br />
            <?php echo form_input($email);?>           
            </div>
            <div class="item form-group">    
            <?php echo lang('edit_user_company_label', 'company');?> <br />
            <?php echo form_input($company);?>          
            </div>
            <div class="item form-group">  
            <?php echo lang('edit_user_phone_label', 'phone');?> <br />
            <?php echo form_input($phone);?>            
            </div>
            <div class="item form-group">   
            <?php echo lang('edit_user_password_label', 'password');?> <br />
            <?php echo form_input($password);?>           
            </div>
            <div class="item form-group"> 
            <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
            <?php echo form_input($password_confirm);?>             
            </div>

            <?php if ($this->ion_auth->is_admin()): ?>

              <h4><?php echo lang('edit_user_groups_heading');?></h4>
              <div class="item form-group"> 
              <?php foreach ($groups as $group):?>
                  <label class="checkbox">
                  <?php
                      $gID=$group['id'];
                      $checked = null;
                      $item = null;
                      foreach($currentGroups as $grp) {
                          if ($gID == $grp->id) {
                              $checked= ' checked="checked"';
                          break;
                          }
                      }
                  ?>
                  <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                  <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                  </label>
              <?php endforeach?>
              </div>

            <?php endif ?>

            <?php echo form_hidden('id', $user->id);?>
            <?php echo form_hidden($csrf); ?>

            <button id="send" type="submit" class="btn btn-success btn-block btn-lg"><?php echo lang('edit_user_submit_btn'); ?></button>
          <?php echo form_close();?>
        </div>
        
      </div>
    </div>

		<?php $this->load->view('templates/scripts'); ?>
  </body>
</html>
