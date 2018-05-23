
<div class="row container">
	<form action="<?php echo URLROOT; ?>/home/about" method="POST">
		<div class="form-group">
			<label>Subject:</label>
			<input type="text" name="subject" class="form-control">
		</div>
		<div class="form-group">
			<label>Enquiry:</label>
			<textarea type="text" name="body" class="form-control"></textarea>
    </div>
    <div class="form-group">
			<label>Your email:</label>
			<input type="text" name="replyTo" class="form-control">
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
