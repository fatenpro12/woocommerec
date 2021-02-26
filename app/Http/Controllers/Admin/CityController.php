<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(){
        $cities = City::with(['state'])->paginate();
        return $cities;
        return view('admin.cities.index');
    }
}
