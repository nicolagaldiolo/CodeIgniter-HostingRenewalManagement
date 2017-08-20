<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
		<?php $this->load->view('templates/head'); ?>
  </head>

  <body class="nav-md">
		<div id="infoMessage"><?php echo $message;?></div>
    <div class="container body">
      <div class="main_container">
      <?php $this->load->view('templates/nav'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="page-title">
            <div class="title_left">
              <h3><?php echo lang('index_heading');?></h3>
              <p><?php echo lang('index_subheading');?></p>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">
                  
									<table id="datatable-buttons" class="table table-striped table-bordered">
										<thead>
											<tr>
												<th><?php echo lang('index_fname_th');?></th>
												<th><?php echo lang('index_lname_th');?></th>
												<th><?php echo lang('index_email_th');?></th>
												<th><?php echo lang('index_groups_th');?></th>
												<th><?php echo lang('index_status_th');?></th>
												<th><?php echo lang('index_action_th');?></th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($users as $user) : ?>
												<tr>
            							<td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
            							<td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
            							<td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
													<td>
														<?php foreach ($user->groups as $group):?>
															<?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8'), array('class' => 'btn btn-default btn-xs')) ;?><br />
                						<?php endforeach?>
													</td>
													<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link'), array('class' => 'btn btn-default btn-xs')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'), array('class' => 'btn btn-default btn-xs'));?></td>
													<td><?php echo anchor("auth/edit_user/".$user->id, '<i class="fa fa-pencil"></i>', array('class' => 'btn btn-round btn-default btn-xs')) ;?></td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
                </div>
                
              </div>
							<?php echo anchor('auth/create_user', lang('index_create_user_link'), array('class' => 'btn btn-success btn-md'))?>
							<?php echo anchor('auth/create_group', lang('index_create_group_link'), array('class' => 'btn btn-success btn-md'))?>
            </div>

          </div>
          
          
        </div>
        <!-- /page content -->
        <?php $this->load->view('templates/footer'); ?>
        
      </div>
    </div>
    <?php $this->load->view('templates/scripts'); ?>
  </body>
</html>