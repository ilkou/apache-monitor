<?php
$records = getOneContrat();
extract($records);
?>



<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style>
    .table-wrapper {
        width: 700px;
        margin: 30px auto;
        background: #fff;
        padding: 20px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }

    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }

    .table-title .add-new {
        float: right;
        height: 30px;
        font-weight: bold;
        font-size: 12px;
        text-shadow: none;
        min-width: 100px;
        border-radius: 50px;
        line-height: 13px;
    }

    .table-title .add-new i {
        margin-right: 4px;
    }

    table.table {
        table-layout: fixed;
    }

    table.table tr th,
    table.table tr td {
        border-color: #e9e9e9;
    }

    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }

    table.table th:last-child {
        width: 100px;
    }

    table.table td a {
        cursor: pointer;
        display: inline-block;
        margin: 0 5px;
        min-width: 24px;
    }

    table.table td a.add {
        color: #27C46B;
    }

    table.table td a.edit {
        color: #FFC107;
    }

    table.table td a.delete {
        color: #E34724;
    }

    table.table td i {
        font-size: 19px;
    }

    table.table td a.add i {
        font-size: 24px;
        margin-right: -1px;
        position: relative;
        top: 3px;
    }

    table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
    }

    table.table .form-control.error {
        border-color: #f50000;
    }

    table.table td .add {
        display: none;
    }
</style>


<script>
    var input = $(this).parents("tr").find('input[type="text"]');
    $(document).ready(function() {
        $('[data-toggle="tooltip1"]').tooltip();
        var actions = '<a class="add add1" title="Ajouter" data-toggle="tooltip1"><i class="material-icons">&#xE03B;</i></a>' +
            '<a class="edit edit1" title="Éditer" data-toggle="tooltip1"><i class="material-icons">&#xE254;</i></a>' +
            '<a  class="delete delete1" title="Delete"><i class="material-icons">&#xE872;</i></a>';
        // Append table with add row form on add new button click
        $(".add-newRubrique").click(function() {
            $(this).attr("disabled", "disabled");
            var index = $("table tbody tr:last-child").index();
            var row = '<tr>' +
                '<td><input type="text" class="form-control" name="" id=""></td>' +
                '<td><input type="text" class="form-control" name="" id=""></td>' +
                '<td><input type="text" class="form-control" name="" id=""></td>' +
                '<td>' + actions + '</td>' +
                '</tr>';
            $(".table_rubriques").append(row);
            $("table tbody tr").eq(index + 1).find(".add1,.edit1").toggle();

            $('[data-toggle="tooltip1"]').tooltip();
        });
        // Add row on add button click
        $(document).on("click", ".add1", function() {
            var empty = false;
            var input = $(this).parents("tr").find('input[type="text"]');
            input.each(function() {
                if (!$(this).val()) {
                    $(this).addClass("error");
                    empty = true;
                } else {
                    $(this).removeClass("error");
                }
            });
            $(this).parents("tr").find(".error").first().focus();
            if (!empty) {
                input.each(function() {
                    $(this).parent("td").html($(this).val());
                });
                $(this).parents("tr").find(".add .add1, .edit .edit1").toggle();
                $(".add-newRubrique").removeAttr("disabled");
            }
        });
        // Edit row on edit button click
        $(document).on("click", ".edit1", function() {
            $(this).parents("tr").find("td:not(:last-child)").each(function() {
                $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
            });
            $(this).parents("tr").find(".add .add1,.edit .edit1").toggle();
            $(".add-newRubrique").attr("disabled", "disabled");
        });
        // Delete row on delete button click
        $(document).on("click", ".delete1", function() {
            $(this).parents("tr").remove();
            $(".add-newRubrique").removeAttr("disabled");
        });
    });
</script>



<script>
    var input = $(this).parents("tr").find('input[type="text"]');
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        var actions = '<a " class="add" title="Ajouter" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>' +
            '<a  class="edit" title="Éditer" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>' +
            '<a  class="delete" title="Delete"><i class="material-icons">&#xE872;</i></a>';
        // Append table with add row form on add new button click
        $(".add-new").click(function() {
            $(this).attr("disabled", "disabled");
            var index = $("table tbody tr:last-child").index();
            var row = '<tr>' +
                '<td><input type="text" class="form-control" name="name" id="name"></td>' +
                '<td><input type="text" class="form-control" name="department" id="department"></td>' +
                '<td>' + actions + '</td>' +
                '</tr>';
            $(".table_geo").append(row);
            $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
            $('[data-toggle="tooltip"]').tooltip();
        });
        // Add row on add button click
        $(document).on("click", ".add", function() {
            var empty = false;
            var input = $(this).parents("tr").find('input[type="text"]');
            input.each(function() {
                if (!$(this).val()) {
                    $(this).addClass("error");
                    empty = true;
                } else {
                    $(this).removeClass("error");
                }
            });
            $(this).parents("tr").find(".error").first().focus();
            if (!empty) {
                input.each(function() {
                    $(this).parent("td").html($(this).val());
                });
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").removeAttr("disabled");
            }
        });
        // Edit row on edit button click
        $(document).on("click", ".edit", function() {
            $(this).parents("tr").find("td:not(:last-child)").each(function() {
                $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
            });
            $(this).parents("tr").find(".add, .edit").toggle();
            $(".add-new").attr("disabled", "disabled");
        });
        // Delete row on delete button click
        $(document).on("click", ".delete", function() {
            $(this).parents("tr").remove();
            $(".add-new").removeAttr("disabled");
        });
    });
</script>

<link href="<?php echo WEB_ROOT; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo WEB_ROOT; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<!-- Select2 -->
<link href="<?php echo WEB_ROOT; ?>vendor/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
<!-- Bootstrap DatePicker -->
<link href="<?php echo WEB_ROOT; ?>vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<!-- Bootstrap Touchspin -->
<link href="<?php echo WEB_ROOT; ?>vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.css" rel="stylesheet">
<!-- ClockPicker -->
<link href="<?php echo WEB_ROOT; ?>vendor/clock-picker/clockpicker.css" rel="stylesheet">
<!-- RuangAdmin CSS -->
<link href="<?php echo WEB_ROOT; ?>css/ruang-admin.min.css" rel="stylesheet">


<link href="<?php echo WEB_ROOT; ?>vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css">
<link href="<?php echo WEB_ROOT; ?>vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css">


<div class="col-md-9">
    <div class="box box-solid">
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">Informations</h6>
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
                    </div>
                </div>
            </div>


            <div class="col-lg-12">
                <div class="card mb-4">
                    <form onsubmit="return submitForm();" id="contratForm" class="card-body" role="form" autocomplete="off">

                        <input type="hidden" name="token" value="<?= $_SESSION['crm_token'] ?>" />
                        <!-- date_signature -->
                        <div class="form-group row" id="simple-date2">
                            <label class="col-sm-4 col-form-label" for="oneYearView">date de signature du contrat</label>
                            <div class="input-group date col-sm-4">
                                <div class="input-group-prepend ">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input name="date_signature" type="text" class="form-control" value="01/06/2020" id="oneYearView">
                            </div>
                        </div>

                        <!-- name="nom_site" -->
                        <div class="form-group row">
                            <label for="inputText" class="col-sm-4 col-form-label">Nom à afficher sur le site</label>
                            <div class="col-sm-5">
                                <input name="nom_site" type="text" class="form-control" id="inputText" placeholder="">
                            </div>
                        </div>

                        <!-- name="nom_domaine" -->
                        <div class="form-group row">
                            <label for="inputText" class="col-sm-4 col-form-label">Nom de domaine choisit</label>
                            <div class="col-sm-2">
                                <input name="nom_domaine" type="text" class="form-control" id="inputText" placeholder="">
                            </div>
                        </div>

                        <!-- name="second_domaine" -->
                        <div class="form-group row">
                            <label for="inputText" class="col-sm-4 col-form-label">Second choix:</label>
                            <div class="col-sm-2">
                                <input value="" name="second_domaine" type="text" class="form-control" id="inputText" placeholder="">
                            </div>
                        </div>
                        <!-- name="creation_logo" -->

                        <div class="form-group row">
                            <div class="col-sm-4">Création de logo:</div>
                            <div class="col-sm-5">
                                <div class="custom-control custom-checkbox">
                                    <input value="0" name="creation_logo" type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">oui</label>
                                </div>
                            </div>
                        </div>

                        <!-- name="logo_existant" -->
                        <div class="form-group row ">
                            <label for="inputText" class="col-form-label col-sm-4">Logo existant:</label>
                            <div class="custom-file col-sm-4 ml-3">
                                <input name="logo_existant" type="file" class="custom-file-input" id="logo_existant">
                                <label class="custom-file-label" for="logo_existant">choisir le logo</label>
                            </div>
                        </div>


                        <!-- name="style_ecriture" -->
                        <div class="form-group row">
                            <label for="inputText" class="col-sm-4 col-form-label">Style d’écriture</label>
                            <div class="col-sm-6">
                                <!-- <select name="style_ecriture" class="form-control" id="exampleFormControlSelect1"> -->
                                <input name="style_ecriture" id="font-picker" class="form-control" type="text">

                                <!-- <option style="font-family: 'Roboto Mono', monospace;"> Almost before we knew it, we had left the ground.</option> -->
                                <!-- </select> -->
                            </div>
                        </div>

                        <!-- name="couleurs_dominantes" -->
                        <div class="form-group row">
                            <label for="inputText" class="col-sm-4 col-form-label">Couleurs dominantes</label>
                            <div class="col-sm-6 row">
                                <div id="cp8" data-format="alias" class="col input-group colorpicker-component">
                                    <input name="couleurs_dominantes1" type="text" value="" class="form-control" />
                                </div>
                                <div id="cp9" data-format="alias" class="col input-group colorpicker-component">
                                    <input name="couleurs_dominantes2" type="text" value="" class="form-control" />
                                </div>
                                <div id="cp10" data-format="alias" class="col input-group colorpicker-component">
                                    <input name="couleurs_dominantes3" type="text" value="" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <!-- name="aspect_visuel" -->
                        <div class="form-group row">
                            <label for="select2Multiple" class="col-sm-4 col-form-label">Aspect visuel</label>
                            <div class="col-sm-5">
                                <select name="aspect_visuel[]" class="select2-multiple form-control" multiple="multiple" id="select6Multiple">
                                    <option value="">sans</option>
                                    <option value="serieux">sérieux</option>
                                    <option value="sobre">sobre</option>
                                    <option value="ludique">ludique </option>
                                    <option value="vivant">vivant</option>
                                    <option value="luxe">luxe</option>
                                    <option value="sport">sport</option>
                                    <option value="mode">mode</option>
                                </select>
                            </div>
                        </div>

                        <!-- Rubriques rubrique -->
                        <!-- 
                        <div class="row pt-4">
                            <div class="col-sm-6">
                                <div class="card border-primary mb-4">
                                    <div class="card-body text-primary">
                                        <h5 class="card-title">Rubrique 1:</h5>
                                        <input name="rubrique1_1" type="text" class="form-control" id="inputText" placeholder="">
                                        <input name="rubrique1_2" type="text" class="form-control mt-1 mb-1" id="inputText" placeholder="">
                                        <input name="rubrique1_3" type="text" class="form-control" id="inputText" placeholder="">

                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="card border-primary mb-4">
                                    <div class="card-body text-primary">
                                        <h5 class="card-title">Rubrique 2:</h5>
                                        <input name="rubrique2_1" type="text" class="form-control" id="inputText" placeholder="">
                                        <input name="rubrique2_2" type="text" class="form-control mt-1 mb-1" id="inputText" placeholder="">
                                        <input name="rubrique2_3" type="text" class="form-control" id="inputText" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card border-primary mb-4">
                                    <div class="card-body text-primary">
                                        <h5 class="card-title">Rubrique 3:</h5>
                                        <input name="rubrique3_1" type="text" class="form-control" id="inputText" placeholder="">
                                        <input name="rubrique3_2" type="text" class="form-control mt-1 mb-1" id="inputText" placeholder="">
                                        <input name="rubrique3_3" type="text" class="form-control" id="inputText" placeholder="">

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card border-primary mb-4">
                                    <div class="card-body text-primary">
                                        <h5 class="card-title">Rubrique 4:</h5>
                                        <input name="rubrique4_1" type="text" class="form-control" id="inputText" placeholder="">
                                        <input name="rubrique4_2" type="text" class="form-control mt-1 mb-1" id="inputText" placeholder="">
                                        <input name="rubrique4_3" type="text" class="form-control" id="inputText" placeholder="">

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card border-primary mb-4">
                                    <div class="card-body text-primary">
                                        <h5 class="card-title">Rubrique 5:</h5>
                                        <input name="rubrique5_1" type="text" class="form-control" id="inputText" placeholder="">
                                        <input name="rubrique5_2" type="text" class="form-control mt-1 mb-1" id="inputText" placeholder="">
                                        <input name="rubrique5_3" type="text" class="form-control" id="inputText" placeholder="">

                                    </div>
                                </div>
                            </div>

                        </div> -->
                        <div class="form-group ">
                            <div class="table-responsive pcol-sm-10">
                                <table id="rubriques" class="table table_rubriques align-items-center table-flush">
                                    <caption>
                                        <button type="button" class="btn btn-info add-newRubrique"><i class="fa fa-plus"></i> ajouter une rubrique</button>
                                    </caption>
                                    <dl class="dl-horizontal">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>rubrique 1</th>
                                                <th>rubrique 2</th>
                                                <th>rubrique 3</th>
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                </table>
                            </div>
                        </div>



                        <!-- name="histoire_societe" -->
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label"> Histoire de la société:</label>
                            <div class="col-sm-5">
                                <textarea name="histoire_societe" type="text" class="form-control" id="inputText" placeholder=""></textarea>
                            </div>
                        </div>

                        <!-- name="site_aime" -->
                        <div class="form-group row">
                            <label for="inputText" class="col-sm-4 col-form-label">Exemple de site aimé du client</label>
                            <div class="input-group mb-3 col-sm-5">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">https://</span>
                                </div>
                                <input name="site_aime" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                            </div>
                        </div>

                        <!-- name="site_concurrents" -->
                        <div class="form-group row">
                            <label for="inputText" class="col-sm-4 col-form-label">Site concurrents:</label>
                            <div class="input-group mb-6 col-sm-7">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">https://</span>
                                    <input name="site_concurrents" type="text" class="form-control col-sm-4" data-role="tagsinput" id="basic-url" aria-describedby="basic-addon3">
                                </div>

                            </div>
                        </div>


                        <!-- name="logos_partenaires" -->

                        <div class="form-group row ">
                            <label for="inputText" class="col-form-label col-sm-4">Logos de partenaires:</label>
                            <div class="custom-file col-sm-4 ml-2">
                                <input name="logos_partenaires" type="file" class="custom-file-input" id="logos_partenaires">
                                <label class="custom-file-label" for="logos_partenaires">choisir le logo</label>
                            </div>
                        </div>




                        <!-- name="creation_texte" -->

                        <div class="form-group row">
                            <div class="col-sm-4">Création de texte:</div>
                            <div class="col-sm-4">
                                <div class="custom-control custom-checkbox">
                                    <input name="creation_texte" type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">oui</label>
                                </div>
                            </div>
                        </div>

                        <!-- name="texte_importer" -->
                        <div class="form-group row ">
                            <label for="inputText" class="col-form-label col-sm-4">Texte à importer:</label>
                            <div class="custom-file col-sm-4 ml-3">
                                <input name="texte_importer" type="file" class="custom-file-input" id="texte_importer">
                                <label class="custom-file-label" for="texte_importer">choisir le text</label>
                            </div>
                        </div>



                        <!-- name="gallerie_photos" -->


                        <div class="form-group row">
                            <div class="col-sm-4">Gallérie photos:</div>
                            <div class="col-sm-4">
                                <div class="custom-control custom-checkbox">
                                    <input name="gallerie_photos" type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label" for="customCheck3">oui</label>
                                </div>
                            </div>
                        </div>

                        <!-- name="photos_importer" -->
                        <div class="form-group row ">
                            <label for="inputText" class="col-form-label col-sm-4">Photos à importer </label>
                            <div class="custom-file col-sm-4 ml-3">
                                <!-- <input name="photos_importer" type="file" class="custom-file-input" id="photos_importer"> -->
                                <label onclick="selectFiles();" class="custom-file-label" for="photos_importer">choisir le logo</label>
                            </div>
                        </div>




                        <!-- name="option_personnalisees" -->
                        <div class="form-group row">
                            <label class="col-sm-4" for="select2Multiple">option personnalisées:</label>
                            <div class="col-sm-5">
                                <select class="select2-multiple form-control" name="option_personnalisees[]" multiple="multiple" id="select2Multiple">
                                    <option value="">Selectionner</option>
                                    <option value="Création de vidéo">Création de vidéo</option>
                                    <option value="Création de vidéo animés">Création de vidéo animés</option>
                                    <option value="Publications sur les réseaux sociaux">Publications sur les réseaux sociaux:</option>
                                    <option value="Réservation en ligne">Réservation en ligne</option>
                                    <option value="E-commerce (catalogue et payement en ligne)">E-commerce (catalogue et payement en ligne)</option>
                                    <option value="Booster de visibilité">Booster de visibilité</option>
                                </select>
                            </div>
                        </div>


                        <!-- name="creation_reseaux" -->
                        <div class="form-group row">
                            <label class="col-sm-4" for="select3Multiple">Création de réseaux sociaux:</label>
                            <div class="col-sm-5">
                                <select class="select3-multiple form-control" name="creation_reseaux[]" multiple="multiple" id="select3Multiple">
                                    <option value="">Selectionner</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Linkedin">Linkedin</option>
                                </select>
                            </div>
                        </div>

                        <!-- expressions cles et geolocalisation -->
                        <div class="form-group ">
                            <div class="table-responsive pcol-sm-10">
                                <table id="expressions_geolocalisation" class="table table_geo align-items-center table-flush" id="dataTable">
                                    <caption>
                                        <button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> ajouter</button>
                                    </caption>
                                    <dl class="dl-horizontal">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Expressions clés</th>
                                                <th>Géolocalisation</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                </table>
                            </div>
                        </div>



                        <!-- name="commentaire_realisation" -->
                        <div class="form-group row">
                            <label for="inputText" class="col-sm-4 col-form-label">Commentaire sur la réalisation :</label>
                            <div class="col-sm-5">
                                <textarea name="commentaire_realisation" type="text" class="form-control" id="inputText" placeholder=""></textarea>
                            </div>
                        </div>


                        <!-- name="carte_identite" -->

                        <div class="form-group row ">
                            <label for="inputText" class="col-form-label col-sm-4">Carte d’identité du client:</label>
                            <div class="custom-file col-sm-4 ml-2">
                                <input name="carte_identite" type="file" class="custom-file-input" id="carte_identite">
                                <label class="custom-file-label" for="carte_identite">choisir le logo</label>
                            </div>
                        </div>

                        <!-- name="contrat_recto" -->
                        <div class="form-group row ">
                            <label for="inputText" class="col-form-label col-sm-4">Photos du contrat recto:</label>
                            <div class="custom-file col-sm-4 ml-2">
                                <input name="contrat_recto" type="file" class="custom-file-input" id="contrat_recto">
                                <label class="custom-file-label" for="contrat_recto">contrat recto:</label>
                            </div>
                        </div>

                        <!-- name="contrat_verso" -->
                        <div class="form-group row ">
                            <label for="inputText" class="col-form-label col-sm-4">Photos du contrat verso:</label>
                            <div class="custom-file col-sm-4 ml-2">
                                <input name="contrat_verso" type="file" class="custom-file-input" id="contrat_verso">
                                <label class="custom-file-label" for="contrat_verso">contrat verso:</label>
                            </div>
                        </div>

                        <!-- name="cheque" -->

                        <div class="form-group row ">
                            <label for="inputText" class="col-form-label col-sm-4">Chèques (numéro des chèques visible):</label>
                            <div class="custom-file col-sm-4 ml-2">
                                <input name="cheque" type="file" class="custom-file-input" id="cheque">
                                <label class="custom-file-label" for="cheque">choisir le logo</label>
                            </div>
                        </div>

                        <!-- name="num_cheque" -->
                        <div class="form-group row">
                            <label for="inputText" class="col-sm-4 col-form-label">Numéro de chèque:</label>
                            <div class="col-sm-5">
                                <input name="num_cheque" type="number" class="form-control" id="inputText" placeholder="">
                            </div>
                        </div>

                        <!-- name="rib" -->
                        <div class="form-group row ">
                            <label for="inputText" class="col-form-label col-sm-4">RIB</label>
                            <div class="custom-file col-sm-4 ml-2">
                                <input name="rib" type="file" class="custom-file-input" id="rib">
                                <label class="custom-file-label" for="rib">choisir le logo</label>
                            </div>
                        </div>

                        <!-- name="mandats" -->
                        <div class="form-group row ">
                            <label for="inputText" class="col-form-label col-sm-4">Mandats:</label>
                            <div class="custom-file col-sm-4 ml-2">
                                <input name="mandats" type="file" class="custom-file-input" id="mandats">
                                <label class="custom-file-label" for="mandats">choisir le logo</label>
                            </div>
                        </div>

                        <!-- name="proces_verbal" -->

                        <div class="form-group row ">
                            <label for="inputText" class="col-form-label col-sm-4">Procès verbal :</label>
                            <div class="custom-file col-sm-4 ml-2">
                                <input name="proces_verbal" type="file" class="custom-file-input" id="proces_verbal">
                                <label class="custom-file-label" for="proces_verbal">choisir le logo</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary col-sm-8 mt-5">enregistrer</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- /.box-body -->
            <!-- /.box -->
        </div>
    </div>

    <div id="loading" class="loadingDiv min-vw-100 min-vh-100 hideSpinner">

        <div class="spinner-border text-primary" role="status">
            <span class="sr-only ">Loading...</span>
        </div>
    </div>

</div>



<script>
    window.selectedImages1 = [null];


    function selectFiles() {
        $.FileDialog({
            "accept": "image/*",
            "multiple": true,



        }).on("files.bs.filedialog", function(event) {
            window.selectedImages1 = [];
            for (var a = 0; a < event.files.length; a++) {
                selectedImages1.push(event.files[a]);
            }
        });
    }

    function submitForm() {


        $("#loading").removeClass("hideSpinner");

        expressions_cles = "";
        geolocalisation = "";
        var table = document.getElementById('expressions_geolocalisation');
        for (var r = 1, n = table.rows.length; r < n; r++) {

            if (r == 1) {
                if (!table.rows[r].cells[0].innerHTML.includes("<input"))
                    expressions_cles = table.rows[r].cells[0].innerHTML;
                if (!table.rows[r].cells[1].innerHTML.includes("<input"))
                    geolocalisation = table.rows[r].cells[1].innerHTML;
            } else {
                if (!table.rows[r].cells[0].innerHTML.includes("<input"))
                    expressions_cles = expressions_cles + "," + table.rows[r].cells[0].innerHTML;
                if (!table.rows[r].cells[1].innerHTML.includes("<input"))
                    geolocalisation = geolocalisation + "," + table.rows[r].cells[1].innerHTML;
            }
        }



        rubriques = "";
        var table2 = document.getElementById('rubriques');
        for (var t = 1, n = table2.rows.length; t < n; t++) {

            if (t == 1) {
                if (!table2.rows[t].cells[0].innerHTML.includes("<input"))
                    rubriques = table2.rows[t].cells[0].innerHTML;
                if (!table2.rows[t].cells[1].innerHTML.includes("<input"))
                    rubriques = rubriques + "+-" + table2.rows[t].cells[1].innerHTML;
                if (!table2.rows[t].cells[1].innerHTML.includes("<input"))
                    rubriques = rubriques + "+-" + table2.rows[t].cells[2].innerHTML;
            } else {
                if (!table2.rows[t].cells[0].innerHTML.includes("<input"))
                    rubriques = rubriques + ";-" + table2.rows[t].cells[0].innerHTML;
                if (!table2.rows[t].cells[1].innerHTML.includes("<input"))
                    rubriques = rubriques + "+-" + table2.rows[t].cells[1].innerHTML;
                if (!table2.rows[t].cells[2].innerHTML.includes("<input"))
                    rubriques = rubriques + "+-" + table2.rows[t].cells[1].innerHTML;
            }
        }


        var form = document.getElementById("contratForm");
        var formData = new FormData(form);


        for (var a = 0; a < selectedImages1.length; a++) {
            formData.append("photos_importer[]", selectedImages1[a]);
        }

        formData.append("expressions_cles", expressions_cles);
        formData.append("geolocalisation", geolocalisation);
        formData.append("rubriques", rubriques);



        var ajax = new XMLHttpRequest();
        ajax.open("POST", "<?php echo WEB_ROOT; ?>views/process.php?cmd=confirmerContrat&code_rdv=<?php echo $_GET['code_rdv'] ?>", true);
        ajax.send(formData);

        ajax.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                $("#loading").toggleClass("hideSpinner");
                // header('Location: ../views/?v=nvContrat&msg='.urlencode('contratest est criè'));
                window.location.href = "<?php echo WEB_ROOT ?>views/";
            }
        };

        return false;
    }
</script>
<style>
    .hideSpinner {
        display: none;
    }

    .loadingDiv {
        position: absolute;
        left: 0px;
        top: 0px;
        z-index: 1;
        width: 100%;
        height: 100%;
        opacity: 0.5;
        background-color: #ebfffa;
    }
</style>