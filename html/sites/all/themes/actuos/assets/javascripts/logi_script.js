$(function() {
	$('#export-menu-button').on('click', function(){
		$('#colTableExportControls').toggle('slow');
	});
	
	$('#reportFilter').on('click', function(){
		$('#filter-dropdown-content').toggle('slow');
	});
});