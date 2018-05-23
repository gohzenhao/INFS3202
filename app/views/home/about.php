
<div class="container">
  <h3 class="">Submit Enquiries </h3>
  <?php flash('email_success');?>
	<form action="<?php echo URLROOT; ?>/home/about" method="POST">
		<div class="form-group">
			<label>Subject:</label>
			<input type="text" name="subject" class="form-control <?php echo (!empty($data['subject_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['subject']?>">
      <span class="invalid-feedback"><?php echo $data['subject_error'] ?></span>
    </div>
		<div class="form-group">
			<label>Message:</label>
      <textarea type="text" name="body" class="form-control <?php echo (!empty($data['body_error'])) ? 'is-invalid' : ''; ?>"><?php echo $data['body']?></textarea>
      <span class="invalid-feedback"><?php echo $data['body_error'] ?></span>
    </div>
    <div class="form-group">
			<label>Your E-mail:</label>
      <input type="text" name="replyTo" class="form-control <?php echo (!empty($data['replyTo_error'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['replyTo']?>">
      <span class="invalid-feedback"><?php echo $data['replyTo_error'] ?></span>
		</div>
		<input type="submit" value="Send" class="btn btn-success btn-block">
	</form>
</div>


<h3>My Google Maps Demo</h3>
<div id="map"></div>


<script>
      function initMap() {
        var brisbane = {lat: -27.470125, lng: 153.021072};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: brisbane
        });
        var marker = new google.maps.Marker({
          position: brisbane,
          map: map
        });
      }
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwz6vxPaoNFbI1bVZ04QPHYaezuc176tE&callback=initMap">
</script>
