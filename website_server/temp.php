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
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($logo_existant); ?>" alt="">
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($logos_partenaires); ?>" alt="">
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($texte_importer); ?>" alt="">
                    </a>
                </div>

                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($photos_importer); ?>" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">
            <div class="row text-center text-lg-left">
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($logo_existant); ?>" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="texte" role="tabpanel" aria-labelledby="texte-tab">
            <div class="row text-center text-lg-left">
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($logos_partenaires); ?>" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="logo_pr" role="tabpanel" aria-labelledby="logo_pr-tab">
            <div class="row text-center text-lg-left">
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($texte_importer); ?>" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="photos_importer" role="tabpanel" aria-labelledby="photos_importer-tab">
            <div class="row text-center text-lg-left">
                <div class="col-lg-3 col-md-4 col-6">
                    <a href="#" class="d-block mb-4 h-100">
                        <img class="img-fluid img-thumbnail" src="<?php echo WEB_ROOT; ?>views/<?php echo ($photos_importer); ?>" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>








<fieldset style="border: 1px black solid">

    <legend style="border: 1px black solid;margin-left: 1em; padding: 0.2em 0.8em ">title</legend>

    Text within the box <br />
    Etc
</fieldset>




<div class="row">
    <div class="col-sm-6">
        <div class="card border-primary mb-4">
            <div class="card-body text-primary">
                <h5 class="card-title">Rubrique 1: </h5>
                <ul>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor.</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card border-secondary mb-4">
            <div class="card-body text-secondary">
                <h5 class="card-title">Secondary card title </h5>
                <ul>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor.</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card border-success mb-4">
            <div class="card-body text-success">
                <h5 class="card-title">Success card title </h5>
                <ul>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor.</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card border-warning mb-4">
            <div class="card-body text-warning">
                <h5 class="card-title">Warning card title </h5>
                <ul>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor.</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card border-info mb-4">
            <div class="card-body text-info">
                <h5 class="card-title">Info card title </h5>
                <ul>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor.</p>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card border-dark mb-4">
            <div class="card-body text-dark">
                <h5 class="card-title">Dark card title </h5>
                <ul>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor.</p>
            </div>
        </div>
    </div>

</div>




rubrique1_1, rubrique1_2, rubrique1_3,
rubrique2_1, rubrique2_2, rubrique2_3,
rubrique3_1, rubrique3_2, rubrique3_3,
rubrique4_1, rubrique4_2, rubrique4_3,
rubrique5_1, rubrique5_2, rubrique5_3,


'$rubrique1_1', '$rubrique1_2', '$rubrique1_3', '$rubrique2_1', '$rubrique2_2', '$rubrique2_3', '$rubrique3_1', '$rubrique3_2', '$rubrique3_3', '$rubrique4_1', '$rubrique4_2', '$rubrique4_3', '$rubrique5_1', '$rubrique5_2', '$rubrique5_3',






<div class="row pt-4">
    <div class="col-sm-6">
        <div class="card border-primary mb-4">
            <div class="card-body text-primary">
                <h5 class="card-title">Rubrique 1:</h5>
                <ul>
                    <li>echo (<?php echo ($rubrique1_1); ?>)</li>
                    <li>echo (<?php echo ($rubrique1_2); ?>)</li>
                    <li>echo (<?php echo ($rubrique1_3); ?>)</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card border-primary mb-4">
            <div class="card-body text-primary">
                <h5 class="card-title">Rubrique 2: </h5>
                <ul>
                    <li>echo (<?php echo ($rubrique2_1); ?>)</li>
                    <li>echo (<?php echo ($rubrique2_2); ?>)</li>
                    <li>echo (<?php echo ($rubrique2_3); ?>)</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card border-primary mb-4">
            <div class="card-body text-primary">
                <h5 class="card-title">Rubrique 3: </h5>
                <ul>
                    <li>echo (<?php echo ($rubrique3_1); ?>)</li>
                    <li>echo (<?php echo ($rubrique3_2); ?>)</li>
                    <li>echo (<?php echo ($rubrique3_3); ?>)</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card border-primary mb-4">
            <div class="card-body text-primary">
                <h5 class="card-title">Rubrique 4: </h5>
                <ul>
                    <li>echo (<?php echo ($rubrique4_1); ?>)</li>
                    <li>echo (<?php echo ($rubrique4_2); ?>)</li>
                    <li>echo (<?php echo ($rubrique4_3); ?>)</li>
                </ul>

            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card border-primary mb-4">
            <div class="card-body text-primary">
                <h5 class="card-title">Rubrique 5: </h5>
                <ul>
                    <li>echo (<?php echo ($rubrique5_1); ?>)</li>
                    <li>echo (<?php echo ($rubrique5_2); ?>)</li>
                    <li>echo (<?php echo ($rubrique5_3); ?>)</li>
                </ul>
            </div>
        </div>
    </div>
</div>





















<html lang="en">

<head>
    <title>PHP - jquery ajax crop image before upload using croppie plugins</title>
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
    <script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
    <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
</head>

<body>


    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">Image Upluad</div>
            <div class="panel-body">


                <div class="row">
                    <div class="col-md-4 text-center">
                        <div id="upload-demo" style="width:350px"></div>
                    </div>
                    <div class="col-md-4" style="padding-top:30px;">
                        <strong>Select Image:</strong>
                        <br />
                        <input type="file" id="upload">
                        <br />
                        <button class="btn btn-success upload-result">Upload Image</button>
                    </div>
                    <div class="col-md-4" style="">
                        <div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px"></div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <script type="text/javascript">
        $uploadCrop = $('#upload-demo').croppie({
            enableExif: true,
            viewport: {
                width: 200,
                height: 200,
                type: 'circle'
            },
            boundary: {
                width: 300,
                height: 300
            }
        });


        $('#upload').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                }).then(function() {
                    console.log('jQuery bind complete');
                });

            }
            reader.readAsDataURL(this.files[0]);
        });


        $('.upload-result').on('click', function(ev) {
            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(resp) {


                $.ajax({
                    url: "/ajaxpro.php",
                    type: "POST",
                    data: {
                        "image": resp
                    },
                    success: function(data) {
                        html = '<img src="' + resp + '" />';
                        $("#upload-demo-i").html(html);
                    }
                });
            });
        });


        function submitForm2() {
            formData.append("expressions_cles", expressions_cles);
            formData.append("geolocalisation", geolocalisation);
            formData.append("rubriques", rubriques);



            var ajax = new XMLHttpRequest();
            ajax.open("POST", "<?php echo WEB_ROOT; ?>views/process.php?cmd=create"
                method = "post"
                enctype = "multipart/form-data", true);
            ajax.send(formData);

            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                }
            };
            header('Location: ../views/?v=nvContrat&msg='.urlencode('contratest est criè'));
            return false;
        }
    </script>


</body>

</html>









SELECT SUM(rendez_vous.frais_techniques) chiffre_affaire
	 FROM contrats,
	 rendez_vous,  where rendez_vous.login_commercial = 'commercial1@telaction.com'
	 and  rendez_vous.status_rdv IN ('confirmed_contrat','dev_site',
	 'cr_contenue','optimisation','cr_reseaux','projet_livre','projet_suspendu') and 
	 YEAR(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = YEAR(CURRENT_DATE())
     and MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = MONTH(CURRENT_DATE())



     SELECT  users.login, users.nom_user, users.prenom_user, users.tel,  users.photo,  users.fonction
	FROM users  WHERE login = '$login' UNION ALL (
	SELECT SUM(rendez_vous.mensualite + rendez_vous.frais_techniques * 10.0 ) AS
	chiffre_affaire FROM contrats, rendez_vous  where rendez_vous.login_commercial = 'commercial1@telaction.com'
	and  rendez_vous.status_rdv IN ('confirmed_contrat','dev_site',
	'cr_contenue','optimisation','cr_reseaux','projet_livre','projet_suspendu') and 
	YEAR(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = YEAR(CURRENT_DATE())
	and MONTH(STR_TO_DATE(contrats.date_signature,'%d/%m/%Y')) = MONTH(CURRENT_DATE()))












    <div class="form-group">
    <label for="exampleInputEmail1">Nom du Développeur commercial</label>
        <select name="login_devloppeur" class="form-control input-sm">
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



