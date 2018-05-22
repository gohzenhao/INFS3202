var $feature = $('#feature');

$feature.waypoint(function(direction){
  if(direction=="down"){
    $feature.addClass('featured-js-animate');
  }else{
    $feature.removeClass('featured-js-animate');
  }
}, {offset: '60%'});

var $cards = $('#feature-cards');

$cards.waypoint(function(direction){
  if(direction=="down"){
    $cards.addClass('cards-js-animate');
    console.log("wtf");
  }else{
    $cards.removeClass('cards-js-animate');
  }
}, {offset: '50%'});
