<?php

namespace App\Services\Product;

use App\Models\Product;
use App\Services\Product\IProductService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProductService implements IProductService
{

    protected $customer;

    function __construct(Product $product) {
        $this->product = $product;
    }
    /**
    * get All Customers
    *
    * @return Collection<App\Models\Customer>
    */
    public function all(){
        return Product::query()->orderby('created_at','desc')->get();
    }

    /**
    * find Customer By ID
    * @param int $id
    * @return App\Models\Customer
    */
    public function find($id){
        return Product::where('id',$id)->first();
    }
    /**
    * Create new Customer
    *
    * @param Array $data
    * @return App\Models\Customer
    */
    public function create($data){


        $product =  Product::create($data);
        return $product;
    }

    /**
    * update existing Customer
    *
    * @param Array $data
    * @param App\Models\Product $product
    * @return boolean
    */
    public function update($id, $data){
        $product = $this->find($id);

        $product->update($data);

        return $product;
    }


    /**
    * delete existing Customer
    *
    * @param int $id
    * @return boolean
    */
    public function delete($id){
        return Product::destroy($id);
    }


    public function getByCategory($category_id)
    {
        return Product::query()->where('category_id',$category_id)->orderby('created_at','desc')->get();
    }
}
