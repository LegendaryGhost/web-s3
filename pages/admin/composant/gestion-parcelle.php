<div class="container tab-content" id="gestion-parcelle">
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
                <div class="card-header text-center pt-4">
                    <h5>Insertion de Parcelle</h5>
                </div>
                <div class="card-body">
                    <form role="form text-left">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Nom" aria-label="Nom">
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" placeholder="Surface" aria-label="Surface">
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" placeholder="Total" aria-label="Total">
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
    <div class="container-fluid py-4 div-liste">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Nos parcelles</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" id="table-liste-parcelle">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id Parcelle</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nom</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Variété de thé</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Surface</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2" colspan="2">Actions</th>
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