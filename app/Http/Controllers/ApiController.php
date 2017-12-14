<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Info;


class ApiController extends Controller
{
    public function wkcData()
    {
    	$info = Info::orderBy('id','desc')->take(1)->get()->first();
    	return json_decode($info->jsoninfos,true);
    }
}
