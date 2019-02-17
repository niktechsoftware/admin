
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <script src="<?= base_url(); ?>assets/js/vendor.min.js"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="description" content="<?= $this->lang->line('description'); ?>">
    <meta property="og:url" content="<?= $this->lang->line('og_url'); ?>">
    <meta property="og:type" content="<?= $this->lang->line('og_type'); ?>">
    <meta property="og:title" content="<?= $this->lang->line('og_title'); ?>">
    <meta property="og:description" content="<?= $this->lang->line('og_description'); ?>">

    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/favicon-16x16.png" sizes="16x16">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/vendor.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/elephant.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/application.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/demo.min.css">
    <script src="<?= base_url(); ?>assets/js/custom.js"></script>
     <!--start datatable-->
 <link rel="stylesheet" href="<?= base_url(); ?>assets/css/datatable/dataTables.bootstrap4.min.css">
 <!--<script src="<?= base_url(); ?>assets/js/datatable/jquery-3.3.1.js"></script>-->
 <script src="<?= base_url(); ?>assets/js/datatable/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>assets/js/datatable/dataTables.bootstrap4.min.js"></script>
 <!--end datatable-->
<script type="text/javascript">
  $(document).ready(function() {
    $('#customers').DataTable();
} );

  $(document).ready(function() {
    $('#daybookdetail').DataTable();
} );
 $(document).ready(function() {
    $('#rdev').DataTable();
} );
 $(document).ready(function() {
    $('#fdv').DataTable();
} );
 $(document).ready(function() {
    $('#alle').DataTable();
} );
 $(document).ready(function() {
    $('#misd').DataTable();
} );
 $(document).ready(function() {
    $('#npsv').DataTable();
} );
 $(document).ready(function() {
    $('#loan').DataTable();
} );

 $(document).ready(function() {
    $('#agent').DataTable();
} );
 $(document).ready(function() {
    $('#agentdetail').DataTable();
} );
 $(document).ready(function() {
    $('#agentcomm').DataTable();
} );
 $(document).ready(function() {
    $('#employes').DataTable();
} );



</script>



  </head>
  <body class="layout layout-header-fixed layout-footer-fixed">
    <div class="layout-header">
      <div class="navbar navbar-default">
        <div class="navbar-header">
          <a class="navbar-brand navbar-brand-center" href="index-2.html">
            <img class="navbar-brand-logo" src="<?= base_url(); ?>assets/img/logo-inverse.svg" alt="Elephant">
          </a>
          <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#sidenav">
            <span class="sr-only">Toggle navigation</span>
            <span class="bars">
              <span class="bar-line bar-line-1 out"></span>
              <span class="bar-line bar-line-2 out"></span>
              <span class="bar-line bar-line-3 out"></span>
            </span>
            <span class="bars bars-x">
              <span class="bar-line bar-line-4"></span>
              <span class="bar-line bar-line-5"></span>
            </span>
          </button>
          <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="arrow-up"></span>
            <span class="ellipsis ellipsis-vertical">
              <img class="ellipsis-object" width="32" height="32" src="<?= base_url(); ?>assets/img/0180441436.jpg" alt="Teddy Wilson">
            </span>
          </button>
        </div>
        <div class="navbar-toggleable">
          <nav id="navbar" class="navbar-collapse collapse">
            <button class="sidenav-toggler hidden-xs" title="Collapse sidenav ( [ )" aria-expanded="true" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="bars">
                <span class="bar-line bar-line-1 out"></span>
                <span class="bar-line bar-line-2 out"></span>
                <span class="bar-line bar-line-3 out"></span>
                <span class="bar-line bar-line-4 in"></span>
                <span class="bar-line bar-line-5 in"></span>
                <span class="bar-line bar-line-6 in"></span>
              </span>
            </button>
            <ul class="nav navbar-nav navbar-right">
              <li class="visible-xs-block">
                <h4 class="navbar-text text-center">Hello, Admin</h4>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true">
                  <span class="icon-with-child hidden-xs">
                    <span class="icon icon-envelope-o icon-lg"></span>
                    <span class="badge badge-primary badge-above right">8</span>
                  </span>
                  <span class="visible-xs-block">
                    <span class="icon icon-envelope icon-lg icon-fw"></span>
                    <span class="badge badge-primary pull-right">8</span>
                    Messages
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                  <div class="dropdown-header">
                    <a class="dropdown-link" href="compose.html">New Message</a>
                    <h5 class="dropdown-heading">Recent messages</h5>
                  </div>
                  <div class="dropdown-body">
                    <div class="list-group list-group-divided custom-scrollbar">
                      <a class="list-group-item" href="#">
                        <div class="notification">
                          <div class="notification-media">
                            <img class="circle" width="40" height="40" src="<?= base_url(); ?>assets/img/0980726243.jpg" alt="Eliot Morgan">
                          </div>
                          <div class="notification-content">
                            <small class="notification-timestamp">Sep 15</small>
                            <h5 class="notification-heading">Eliot Morgan</h5>
                            <p class="notification-text">
                              <small class="truncate">Dear Admin, Please accept this message as notification that I was unable to work yesterday, due to personal illness.m</small>
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="dropdown-footer">
                    <a class="dropdown-btn" href="#">See All</a>
                  </div>
                </div>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true">
                  <span class="icon-with-child hidden-xs">
                    <span class="icon icon-bell-o icon-lg"></span>
                    <span class="badge badge-primary badge-above right">7</span>
                  </span>
                  <span class="visible-xs-block">
                    <span class="icon icon-bell icon-lg icon-fw"></span>
                    <span class="badge badge-primary pull-right">7</span>
                    Notifications
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                  <div class="dropdown-header">
                    <a class="dropdown-link" href="#">Mark all as read</a>
                    <h5 class="dropdown-heading">Recent Notifications</h5>
                  </div>
                  <div class="dropdown-body">
                    <div class="list-group list-group-divided custom-scrollbar">
                      <a class="list-group-item" href="#">
                        <div class="notification">
                          <div class="notification-media">
                            <img class="circle" width="40" height="40" src="<?= base_url(); ?>assets/img/0180441436.jpg" alt="Teddy Wilson">
                          </div>
                          <div class="notification-content">
                            <small class="notification-timestamp">9 hr</small>
                            <h5 class="notification-heading">Admin</h5>
                            <p class="notification-text">
                              <small class="truncate">Published a new post: "Everything you know about JMDF".</small>
                            </p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="dropdown-footer">
                    <a class="dropdown-btn" href="#">See All</a>
                  </div>
                </div>
              </li>
              <li class="dropdown hidden-xs">
                <button class="navbar-account-btn" data-toggle="dropdown" aria-haspopup="true">
                  <img class="circle" width="36" height="36" src="<?= base_url(); ?>assets/img/0180441436.jpg" alt="Teddy Wilson"> Admin
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                  <li><a href="profile.html">Profile</a></li>
                  <li><a href="<?php echo base_url();?>index.php/login/logout.html">Sign out</a></li>
                </ul>
              </li>
              <li class="visible-xs-block">
                <a href="contacts.html">
                  <span class="icon icon-users icon-lg icon-fw"></span>
                  Contacts
                </a>
              </li>
              <li class="visible-xs-block">
                <a href="profile.html">
                  <span class="icon icon-user icon-lg icon-fw"></span>
                  Profile
                </a>
              </li>
              <li class="visible-xs-block">
                <a href="login-1.html">
                  <span class="icon icon-power-off icon-lg icon-fw"></span>
                  Sign out
                </a>
              </li>
            </ul>
            <div class="title-bar">
              <h1 class="title-bar-title">
                <span class="d-ib">Jai Mata Di Finance Services</span>
              </h1>
              <p class="title-bar-description">
                <small>You can visit JMDF official website by clicking <a href="http://jmdf.co.in/" target="_blank">JMDF</a>.</small>
              </p>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <div class="layout-main">
      <div class="layout-sidebar">
        <div class="layout-sidebar-backdrop"></div>
        <div class="layout-sidebar-body">
          <div class="custom-scrollbar">
            <nav id="sidenav" class="sidenav-collapse collapse">
              <ul class="sidenav level-1">
                <li class="sidenav-search">
                  <form class="sidenav-form" action="http://demo.madebytilde.com/">
                    <div class="form-group form-group-sm">
                      <div class="input-with-icon">
                        <input class="form-control" type="text" placeholder="Search…">
                        <span class="icon icon-search input-icon"></span>
                      </div>
                    </div>
                  </form>
                </li>
                <li class="sidenav-heading">Navigation</li>
                <li class="sidenav-item">
                  <a href="<?= base_url() ?>dashboard.html">
                    <span class="sidenav-icon icon icon-works">&#103;</span>
                    <span class="sidenav-label">Dashboards</span>
                  </a>
                </li>
                <li class="sidenav-heading">Components</li>
                <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-works">&#73;</span>
                    <span class="sidenav-label">Settings</span>
                  </a>
                  <ul class="sidenav level-2 collapse">
                    <li class="sidenav-heading">Settings</li>
                    <!-- <li><a href="<?= base_url() ?>financial.html">Financial Year</a></li> -->
                    <li><a href="<?= base_url() ?>rank.html">Rank</a></li>
                    <li><a href="<?= base_url() ?>role.html">Role</a></li>
                    <li><a href="<?= base_url() ?>committees.html">Committees</a></li>
                    <li><a href="<?= base_url() ?>branches.html">Branches</a></li>
                    <!-- <li><a href="<?= base_url() ?>plans.html">Plans</a></li> -->
                  </ul>
                </li>
                 <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-works">&#110;</span>
                    <span class="sidenav-label">Agent</span>
                  </a>
                  <ul class="sidenav level-2 collapse">
                    <li class="sidenav-heading">Agent</li>
                    <li><a href="<?= base_url() ?>newagent.html">New</a></li>
                    <li><a href="<?= base_url() ?>agents.html">Agents List</a></li>
                     <li><a href="<?= base_url() ?>agentsCommission.html">Agents Commission</a></li>
                  </ul>
                </li>
                <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-works">&#110;</span>
                    <span class="sidenav-label">Employee</span>
                  </a>
                  <ul class="sidenav level-2 collapse">
                    <li class="sidenav-heading">Employee</li>
                    <li><a href="<?= base_url() ?>newemploye.html">New</a></li>
                    <li><a href="<?= base_url() ?>employes.html">Employes</a></li>
                  </ul>
                </li>
                <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-works">&#97;</span>
                    <span class="sidenav-label">Customer</span>
                  </a>
                  <ul class="sidenav level-2 collapse">
                    <li class="sidenav-heading">Customer</li>
                    <li><a href="<?= base_url() ?>newcustomer.html">New</a></li>
                    <li><a href="<?= base_url() ?>customers.html">Customers</a></li>
                  </ul>
                </li>
                <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-works">&#61;</span>
                    <span class="sidenav-label">Premium</span>
                  </a>
                  <ul class="sidenav level-2 collapse">
                    <li class="sidenav-heading">Premium</li>
                    <li><a href="<?= base_url() ?>premiumdetail.html">Premium Detail</a></li>
                    <li><a href="<?= base_url() ?>premiumlistall.html">Premium list</a></li>
                  </ul>
                </li>
                <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-works">&#68;</span>
                    <span class="sidenav-label">Other</span>
                  </a>
                  <ul class="sidenav level-2 collapse">
                    <li class="sidenav-heading">Other</li>
                    <li><a href="<?= base_url() ?>message.html">Sms</a></li>
                    <li><a href="<?= base_url() ?>expences.html">Daily Expences</a></li>
                    <li><a href="<?= base_url() ?>daybook.html">Day-Book</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <?php $this->load->view($body); ?>
      <div class="layout-footer">
        <div class="layout-footer-body">
          <small class="version">Version 0.0.1</small>
          <small class="copyright">2017 &copy; JMDF <a href="http://gfinch.in/">Made by Niktech Software Solutions</a></small>
        </div>
      </div>
    </div>
    <div class="theme">
      <div class="theme-panel theme-panel-collapsed">
        <div class="theme-panel-body">
          <div class="custom-scrollbar">
            <div class="custom-scrollbar-inner">
              <ul class="theme-settings">
                <li class="theme-settings-item">
                  <div class="theme-settings-label">Header fixed</div>
                  <div class="theme-settings-switch">
                    <label class="switch switch-primary">
                      <input class="switch-input" type="checkbox" name="layout-header-fixed" data-sync="true">
                      <span class="switch-track"></span>
                      <span class="switch-thumb"></span>
                    </label>
                  </div>
                </li>
                <li class="theme-settings-item">
                  <div class="theme-settings-label">Sidebar fixed</div>
                  <div class="theme-settings-switch">
                    <label class="switch switch-primary">
                      <input class="switch-input" type="checkbox" name="layout-sidebar-fixed" data-sync="true">
                      <span class="switch-track"></span>
                      <span class="switch-thumb"></span>
                    </label>
                  </div>
                </li>
                <li class="theme-settings-item">
                  <div class="theme-settings-label">Sidebar sticky*</div>
                  <div class="theme-settings-switch">
                    <label class="switch switch-primary">
                      <input class="switch-input" type="checkbox" name="layout-sidebar-sticky" data-sync="true">
                      <span class="switch-track"></span>
                      <span class="switch-thumb"></span>
                    </label>
                  </div>
                </li>
                <li class="theme-settings-item">
                  <div class="theme-settings-label">Sidebar collapsed</div>
                  <div class="theme-settings-switch">
                    <label class="switch switch-primary">
                      <input class="switch-input" type="checkbox" name="layout-sidebar-collapsed" data-sync="false">
                      <span class="switch-track"></span>
                      <span class="switch-thumb"></span>
                    </label>
                  </div>
                </li>
                <li class="theme-settings-item">
                  <div class="theme-settings-label">Footer fixed</div>
                  <div class="theme-settings-switch">
                    <label class="switch switch-primary">
                      <input class="switch-input" type="checkbox" name="layout-footer-fixed" data-sync="true">
                      <span class="switch-track"></span>
                      <span class="switch-thumb"></span>
                    </label>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script src="<?= base_url(); ?>assets/js/vendor.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/elephant.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/application.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/demo.min.js"></script>
  </body>

</html>