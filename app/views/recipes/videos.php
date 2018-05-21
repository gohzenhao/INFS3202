<div class="container">
    <h1 class="text-center">Similar videos</h1>
    
    <?php
      foreach ($data['videos'] as $searchResult) {
        switch ($searchResult['id']['kind']) {
          case 'youtube#video':
            echo '<div class="row mb-3">
                    <ol class="col-8 directions">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/' . $searchResult['id']['videoId'] .'" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </ol>
                  </div>';
            break;
        }
      }
      ?>


</div>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/recipes/search.css">
