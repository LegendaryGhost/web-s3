<?php 
  
    $categorie = getAllCategoriesDepenses();

    $listeDepense = getDepenses();

?>

<div class="container tab-content" id="ajouterdepense">
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
                <div class="card-header text-center pt-4">
                    <h5>Saisie de Depenses</h5>
                </div>
                <div class="card-body">
                    <form role="form text-left" action = "<?php echo MAIN_URL.'inc/user/ajout-depense.php'; ?>" method = "post">
                        <div class="mb-3">
                            <select name="categorie" id="Categorie" class="form-control">
                                <?php for($i=0;$i<count($categorie);$i++) { ?>
                                    <option value="<?php echo $categorie[$i]['id'];?>" ><?php echo $categorie[$i]['nom'];?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="date" name="date_depenses" class="form-control" placeholder="Date_de_depenses">
                        </div>
                        <div class="mb-3">
                            <input type="number" name="montant" class="form-control" aria-label="montant" placeholder="Montant">
                        </div>
                        <div class="text-center">
                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Valider</button>
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
                        <h6>Visuel du tableau des Depenses</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Categorie</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Date_de_depenses</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Montant</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i = 0;$i<count($listeDepense);$i++){ ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"><?php echo $listeDepense[$i]['nom']; ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0"><?php echo $listeDepense[$i]['date_depense']; ?></p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm bg-gradient-success"><?php echo $listeDepense[$i]['montant']; ?></span>
                                            </td>
                                            <td class="align-middle">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
