<?php  

    $parcelle = getAllParcelles();
    $cueilleur = getAllCueilleurs();

?>

<div class="container tab-content active" id="ajoutcueillette">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                    <div class="card-header text-center pt-4">
                        <h5>Saisie de Cueillettes</h5>
                    </div>
                    <div class="card-body">
                        <form id="form-ajout-cueillette" role="form text-left" action="<?= MAIN_URL.'inc/user/ajout-cueillette.php' ?>" method="post">
                            <div class="mb-3">
                                <input type="date" class="form-control" aria-label="date" name="date">
                            </div>
                            <div class="mb-3">
                                <select name="cueilleur" id="idcueilleur" class="form-control">
                                    <?php for ($i = 0; $i< count($cueilleur);$i++) {  ?>
                                        <option value= "<?php echo $cueilleur[$i]['id']; ?>"><?php echo $cueilleur[$i]['nom']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <select name="parcelle" id="idparcelle" class="form-control">
                                    <?php for ($i = 0; $i< count($parcelle);$i++) {  ?>
                                        <option value= "<?php echo $parcelle[$i]['id']; ?>"><?php echo $parcelle[$i]['nom_parcelle']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="number" class="form-control" aria-label="Poids_Cueillis" placeholder="Poids" name = "poids">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn-ajout btn bg-gradient-success w-100 my-4 mb-2">Ajouter</button>
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
                            <h6>Visuel du tableau de Cueillettes</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Cueilleur</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Parcelle</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Poids_Cueillis</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cueillette-table-body">
                                        <!-- Générer en AJAX -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
