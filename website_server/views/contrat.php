<?php
$records = getOneConfirmedContrat();
extract($records);
$expressions_cles_table = explode(",", $expressions_cles);
$geolocalisation_table = explode(",", $geolocalisation);
$photos_importer_table = explode(",", $photos_importer);

$expressions_cles_table = explode(",", $expressions_cles);
$rubriques = explode(";-", $rubriques);
?>


<div class="col-md-9">
    <div class="box box-solid">
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-lg-12">
                <?php if (
                    $_SESSION['crm_fd_user']['fonction'] == 'admin' ||
                    $_SESSION['crm_fd_user']['fonction'] == 'manager' ||
                    $_SESSION['crm_fd_user']['fonction'] == 'devloppeur_commercial'
                ) { ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Infos administratives </h6>
                        </div>
                        <div class="card-body">
                            <div class="row" class="col-md-7">
                                <dt class="col-md-4">type de contrat:</dt>
                                <dd class="col-md-3"><?php echo ($contrat_type); ?></dd>
                            </div>

                            <div class="row" class="col-md-7">

                                <dt class="col-md-4">Les frais techniques :</dt>
                                <dd class="col-md-3"><?php echo ($frais_techniques); ?></dd>
                            </div>

                            <div class="row" class="col-md-7">
                                <dt class="col-md-4">La mensualité:</dt>
                                <dd class="col-md-3"><?php echo ($mensualite); ?></dd>
                            </div>


                            <div class="row" class="col-md-7">
                                <dt class="col-md-4">La durée d'engagement:</dt>
                                <dd class="col-md-3"><?php echo ($duree_engagement); ?> moins</dd>
                            </div>

                            <div class="row" class="col-md-7">
                                <dt class="col-md-4">Nom du commercial</dt>
                                <dd class="col-md-3"><?php

                                                        $sql = "SELECT  nom_user FROM users  where login = '$login_commercial'";
                                                        $result = dbQuery($sql);
                                                        $row = dbFetchAssoc($result);
                                                        echo  $row['nom_user'];
                                                        ?></dd>
                            </div>

                            <div class="row" class="col-md-7">
                                <dt class="col-md-4">Nom de la société</dt>
                                <dd class="col-md-3"><?php echo ($nom_societe); ?></dd>
                            </div>
                            <div class="row" class="col-md-6">

                            </div>
                            <div class="row" class="col-md-7">

                                <dt class="col-md-4">numero de la société</dt>
                                <dd class="col-md-3"><?php echo ($tel_societe); ?></dd>
                            </div>
                            <div class="row" class="col-md-7">
                                <dt class="col-md-4">Address</dt>
                                <dd class="col-md-3"><?php echo ($adresse_rdv); ?></dd>
                            </div>

                            <div class="row" class="col-md-7">
                                <dt class="col-md-4">Numéro de chèque:</dt>
                                <dd class="col-md-3"><?php echo ($adresse_rdv); ?></dd>
                            </div>

                            <div class="row" class="col-md-7">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="all2-tab" data-toggle="pill" href="#all2" role="tab" aria-controls="all2" aria-selected="true">
                                            pièce jointe
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="cni-tab" data-toggle="pill" href="#cni" role="tab" aria-controls="cni" aria-selected="false">
                                            Carte d’identité du client
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="photos_recto-tab" data-toggle="pill" href="#photos_recto" role="tab" aria-controls="photos_recto" aria-selected="false">
                                            Photos du contrat recto
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="photos_verso-tab" data-toggle="pill" href="#photos_verso" role="tab" aria-controls="photos_verso" aria-selected="false">
                                            Photos du contrat verso
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="cheque-tab" data-toggle="pill" href="#cheque" role="tab" aria-controls="cheque" aria-selected="false">
                                            Chèques
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="rib-tab" data-toggle="pill" href="#rib" role="tab" aria-controls="rib" aria-selected="false">
                                            RIB
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="mandats-tab" data-toggle="pill" href="#mandats" role="tab" aria-controls="mandats" aria-selected="false">
                                            Mandats
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="proces-tab" data-toggle="pill" href="#proces" role="tab" aria-controls="proces" aria-selected="false">
                                            Procès verbal
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="all2" role="tabpanel" aria-labelledby="all2-tab">
                                        <div class="row text-center text-lg-left">

                                            <div class="col-lg-10 col-md-4 col-6">
                                                <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($carte_identite); ?>" class="d-block mb-4 h-100" target="_blank">
                                                    <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($carte_identite); ?>" alt="">
                                                </a>
                                            </div>

                                            <div class="col-lg-3 col-md-4 col-6">
                                                <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($contrat_recto); ?>" target="_blank" class="d-block mb-4 h-100">
                                                    <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($contrat_recto); ?>" alt="">
                                                </a>
                                            </div>

                                            <div class="col-lg-3 col-md-4 col-6">
                                                <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($contrat_verso); ?>" target="_blank" class="d-block mb-4 h-100">
                                                    <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($contrat_verso); ?>" alt="">
                                                </a>
                                            </div>

                                            <div class="col-lg-3 col-md-4 col-6">
                                                <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($cheque); ?>" target="_blank" class="d-block mb-4 h-100">
                                                    <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($cheque); ?>" alt="">
                                                </a>
                                            </div>

                                            <div class="col-lg-3 col-md-4 col-6">
                                                <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($rib); ?>" target="_blank" class="d-block mb-4 h-100">
                                                    <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($rib); ?>" alt="">
                                                </a>
                                            </div>

                                            <div class="col-lg-3 col-md-4 col-6">
                                                <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($mandats); ?>" target="_blank" class="d-block mb-4 h-100">
                                                    <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($mandats); ?>" alt="">
                                                </a>
                                            </div>

                                            <div class="col-lg-3 col-md-4 col-6">
                                                <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($proces_verbal); ?>" target="_blank" class="d-block mb-4 h-100">
                                                    <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($proces_verbal); ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="cni" role="tabpanel" aria-labelledby="cni-tab">
                                        <div class="row text-center text-lg-left">
                                            <div class="col-lg-10 col-md-4 col-6">
                                                <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($carte_identite); ?>" target="_blank" class="d-block mb-4 h-100">
                                                    <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($carte_identite); ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="photos_recto" role="tabpanel" aria-labelledby="photos_recto-tab">
                                        <div class="row text-center text-lg-left">
                                            <div class="col-lg-10 col-md-4 col-6">
                                                <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($contrat_recto); ?>" target="_blank" class="d-block mb-4 h-100">
                                                    <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($contrat_recto); ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="photos_verso" role="tabpanel" aria-labelledby="photos_verso-tab">
                                        <div class="row text-center text-lg-left">
                                            <div class="col-lg-10 col-md-4 col-6">
                                                <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($contrat_verso); ?>" target="_blank" class="d-block mb-4 h-100">
                                                    <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($contrat_verso); ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="cheque" role="tabpanel" aria-labelledby="cheque-tab">
                                        <div class="row text-center text-lg-left">
                                            <div class="col-lg-10 col-md-4 col-6">
                                                <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($cheque); ?>" target="_blank" class="d-block mb-4 h-100">
                                                    <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($cheque); ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="rib" role="tabpanel" aria-labelledby="rib-tab">
                                        <div class="row text-center text-lg-left">
                                            <div class="col-lg-10 col-md-4 col-6">
                                                <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($rib); ?>" target="_blank" class="d-block mb-4 h-100">
                                                    <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($rib); ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="mandats" role="tabpanel" aria-labelledby="mandats-tab">
                                        <div class="row text-center text-lg-left">
                                            <div class="col-lg-10 col-md-4 col-6">
                                                <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($mandats); ?>" target="_blank" class="d-block mb-4 h-100">
                                                    <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($mandats); ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="proces" role="tabpanel" aria-labelledby="proces-tab">
                                        <div class="row text-center text-lg-left">
                                            <div class="col-lg-10 col-md-4 col-6">
                                                <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($proces_verbal); ?>" target="_blank" class="d-block mb-4 h-100">
                                                    <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($proces_verbal); ?>" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Infos techniques </h6>
                    </div>
                    <div class="card-body">
                        <!-- date_signature -->
                        <div class="row" class="col-md-7">
                            <dt class="col-md-4">date de signature du contrat:</dt>
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
                                    <a class="nav-link active" id="all-tab" data-toggle="pill" href="#all" role="tab" aria-controls="all" aria-selected="true">
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
                                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    <div class="row text-center text-lg-left">

                                        <div class="col-lg-3 col-md-4 col-6">
                                            <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($logo_existant); ?>" target="_blank" class="d-block mb-4 h-100">
                                                <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($logo_existant); ?>" alt="">
                                            </a>
                                        </div>

                                        <div class="col-lg-3 col-md-4 col-6">
                                            <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($logos_partenaires); ?>" target="_blank" class="d-block mb-4 h-100">
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
                                                <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($photos_importer_table[$i]); ?>" target="_blank" class="d-block mb-4 h-100">
                                                    <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($photos_importer_table[$i]); ?>" alt="">
                                                </a></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">
                                    <div class="row text-center text-lg-left">
                                        <div class="col-lg-10 col-md-4 col-6">
                                            <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($logo_existant); ?>" target="_blank" class="d-block mb-4 h-100">
                                                <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($logo_existant); ?>" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="logo_pr" role="tabpanel" aria-labelledby="logo_pr-tab">
                                    <div class="row text-center text-lg-left">
                                        <div class="col-lg-10 col-md-4 col-6">
                                            <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($logos_partenaires); ?>" target="_blank" class="d-block mb-4 h-100">
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
                            </div>
                            <div class="tab-pane fade" id="photos_importer" role="tabpanel" aria-labelledby="photos_importer-tab">
                                <div class="row text-center text-lg-left">
                                    <?php
                                    for ($i = 0; $i < count($photos_importer_table); $i++) { ?><div class="col-lg-3 col-md-4 col-6">
                                            <a href="<?php echo WEB_ROOT; ?>views/<?php echo ($photos_importer_table[$i]); ?>" target="_blank" class="d-block mb-4 h-100">
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
            $_SESSION['crm_fd_user']['fonction'] == 'admin' ||
            $_SESSION['crm_fd_user']['fonction'] == 'manager'
        ) { ?>
            <div class="card mb-4">
                <div class="card-body">
                    <form role="form" action="<?php echo WEB_ROOT; ?>views/process.php?cmd=accepterContrat&code_rdv=<?php echo $code_rdv; ?>" method="post">
                        <input type="hidden" name="token" value="<?= $_SESSION['crm_token'] ?>" />
                        <div class="form-group row">
                            <div class="col-sm-6">Nom du Développeur technique</div>
                            <div class="col-sm-5">
                                <select name="login_devtech" class="form-control input-sm">
                                    <?php
                                    $sql = "SELECT login, nom_user FROM users where fonction = 'developpeur_tech'";
                                    $result = dbQuery($sql);
                                    while ($row = dbFetchAssoc($result)) {
                                        extract($row);
                                    ?>
                                        <option value="<?php echo $login; ?>"><?php echo $nom_user; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-sm-6">delai de projet</div>
                        <div class="col-sm-5">
                                <input name="delai" value="21" type="number" class="form-control" id="inputText" placeholder="21">
                        </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 d-flex justify-content-center">

                                <button type="submit" class="btn btn-primary col-sm-8 mt-5">Accepter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

</div>

</div>