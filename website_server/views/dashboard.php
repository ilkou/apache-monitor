

<!-- <?php include('ttt.php') ?> -->


<?php if ($_SESSION['crm_fd_user']['fonction'] == 'admin' || $_SESSION['crm_fd_user']['fonction'] == 'manager') {
    include('adminDatshbord.php');
} else {
    include('profileEmploye.php');
}
?>

