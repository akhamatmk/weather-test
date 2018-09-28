@extends('layout.app')

@section('content')
<style type="text/css">

</style>

<div class="container">
	
	<div class="starter-template">
    	<h1>List City</h1> 
    	<table class="table table-striped">
         <thead>
         <tr>
            <th>Id</th>
            <th>Weather State Name</th>
         </tr>
         </thead>
         <tbody>
            @foreach($result as $value)
            <tr>
               <td>{{ $value->id }}</td>
               <td>{{ $value->weather_state_name }}</td>
               <td><a href="{{ URL('weater/history'.$value->id) }}"></a></td>
            </tr>
            @endforeach
         </tbody>
      </table>
      {{ $result->links() }}
  	</div>
</div>

@section('footer-script')

@endsection
   