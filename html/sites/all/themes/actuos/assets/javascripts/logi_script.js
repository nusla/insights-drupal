$(function() {
	$('#export-menu-button').on('click', function(){
		$('#colTableExportControls').toggle('slow');
	});
	
	$('#report-filter-container').on('click', function(){
		
		if ($('#filter-dropdown-content').is(':visible')){
			$('#filter-dropdown-content').hide();
			$('#filter-direction-icon').removeClass('fa-angle-down');
			$('#filter-direction-icon').addClass('fa-angle-up');
			$(this).addClass('clear-bottom-border');
		} else {
			$('#filter-dropdown-content').show();
			$('#filter-direction-icon').addClass('fa-angle-down');
			$('#filter-direction-icon').removeClass('fa-angle-up');
			$(this).removeClass('clear-bottom-border');
		}
	});
	
});