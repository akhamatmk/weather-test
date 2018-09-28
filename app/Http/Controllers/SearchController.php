<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\City;
use App\Model\Result;

class SearchController extends Controller
{
	public function index(Request $request)
	{
		$city = City::all();
		$place = $request->place ? $request->place : "";
		$main_url = "https://www.metaweather.com/api/location/";
		
		$url_get_place = $main_url."search/?query=".$place;
		$getPlace = get_curl($url_get_place);
		$result = [];

		if(count($getPlace) > 0)
		{
			foreach ($getPlace as $key => $value) {

				$get_city_from_db = City::where('woeid', $value['woeid'])->first();
				if(! $get_city_from_db)
				{
					$temp = explode(",", $value['latt_long']);
					
					$get_city_from_db = new City;
					$get_city_from_db->title = $value['title'];
				    $get_city_from_db->location_type = $value['location_type'];
				    $get_city_from_db->woeid = $value['woeid'];
				    $get_city_from_db->latitude = $temp[0];
				    $get_city_from_db->longitude = $temp[1];
				    $get_city_from_db->save();
				}

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

					if(isset($getWeather[0])){
						$result[$key]['weather'][] = $getWeather[0];

						$weather = Result::where('weather_id', $getWeather[0])->first();

						if(! $weather)
						{
							$weather = new Result;
							$weather->city_id = $get_city_from_db->id;
				            $weather->weather_id = $getWeather[0]['id'];
				            $weather->weather_state_name = $getWeather[0]['weather_state_name'];
				            $weather->weather_state_abbr = $getWeather[0]['weather_state_abbr'];
				            $weather->wind_direction_compass = $getWeather[0]['wind_direction_compass'];
				            $weather->min_temp = $getWeather[0]['min_temp'];
				            $weather->wind_speed = $getWeather[0]['wind_speed'];
				            $weather->wind_direction = $getWeather[0]['wind_direction'];
				            $weather->air_pressure = $getWeather[0]['air_pressure'];
				            $weather->humidity = $getWeather[0]['humidity'];
				            $weather->visibility = $getWeather[0]['visibility'];
				            $weather->predictability = $getWeather[0]['predictability'];
				            $weather->save();
						}

					}
				}
			}	
		}

		return view('search')->with('result', $result);
	}
}