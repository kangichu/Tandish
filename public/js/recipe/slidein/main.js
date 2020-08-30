jQuery(document).ready(function($){
	//open the lateral panel
	$('.cd-btns').on('click', function(event){
		event.preventDefault();
		$('.cd-panels').addClass('is-visible');
		$('body').on('wheel.modal mousewheel.modal', function () {
	      return false;
	    });
	});
	//clode the lateral panel
	$('.cd-panels').on('click', function(event){
		$('body').off('wheel.modal mousewheel.modal');
		if( $(event.target).is('.cd-panels') || $(event.target).is('.cd-panel-closes') ) { 
			$('.cd-panels').removeClass('is-visible');
			event.preventDefault();
		}
	});
});