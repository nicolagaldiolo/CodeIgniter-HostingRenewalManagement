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
                <h3>Form Validation</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form validation <small>sub title</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" method="post" action="<?php echo site_url("domains/update" ); ?>" novalidate>

                      <p>For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
                      </p>
                      <span class="section">Personal Info</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Url <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" name="domain[url]" value="<?php echo $domain->url; ?>" placeholder="www.website.com" required="required" type="text">
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
                                <option <?php if($domain->domain === $provider->id) echo "selected"; ?> value="<?php echo $provider->id; ?>"><?php echo $provider->name; ?></option>
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
                                <option <?php if($domain->hosting === $provider->id) echo "selected"; ?> value="<?php echo $provider->id; ?>"><?php echo $provider->name; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                      <?php endif; ?>  

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Data <span class="required">*</span>
                        </label>
                      </div>

                      <fieldset>
                        <div class="control-group">
                          <div class="controls">
                            <div class="col-md-11 xdisplay_inputx form-group has-feedback">
                              <input type="text" name="domain[renewal]" required="required" class="form-control has-feedback-left datepickerItem" value="<?php echo $domain->renewal; ?>" placeholder="Seleziona una data" aria-describedby="inputSuccess2Status3">
                              <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                              <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                            </div>
                          </div>
                        </div>
                      </fieldset>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Prezzo <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="domain[fee]" value="<?php echo $domain->fee; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Note</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="domain[note]" class="form-control col-md-7 col-xs-12"><?php echo $domain->note; ?></textarea>
                        </div>
                      </div>

                      <input type="hidden" name="domain[id]" value="<?php echo $domain->id; ?>">

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                          <button type="submit" class="btn btn-primary">Cancel</button>
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