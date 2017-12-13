<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;
use App\Models\WkcMine;
use GuzzleHttp\Client;

class InfoController extends Controller
{
    //
    public function Index()
    {



    	# get info
    	$info = Info::orderBy('id','desc')->take(1)->get()->first();

    	$info = (json_decode($info->jsoninfos));
    	$wkcMine = WkcMine::where('name','wkc')->first();
    	return  view("index",[
    			'info' => $info,
    			'wkcMine' => $wkcMine,
    		]);
    }
}
