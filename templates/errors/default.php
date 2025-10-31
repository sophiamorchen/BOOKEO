<?php require_once __ROOTPATH__.'\templates\header.php'; ?>

<?php if ($error) { ?>

<div class="alert alert-danger">

<?= $error; ?>

</div>

<?php }?>

<?php require_once __ROOTPATH__.'\templates\footer.php';?>
