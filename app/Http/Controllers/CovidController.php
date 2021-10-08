<?php

namespace App\Http\Controllers;
use  App\Charts\CovidInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CovidController extends Controller
{
    public function index()
    {
        $get = collect(Http::get('https://api.kawalcorona.com/indonesia/provinsi')->json());

        $get1 = collect(Http::get('https://api.kawalcorona.com/indonesia/provinsi')->json())->flatten(1);


        $response = $get->flatten(1);

        // dd($get1);



        $label = $response->pluck('Provinsi');
        $color= $label->map(function($item){
            return '#' . substr(md5(mt_rand()), 0,6);
        });


        $chart = new CovidInfo;

        $chart->labels($label);
        $data = $response->pluck('Kasus_Posi');
        $chart->dataset('Data Kasus Positif Di Indonesia','bar',$data)->backgroundColor($color);

        $chart2 = new CovidInfo;
        $dm = $response->pluck('Kasus_Meni');
        $chart2->dataset('Data Meninggal Karena Positif Di Indonesia','bar',$dm)->backgroundColor($color);

        return view('index',[
            'chart' => $chart,
            'chart2' => $chart2,
            'get' => $get1
        ]);


    }
}