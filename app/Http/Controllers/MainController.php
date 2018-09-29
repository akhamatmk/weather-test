<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\City;
use App\Model\Result;

class MainController extends Controller
{
	public function index()
	{
		return view('index');
	}

	public function ajaxGetWeather(Request $request)
	{
		$longitude = $request->longitude;
		$latitude = $request->latitude;
		$url_get_place = "https://www.metaweather.com/api/location/search/?lattlong=".$latitude.",".$longitude;
		
		$getPlace = get_curl($url_get_place);
		if(! count($getPlace) > 0)
			return response()->json(['html' => ""]);

		$place_id = $getPlace[0]['woeid'];

		$url_get_weather = "https://www.metaweather.com/api/location/".$place_id;
		$getWeather = get_curl($url_get_weather);

		$html = "";
		if(isset($getWeather['consolidated_weather'])){
			$html = view('index_weater')
					->with('place', $getPlace[0])
					->with('result', $getWeather['consolidated_weather'])
					->render();
		}

    	return response()->json(['html' => $html]); 

	}

	public function beranda()
	{
		$result = City::paginate(15);
        return view('beranda', ['result' => $result]);
	}

	public function historyWeather($city_id)
	{
		$result = Result::where('city_id', $city_id)->paginate(15);
        return view('history', ['result' => $result]);
	}

	public function map()
	{
		return view('map');
	}
}