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
          <?php if(!empty($summmary)) : ?>
          <!-- top tiles -->
          
          <div class="row tile_count">
            <div class="col-md-2 col-sm-6 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Totale servizi</span>
              <div class="count"><?php echo $summmary['total']; ?></div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Totale incasso</span>
              <div class="count green">€ <?php echo $summmary['sum']; ?></div>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Servizi in scadenza</span>
              <div class="count"><?php echo $summmary['total_current']; ?></div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Incasso mese corrente</span>
              <div class="count green">€ <?php echo $summmary['sum_current']; ?></div>
            </div>
          </div>
          <!-- /top tiles -->  
          <?php endif; ?>

          <div class="row">
            <?php if(!empty($earnByMounth)) : ?>
            <div class="col-md-8 col-sm-7 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Line graph<small>Sessions</small></h2>
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
                  <canvas id="dashboardlineChart"></canvas>
                </div>
              </div>
            </div>
            <?php endif; ?>
            
            <div class="col-md-4 col-sm-5 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>In scadenza <small>In scadenza questo mese</small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <?php if(!empty($domainsCurrent)) : ?>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Servizio</th>
                          <th>Data</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($domainsCurrent as $domain) : ?>
                        <tr>
                          <td><?php echo $domain->url; ?></td>
                          <td><?php echo $domain->renewal; ?></td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  <?php else : ?>
                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                      Nessun servizio in scadenza questo mese
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            
          </div>
          <div class="clearfix"></div>
  
        </div>
        <!-- /page content -->
        <?php $this->load->view('templates/footer'); ?>
        
      </div>
    </div>
    <?php $this->load->view('templates/scripts'); ?>

    <?php if(!empty($earnByMounth)) : ?>
    <script>
      if ($('#dashboardlineChart').length ){	

        var ctx = document.getElementById("dashboardlineChart");
        var dashboardlineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"],
          datasets: [{
          label: "Incasso mese corrente",
          backgroundColor: "rgba(38, 185, 154, 0.31)",
          borderColor: "rgba(38, 185, 154, 0.7)",
          pointBorderColor: "rgba(38, 185, 154, 0.7)",
          pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
          pointHoverBackgroundColor: "#fff",
          pointHoverBorderColor: "rgba(220,220,220,1)",
          pointBorderWidth: 2,
          data: [
            <?php 
              for($i = 1; $i<=12; $i++){
                echo !empty($earnByMounth[$i]) ? $earnByMounth[$i].',' : "0,";
              }
            ?>
          ]
          }]
        },
        });

      }
    </script>
    <?php endif; ?>

  </body>
</html>