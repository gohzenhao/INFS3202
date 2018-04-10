<?php require APPROOT . '/views/includes/header.php'; ?>


<div class="jumbotron">
    <h1>Welcome <?php echo $data['name']?> to your Account page</h1>
    <a class="btn btn-warning" href="<?php echo URLROOT; ?>/account/edit" role="button">Edit Account</a>
</div>


<?php require APPROOT . '/views/includes/footer.php'; ?>