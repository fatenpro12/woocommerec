<?php

namespace App\Services\Category;
use Illuminate\Http\Request;

interface ICategoryService
{

    /**
    * get All Customers
    *
    * @return Collection<App\Models\Customer>
    */
    public function all();

    /**
    * find Customer By ID
    * @param int $id
    * @return App\Models\Customer
    */
    public function find($id);
    /**
    * Create new Customer
    *
    * @param Array $data
    * @return App\Models\Customer
    */
    public function create($data);

    /**
    * update existing Customer
    *
    * @param Array $data
    * @param App\Models\Customer $Customer
    * @return App\Models\Customer
    */
    public function update($id, $data);


    /**
    * delete existing Customer
    *
    * @param int $id
    * @return boolean
    */
    public function delete($id);
    /**
     * find Customer By Uer ID
     * @param int $user_id
     * @return App\Models\Customer
     */


    /** gets active Company services
     * @param Request $filters possible filters
     * @return Collection<App\Models\Company>
     */


}
