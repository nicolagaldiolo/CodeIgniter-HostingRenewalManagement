<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<!DOCTYPE html>
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
          <?php if(!empty($providers)) : ?>  

          <div class="row">



            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Button Example</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <p class="text-muted font-13 m-b-30">
                    The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                  </p>
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
                        <td></td>
                        <td>
                          <a href="<?php echo site_url("providers/edit/$provider->id"); ?>"><i class="fa fa-pencil"></i></a>
                          <a href="<?php echo site_url("providers/delete_provider/$provider->id"); ?>"><i class="fa fa-trash-o"></i></a></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                
              </div>
              <a class="btn btn-round btn-success" href="<?php echo site_url("providers/new_provider/"); ?>">Aggiungi fornitore</a>
            </div>

          </div>
          <?php endif; ?>
          
        </div>
        <!-- /page content -->
        <?php $this->load->view('templates/footer'); ?>
        
      </div>
    </div>
    <?php $this->load->view('templates/scripts'); ?>
  </body>
</html>