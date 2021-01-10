<?php
$records = getUsersRecords();
?>

<div class="col-md-12 mb-4">
  <!-- Simple Tables -->
  <div class="card">

    <div class="table-responsive">
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th>nom</th>
            <th>prenom</th>
            <th>Email</th>
            <th>fonction</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($records as $rec) {
            extract($rec);
            $stat = '';
          ?>
            <tr>
              <td>
                <a href="<?php echo WEB_ROOT; ?>views/?v=profileEmploye&login=<?php echo $login; ?>">
                  <?php echo strtoupper($nom_user) ?>
                </a>
              </td>
              <td><?php echo  $prenom_user; ?></td>
              <td><?php echo $login; ?></td>
              <td><?php echo $fonction; ?></td>
              <td>
                <button type="button" class="btn btn-info mb-1" onclick="updateUser('<?php echo $login ?>');">modifier</button>
                <button type="button" class="btn btn-danger mb-1" onclick="deleteUser('<?php echo $login ?>', '<?php echo $_SESSION['crm_token'] ?>');">suprimer</button>
              </td>
            </tr>
          <?php } ?>

        </tbody>
      </table>
    </div>
    <div class="card-footer clearfix">
      <button type="button" class="btn btn-info" onclick="javascript:createUserForm();"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Creer un nouvel utilisateur</button>
    </div>
  </div>
</div>

<script language="javascript">
  function createUserForm() {
    window.location.href = '<?php echo WEB_ROOT; ?>views/?v=CREATE';
  }

  function updateUser(login) {
    window.location.href = '<?php echo WEB_ROOT; ?>views/?v=UPDATEUSER&login=' + login;
  }

  function deleteUser(login, token) {
    //  if (confirm('Etes-vous sûr de  suprimer ' + $login))

    window.location.href = '<?php echo WEB_ROOT; ?>views/process.php?cmd=deleteUser&login=' + login + "&token=" + token;
  }
</script>