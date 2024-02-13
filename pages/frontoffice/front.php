<?php

require_once '../../inc/route.php';
require_once('../../inc/fonction.php');

session_start();

if (!isset($_SESSION['idUser'])) {
  $message = "Vous n'avez pas l'autorisation d'accéder à cette page";
  header('Location: ' . MAIN_URL . 'pages/admin/?erreur=' . urlencode($message));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= IMG ?>apple-icon.png">
  <link rel="icon" type="image/png" href="<?= IMG ?>favicon.png">
  <title>
    Tableau de bord
  </title>
  <!-- Nucleo Icons -->
  <link href="<?= CSS ?>nucleo-icons.css" rel="stylesheet" />
  <link href="<?= CSS ?>nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link href="<?= CSS ?>nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= CSS ?>soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  <link rel="stylesheet" href="<?= CSS ?>main-style.css">
</head>


<body class="g-sidenav-show  bg-gray-100">
  <?php require 'composant/aside.php'; ?>
  <main class="main-content position-relative min-height-vh-100 h-100 mt-1 border-radius-lg ">
    <?php require 'composant/top-bar.php'; ?>
    <?php require 'composant/ajoutcueillette.php'; ?>
    <?php require 'composant/ajouterdepense.php'; ?>
 
  </main>
   <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <?php require '../composant/footer.php'; ?>
 
  <!--   Core JS Files   -->
  <script src="<?= JS ?>core/bootstrap.min.js"></script>
  <script src="<?= JS ?>plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= JS ?>plugins/smooth-scrollbar.min.js"></script>
  <script src="<?= JS ?>plugins/chartjs.min.js"></script>
  <script src="<?= JS ?>xhr.js"></script>
  <script src="<?= JS ?>ajax-cueillette.js"></script>
  <script src="<?= JS ?>admin-link.js"></script>
  
 <script>
   var win = navigator.platform.indexOf('Win') > -1;
   if (win && document.querySelector('#sidenav-scrollbar')) {
     var options = {
       damping: '0.5'
     }
     Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
   }
 </script>  
  <!-- <script>
document.addEventListener('DOMContentLoaded', function() {
  var toggler = document.getElementById('iconNavbarSidenav');
  var navbarCollapse = document.querySelector('#navbar .navbar-collapse');

  if (toggler && navbarCollapse) {
    toggler.addEventListener('click', function() {
      navbarCollapse.classList.toggle('show');
    });
  } else {
    console.error('Élément de basculement ou de barre de navigation introuvable');
  }
});
  </script> -->
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
</body>

</html>