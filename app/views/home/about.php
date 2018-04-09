<?php require APPROOT . '/views/includes/header.php'; ?>



<div class="jumbotron text-center">
    <h1><?php echo $data['title']?></h1>
    <a class="btn btn-secondary" href="<?php echo URLROOT; ?>/home/about" role="button">Empty About</a>
    <a class="btn btn-primary" href="<?php echo URLROOT; ?>/users/registration" role="button">Register</a>
    <a class="btn btn-primary" href="<?php echo URLROOT; ?>/users/login" role="button">Login</a>
</div>



<?php require APPROOT . '/views/includes/footer.php'; ?>