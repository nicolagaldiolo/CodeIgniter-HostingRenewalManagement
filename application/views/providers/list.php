<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
		<?php $this->load->view('templates/head'); ?>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
      <?php $this->load->view('templates/nav'); ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="page-title">
            <div class="title_left">
              <h3>I miei Fornitori</h3>
              <p>Di seguito un elenco dei fornitori attualmente attivi.</p>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">
                  <?php if(!empty($providers)) : ?>  
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Fornitore</th>
                          <th>Url</th>
                          <th>Label</th>
                          <th></th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php foreach ($providers as $provider) : ?>
                        <tr>
                          <td><?php echo $provider->name; ?></td>
                          <td><?php echo $provider->website; ?></td>
                          <td><span class="custom-label" style="background:<?php echo $provider->label;?>"><?php echo $provider->label;?></span></td>
                          <td>
                            <a class="btn btn-round btn-default btn-xs" href="<?php echo site_url("providers/edit/$provider->id"); ?>"><i class="fa fa-pencil"></i></a>
                            <a class="actionDelete btn btn-round btn-default btn-xs" href="<?php echo site_url("providers/delete_provider/$provider->id"); ?>"><i class="fa fa-trash-o"></i></a>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  <?php else: ?>
                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                      Nessun fornitore attivo
                    </div>
                  <?php endif; ?>
                </div>
                
              </div>
              <a class="btn btn-success btn-md" href="<?php echo site_url("providers/new_provider/"); ?>">Aggiungi fornitore</a>
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