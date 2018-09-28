<style type="text/css">
	hr {
    margin-top: 0px !important;
    margin-bottom: 0px !important;
    width: 120% !important;
	border-top: 1px solid #2E748F !important;
}

	.day-span{
		font-size: 20px;
    font-weight: 700;
    color: #2E748F;
	}
</style>

<div class="container">
  <div class="starter-template">
		@php $img = get_image_weather($result[0]['weather_state_name']) @endphp
		<img width="150px" src="{{ asset('svg/'.$img) }}">
		<div>
			<span>{{ number_format($result[0]['min_temp']) }} &#8451;</span> /
			<span>{{ number_format($result[0]['max_temp']) }} &#8451;</span>
		</div>
      <h1 style="color: #2E748F;">{{ $result[0]["weather_state_name"] }}</h1>
  </div>
	
	<div class="card-deck">
		@foreach($result as $key => $value)
			@if($key != 0)
				<div class="card col-md-2" style="background: #2F4B4F; margin-bottom: 10px">
			      <div class="card-body text-center">
			        <span class="day-span">{{ date('l', strtotime($value['applicable_date'])) }}</span>
			        <hr style="margin-left: -15px;">
			        <div class="card-text" style="margin-bottom: 20px">
			        		@php $img = get_image_weather($value['weather_state_name']) @endphp
							<div style="width: 60%; float: left; margin-bottom: 20px">
								<img src="{{ asset('svg/'.$img) }}">	
							</div>

							<div style="width: 40%; float: right;">
								<span ><h5 style="margin-top: 10px; color: yellow">{{ number_format($value['max_temp']) }} &#8451;</h5></span>
								<br/>
								<span><h5 style="margin-top: -30px; color: lightblue">{{ number_format($value['min_temp']) }} &#8451;</h5></span>
							</div>							
			        </div>
			      </div>
			   </div>
			@endIf		   
	    @endForeach
  	</div>
</div>