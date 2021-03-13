<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Shipment\IShipmentService;
use Illuminate\Http\Request;

class ShippController extends Controller
{
    private $shipment_service;

    public function __construct(IShipmentService $shipment_service)
    {
        $this->shipment_service = $shipment_service;
    }
    public function index()
    {
        $shippments=$this->shipment_service->all();
        return view('admin.shippments.index',compact('shippments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shippments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|min:3'
        ]);
        $shipment=$this->shipment_service->create($request->all());
        return redirect()->route('shippments');
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
        $shippment=$this->shipment_service->find($id);
        return view('admin.shippments.edit',compact('shippment'));
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
        $this->validate($request,[
            'name'=>'required|string'
        ]);
        $shippment=$this->shipment_service->update($id,$request->all());
        return redirect()->route('shippments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shippment=$this->shipment_service->delete($id);
        return back();
    }
}
