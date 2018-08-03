<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yangqi\Htmldom\Htmldom;
use App\Feedbacks;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getWeather()
    {
        $data = array();

        $url = 'http://www.gismeteo.ua/city/daily/5093/';
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

        $html = curl_exec($ch);
        
        $dom = new Htmldom($html);

        $element = $dom->find('#weather', 0);

        $data['element'] = $element;

        return view('weather', $data);
    }

    public function getFeedbackList()
    {
        $data = array();

        $data['feedbacks'] = Feedbacks::all();

        return view('feedback_list', $data);
    }
}
