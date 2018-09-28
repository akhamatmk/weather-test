@extends('layout.app')

@section('content')
<div class="container">
  <div id="main-content"></div>
</div>

<p id="demo"></p>

@section('footer-script')
	<script type="text/javascript">
	$(function() {
	   let x = document.getElementById("demo");
	   let latitude = "-6.2440165";
	   let longitude = "106.7883531";

		function getLocation() {
		    if (navigator.geolocation) {
		        navigator.geolocation.getCurrentPosition(showPosition, showError);
		    } else { 
		        x.innerHTML = "Geolocation is not supported by this browser.";
		    }
		}

		function showPosition(position) {
		   latitude = position.coords.latitude;
		   longitude = position.coords.longitude;
		   getWeather();
		}

		function showError(error) {
		   getWeather();
		}

		getLocation();

		function getWeather()
		{
			$.ajax({
				type: "GET",
				url: '{{ URL::to("ajax/weather") }}',
				data : {
					"longitude": longitude,
					"latitude": latitude,
				},
				dataType: 'json',
				success: function(data){
					$("#main-content").html(data.html);
				}
			});
		}
	})
	</script>
@endsection
   