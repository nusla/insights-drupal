Drupal.behaviors.actuos = {
  attach: function (context, settings) {
	if (!window.matchMedia('(max-width: 767px)').matches) return;
	
    jQuery('#sidebar-mobile .tooltips').on('click', function(e){
    	e.stopPropagation();
    	jQuery('#sidebar-mobile').addClass('hidden');
    	jQuery('#sidebar').removeClass('hidden-xs');
    });
    
    jQuery('#sidebar').swipe({
		swipeLeft:function(event, direction, distance, duration, fingerCount){
			jQuery('#sidebar-mobile').removeClass('hidden');
	    	jQuery('#sidebar').addClass('hidden-xs');
		}, 
		threshold:10
	});
    
    jQuery('#sidebar-mobile').swipe({
		swipeRight:function(event, direction, distance, duration, fingerCount){
			console.log('eee')
			jQuery('#sidebar-mobile').addClass('hidden');
	    	jQuery('#sidebar').removeClass('hidden-xs');
		}, 
		threshold:10
	});
    
  }
};
