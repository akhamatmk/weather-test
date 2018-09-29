@extends('layout.app')

@section('content')
<div class="container">
	
	@if(count($result) < 1)
	<div class="starter-template">
    	<h1>data tidak tersedia</h1> 
  	</div>
	@else
		@foreach($result as $v)
		<h1><span>{{ $v['location_type'] }} Of {{ $v['title'] }}</span></h1>
		<br>
			<div class="card-deck">				
			@foreach($v['weather'] as $key => $value)
				<div class="card col-md-2" style="background: #2F4B4F; margin-bottom: 10px">
			      <div class="card-body text-center">
			        <span class="day-span">{{ date('l, d m Y', strtotime($value['applicable_date'])) }}</span>
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
			@endForeach

			</div>
	   	@endForeach
	@endIf
</div>

@section('footer-script')

@endsection
   