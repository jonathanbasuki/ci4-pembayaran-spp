<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <title><?= $data['title']; ?></title>

  <!-- ========== All CSS files linkup ========= -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/lineicons.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/materialdesignicons.min.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/fullcalendar.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/dashboard.css" />
</head>
<body>
  <!-- ======== main-wrapper start =========== -->
  <main class="main-wrapper m-0 p-0">

    <!-- ========== signin-section start ========== -->
    <?= $this->renderSection('auth'); ?>
    <!-- ========== signin-section end ========== -->
  </main>
  <!-- ======== main-wrapper end =========== -->

  <!-- ========= All Javascript files linkup ======== -->
  <script src="<?= base_url(); ?>/assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>/assets/js/Chart.min.js"></script>
  <script src="<?= base_url(); ?>/assets/js/dynamic-pie-chart.js"></script>
  <script src="<?= base_url(); ?>/assets/js/moment.min.js"></script>
  <script src="<?= base_url(); ?>/assets/js/fullcalendar.js"></script>
  <script src="<?= base_url(); ?>/assets/js/jvectormap.min.js"></script>
  <script src="<?= base_url(); ?>/assets/js/world-merc.js"></script>
  <script src="<?= base_url(); ?>/assets/js/polyfill.js"></script>
  <script src="<?= base_url(); ?>/assets/js/dashboard.js"></script>
</body>
</html>
