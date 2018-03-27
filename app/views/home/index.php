<?php require APPROOT . '/views/includes/header.php'; ?>

<h1><?php echo $data['title']?></h1>
<button type="button" class="btn btn-warning">TEST BUTTON</button></br>
<a class="btn btn-secondary" href="<?php echo URLROOT; ?>/home/about" role="button">Empty About</a>

<a class="btn btn-primary" href="<?php echo URLROOT; ?>/users/registration" role="button">Register</a>

<?php require APPROOT . '/views/includes/footer.php'; ?>