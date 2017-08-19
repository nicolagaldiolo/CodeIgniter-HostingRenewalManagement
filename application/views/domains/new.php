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
                <h3>Nuovo servizio</h3>
                <p>Compila il form sottostante e aggiungi un nuovo servizio</p>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Informazioni servizio</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" method="post" action="" novalidate>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Url <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" name="domain[url]" placeholder="www.website.com" required="required" type="text">
                        </div>
                      </div>
                      
                      <?php if(!empty($providers)) : ?>  
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Dominio <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="domain[domain]">
                              <option value="">Nessuno</option>    
                              <?php foreach($providers as $provider) : ?>  
                                <option value="<?php echo $provider->id; ?>"><?php echo $provider->name; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12">Hosting <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" name="domain[hosting]">
                              <option value="">Nessuno</option>    
                              <?php foreach($providers as $provider) : ?>  
                                <option value="<?php echo $provider->id; ?>"><?php echo $provider->name; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                      <?php endif; ?>  

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Data <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="domain[renewal]" required="required" class="form-control has-feedback-left datepickerItem" placeholder="Seleziona una data" aria-describedby="inputSuccess2Status3">
                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                          <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Prezzo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="domain[fee]" required="required" class="form-control col-md-7 col-xs-12" placeholder="100.00">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Da pagare: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="domain[pay]" required="required">
                            <option selected value="1">Si</option>    
                            <option value="0">No</option>    
                          </select>
                        </div>                        
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Note</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea rows="10" name="domain[note]" class="form-control col-md-7 col-xs-12" placeholder="Inserisci una nota..."></textarea>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Aggiungi servizio</button>
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