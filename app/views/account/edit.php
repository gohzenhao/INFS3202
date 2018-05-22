<div class="container-fluid">
<div class="row content">

<div class="col-lg-3 ml-5" id="sidebar">
  <h3 class="mt-3 mb-4 pl-3"><u>Activities</u></h3>
  <ul class="nav nav-pills nav-stacked">
    <a href="<?php echo URLROOT; ?>/home/index"><li><h5>Main Page</h5></h5></li></a>
    <a href="<?php echo URLROOT; ?>/account/index"><li><h5>My Recipes</h5></h5></li></a>
    <a href="<?php echo URLROOT; ?>/recipes/create"><li><h5>Create Recipe</h5></li></a>
    <a href="<?php echo URLROOT; ?>/account/edit"><li><h5>Edit Profile</h5></li></a>
  </ul><br>
  <hr/>
</div>

    <div class="col-lg-6">

      <h1 class="text-center"> Edit Profile</h1>

      <form action="<?php echo URLROOT; ?>/account/edit" method="POST">
        <!-- Full name field -->
        <div class="form-group">
          <label class="control-label col-lg-4">Name</label>
          <div class="col-lg-12">
            <div class="input-group">
              <input type="text" name="name" class="form-control <?php echo (!empty($data['error_name'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name'] ?>"/>
              <span class="invalid-feedback"><?php echo $data['error_name'] ?></span>
            </div>
          </div>
        </div>

        <!-- Username field -->
        <div class="form-group">
          <label class="control-label col-lg-4">Username</label>
          <div class="col-lg-12">
            <div class="input-group">
              <input type="text" name="username" class="form-control <?php echo (!empty($data['error_username'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username'] ?>"/>
              <span class="invalid-feedback"><?php echo $data['error_username'] ?></span>
            </div>
          </div>
        </div>


        <!-- Email field -->
        <div class="form-group">
          <label class="control-label col-lg-4">Email</label>
          <div class="col-lg-12">
            <div class="input-group">
              <input type="text" name="email" class="form-control <?php echo (!empty($data['error_email'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email'] ?>"/>
              <span class="invalid-feedback"><?php echo $data['error_email'] ?></span>
            </div>
          </div>
        </div>

        <!-- Password field -->
        <div class="form-group">
          <label class="control-label col-lg-4">Password</label>
          <div class="col-lg-12">
            <div class="input-group">
              <a class="mt-auto pl-1 btn btn-primary" data-toggle="modal" data-target="#exampleModal" href="#">Change password</a>
            </div>
          </div>
        </div>

        <div class="form-group border-top">
          <div class="row">

            <div class="col-lg-12 mt-3 text-center">

              <button type="submit" class="btn btn-warning mr-4" value="validateLogin"> Save </button>
              <button class="btn btn-danger"> Cancel</button>
            </div>
          </div>
        </div>
      </form>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <form action="<?php echo URLROOT; ?>/account/edit" method="POST">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change password</h5></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label class="control-label col-lg-12">Enter current password to continue</label>
                  <div class="col-lg-12">
                    <div class="input-group">
                      <input type="password" name="password" class="form-control"/>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" id="nextBtn" class="btn btn-primary">Next</button>

              </div>
            </div>
          </div>
          </form>
        </div>

        <?php
        ?>

    </div>
  </div>
</div>
