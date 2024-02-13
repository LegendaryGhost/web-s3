<?php

require_once '../../inc/route.php';

session_start();

if (!isset($_SESSION['idUser']) || !isset($_SESSION['typeUser']) || $_SESSION['typeUser'] != 'admin') {
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
    Gestion des varétés de thé
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
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <?php require 'composant/top-bar.php'; ?>
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Insertion de The</h5>
            <div class="card-body">
              <form role="text-left" method="POST" action="<?= MAIN_URL ?>inc/admin/the/" data-action="ajout-the.php" data-mode="ajout" id="form-the">
                <input type="hidden" name="id" value="0">
                <div class="mb-3">
                  <input type="text" name="nom" class="form-control" placeholder="Nom" aria-label="Nom">
                </div>
                <div class="mb-3">
                  <input type="number" name="occupation" min="0" step="0.01" class="form-control" placeholder="Occupation" aria-label="Occupation">
                </div>
                <div class="mb-3">
                  <input type="number" name="rendement" min="0" step="0.01" class="form-control" placeholder="Rendement" aria-label="Rendement">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn-ajout btn bg-gradient-success w-100 my-4 mb-2">Ajouter</button>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn-modif btn bg-gradient-dark w-100 my-4 mb-2">Modifier</button>
                </div>
                <div class="text-center">
                  <button type="reset" class="btn-annuler btn bg-gradient-danger w-100 my-4 mb-2">Annuler</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card mb-4">
              <div class="card-header pb-0">
                <h6>Visuel du tableau de The</h6>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0" id="table-liste-the">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id_Variete</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nom</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Occupation(en m^2)</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rendement_Mensuel_par_mensuel(parpied)</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" colspan="2">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        <!-- Rempli en AJAX -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
   <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <?php require '../composant/footer.php'; ?>
 
  <!--   Core JS Files   -->
  <script src="<?= JS ?>core/bootstrap.min.js"></script>
  <script src="<?= JS ?>plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= JS ?>plugins/smooth-scrollbar.min.js"></script>
  <script src="<?= JS ?>plugins/chartjs.min.js"></script>
  <script src="<?= JS ?>xhr.js"></script>
  <script src="<?= JS ?>crud-the.js"></script>
  
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