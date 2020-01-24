@extends('layouts.app')

@section('content')

<style type="text/css">
.acf-map {
	width: 100%;
	height: 400px;
	border: #ccc solid 1px;
	margin: 20px 0;
}

/* fixes potential theme css conflict */
.acf-map img {
   max-width: inherit !important;
}

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLUtp9eJ8dMPQBfDKXSGVeZGGb2s7_FUs"></script>
<script type="text/javascript">
(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/
function new_map( $el ) {
	// var
	var $markers = $el.find('.marker');
	
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	
	// add a markers reference
	map.markers = [];
	
	// add markers
	$markers.each(function(){
    	add_marker( $(this), map );
	});
	
	// center map
	center_map( map );
	// return
	return map;

}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {
	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}
}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {
	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}
}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;
$(document).ready(function(){
	$('.acf-map').each(function(){
		// create map
		map = new_map( $(this) );
	});
});
})(jQuery);
</script>
<div class="map">
    <div class="acf-map">
        <div class="marker" data-lat="-17.4463483" data-lng="-66.1435755"></div>
    </div>
</div>
<div class="row">
	<div class="col-md-8">
		@if(session('info'))
	        <div class="row">
	          <div class="col-md-12 col-md-offset-2">
	            <div class="alert alert-success">
	              {{ session('info') }}
	            </div>
	          </div>
	        </div>
	    @endif
		<h1 class="title_page">Contáctenos</h1>
		{!! Form::open([ 'route' => 'sendcontact' ]) !!}
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<div class="form-group">
					    {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Nombre Completo*']) }}
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group">
					    {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'E-mail*']) }}
					</div>
				</div>
				<div class="col-md-6 col-xs-12">
					<div class="form-group">
					    {{ Form::text('phone', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Teléfono*']) }}
					</div>
				</div>
				<div class="col-md-12 col-xs-12">
					<div class="form-group">
					    {{ Form::textarea('message', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Mensaje*']) }}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<div class="form-group">
					    {{ Form::submit('ENVIAR', ['class' => 'btn btn-sm btn-primary']) }}
					</div>
				</div>
			</div>
		{!! Form::close() !!}
	</div>
	<div class="col-md-4">
		<h3 class="title_page">Información</h3>
		<div class="list-group">
			<span class="list-group-item" href="#"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>&nbsp; Av. Petrolera Km 4,5; Ciudad Cochabamba, Cochabamba, Bolivia</span>
			<span class="list-group-item" href="#"><i class="fa fa-phone fa-fw" aria-hidden="true"></i>&nbsp; 70308295</span>
			<span class="list-group-item" href="#"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>&nbsp; Horario: 08:00 - 17:00</span>
			<a class="list-group-item" href="mailto:cifema.sam2020@gmail.com"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i>&nbsp; cifema.sam2020@gmail.com</a>
		</div>
	</div>
</div>

@endsection