<?php require APPROOT . '/views/includes/header.php'; ?>



<div class="jumbotron text-center">
    <h1><?php echo $data['title']?></h1>
    <a class="btn btn-secondary" href="<?php echo URLROOT; ?>/home/about" role="button">Empty About</a>
    <a class="btn btn-primary" href="<?php echo URLROOT; ?>/users/registration" role="button">Register</a>
    <a class="btn btn-primary" href="<?php echo URLROOT; ?>/users/login" role="button">Login</a>
</div>

<div class="row">
	<form action="<?php echo URLROOT; ?>/home/about" method="POST">
		<div class="form-group">
			<label>Subject</label>
			<input type="text" name="subject" class="form-control">
		</div>
		<div class="form-group">
			<label>Body</label>
			<input type="text" name="body" class="form-control">
		</div>
		<input type="submit" value="Send" class="btn btn-success btn-block">
	</form>
</div>



<?php require APPROOT . '/views/includes/footer.php'; ?>