<link href="<?php echo WEB_ROOT; ?>library/spry/passwordvalidation/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/passwordvalidation/SpryValidationPassword.js" type="text/javascript"></script>

<?php
$errorMessage = '&nbsp;';
if (isset($_GET['msg'])) {
  $errorMessage = $_GET['msg'];
}
?>
<div class="col-md-8">


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title"><b>changer le mot de passe</b></h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->

    <?php if ($errorMessage != "&nbsp;") { ?>
      <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Alert!</h4><?php echo $errorMessage; ?>
      </div>
    <?php } ?>


    <form role="form" action="<?php echo WEB_ROOT; ?>views/process.php?cmd=updatePwd" method="post">

      <input type="hidden" name="token" value="<?= $_SESSION['crm_token'] ?>" />

      <div class="container">
        <div class="row">
          <div class="col-sm-4">

            <div class="form-group has-feedback">
              <span id="sprytf_currentPwd">
                <label>Mot de passe actuel</label>
                <div class="form-group pass_show">
                  <input name="currentPwd" type="password" class="form-control" placeholder="">
                </div>
                <span class="passwordRequiredMsg">Mot de passe est nécessaire.</span>
                <span class="passwordMinCharsMsg">Vous devez spécifier au moins 6 caractères.</span>
                <span class="passwordMaxCharsMsg">Vous devez spécifier au maximum 10 caractères.</span>
              </span>
            </div>

            <div class="form-group has-feedback">
              <span id="sprytf_nvPwd1">
                <label>nouveau mot de passe</label>
                <div class="form-group pass_show">
                  <input name="nvPwd1" type="password" class="form-control" placeholder="">
                </div>
                <span class="passwordRequiredMsg">Nouveau mot de passe est nécessaire.</span>
                <span class="passwordMinCharsMsg">Vous devez spécifier au moins 6 caractères.</span>
                <span class="passwordMaxCharsMsg">Vous devez spécifier au maximum 10 caractères.</span>
              </span>
            </div>

            <div class="form-group has-feedback">
              <span id="sprytf_nvPwd1">
                <label>Confirmez le mot de passe</label>
                <div class="form-group pass_show">
                  <input name="nvPwd2" type="password" class="form-control" placeholder="">
                </div>
                <span class="passwordRequiredMsg">Vous devez confirmez le mot de passe.</span>
                <span class="passwordMinCharsMsg">Vous devez spécifier au moins 6 caractères.</span>
                <span class="passwordMaxCharsMsg">Vous devez spécifier au maximum 10 caractères.</span>
              </span>
            </div>

          </div>
        </div>
      </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">enregistrer</button>
      </div>
    </form>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.pass_show').append('<span class="ptxt">afficher</span>');
    });


    $(document).on('click', '.pass_show .ptxt', function() {

      $(this).text($(this).text() == "afficher" ? "cacher" : "afficher");

      $(this).prev().attr('type', function(index, attr) {
        return attr == 'password' ? 'text' : 'password';
      });

    });
  </script>

  <script>
    var sprytf_currentPwd = new Spry.Widget.ValidationPassword("sprytf_currentPwd", {
      minChars: 4,
      maxChars: 12,
      validateOn: ["blur", "change"]
    });

    var sprytf_nvPwd1 = new Spry.Widget.ValidationPassword("sprytf_nvPwd1", {
      minChars: 4,
      maxChars: 12,
      validateOn: ["blur", "change"]
    });

    var sprytf_nvPwd2 = new Spry.Widget.ValidationPassword("sprytf_nvPwd2", {
      minChars: 4,
      maxChars: 12,
      validateOn: ["blur", "change"]
    });
  </script>

</div>