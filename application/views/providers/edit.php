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
          
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $provider->name; ?></h3>
                <p>Modifica il form sottostante per modificare le informazioni del fornitore</p>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Informazioni fornitore</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" method="post" action="<?php echo site_url("providers/update" ); ?>" novalidate>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nome <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" name="provider[name]" value="<?php echo $provider->name; ?>" placeholder="Nome del fornitore" required="required" type="text">
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Website</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="provider[website]" value="<?php echo $provider->website; ?>" placeholder="Sito internet del fornitore" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Label</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="input-group demo2">
                            <input type="text" name="provider[label]" value="<?php echo $provider->label; ?>" class="form-control required" placeholder="#e01ab5"/>
                            <span class="input-group-addon"><i></i></span>
                          </div>
                        </div>
                      </div>

                      <input type="hidden" name="provider[id]" value="<?php echo $provider->id; ?>">

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Modifica</button>
                          <button type="reset" class="btn btn-default">Cancella</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
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