<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="/" class="site_title"><i class="fa fa-server"></i> <span>Hosting manager</span></a>
    </div>

    <div class="clearfix"></div>

    <?php if(!empty($user_info)) : ?>
    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="<?php echo $user_info->avatar; ?>" alt="" class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <h2><?php echo $user_info->first_name . " " . $user_info->last_name; ?></h2>
        <a href="<?php echo site_url("auth/edit_user/$user_info->id"); ?>">Modifica account</a>
      </div>
    </div>
    <br />
    <?php endif; ?>

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li><a><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo site_url("dashboard/"); ?>">Dashboard</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-home"></i> Servizi <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo site_url("domains/"); ?>">Tutti i servizi</a></li>
              <li><a href="<?php echo site_url("domains/new_domain/"); ?>">Aggiungi servizio</a></li>
            </ul>
          </li>
          <li><a><i class="fa fa-edit"></i> Fornitori <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="<?php echo site_url("providers/"); ?>">Tutti i fornitori</a></li>
              <li><a href="<?php echo site_url("providers/new_provider/"); ?>">Aggiungi fornitore</a></li>
            </ul>
          </li>
        </ul>
      </div>

    </div>
    <!-- /sidebar menu -->

  </div>
</div>

<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      <?php if(!empty($user_info)) : ?>
      <?php //echo '<pre>', var_dump($user_info), '</pre>'; ?>
      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo $user_info->avatar; ?>" alt=""><?php echo $user_info->first_name . " " . $user_info->last_name; ?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li>
              <a href="<?php echo site_url("auth/"); ?>">
                <i class="fa fa-users pull-right"></i> Gestisci Utenti
              </a>
            </li>  
            <li>
              <a href="<?php echo site_url("auth/edit_user/$user_info->id"); ?>">
                <i class="fa fa-cog pull-right"></i> Account
              </a>
            </li>
            <li>
              <a href="<?php echo site_url("auth/logout"); ?>">
                <i class="fa fa-sign-out pull-right"></i> Log Out
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <?php endif; ?>
    </nav>
  </div>
</div>
<!-- /top navigation -->