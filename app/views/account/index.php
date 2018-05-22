<div class="container-fluid">
<div class="row content">
    <!-- <div class="col-lg-2">

    </div> -->
    <div class="col-lg-3" id="sidebar">
      <h3 class="mt-3 mb-4 pl-3"><u>Activities</u></h3>
      <ul class="nav nav-pills nav-stacked">
        <a href="#section1"><li><h5>My Recipes</h5></h5></li></a>
        <a href="#section2"><li><h5>Create Recipe</h5></li></a>
        <a href="#section1"><li><h5>Edit Profile</h5></li></a>
      </ul><br>
      <hr/>
    </div>
    <div class="col-lg-8">
      <div class="row mt-3">
          <div class="col-lg-10 text-center">
              <h3> <u> My Recipes </u> </h3>
          </div>
      </div>

      <div class="row">

          <?php foreach($data['recipes'] as $recipe){
            echo '
              <div class="col-lg-3 mt-3 mr-3 mb-3 text-center d-flex">
                <div class="card" style="width: 25rem;">
                  <img class="card-img-top" src="' . URLROOT.'/img'.$recipe['imagePath'] . '" alt="Card image cap" style="height:200px">
                  <div class="card-body">
                    <h5 class="card-title">' . $recipe['title'] . '</h5>
                    <p class="card-text">' . $recipe['description'] . '</p>
                  </div>
                  <ul class="list-group list-group-flush">
                  <li class="list-group-item"><a href="#" class="card-link">edit recipe</a>
                      <a href="'.URLROOT.'/account/index?delete='. $recipe['rid'] .'" class="card-link">delete recipe</a>
                      </li>
                  </ul>
                </div>
              </div>
            ';
          }
          ?>

      </div>
    </div>
    <div class="col-lg-1">

    </div>

  </div>
</div>
