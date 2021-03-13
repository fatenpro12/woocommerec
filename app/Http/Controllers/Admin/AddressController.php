<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Services\Address\IAddressService;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    private $address_service;

    public function __construct(IAddressService $address_service)
    {
        $this->address_service = $address_service;
    }
    public function index()
    {
        $addresses=$this->address_service->all();
        return view('admin.addresses.index',compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addresses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $address=$this->address_service->create($request->all());
        $product=Product::find($request->product_id);
        $product->address_id=$address->id;
        $product->save();
      //  return redirect()->route('addresses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address=$this->address_service->find($id);
        return view('admin.addresses.edit',compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $address=$this->address_service->update($id,$request->all());
        $product=Product::find($request->product_id);
        $product->address_id=$address->id;
        $product->save();
      //  return redirect()->route('addresses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address=$this->address_service->delete($id);
        return back();
    }
}
