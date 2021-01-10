<?php
$nvProjects = getProjets();
?>

<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
        </div>

        <div class="table-responsive p-3">
            <table class="table align-items-center table-flush" id="dataTable">
                <dl class="dl-horizontal">
                    <thead class="thead-light">

                        <tr>
                            <th>Nom de la société</th>
                            <th>type de contrat</th>
                            <th>Etat du projet</th>
                            <th>jours restants</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($nvProjects as $rec) {
                            extract($rec);
                            $stat = '';
                        ?>
                            <tr>
                                <td><?php echo $nom_societe; ?></td>
                                <td><span class="badge badge-<?php echo $contrat_type; ?>">
                                        <?php echo $contrat_type; ?>
                                    </span>
                                </td>
                                <td>
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
                                </td>
                                <td><?php
                                if($status_rdv != 'projet_livre'){
                                    $now =  date("Y-m-d");
                                    $diff = strtotime($delai) - strtotime($now);
                                    echo round($diff / 86400)." Jours";}
                                    else{
                                        echo "Ok";
                                    }
                                    ?></a>
                                </td>

                                <td><a href="<?php echo WEB_ROOT; ?>views/?v=projet&code_contrat=<?php echo $code_contrat; ?>" class="btn btn-sm btn-primary">détaille</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>

            </table>
        </div>
        <div class="card-footer"></div>
    </div>
</div>
</div>

</div>



</div>
</div>

<style>
    .badge-primary {
        color: #fff;
        background-color: #6777EF;
    }

    a.badge-primary:hover,
    a.badge-primary:focus {
        color: #fff;
        background-color: #2653d4;
    }

    a.badge-primary:focus,
    a.badge-primary.focus {
        outline: 0;
        -webkit-box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.5);
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.5);
    }

    .badge-secondary {
        color: #fff;
        background-color: #757575;
    }

    a.badge-secondary:hover,
    a.badge-secondary:focus {
        color: #fff;
        background-color: #6b6d7d;
    }

    a.badge-secondary:focus,
    a.badge-secondary.focus {
        outline: 0;
        -webkit-box-shadow: 0 0 0 0.2rem rgba(133, 135, 150, 0.5);
        box-shadow: 0 0 0 0.2rem rgba(133, 135, 150, 0.5);
    }

    .badge-starter {
        color: #fff;
        background-color: #66bb6a;
    }

    a.badge-starter:hover,
    a.badge-starter:focus {
        color: #fff;
        background-color: #169b6b;
    }

    a.badge-starter:focus,
    a.badge-starter.focus {
        outline: 0;
        -webkit-box-shadow: 0 0 0 0.2rem rgba(28, 200, 138, 0.5);
        box-shadow: 0 0 0 0.2rem rgba(28, 200, 138, 0.5);
    }

    .badge-vip {
        color: #fff;
        background-color: #3abaf4;
    }

    a.badge-vip:hover,
    a.badge-vip:focus {
        color: #fff;
        background-color: #2a96a5;
    }

    a.badge-vip:focus,
    a.badge-vip.focus {
        outline: 0;
        -webkit-box-shadow: 0 0 0 0.2rem rgba(54, 185, 204, 0.5);
        box-shadow: 0 0 0 0.2rem rgba(54, 185, 204, 0.5);
    }

    .badge-premium {
        color: #fff;
        background-color: #ffa426;
    }

    a.badge-premium:hover,
    a.badge-premium:focus {
        color: #fff;
        background-color: #f4b30d;
    }

    a.badge-premium:focus,
    a.badge-premium.focus {
        outline: 0;
        -webkit-box-shadow: 0 0 0 0.2rem rgba(246, 194, 62, 0.5);
        box-shadow: 0 0 0 0.2rem rgba(246, 194, 62, 0.5);
    }

    .badge-danger {
        color: #fff;
        background-color: #fc544b;
    }

    a.badge-danger:hover,
    a.badge-danger:focus {
        color: #fff;
        background-color: #d52a1a;
    }

    a.badge-danger:focus,
    a.badge-danger.focus {
        outline: 0;
        -webkit-box-shadow: 0 0 0 0.2rem rgba(231, 74, 59, 0.5);
        box-shadow: 0 0 0 0.2rem rgba(231, 74, 59, 0.5);
    }

    .badge-light {
        color: #3a3b45;
        background-color: #e3eaef;
    }

    a.badge-light:hover,
    a.badge-light:focus {
        color: #3a3b45;
        background-color: #d4daed;
    }

    a.badge-light:focus,
    a.badge-light.focus {
        outline: 0;
        -webkit-box-shadow: 0 0 0 0.2rem rgba(248, 249, 252, 0.5);
        box-shadow: 0 0 0 0.2rem rgba(248, 249, 252, 0.5);
    }

    .badge-dark {
        color: #fff;
        background-color: #5a5c69;
    }

    a.badge-dark:hover,
    a.badge-dark:focus {
        color: #fff;
        background-color: #42444e;
    }

    a.badge-dark:focus,
    a.badge-dark.focus {
        outline: 0;
        -webkit-box-shadow: 0 0 0 0.2rem rgba(90, 92, 105, 0.5);
        box-shadow: 0 0 0 0.2rem rgba(90, 92, 105, 0.5);
    }

    .jumbotron {
        padding: 2rem 1rem;
        margin-bottom: 2rem;
        background-color: #eaecf4;
        border-radius: 0.3rem;
    }
</style>