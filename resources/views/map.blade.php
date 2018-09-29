@extends('layout.app')

@section('content')
<div class="container">		
	<div class="starter-template">
		<div id="main-content">
			
		</div>
		<div style="display: none;" class="loader"></div>
		<div id="google">
			<h2>Click Every where in maps to get weather</h2>
    		<div id="googleMap" style="width:100%;height:400px;"></div>		
		</div>		
  	</div>
</div>

@section('footer-script')
<script>

function myMap() {
var mapProp= {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:5,
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

google.maps.event.addListener(map, 'click', function(event) {
	$('#google').hide();
	$('.loader').show();
	$('#main-content').html("");
	$.ajax({
		type: "GET",
		url: '{{ URL::to("ajax/weather") }}',
		data : {
			"longitude": event.latLng.lng(),
			"latitude": event.latLng.lat(),
		},
		dataType: 'json',
		success: function(data){
			$('#google').show();
			$('.loader').hide();
			$("#main-content").html(data.html);
		}
	});
});

}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAnsrr4j7KEgyMbE9Nc0AE2L2cwYyK9Cio&callback=myMap"></script>
@endsection
   