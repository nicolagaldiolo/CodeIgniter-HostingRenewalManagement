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
          
          <?php if(!empty($domains)) : ?>  

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
                        <th>Sito</th>
                        <th>Dominio</th>
                        <th>Hosting</th>
                        <th>Data di rinnovo</th>
                        <th>Prezzo</th>
                        <th>Note</th>
                        <th></th>
                      </tr>
                    </thead>


                    <tbody>
                      
                      <?php foreach ($domains as $domain) : ?>
                      <tr>
                        <td><?php echo $domain->url; ?></td>
                        <td><?php echo $domain->domain; ?></td>
                        <td><?php echo $domain->hosting; ?></td>
                        <td><?php echo $domain->renewal; ?></td>
                        <td><?php echo $domain->fee; ?></td>
                        <td><?php echo $domain->note; ?></td>
                        <td>
                          <a href="<?php echo site_url("domains/edit/$domain->id"); ?>"><i class="fa fa-pencil"></i></a>
                          <a href="<?php echo site_url("domains/delete_domain/$domain->id"); ?>"><i class="fa fa-trash-o"></i></a></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                
              </div>
              <a class="btn btn-round btn-success" href="<?php echo site_url("domains/new_domain/"); ?>">Aggiungi dominio</a>
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