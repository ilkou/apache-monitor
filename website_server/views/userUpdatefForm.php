<?php
$records = getOneUserRecords();
extract($records);
?>

<div class="col-md-8">

  <link href="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.js" type="text/javascript"></script>

  <link href="<?php echo WEB_ROOT; ?>library/spry/textareavalidation/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo WEB_ROOT; ?>library/spry/textareavalidation/SpryValidationTextarea.js" type="text/javascript"></script>

  <link href="<?php echo WEB_ROOT; ?>library/spry/selectvalidation/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo WEB_ROOT; ?>library/spry/selectvalidation/SpryValidationSelect.js" type="text/javascript"></script>

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title"><b>modifier un utilisateur</b></h3>




    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" action="<?php echo WEB_ROOT; ?>views/process.php?cmd=updateUser&login=<?php echo $login; ?>" method="post" enctype="multipart/form-data">
    
    <input type="hidden" name="token" value="<?= $_SESSION['crm_token'] ?>"/>
    
    <div class="box-body">
        <!-- nom-->
        <div class="form-group">
          <label for="exampleInputEmail1">nom</label>
          <span id="sprytf_name">
            <input type="text" name="nom_user" class="form-control input-sm" placeholder="<?php echo "$nom_user"; ?>" value="<?php echo "$nom_user"; ?>">
            <span class="textfieldRequiredMsg">le nom est requis.</span>
          </span>
        </div>
        <!-- prenom-->
        <div class="form-group">
          <label for="exampleInputEmail1">prenom</label>
          <span id="sprytf_name1">
            <input type="text" name="prenom_user" class="form-control input-sm" placeholder="<?php echo "$prenom_user"; ?>" value="<?php echo  $prenom_user; ?>">
            <span class="textfieldRequiredMsg">le prenom est requis.</span>
          </span>
        </div>

        <!-- numero de telephone -->
        <div class="form-group">
          <label for="exampleInputEmail1">numero de telephone</label>
          <span id="sprytf_phone">
            <input type="text" name="tel" class="form-control input-sm" value="<?php echo $tel; ?>">
            <span class="textfieldRequiredMsg">Le numéro de téléphone est requis.</span>
          </span>
        </div>

 

        <div class="form-group">
          <label for="exampleInputEmail1">Uset Type</label>
          <span id="sprytf_type">
            <select name="fonction" class="form-control input-sm">
              <option value="manager" <?php if($fonction == "manager"){echo 'selected="selected"';} ?>>manager</option>
              <option value="devloppeur_commercial" <?php if($fonction == "devloppeur_commercial"){echo 'selected="selected"';} ?> >devloppeur commercial</option>
              <option value="commercial" <?php if($fonction == "commercial"){echo 'selected="selected"';} ?>>commercial</option>
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
          <button type="submit" class="btn btn-primary">Enregistrer</button>
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