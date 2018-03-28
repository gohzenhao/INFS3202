<?php require APPROOT . '/views/includes/header.php'; ?>

<h1><?php echo $data['title']?></h1>

<?php echo 'APPROOT: ' . APPROOT;?></br>
<?php echo 'URLROOT: ' . URLROOT;?></br>

<a class="btn btn-primary" href="<?php echo URLROOT; ?>/home" role="button">Home</a>

<ul>
    <?php foreach($data['users'] as $user) : ?>
        <li><?php echo $user->user_name; ?></li>
    <?php endforeach; ?>
</ul>

<?php require APPROOT . '/views/includes/footer.php'; ?>