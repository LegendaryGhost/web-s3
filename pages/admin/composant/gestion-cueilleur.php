<div class="container tab-content" id="gestion-cueilleur">
  <div class="row">
    <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
      <div class="card z-index-0">
        <div class="card-header text-center pt-4">
          <h5>Insertion de Cueilleur</h5>
        </div>
        <div class="card-body">
          <form role="form text-left" action="<?= MAIN_URL ?>inc/admin/cueilleur/" data-action="ajout-cueilleur.php" data-mode="ajout" id="form-cueilleur">
            <input type="hidden" name="id">
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Nom" aria-label="Nom" name="nom">
            </div>
            <div class="mb-3">
              <select name="genre" id="Genre" class="form-control">
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
              </select>
            </div>
            <div class="mb-3">
              <input type="date" class="form-control" aria-label="Date_de_naissance" name="dateNaissance">
            </div>
            <div class="mb-3">
              <input type="number" min="0" class="form-control" placeholder="Salaire" aria-label="Salaire" name="salaire">
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
            <h6>Visuel du tableau de Cueilleur</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0" id="table-liste-cueilleur">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id Cueilleur</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nom</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Genre</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de naissance</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Salaire</th>
                    <th colspan="2" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($cueilleurs as $cueilleur) : ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?= $cueilleur['id'] ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?= $cueilleur['nom'] ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $cueilleur['genre'] ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $cueilleur['date_naissance'] ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $cueilleur['salaire'] ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <button class="badge badge-sm bg-gradient-info" data-cueilleur-id="<?= $cueilleur['id'] ?>">Modifier</button>
                      </td>
                      <td class="align-middle">
                        <form action="<?= MAIN_URL ?>inc/admin/cueilleur/effacer-cueilleur.php" method="post">
                          <input type="hidden" name="id" value="<?= $cueilleur['id'] ?>">
                          <button type="submit" class="badge badge-sm bg-gradient-danger">
                            Supprimer
                          </button>
                        </form>
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