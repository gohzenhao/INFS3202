<!-- Modal element for Sign up form -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">TheRecipeProject Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form class="signup-form" action="controller/signup.php" method="POST">
        <div class="modal-body">
          <input type="text" name="first" placeholder="Firstname">
          <input type="text" name="last" placeholder="Lastname">
          <input type="text" name="email" placeholder="E-mail">
          <input type="text" name="uid" placeholder="Username">
          <input type="password" name="pwd" placeholder="Password">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button submit" name="submit" class="btn btn-primary">Register</button>
        </div>
      </form>

      <!-- <div class="modal-body">
        ... TODO ...
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Register</button>
      </div> -->

    </div>
  </div>
</div>