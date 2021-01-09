<?php
$records = getOneProjet();
extract($records);
$expressions_cles_table = explode(",", $expressions_cles);
$geolocalisation_table = explode(",", $geolocalisation);
$photos_importer_table = explode(",", $photos_importer);
$rubriques = explode(";-", $rubriques);
?>

<div class="col-md-9">
    <div class="box box-solid">
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-lg-12">

                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Infos techniques </h6>
                    </div>
                    <div class="card-body">
                        <!-- status_rdv -->
                        <div class="row" class="col-md-7">
                            <dt class="col-md-4">Etat du projet:</dt>
                            <dd class="col-md-3">
                                <?php if ($status_rdv == 'dev_site') { ?>
                                    Développement du site
                                <?php } ?>
                                <?php if ($status_rdv == 'cr_contenue') { ?>
                                    Création du contenue
                                <?php } ?>
                                <?php if ($status_rdv == 'optimisation') { ?>
                                    Optimisation du référencement
                                <?php } ?>
                                <?php if ($status_rdv == 'cr_reseaux') { ?>
                                    Création réseaux sociaux
                                <?php } ?>
                                <?php if ($status_rdv == 'projet_livre') { ?>
                                    Projet livré
                                <?php } ?>
                            </dd>
                        </div>

                        <!-- date_signature -->
                        <div class="row" class="col-md-7">
                            <dt class="col-md-4">Date de signature du contrat:</dt>
                            <dd class="col-md-3"><?php echo ($date_signature); ?></dd>
                        </div>

                        <!-- nom_site -->
                        <div class="row" class="col-md-7">
                            <dt class="col-md-4">
                                Nom à afficher sur le site
                            </dt>
                            <dd class="col-md-3"><?php echo ($nom_site); ?></dd>
                        </div>
                        <!--nom_domaine  -->
                        <div class="row" class="col-md-7">
                            <dt class="col-md-4">
                                Nom de domaine choisit

                            </dt>
                            <dd class="col-md-3"><?php echo ($nom_domaine); ?></dd>
                        </div>

                        <!--  second_domaine-->
                        <div class="row" class="col-md-7">
                            <dt class="col-md-4">
                                Second choix:
                            </dt>
                            <dd class="col-md-3"><?php echo ($second_domaine); ?></dd>
                        </div>

                        <!--creation_logo  -->
                        <div class="row" class="col-md-7">
                            <dt class="col-md-4">
                                Création de logo:
                            </dt>
                            <dd class="col-md-3">
                                <?php
                                if ($creation_logo == 0) {
                                    echo "oui";
                                } else {
                                    echo "non";
                                } ?>
                            </dd>
                        </div>

                        <!-- style_ecriture -->
                        <div class="row" class="col-md-7">
                            <dt class="col-md-4">
                                Style d’écriture </dt>
                            <dd class="col-md-3" style="font-family: ;"><?php echo ($style_ecriture); ?></dd>
                        </div>

                        <!-- couleurs_dominantes -->
                        <div class="row" class="col-md-7">
                            <dt class="col-md-4">
                                Couleurs dominantes

                            </dt>
                            <dd class="col-md-3"><?php echo ($couleurs_dominantes1 . " " . $couleurs_dominantes2 . " " . $couleurs_dominantes3); ?> </dd>
                        </div>

                        <!--aspect_visuel  -->
                        <div class="row" class="col-md-7">
                            <dt class="col-md-4">
                                Aspect visuel
                            </dt>
                            <dd class="col-md-3"><?php echo ($aspect_visuel); ?></dd>
                        </div>

                        <!-- Rubriques -->
                        <!-- <div class="row pt-4">
                            <div class="col-sm-6">
                                <div class="card border-primary mb-4">
                                    <div class="card-body text-primary">
                                        <h5 class="card-title">Rubrique 1:</h5>
                                        <ul>
                                            <li><?php echo ($rubrique1_1); ?></li>
                                            <li><?php echo ($rubrique1_2); ?></li>
                                            <li><?php echo ($rubrique1_3); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="card border-primary mb-4">
                                    <div class="card-body text-primary">
                                        <h5 class="card-title">Rubrique 2: </h5>
                                        <ul>
                                            <li><?php echo ($rubrique2_1); ?></li>
                                            <li><?php echo ($rubrique2_2); ?></li>
                                            <li><?php echo ($rubrique2_3); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card border-primary mb-4">
                                    <div class="card-body text-primary">
                                        <h5 class="card-title">Rubrique 3: </h5>
                                        <ul>
                                            <li><?php echo ($rubrique3_1); ?></li>
                                            <li><?php echo ($rubrique3_2); ?></li>
                                            <li><?php echo ($rubrique3_3); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card border-primary mb-4">
                                    <div class="card-body text-primary">
                                        <h5 class="card-title">Rubrique 4: </h5>
                                        <ul>
                                            <li><?php echo ($rubrique4_1); ?></li>
                                            <li><?php echo ($rubrique4_2); ?></li>
                                            <li><?php echo ($rubrique4_3); ?></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card border-primary mb-4">
                                    <div class="card-body text-primary">
                                        <h5 class="card-title">Rubrique 5: </h5>
                                        <ul>
                                            <li><?php echo ($rubrique5_1); ?></li>
                                            <li><?php echo ($rubrique5_2); ?></li>
                                            <li><?php echo ($rubrique5_3); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="form-group ">
                            <div class="table-responsive pcol-sm-10">
                                <table class="table align-items-center table-flush" i>
                                    <dl class="dl-horizontal">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>rubrique 1</th>
                                                <th>rubrique 2</th>
                                                <th>rubrique 3</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($i = 0; $i < count($rubriques); $i++) {
                                                $sousRubriques = explode("+-", $rubriques[$i]);
                                                if (count($sousRubriques) == 3) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $sousRubriques[0]; ?></td>
                                                        <td><?php echo $sousRubriques[1]; ?></td>
                                                        <td><?php echo $sousRubriques[2]; ?></td>
                                                    </tr>
                                            <?php }
                                            } ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>

                        <!--histoire_societe  -->
                        <div class="row" class="col-md-7">
                            <dt class="col-md-4">
                                Histoire de la société:
                            </dt>
                            <dd class="col-md-3"><?php echo ($histoire_societe); ?></dd>
                        </div>

                        <!--site_aime  -->
                        <div class="row" class="col-md-7">
                            <dt class="col-md-4">
                                Exemple de site aimé du client
                            </dt>
                            <dd class="col-md-3"><?php echo ($site_aime); ?></dd>
                        </div>

                        <!-- site_concurrents -->
                        <div class="row" class="col-md-7">
                            <dt class="col-md-4">
                                Site concurrents:
                            </dt>
                            <dd class="col-md-3"><?php echo ($site_concurrents); ?></dd>
                        </div>

                        <!-- creation_texte -->
                        <div class="row" class="col-md-7">
                            <dt class="col-md-4">
                                Création de texte:
                            </dt>
                            <dd class="col-md-3">
                                <?php
                                if ($creation_texte == 0) {
                                    echo "oui";
                                } else {
                                    echo "non";
                                } ?>
                            </dd>
                        </div>

                        <!--gallerie_photos  -->
                        <div class="row" class="col-md-7">
                            <dt class="col-md-4">
                                Gallérie photos: </dt>
                            <dd class="col-md-3">
                                <?php
                                if ($gallerie_photos == 0) {
                                    echo "oui";
                                } else {
                                    echo "non";
                                } ?>
                            </dd>
                        </div>

                        <!--option_personnalisees-  -->
                        <div class="row" class="col-md-7">
                            <dt class="col-md-4">
                                option personnalisées: </dt>
                            <dd class="col-md-3"><?php echo ($option_personnalisees); ?></dd>
                        </div>

                        <!-- creation_reseaux -->
                        <div class="row" class="col-md-7">
                            <dt class="col-md-4">
                                Création de réseaux sociaux: </dt>
                            <dd class="col-md-3"><?php echo ($creation_reseaux); ?></dd>
                        </div>

                        <!-- commentaire_realisation -->
                        <div class="row" class="col-md-7">
                            <dt class="col-md-4">
                                Commentaire sur la réalisation : </dt>
                            <dd class="col-md-3"><?php echo ($commentaire_realisation); ?></dd>
                        </div>

                        <!-- expressions cles et geolocalisation -->
                        <div class="form-group ">
                            <div class="table-responsive pcol-sm-10">
                                <table class="table align-items-center table-flush" i>
                                    <dl class="dl-horizontal">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Expressions clés</th>
                                                <th>Géolocalisation</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            for ($i = 0; $i < count($expressions_cles_table); $i++) { ?>
                                                <tr>
                                                    <td><?php echo $expressions_cles_table[$i]; ?></td>
                                                    <td><?php echo $geolocalisation_table[$i]; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row" class="col-md-7">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="all2-tab" data-toggle="pill" href="#all2" role="tab" aria-controls="all2" aria-selected="true">
                                        pièce jointe
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="logo-tab" data-toggle="pill" href="#logo" role="tab" aria-controls="logo" aria-selected="false">
                                        Logo existant:
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="logo_pr-tab" data-toggle="pill" href="#logo_pr" role="tab" aria-controls="logo_pr" aria-selected="false">
                                        Logos de partenaires:
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="texte-tab" data-toggle="pill" href="#texte" role="tab" aria-controls="texte" aria-selected="false">
                                        Texte:
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="photos_importer-tab" data-toggle="pill" href="#photos_importer" role="tab" aria-controls="photos_importer" aria-selected="false">
                                        photos_importer:
                                    </a>
                                </li>

                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="all2" role="tabpanel" aria-labelledby="all2-tab">
                                    <div class="row text-center text-lg-left">

                                        <div class="col-lg-3 col-md-4 col-6">
                                            <a href="#" class="d-block mb-4 h-100">
                                                <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($logo_existant); ?>" alt="">
                                            </a>
                                        </div>

                                        <div class="col-lg-3 col-md-4 col-6">
                                            <a href="#" class="d-block mb-4 h-100">
                                                <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($logos_partenaires); ?>" alt="">
                                            </a>
                                        </div>
                                        <?php if ($texte_importer) { ?>
                                            <div class="row text-center text-lg-left">
                                                <div class="col-lg-10 col-md-4 col-6">
                                                    <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($texte_importer); ?>" target="_blank" class="document info ">
                                                        <div class="document-body ">
                                                            <i class="fa fa-file-word text-info"></i>
                                                        </div>
                                                        <div class="document-footer">
                                                            <span class="document-name">le fichier Text </span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        for ($i = 0; $i < count($photos_importer_table); $i++) { ?><div class="col-lg-3 col-md-4 col-6">
                                                <a href="#" class="d-block mb-4 h-100">
                                                    <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($photos_importer_table[$i]); ?>" alt="">
                                                </a></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">
                                    <div class="row text-center text-lg-left">
                                        <div class="col-lg-10 col-md-4 col-6">
                                            <a href="#" class="d-block mb-4 h-100">
                                                <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($logo_existant); ?>" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="logo_pr" role="tabpanel" aria-labelledby="logo_pr-tab">
                                    <div class="row text-center text-lg-left">
                                        <div class="col-lg-10 col-md-4 col-6">
                                            <a href="#" class="d-block mb-4 h-100">
                                                <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($logos_partenaires); ?>" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="texte" role="tabpanel" aria-labelledby="texte-tab">
                                    <?php if ($texte_importer) { ?>
                                        <div class="row text-center text-lg-left">
                                            <div class="col-lg-10 col-md-4 col-6">
                                                <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($texte_importer); ?>" target="_blank" class="document info ">
                                                    <div class="document-body ">
                                                        <i class="fa fa-file-word text-info"></i>
                                                    </div>
                                                    <div class="document-footer">
                                                        <span class="document-name">le fichier Text </span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="tab-pane fade" id="photos_importer" role="tabpanel" aria-labelledby="photos_importer-tab">
                                    <div class="row text-center text-lg-left">
                                        <?php
                                        for ($i = 0; $i < count($photos_importer_table); $i++) { ?><div class="col-lg-3 col-md-4 col-6">
                                                <a href="#" class="d-block mb-4 h-100">
                                                    <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($photos_importer_table[$i]); ?>" alt="">
                                                </a></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>




            <?php if (
                ($_SESSION['crm_fd_user']['fonction'] == 'developpeur_tech' ||
                    $_SESSION['crm_fd_user']['fonction'] == 'manager') &&
                $status_rdv != 'projet_livre'
            ) { ?>

                <div class="form-group row">
                    <div class="col-sm-6 ">
                        <form role="form" action="<?php echo WEB_ROOT; ?>views/process.php?cmd=updateProject&code_rdv=<?php echo $code_rdv; ?>&status_rdv=projet_suspendu" method="post">
                            <input type="hidden" name="token" value="<?= $_SESSION['crm_token'] ?>" />
                            <button type="button" class="btn btn-danger col-sm-12">
                                suspendre le projet
                            </button>
                        </form>
                    </div>
                    <div class="col-sm-6 ">
                        <form role="form" action="<?php echo WEB_ROOT; ?>views/process.php?cmd=updateProject&code_rdv=<?php echo $code_rdv; ?>&status_rdv=<?php echo $status_rdv ?>" method="post">
                            <input type="hidden" name="token" value="<?= $_SESSION['crm_token'] ?>" />
                            <button type="submit" class=" btn btn-primary  col-sm-12">
                                passer à l'étape suivante
                            </button>
                        </form>
                    </div>
                </div>


            <?php }  ?>

       
        </div>
    </div>

</div>

</div>