<div class="col-md-8">

  <link href="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.js" type="text/javascript"></script>

  <link href="<?php echo WEB_ROOT; ?>library/spry/textareavalidation/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo WEB_ROOT; ?>library/spry/textareavalidation/SpryValidationTextarea.js" type="text/javascript"></script>

  <link href="<?php echo WEB_ROOT; ?>library/spry/selectvalidation/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo WEB_ROOT; ?>library/spry/selectvalidation/SpryValidationSelect.js" type="text/javascript"></script>

  <div class="card card-primary">
    <div class="card-header with-border">
      <h3 class="card-title"><b>nouvel utilisateur</b></h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="<?php echo WEB_ROOT; ?>views/process.php?cmd=create" method="post" enctype="multipart/form-data">

      <input type="hidden" name="token" value="<?= $_SESSION['crm_token'] ?>" />

      <div class="card-body">
        <!-- nom-->
        <div class="form-group">
          <label for="exampleInputText">nom</label>
          <span id="sprytf_name">
            <input id="nom_user" type="text" name="nom_user" class="form-control input-sm" placeholder="rahimi">
            <span class="textfieldRequiredMsg">le nom est requis.</span>
          </span>
        </div>
        <!-- prenom-->
        <div class="form-group">
          <label for="exampleInputEmail1">prénom</label>
          <span id="sprytf_name1">
            <input id="prenom_user" type="text" name="prenom_user" class="form-control input-sm" placeholder="el mehdi">
            <span class="textfieldRequiredMsg">le prénom est requis.</span>
          </span>
        </div>

        <!-- numero de telephone -->
        <div class="form-group">
          <label for="exampleInputEmail1">numéro de telephone</label>
          <span id="sprytf_phone">
            <input id="tel" type="text" name="tel" class="form-control input-sm" placeholder="Phone number">
            <span class="textfieldRequiredMsg">Le numéro de téléphone est requis.</span>
          </span>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <span id="sprytf_email">
            <input id="login" type="text" name="login" class="form-control input-sm" placeholder="Enter email">
            <span class="textfieldRequiredMsg">E-mail est requis.</span>
            <span class="textfieldInvalidFormatMsg">Veuillez saisir un e-mail valide (user@telaction.com).</span>
          </span>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">mot de passe</label>
          <span id="sprytf_name2">
            <input id="password" type="password" name="password" class="form-control input-sm" placeholder="">
            <span class="textfieldRequiredMsg">le mot de passe est requis.</span>
          </span>
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">fonction de l'utilisateur</label>
          <span id="sprytf_type">
            <select id="fonction" name="fonction" class="form-control input-sm">
              <option value=""> -- selectionez la fonction --</option>
              <option value="manager">manager</option>
              <option value="developpeur_tech">développeur technique</option>
              <option value="devloppeur_commercial">développeur commercial</option>
              <option value="commercial">commercial</option>
            </select>
            <span class="selectRequiredMsg">sélectionner la fonction.</span>
          </span>

        </div>


        <div class="form-group row ">
          <label for="inputText" class="col-form-label col-sm-4">Photo perso:</label>
          <div class="custom-file col-sm-4 ml-3">
            <input name="photo" type="file" class="custom-file-input" id="photo">
            <label class="custom-file-label" for="photo">choisir la photo</label>
          </div>
        </div>


        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">enregistrer</button>
        </div>
    </form>
  </div>
  <!-- /.box -->
  <script type="text/javascript">
    var sprytf_name = new Spry.Widget.ValidationTextField("sprytf_name", 'none', {
      minChars: 1,
      validateOn: ["blur", "change"]
    });
    var sprytf_name1 = new Spry.Widget.ValidationTextField("sprytf_name1", 'none', {
      minChars: 1,
      validateOn: ["blur", "change"]
    });

    var sprytf_name2 = new Spry.Widget.ValidationTextField("sprytf_name2", 'none', {
      minChars: 2,
      validateOn: ["blur", "change"]
    });
    var sprytf_address = new Spry.Widget.ValidationTextarea("sprytf_address", {
      minChars: 10,
      isRequired: true,
      validateOn: ["blur", "change"]
    });
    var sprytf_phone = new Spry.Widget.ValidationTextField("sprytf_phone", 'none', {
      validateOn: ["blur", "change"]
    });
    var sprytf_mail = new Spry.Widget.ValidationTextField("sprytf_email", 'email', {
      validateOn: ["blur", "change"]
    });

    var sprytf_type = new Spry.Widget.ValidationSelect("sprytf_type");
  </script>
</div>