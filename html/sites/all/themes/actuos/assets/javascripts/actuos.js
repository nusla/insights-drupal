Drupal.behaviors.actuos = {
  attach: function (context, settings) {
	  
	  window.onload = function(){
		  setTimeout(function(){ 
			  var frame = jQuery('.logi-content iframe');
			  frame.css('height', parseInt(frame.attr('height')) + 50 + 'px');
		  }, 1000);
		  
		  
	  };
	  
	  if (typeof EmbeddedReporting != 'undefined') {
		  var emb;
		  for (var i in EmbeddedReporting.reports){
			  if ('object' === typeof EmbeddedReporting.reports[i]){
				  emb = EmbeddedReporting.reports[i];
				  
				  //Extend onLoad function
				  emb.iframe.onload = (function(_super){
					  return function() {
						  return _super.apply(this, arguments);
					  };
				  })(emb.iframe.onload);
			  }
			  
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
