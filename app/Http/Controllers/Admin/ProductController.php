<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\City;
use App\Models\Product;
use App\Models\Unit;
use App\Services\Product\IProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product_service;

    public function __construct(IProductService $product_service)
    {
        $this->product_service = $product_service;
    }
    public function index($category_id)
    {
        $products=$this->product_service->getByCategory($category_id);
        return view('admin.products.index',compact('products','category_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category_id)
    {
        $units=Unit::all();
        $cities=City::all();
        $product=Product::create(['title'=>'']);
        return view('admin.products.create',compact('units','cities','category_id','product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unit=Unit::find($request->unit_id);
        if($unit==null)
        {
            $unit= Unit::create(['code'=>$request->unit_id,'name'=>$request->unit_id]);
        }
        $request['unit_id']=$unit->id;
        $request['title']=['en'=>$request['title_en'],'ar'=>$request['title_ar']];
        $request['description']=['en'=>$request['description_en'],'ar'=>$request['description_ar']];

        $product=$this->product_service->create($request->all());
        return $product;
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
         $units=Unit::all();
        $product=$this->product_service->find($id);
        $cities=City::all();
        //dd($product);
        $address=Address::find($product->address_id);
        return view('admin.products.edit',compact('product','units','address','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function uploadMainImage(Request $request,$id){
        $product=Product::find($id);
        if($request->hasFile('file')) {
            $name = $request->file->getClientOriginalName();
            $extension = $request->file->getClientOriginalExtension();
            $mdf5 = md5($name . '_' . time()) . '.' . $extension;
            $product->addMediaFromRequest('file')->usingFileName($mdf5)->withResponsiveImages()->toMediaCollection('main_image');
        }
        $request->main_image = $product->main_image->getUrl();
        return $product->main_image->getUrl();
    }
    public function uploadOtherImage(Request $request,$id){
        $product=Product::find($id);

        if($request->hasFile('files')) {
            $name = $request['files']->getClientOriginalName();
            $extension = $request['files']->getClientOriginalExtension();
            $mdf5 = md5($name . '_' . time()) . '.' . $extension;
            $product->addMediaFromRequest('files')->usingFileName($mdf5)->withResponsiveImages()->toMediaCollection('photos');
        }
        return $product->photos->last()->getUrl();

    }
    public function update(Request $request)
    {
        $id=$request['product_id'];
        $options=[];
        if($request->key)
        foreach ($request->key as $index=>$key) {
            $value=$request['value'][$index];
            $options[$index] = ['key' => $key, 'value' => $value];
        }
        $unit=Unit::find($request->unit_id);
        if($unit==null)
        {
            $unit= Unit::create(['code'=>$request->unit_id,'name'=>$request->unit_id]);
        }
        $request['options']=$options;
        $request['unit_id']=$unit->id;
        $request['title']=['en'=>$request['title_en'],'ar'=>$request['title_ar']];
        $request['description']=['en'=>$request['description_en'],'ar'=>$request['description_ar']];
        $product=$this->product_service->update($id,$request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=$this->product_service->delete($id);
        return back();
    }
}
