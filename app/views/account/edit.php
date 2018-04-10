<?php require APPROOT . '/views/includes/header.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-lg-6 mx-auto">

      <h1 class="text-center"> Edit Profile</h1>

      <form action="<?php echo URLROOT; ?>/users/registration" method="POST">
        <!-- Full name field -->
        <div class="form-group">
          <label class="control-label col-lg-4">Name</label>
          <div class="col-lg-12">
            <div class="input-group">
              <input id="editName" type="text" class="form-control" value="<?php echo $data['user']->user_name?>" disabled/>
              <a id="editNameEdit" href="#" onclick="editName()" class="mt-auto pl-1"><span>edit</span></a>
              <a id="editNameSave" class="mt-auto pl-1" href="#" hidden><span>save</span></a>
            </div>
          </div>
        </div>

        <!-- Email field -->
        <div class="form-group">
          <label class="control-label col-lg-4">Username</label>
          <div class="col-lg-12">
            <div class="input-group">
              <input id="editName" type="text" class="form-control" value="<?php ?>" disabled/>
              <a id="editNameEdit" href="#" onclick="editName()" class="mt-auto pl-1"><span>edit</span></a>
              <a id="editNameSave" class="mt-auto pl-1" href="#" hidden><span>save</span></a>
            </div>
          </div>
        </div>


        <!-- Username field -->
        <div class="form-group">
          <label class="control-label col-lg-4">Email</label>
          <div class="col-lg-12">
            <div class="input-group">
              <input id="editName" type="text" class="form-control" value="<?php ?>" disabled/>
              <a id="editNameEdit" href="#" onclick="editName()" class="mt-auto pl-1"><span>edit</span></a>
              <a id="editNameSave" class="mt-auto pl-1" href="#" hidden><span>save</span></a>
            </div>
          </div>
        </div>

        <!-- Password field -->
        <div class="form-group">
          <label class="control-label col-lg-4">Password</label>
          <div class="col-lg-12">
            <div class="input-group">
              <input id="editName" type="text" class="form-control" value="<?php ?>" disabled/>
              <a id="editNameEdit" href="#" onclick="editName()" class="mt-auto pl-1"><span>edit</span></a>
              <a id="editNameSave" class="mt-auto pl-1" href="#" hidden><span>save</span></a>
            </div>
          </div>
        </div>

        <!-- <div class="row">
          <div class="col">
            <input type="submit" value="Register" class="btn btn-success btn-block">
          </div>
          <div class="col">
            <a href="<?php //echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an account? Login</a>
          </div>
        </div> -->
      </form>

    </div>
  </div>
</div>

<script>
  function editName(){
    document.getElementById("editName").disabled = false;
    document.getElementById("editName").focus();
    document.getElementById("editNameEdit").hidden = true;
    document.getElementById("editNameSave").hidden = false;
  }
</script>
<?php require APPROOT . '/views/includes/footer.php'; ?>
