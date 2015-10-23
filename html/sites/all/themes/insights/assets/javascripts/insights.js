Drupal.behaviors.actuos = {
  attach: function (context, settings) {
	  
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
			  return;
		  }
		  if ('"Loaded"' === e.data){
			  frameParent.removeClass('spinner');
			  return;
		  }
		  var req = JSON.parse(e.data);
		  
		  if ('object' == typeof req){
		      if ('frame_resized' == req.command){
		          if (req.height){
		              frame.css('height', parseInt(req.height) + 50 + 'px');
		          }
		      }
		  }
	  },false);
	  
	  window.onload = function(){
		  setTimeout(function(){
			  var frameHeight = parseInt(frame.attr('height')) || 500;
			  frame.css('height', frameHeight + 50 + 'px');
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
	  
	  jQuery('#user-profile-form select[name=timezone]').select2({
		  width: '400px'
	  });
	  
    
  }
};
