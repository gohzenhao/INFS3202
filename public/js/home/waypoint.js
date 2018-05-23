var $feature = $('#feature');

$feature.waypoint(function(direction){
  if(direction=="down"){
    $feature.addClass('animated fadeInLeft');
  }else{
    $feature.removeClass('animated fadeInLeft');
  }
}, {offset: '60%'});

var $cards = $('#feature-cards');

$cards.waypoint(function(direction){
  if(direction=="down"){
    $cards.addClass('animated fadeInRight');
  }else{
    $cards.removeClass('animated fadeInRight');
  }
}, {offset: '50%'});
