<?php require APPROOT . '/views/includes/header.php'; ?>


<div class="jumbotron">

      <h1>Welcome <?php echo $data['name']?> to your Account page</h1>
      <?php flash('update_success'); ?>
      <a class="btn btn-warning" href="<?php echo URLROOT; ?>/account/edit" role="button">Edit Account</a>

      <a class="btn btn-light" href="<?php echo URLROOT; ?>/recipes/create" role="button">Create new recipe</a>

</div>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="row mt-3">
          <div class="col-lg-12 text-center">
              <h3> <u> Your recipes </u> </h3>
          </div>
      </div>

      <div class="row" style="overflow-x:scroll">

          <?php foreach($data['recipes'] as $recipe){
            echo '
              <div class="col-lg-3 m-3 text-center">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="'. URLROOT . '/img/salmon_custom.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">' . $recipe['title'] . '</h5>
                    <p class="card-text">' . $recipe['description'] . '</p>
                  </div>
                  <div class="card-body">
                    <a href="#" class="card-link">edit recipe</a>
                    <a href="#" class="card-link">delete recipe</a>
                  </div>
                </div>
              </div>
            ';
          }
          ?>


      </div>
    </div>
  </div>
</div>


<?php require APPROOT . '/views/includes/footer.php'; ?>
