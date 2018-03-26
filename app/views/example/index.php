<?php require APPROOT . '/views/includes/header.php'; ?>

<h1><?php echo $data['title']?></h1>

<?php echo APPROOT;?></br>
<?php echo URLROOT;?></br>

<button type="button" class="btn btn-warning">TEST BUTTON</button></br>

<ul>
    <?php foreach($data['users'] as $user) : ?>
        <li><?php echo $user->name; ?></li>
    <?php endforeach; ?>
</ul>

<?php require APPROOT . '/views/includes/footer.php'; ?>