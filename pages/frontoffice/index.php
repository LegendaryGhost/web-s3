<?php require_once '../../inc/route.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="<?= IMG ?>apple-icon.png">
  <link rel="icon" type="image/png" href="<?= IMG ?>favicon.png">
  <title>
    Login
  </title>
  <!-- Nucleo Icons -->
  <link href="<?= CSS ?>nucleo-icons.css" rel="stylesheet" />
  <link href="<?= CSS ?>nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link href="<?= CSS ?>nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="<?= CSS ?>soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  <link rel="stylesheet" href="<?= CSS ?>login.css">
</head>

<body class="g-sidenav-show  bg-gray-100">

  <section style="min-height: calc(100vh - 80px)">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('<?= IMG ?>The.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Bienvenu !</h1>
            <p class="text-lead text-white">Insérer vos données sur l'exploitation de thé</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Connexion</h5>
            </div>
            <div class="card-body">
              <form role="text-left" method="POST" action="<?= MAIN_URL ?>inc/user/traitement-login.php">
                <?php if(isset($_GET['erreur']) && !empty($_GET['erreur'])):?>
                  <div class="alert alert-danger" role="alert"><?= urldecode($_GET['erreur']) ?></div>
                <?php endif; ?>
                <input type="hidden" name="type" value="user">
                <div class="mb-3">
                  <input name="username" value="user" type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="email-addon">
                </div>
                <div class="mb-3">
                  <input name="mdp" value="1234" type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Me connecter</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <?php require '../composant/footer.php'; ?>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="<?= JS ?>core/popper.min.js"></script>
  <script src="<?= JS ?>core/bootstrap.min.js"></script>
  <script src="<?= JS ?>plugins/perfect-scrollbar.min.js"></script>
  <script src="<?= JS ?>plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= JS ?>soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>