<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
	public function index(Request $request)
	{
		$place = $request->place ? $request->place : "";
		$main_url = "https://www.metaweather.com/api/location/";
		
		$url_get_place = $main_url."search/?query=".$place;
		$getPlace = get_curl($url_get_place);
		$result = [];

		if(count($getPlace) > 0)
		{
			foreach ($getPlace as $key => $value) {
				$result[] = $value;
				
				for($a = 1; $a <= 6; $a++)
				{
					$date = date('Y-m-d', strtotime(now(). ' - '.$a.' days'));
					$temp = explode("-", $date);
					$day = (int) $temp[2];
					$month = (int) $temp[1];
					$year = (int) $temp[0];
					$url_get_weather = $main_url.$value['woeid']."/".$year."/".$month."/".$day."/";
					$getWeather = get_curl($url_get_weather);

					if(isset($getWeather[0]))
						$result[$key]['weather'][] = $getWeather[0];							
				}
			}	
		}

		return view('search')->with('result', $result);
	}
}