<div class="container">

    <?php foreach($data['list'] as $key=>$value): ?>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $value['title']; ?></h5>
                <p class="card-text"><?php echo $value['desc']; ?></p>
                <a href="<?php echo $data['baseurl'] . $value['href']; ?>" target="_blank" class="btn btn-primary">Open recipe</a>
            </div>
        </div>
    <?php endforeach; ?>

</div>