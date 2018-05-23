var $feature = $('#feature');

$feature.waypoint(function(direction){
  if(direction=="down"){
    if($feature.hasClass('animated fadeOutLeft')){
      $feature.removeClass('animated fadeOutLeft');
    }
    $feature.addClass('animated fadeInLeft');
  }else{
    if($feature.hasClass('animated fadeInLeft')){
      $feature.removeClass('animated fadeInLeft');
    }
    $feature.addClass('animated fadeOutLeft');
  }
}, {offset: '60%'});

var $cards = $('#feature-cards');

$cards.waypoint(function(direction){
  if(direction=="down"){
    if($cards.hasClass('animated fadeOutRight')){
      $cards.removeClass('animated fadeOutRight');
    }
    $cards.addClass('animated fadeInRight');
  }else{
    if($cards.hasClass('animated fadeInRight')){
      $cards.removeClass('animated fadeInRight');
    }
    $cards.addClass('animated fadeOutRight');
  }
}, {offset: '50%'});
