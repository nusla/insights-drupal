Drupal.behaviors.actuos = {
  attach: function (context, settings) {
	  
	  
	  console.log(EmbeddedReporting)
	  var emb;
	  for (var i in EmbeddedReporting.reports){
		  if ('object' === typeof EmbeddedReporting.reports[i]){
			  emb = EmbeddedReporting.reports[i];
			  
			  //Extend onLoad function
			  emb.iframe.onload = (function(_super){
				  return function() {
				        console.log(this)
				        return _super.apply(this, arguments);
				  };
			  })(emb.iframe.onload);
		  }
		  
	  }
	  
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
			jQuery('#sidebar-mobile').addClass('hidden');
	    	jQuery('#sidebar').removeClass('hidden-xs');
		}, 
		threshold:10
	});
    
  }
};
