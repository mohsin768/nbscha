<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="<?php echo common_assets_url('images/favicon.png'); ?>" type="image/png" />
    <title><?php echo $this->config->item('site_name'); ?></title>
    <!-- Bootstrap -->
    <link href="<?php echo common_assets_url('vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo common_assets_url('vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo common_assets_url('vendors/nprogress/nprogress.css'); ?>" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo common_assets_url('vendors/iCheck/skins/flat/green.css'); ?>" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="<?php echo common_assets_url('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css'); ?>" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo common_assets_url('vendors/jqvmap/dist/jqvmap.min.css'); ?>" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo common_assets_url('vendors/bootstrap-daterangepicker/daterangepicker.css'); ?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo common_assets_url('build/css/custom.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo admin_assets_url('css/celiums.css'); ?>" rel="stylesheet">
    <script> var siteBaseUrl = '<?php echo admin_url('/'); ?>'; </script>
  </head>
  <body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <?php echo $side_menu; ?>
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <?php echo $top_menu; ?>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="clearfix"></div>
            <?php if($this->session->flashdata('message')){ ?>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="alert <?php echo $this->session->flashdata('message')['status']; ?> alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        <?php echo $this->session->flashdata('message')['message']; ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="clearfix"></div>
            <br/>
            <?php echo $content; ?>
            <br/><br/>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <?php echo $footer; ?>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    <div id="confirm-delete" class="modal fade">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          Are you sure?
        </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn btn-primary" id="delete">Delete</button>
          <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancel</button>
        </div>
      </div>
      </div>
    </div>
    <div id="confirm-action-popup" class="modal fade">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body">
          Are you sure?
        </div>
        <div class="modal-footer">
          <button type="button" data-dismiss="modal" class="btn btn-primary" id="confirm-action-button">Yes</button>
          <button type="button" data-dismiss="modal" class="btn btn-secondary">No</button>
        </div>
      </div>
      </div>
    </div>
<div class="modal fade" id="ajaxModal" tabindex="-1" role="dialog" aria-labelledby="ajaxModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ajaxModalLabel">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <!-- jQuery -->
    <script src="<?php echo common_assets_url('vendors/jquery/dist/jquery.min.js'); ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo common_assets_url('vendors/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo common_assets_url('vendors/fastclick/lib/fastclick.js'); ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo common_assets_url('vendors/nprogress/nprogress.js'); ?>"></script>
    <!-- Chart.js -->
    <script src="<?php echo common_assets_url('vendors/Chart.js/dist/Chart.min.js'); ?>"></script>
    <!-- gauge.js -->
    <script src="<?php echo common_assets_url('vendors/gauge.js/dist/gauge.min.js'); ?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo common_assets_url('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js'); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo common_assets_url('vendors/iCheck/icheck.min.js'); ?>"></script>
    <!-- Skycons -->
    <script src="<?php echo common_assets_url('vendors/skycons/skycons.js'); ?>"></script>
    <!-- DateJS -->
    <script src="<?php echo common_assets_url('vendors/DateJS/build/date.js'); ?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo common_assets_url('vendors/jqvmap/dist/jquery.vmap.js'); ?>"></script>
    <script src="<?php echo common_assets_url('vendors/jqvmap/dist/maps/jquery.vmap.world.js'); ?>"></script>
    <script src="<?php echo common_assets_url('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js'); ?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo common_assets_url('vendors/moment/min/moment.min.js'); ?>"></script>
    <script src="<?php echo common_assets_url('vendors/bootstrap-daterangepicker/daterangepicker.js'); ?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo common_assets_url('build/js/custom.min.js'); ?>"></script>
    <script src="<?php echo admin_assets_url('js/celiums.js'); ?>"></script>
    <?php echo $page_scripts; ?>
  </body>
</html>
