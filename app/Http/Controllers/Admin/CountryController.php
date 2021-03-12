<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;


class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('admin.countries.index')->with(['countries' => $countries]);
    }

    public function create()
    {
        return view('admin.countries.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'code' => 'required',
            'currency' => 'required'
        ]);
        $country = new  Country();
        $country->name = $request->input('name');
        $country->code = $request->input('code');
        $country->currency = $request->input('currency');
        $country->save();
        return redirect()->route('countries');

    }

    public function showedit(Request $request , $country_id){
        $country = Country::find( $country_id );
        return view('admin.countries.edit')->with(['country' => $country]);
    }

    public function update(Request $request , $country_id){

        $this->validate($request,[
            'name' => 'required',
            'code' => 'required',
            'currency' => 'required'
        ]);

        $country = Country::find( $country_id );

        $country->name = $request->input('name');
        $country->code = $request->input('code');
        $country->currency = $request->input('currency');
        $country->update();

        return redirect()->route('countries');
    }


    public function delete($country_id){
        $country = Country::find( $country_id );
        $country->delete();

        return redirect()->route('countries');
    }
}
