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
              <h3>I miei servizi</h3>
              <p>Di seguito un elenco dei servizi attualmente attivi.</p>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_content">
                  <?php if(!empty($domains)) : ?>  
                  <table id="datatable-buttons" class="table table-striped table-bordered">
                  
                    <thead>
                      <tr>
                        <th>Sito</th>
                        <th>Dominio</th>
                        <th>Hosting</th>
                        <th>Data di rinnovo</th>
                        <th>Prezzo</th>
                        <th>Note</th>
                        <th>Pagato</th>
                        <th></th>
                      </tr>
                    </thead>


                    <tbody>
                      
                      <?php foreach ($domains as $domain) : ?>
                      <tr <?php if($domain->pay == '1') echo "class=\"expiring\""; ?>>
                        <td><?php echo $domain->url; ?></td>
                        <td><span class="custom-label" style="background:<?php echo $domain->domLabel; ?>"><?php echo $domain->domain; ?></span></td>
                        <td><span class="custom-label" style="background:<?php echo $domain->hosLabel; ?>"><?php echo $domain->hosting; ?></span></td>
                        <td><?php echo $domain->renewal; ?></td>
                        <td><?php echo $domain->fee; ?></td>
                        <td><?php echo $domain->note; ?></td>
                        <td>
                          <?php if($domain->pay == '1') : ?>
                            <a href="<?php echo site_url("domains/paid/$domain->id"); ?>" class="btn btn-danger btn-xs">Segna come pagato</a>
                          <?php endif; ?>
                        </td>
                        <td>
                          <a class="btn btn-round btn-default btn-xs" href="<?php echo site_url("domains/edit/$domain->id"); ?>"><i class="fa fa-pencil"></i></a>
                          <a class="actionDelete btn btn-round btn-default btn-xs" href="<?php echo site_url("domains/delete_domain/$domain->id"); ?>"><i class="fa fa-trash-o"></i></a>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  <?php else: ?>
                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                      Nessun servizio attivo
                    </div>
                  <?php endif; ?>
                </div>
                
              </div>
              <a class="btn btn-success btn-md" href="<?php echo site_url("domains/new_domain/"); ?>">Aggiungi servizio</a>
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