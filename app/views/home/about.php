<?php require APPROOT . '/views/includes/header.php'; ?>



<div class="jumbotron text-center">
    <h1><?php echo $data['title']?></h1>
    <a class="btn btn-secondary" href="<?php echo URLROOT; ?>/home/about" role="button">Empty About</a>
    <a class="btn btn-primary" href="<?php echo URLROOT; ?>/users/registration" role="button">Register</a>
    <a class="btn btn-primary" href="<?php echo URLROOT; ?>/users/login" role="button">Login</a>
</div>

<!-- <div class="row">
	<form action="<?php echo URLROOT; ?>/home/about" method="POST">
		<div class="form-group">
			<label>Subject</label>
			<input type="text" name="subject" class="form-control">
		</div>
		<div class="form-group">
			<label>Body</label>
			<input type="text" name="body" class="form-control">
		</div>
		<input type="submit" value="Send" class="btn btn-success btn-block">
	</form>
</div> -->

<div>
  
</div>


<h3>My Google Maps Demo</h3>
<div id="map">

</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>


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
