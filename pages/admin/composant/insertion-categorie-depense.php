<div class="container tab-content" id="insertion-categorie-depense">
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
                <div class="card-header text-center pt-4">
                    <h5>Insertion de Depense</h5>
                </div>
                <div class="card-body">
                    <form role="form text-left" method="POST" action="<?= MAIN_URL ?>inc/admin/categorie_depense/ajout-categorie.php">
                        <div class="mb-3">
                            <input type="text" name="nom" class="form-control" placeholder="Nom" aria-label="Nom" name="nom">
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
                        <h6>Les catégories de dépense</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID Catégorie dépense</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nom</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categories as $categorie) : ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"><?= $categorie['id'] ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"><?= $categorie['nom'] ?></h6>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>