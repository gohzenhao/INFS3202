<div class="container-fluid">
      <?php flash('update_success'); ?>
      <?php flash('delete_success');?>
      <?php flash('create_success');?>
<div class="row content">

    <?php require_once APPROOT.'/views/includes/sidenav.php'; ?>

    <div class="col-lg-9">
      <div class="row mt-3">
        <div class="col-lg-10 text-center">
            <h3> <u> My Recipes </u> </h3>
        </div>
      </div>

      <div class="row">

        <?php foreach($data['recipes'] as $recipe): ?>
          <div class="col-lg-3 mt-3 mr-3 mb-3 text-center d-flex">
            <div class="card" style="width: 25rem;">
              <img class="card-img-top" src="<?php echo URLROOT.'/img'.$recipe['imagePath'];?>" alt="Card image cap" style="object-fit:cover;height:200px">
              <div class="card-body">
                <h5 class="card-title"><?php echo $recipe['title'];?></h5>
                <p class="card-text"><?php echo $recipe['description'];?></p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <a href="<?php echo URLROOT.'/recipes/edit/'. $recipe['rid'];?>" class="card-link">edit</a>
                  <a href="<?php echo URLROOT.'/account/index?delete='. $recipe['rid'];?>" class="card-link">delete</a>
                </li>
              </ul>
            </div>
          </div>
        <?php endforeach;?>

      </div>
    </div>

  </div>
</div>
