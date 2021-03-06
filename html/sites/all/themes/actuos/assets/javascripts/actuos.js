Drupal.behaviors.actuos = {
  attach: function (context, settings) {
	  
	  jQuery("#sidebar").css({"margin-top": "-" + jQuery("body").css("padding-top"), "padding-top": jQuery("body").css("padding-top")});
	  jQuery("#sidebar").niceScroll({styler:"fb",cursorcolor:"#4ECDC4", cursorwidth: '3', cursorborderradius: '10px', background: '#404040', spacebarenabled:false, cursorborder: ''});
	  
	  
	  var frame = jQuery('.logi-content iframe');
	  var frameParent = jQuery('#logi-report-div');
	  frameParent.addClass('spinner');

	  var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
	  var eventer = window[eventMethod];
	  var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";
	  
	  // Listen to message from child window
	  eventer(messageEvent,function(e) {
		  if ('"Reload"' === e.data){
			  frameParent.addClass('spinner');
		  }
		  if ('"Loaded"' === e.data){
			  frameParent.removeClass('spinner');
		  }
	  },false);
	  
	  window.onload = function(){
		  setTimeout(function(){
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
						  frameParent.removeClass('spinner');
						  return _super.apply(this, arguments);
					  };
				  })(emb.iframe.onload);
			  }
			  
		  }
		  
	  }
	  
	  var redirect2searchURL = function(){
		  var p = Drupal.encodePath(jQuery('#search-field').val());
		  if (!p.length) return;
		  window.location.href = Drupal.settings.basePath + 'srch/?p=' + p;
	  };
	  
	  jQuery('#search-field').on('keypress', function(e){
		  if (e.which == 13) {
			  redirect2searchURL();
		  }
	  });
	  
	  jQuery('#search-icon').on('click', function(){
		  redirect2searchURL();
	  });
	  
	  
	  
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
